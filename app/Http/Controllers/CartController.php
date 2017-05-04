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
use App\Order_Product;


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
         
            $cartCollection = Cart::getContent();
            $cart = $cartCollection;

            $price = 0;
            $prodId = null;
           
            // get all the atributes that match $id 
            $customer = User::where('id','=',$id)->first();
            $cust_order = new Orders();
            $count = 0;
            $orders = [];

            foreach($cart as $value) {
                $order[$count++] = $value->quantity.' '.$value->name.', ';
                $price += $value->price;
                $prodId = $value->id;
            }
            
            $order = implode("\n", $order);
          
            $cust_order->cust_id = $id;
            $cust_order->name = $customer->name;
            $cust_order->email = $customer->email;
            $cust_order->order = $order;
            $cust_order->total = $price;
            $cust_order->save();

            $total = Cart::getTotal();
            $cartArry = $cartCollection->toArray();
            Cart::clear();

            // send email to customer confirming the order
            $email = $customer->email;

        }

        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();

        // insert into Order_Product pivot 
        // $order_product = new Order_Product;
        // $order_product->cust_id = $id;
        // $order_product->product_id = $prodId;
        // $order_product->save();



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
          ),
        ));

        Session::flash('message',$order.' was added to your order.');

        return view('newOrder');
    }
}
