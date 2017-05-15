<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Session;
use Cart;
use App\Product;
use LoginController;
use App\User;
use App\Ingred;
use URL;

class CartController extends Controller
{
    /*
     *  show
     */
    public function show(Request $request) {

        // if not logged in redirect to login page 
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        
        // get contents of cart
        $cartCollection = Cart::getContent();
        $carts = $cartCollection->toArray();
        
        // get the user name for blade display
        $firstName = $this->getFirstName();
    
        return view('cart')->with([
            'carts' => $carts,
            'firstName' => $firstName,
        ]);
    }

     /*
     *  remomeItem 
     *  Remove item from Cart array  
     */
    public function removeItem(Request $request) {
        
        // get requests
        $id = $request->remove;   
        $name = $request->name;
        
        // get the user name for blade display

        $firstName = $this->getFirstName();
        
        // remove item from cart with row id
        Cart::remove($id);

        Session::flash('message',$name.' was removed from your order.');
        
        // get cart contents
        $cartCollection = Cart::getContent();
        $carts = $cartCollection->toArray();

        return view('cart')->with([
            'carts' => $carts,
            'firstName' => $firstName,
            ]);
    }

     /*
     *  addItem 
     *  Add item to Cart array  
     */
    public function addItem(Request $request){

        // if not logged in redirect to login page 
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        
        // validate requests
        $this->validate($request, [
            'selectSize' => 'required',
        ]);

        $orderDesc = '';

        // get the user Name for blade display
        $firstName = $this->getFirstName();

        $sizeId = null;

        // get product id and size     
        $pid = $request->pid;
        $pSize = $request->selectSize;

        // index product with size 
        $pid = $pid + $pSize;

        // get product data from products table
        $product = Product::where('id','=',$pid)->first();

        // add product attributes to cart variables
        $price = $product->price;
        $topping = $product->topping;
        $desc = $product->desc;

        // If product number is 13 or larger include the ingredients
        if($product->id > 12) {

            // ingredient selections
	        $input = $request->all('checkboxes');

	        $amtCheese = $request->selectCheese;

            $amtCheese = $amtCheese." "."cheese";

            $orderDesc = $orderDesc.$product->size." pizza".", ".$amtCheese;

	        $badArray = ["_token","pid", "selectSize", "selectCheese", "addToOrder"];

	        foreach ($input as $key => $value) {
	            if(!in_array($key, $badArray)){

	                // remove underscore
	                for ($i = 0; $i < strlen($key); $i++){
	                   if ($key[$i] == '_') {
	                       $key[$i] = ' ';
	                   }
	                }
	                $orderDesc = $orderDesc.", ".$key;
	                $price += .25;
	            }   
            }
        }
        else {
            $orderDesc = $product->size." ".strtolower($product->topping)." "." pizza";
        }

        // Get cart to evaluate contents
        $cartCollection = Cart::getContent();
        $carts = $cartCollection->toArray();

        // Set cart id 
        $cartId = 0;
        // if this is the first item index cartId
        if(Cart::isEmpty()) {
            $cartId = 1; 
        }
        else {
        	// get last items number to advance item# id
            $lastItem = array_pop( $carts ); 

            // advance cart row id
            $cartId = $lastItem['id'];
            $cartId++;
 
        }
            
        // Add items to Cart in Cart array format
        Cart::add(array(
            'id' => $cartId,
            'name' => $orderDesc,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'topping' => $topping,
                'pid' => $pid, 
                'size' => $pSize,       
          ),
        ));

        Session::flash('message',$orderDesc.' was added to your order.');
        
        // return user to previous view to buy more pizza
        if ($pid >= 13) {
            return view('newOrder');
        }
        else {
            return view('popPizzas'); 
        }
    }

    public function submitOrder(Request $request) {
     
        // if not logged in redirect to login page 
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        if(Cart::isEmpty()) {
            return view('cart');
        }
        else {
            
            // get the user name for blade display
            $firstName = $this->getFirstName();

            $ingred = "";
            $cartArry = [];
            
            // get user id 
            $id = Auth::id();
            $carts = Cart::getContent();
            $price = 0;
            $prodId = null;  

            // get all the atributes that match $id to email confirmation
            $user = User::where('id','=',$id)->first();
            $cust_order = new Order();
            $count = 0;
            $productsOrdered = []; 

            
            // save current order to orders table 
            $cust_order->user_id = $id;
            $cust_order->name = $user->name;
            $cust_order->email = $user->email;
            $cust_order->ingred = $ingred;
            $cust_order->total = Cart::getTotal();
            $cust_order->save();

            foreach($carts as $cart) {

               $productsOrdered[$count++] = $cart['attributes']['pid']; 
               if ($cart['attributes']['pid'] > 12){
                   $ingred = $cart['name']; 
                   $Ing = new Ingred();
                   $Ing->topping= $cart['attributes']['topping'];
                   $Ing->desc = $ingred;
                   $Ing->size = $cart['attributes']['size'];
                   $Ing->price = $cart['price'];
                   $Ing->save();
                   $ingred_marker = Ingred::where('id', '=', $Ing->id)->first();
                   $cust_order->ing()->save($ingred_marker);
               }
               else {
                 $ingred = $cart['name']; 
               }     
            }
         
            // save products to pivot table
            foreach ($productsOrdered as $product) {
                $product = Product::where('id', '=', $product)->first();
                $cust_order->products()->save($product);
            }

            $total = Cart::getTotal();
            $cartArry = $carts->toArray();
            Cart::clear();

        }

        // get cleared contents of Cart
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();

        return view('thankyou')->with([
            'cartArry' => $cartArry,
            'total' => $total,
            'firstName' => $firstName,
        ]);
    }

    public function getFirstName() {
       /*
        *  https://www.w3schools.com/php/func_array_list.asp
        */
        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];

        return $firstName;

     }
}
