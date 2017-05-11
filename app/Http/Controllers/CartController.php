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
use Mail;
use URL;

class CartController extends Controller
{
    /*
     *  show
     */
    public function show(Request $request) {

        // if not logged in redirect to login page /home
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $cartCollection = Cart::getContent();
        $carts = $cartCollection->toArray();

        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];
    
        return view('cart')->with([
            'carts' => $carts,
            'firstName' => $firstName,
        ]);
    }

    /*
     *  remove
     */
    public function remove(Request $request) {

        $id = $request->id;
        $name = $request->name;

        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];

        Cart::remove($id);

        Session::flash('message',$name.' was removed from your order.');
        
        $cartCollection = Cart::getContent();
        $carts = $cartCollection->toArray();

        return view('cart')->with([
            'carts' => $carts,
            'firstName' => $firstName,
            ]);
    }

     /*
     *  a dynamic order function 
     */
    public function order(Request $request){

        // if not logged in redirect to login page /home
        if(!Auth::check()) {
            return redirect()->route('login');
        }
         
        $this->validate($request, [
            'selectSize' => 'required',
        ]);

        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];
             
        $pid = $request->pid;
        $pSize = $request->selectSize;

        $sizeId = null;
        $id = $pid + $pSize;

        $product = Product::where('id','=',$id)->first();

        $price = $product->price;
        $topping = $product->topping;
        $desc = $product->desc;

        if ($product->id > 12) {
            $order = $product->size." ".strtolower($product->topping);           
        }
        else {
            $order = $product->size." ".strtolower($product->topping)." "." pizza";
        }
            
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

        // if not logged in redirect to login page /home
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $this->validate($request, [
            'selectSize' => 'required',
        ]);

        $user = Auth::user()->name;
        $userName = list($user) = explode(' ', $user);

        $pSize = $request->selectSize;
        $id = '13' + $pSize;

        $product = Product::where('id','=',$id)->first();

        $order = "";
        $price = $product->price;
        $topping = $product->topping;

        $amtCheese = $request->selectCheese;
        $amtCheese = $amtCheese." "."cheese";

        $order = $order.$product->size." pizza".", ".$amtCheese;

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

     /*
     *  execute 
     */
    public function execute(Request $request) {
     
        // if not logged in redirect to temp form page
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];

        $cartArry = [];

        if(Cart::isEmpty()) {

            return view('cart');

        }
        else {
            
            // get user id 
            $id = Auth::id();
         
            $carts = Cart::getContent();
            $newQty = $request->qty;

            $price = 0;
            $prodId = null;
           
            // get all the atributes that match $id 
            $user = User::where('id','=',$id)->first();
            $cust_order = new Order();
            $count = 0;
            $productsOrdered = []; 

            // save current order to orders table 
            $cust_order->user_id = $id;
            $cust_order->name = $user->name;
            $cust_order->email = $user->email;
            $cust_order->total = Cart::getTotal();
            $cust_order->save();


            foreach($carts as $cart) {
               $productsOrdered[$count++] = $cart['id']; 

            }

            // update cart
            Cart::update($request->id, array(
              'quantity' => array(
                  'relative' => false,
                  'value' => $newQty,
              ),
            )); 

            foreach ($productsOrdered as $product) {

                $product = Product::where('id', '=', $product)->first();
                $cust_order->products()->save($product);
            }

            $total = Cart::getTotal();
            $cartArry = $carts->toArray();
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
            'firstName' => $firstName,
        ]);
    }
}
