<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Auth;
use Session;
use Cart;
use App\Products;
use LoginController;
use App\User;
use Mail;

class CartController extends Controller
{
    /*
     *  show
     */
    public function show(Request $request) {

        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();
    
        return view('cart')->with([
            'cart' => $cart,
        ]);
    }

    /*
     *  clearCart
     */
    public function clearCart() {
       
        Cart::clear();

        return view('index');
    }

     /*
     *  updateCart
     */
    public function updateCart() {
        
        // get  cart order id that is to be updated
        $orderId = null;

        $carts = Cart::getContent();

               
         // you may also want to update a product by reducing its quantity, you do this like so:
        Cart::update($orderId, array(
          'quantity' => -1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ));

        // get updated contents to show in cart blade
        $cart = Cart::getContent()->toArray();

        return view('cart')->with([
            'cart' => $cart,
        ]);
    }



    /*
     *  remove
     */
    public function remove(Request $request) {

        $id = $request->id;
        $name = $request->name;

        Cart::remove($id);

        Session::flash('message',$name.' was removed from your order.');
        
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();

        return view('cart')->with([
            'cart' => $cart,
            ]);
    }

    /*
     *  execute 
     */
    public function execute(Request $request) {
     
        // if not logged in redirect to temp form page
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $cartArry = [];

        if(Cart::isEmpty()) {

            return view('cart');

        }
        else {
            
            // get user id 
            $id = Auth::id();
         
            $cart = Cart::getContent();

            $price = 0;
            $prodId = null;
           
            // get all the atributes that match $id 
            $user = User::where('id','=',$id)->first();
            $cust_order = new Orders();
            $count = 0;
            $productsOrdered = []; 

            // save current order to orders table 
            $cust_order->user_id = $id;
            $cust_order->name = $user->name;
            $cust_order->email = $user->email;
            $cust_order->total = Cart::getTotal();
            $cust_order->save();

            foreach($cart as $value) {
                // need a product array just like tags in foobooks made from Cart contents to get 
                // product id 
               $productsOrdered[$count++] = $value['attributes']['pid'];
            }

            // save to pivot table
            $cust_order->products()->sync($productsOrdered);
    
            $cust_order->save();

            $total = Cart::getTotal();
            $cartArry = $cart->toArray();
            Cart::clear();

            // \Mail::send('confirm', ['user' => $user],
            //    function($message) use ($user) {
            //     $message->to($user->email);
            //     $message->subject('Quik Pizza Confirmation');
            // });

        }

        // get cleared contents of Cart
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();


        return view('thankyou')->with([
            'cartArry' => $cartArry,
            'total' => $total,
        ]);
    }

     /*
     *  a dynamic order function 
     */
    public function order(Request $request){
         
        $this->validate($request, [
            'selectSize' => 'required',
        ]);
             
        $pid = $request->pid;
        $pSize = $request->selectSize;

        $sizeId = null;

        $product = Products::where('pid','=',$pid)->first();

        $price = $product->price;
        $topping = $product->topping;
        $desc = $product->desc;

        switch ( $pSize) {
          case 'Small':
            $sizeId = 1;
            $price = $price;
            break;
          case 'Medium':
            $sizeId += 2;
            $price += 2.00;
            break;
            case 'Large':
            $sizeId += 3;
            $price += 3.00;
            break;
          default:
            $sizeId = 0;
            $price = $price;
            break;
        }
         
        $id = $pid.$sizeId;    
        $order = $pSize." ".strtolower($topping)." "." pizza"; 

        // Cart array format
        Cart::add(array(
            'id' => $id,
            'name' => $order,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'topping' => $topping,
                'pid' => $pid,         
          ),
        ));
        Session::flash('message',$order.' was added to your order.');

        // need to hand this to order blade or checkout.
        return view('popPizzas');

    }

    public function CreateOwnOrder(Request $request) {

        $this->validate($request, [
            'selectSize' => 'required',
        ]);

        $pSize = $request->selectSize;

        $order = "";
        $price = 5.99;
        $topping = 'CREATE YOUR OWN';
        $sizeId = null;

        switch ( $pSize) {
          case 'Small':
            $sizeId = 1;
            $price = $price;
            break;
          case 'Medium':
            $sizeId += 2;
            $price += 2.00;
            break;
            case 'Large':
            $sizeId += 3;
            $price += 3.00;
            break;
          default:
            $sizeId = 0;
            $price = $price;
            break;
        }
        
        $pid = 6;
        $id = $pid.$sizeId;
   
        $amtCheese = $request->selectCheese;
        $amtCheese = $amtCheese." "."cheese";

        $order = $order.$pSize." pizza".", ".$amtCheese;

        // ingredient selections
        $input = $request->all('checkboxes');

        $badArray = ["_token", "selectSize", "selectCheese", "addToOrder"];

        foreach ($input as $key => $value) {
            if(!in_array($key, $badArray)){

                // remove underscore
                for ($i = 0; $i < strlen($key); $i++){
                   if ($key[$i] == '_') {
                       $key[$i] = ' ';
                   }
                }

                $order = $order.", ".$key;
                $price += .25;

            }   
        }

        $cartCollection = Cart::getContent();
        $carts = $cartCollection->toArray();

        foreach ($carts as $cart => $value) {

            if(strcmp($order,$value['name']) == 0) {
               $id = $id;
            }
            else {
               $id++;
            }
        }

        // Place order into Cart array format
        Cart::add(array(
            'id' => $id,
            'name' => $order,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'topping' => $topping, 
                'pid' => $pid,     
          ),
        ));

        Session::flash('message',$order.' was added to your order.');

        return view('newOrder');
    }
}
