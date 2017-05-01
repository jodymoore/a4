<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerOrders;
use Illuminate\Support\Facades\Auth;
use Session;
use Cart;
use App\Customers;


class CartController extends Controller
{
    /*
     *  
     */
    public function show(Request $request) {


        // $user = Session::getId('name');
        // if ($user)
        // {
        //     echo "Hello $user->name";
        // }

        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();
    
        return view('cart')->with([
            'cart' => $cart,
        ]);
    }

    /*
     *  
     */
    public function clearCart() {
       
        Cart::clear();

        return view('index');
    }

    /*
     *  
     */
    public function remove(Request $request) {

        $id = $request->id;
        dump($id);
        Cart::remove($id);
        
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();

        return view('cart')->with([
            'cart' => $cart,
            ]);
    }

    /*
     *  a dynamic order function 
     */
    public function execute(Request $request) {

        // get user id from session user use id to insert order info 
        // into customer order database 

        $id = Auth::id();

        $cartCollection = Cart::getContent();
        $cart = $cartCollection;
       
        // get all the atributes that match $id 
        $customer = Customers::where('id','=',$id)->first();
        $cust_order = new CustomerOrders();
        $count = 0;
        $orders = [];
        foreach($cart as $value) {
            $order[$count++] = $value->quantity.' '.$value->name.', '.$value->price;
        }
        
         $order = implode("\n", $order);
        
       
        

        $cust_order->cid = $id;
        $cust_order->name = $customer->name;
        $cust_order->Email = $customer->Email;
        $cust_order->order = $order;
        $cust_order->phoneNumber = $customer->phoneNumber;
        $cust_order->save();

        // send email to customer confirming the order

         $email = $customer->Email;

        return view('cart')->with([
            'cart' => $cart,
        ]);
    }

     /*
     *  a dynamic order function 
     */
    public function order(Request $request){
         
        $this->validate($request, [
            'selectSize' => 'required',
        ]);

        $price = 5.99;
        $topping = $request->topping;
        $pSize = $request->selectSize;
        $id = null;
        switch ( $topping) {
          case 'cheese':
            $price = $price;
           $id = 'CHEESE';
            break;
          case 'pepperoni':
            $price = 6.24;
            $id= 'PEPPERONI';
            break;
          case 'supreme':
            $price = 7.49;
           $id = "SUPREME";
            break;
          case 'vegetable':
            $price = 8.49;
            $id = 'VEGETABLE';
            break;
          
          default:
            $price = 5.99;
            $id = 'CHEESE';
            break;
        }

        switch ( $pSize) {
          case 'Small':
            $price = $price;
            break;
          case 'Medium':
            $price += 2.00;
            break;
            case 'Large':
            $price += 3.00;
            break;
          default:
            $price = $price;
            break;
        }
        
        $order = $pSize." ".$topping." "." pizza"; 
        Cart::add($id, $order, $price, 1, array());

        Session::flash('message',$order.' was added to your order.');

        // need to hand this to order blade or checkout.
        return view('popPizzas');
    }

    public function CreateOwnOrder(Request $request) {

        $this->validate($request, [
            'selectSize' => 'required',
        ]);

        $order = "";
        $price = 5.99;
        $itemNum = 'CREATE YOU OWN';

        $pSize = $request->selectSize;

        $amtCheese = $request->selectCheese;
        $amtCheese = $amtCheese." "."cheese";

        $order = $order.$pSize." pizza".", ".$amtCheese;

        // ingredient selections

        $input = $request->all('checkboxes');

        $badArray = ["_token", "selectSize", "selectCheese", "addToOrder"];

        foreach ($input as $key => $value) {
            if(!in_array($key, $badArray)){
            // remove underscore
            switch ( $key) {
              case 'italian_sausage':
                $key = "italian sausage";
                break;
              case 'red_peppers':
                $key = "red peppers";
                break;
              case 'bell_peppers':
                $key = "bell peppers";
                break;
              case 'jalapeno_peppers':
                $key = "jalapeno peppers";
                break;
            }

            $order = $order.", ".$key;
            $price += .25;

            }   
        }

        switch ( $price) {
          case 'Small':
            $price = $price;
            break;
          case 'Medium':
            $price += 2.00;
            break;
            case 'Large':
            $price += 3.00;
            break;
          default:
            $price = $price;
            break;
        }

        Cart::add($itemNum, $order, $price, 1, array());


        Session::flash('message',$order.' was added to your order.');

        #Cart::add(005, $order, $price, 1, array());
        // need to hand this to order blade or checkout.

        return view('newOrder');
    }
}
