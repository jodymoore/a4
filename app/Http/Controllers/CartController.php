<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Auth;
use Session;
use Cart;
use App\Customers;
use App\Products;
use LoginController;


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
     *  a dynamic order function 
     */
    public function execute(Request $request) {

        // get user id from session user use id to insert order info 
        // into customer order database 

        // info flagger
       #$custInfo = null;

        // if not logged in redirect to temp form page
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        $cartArry = [];

        if(Cart::isEmpty()) {

            return view('cart');

        }
        else {

            $id = Auth::id();
         
            $cartCollection = Cart::getContent();
            $cart = $cartCollection;

            $price = 0;
           
            // get all the atributes that match $id 
            $customer = Customers::where('id','=',$id)->first();
            $cust_order = new Orders();
            $count = 0;
            $orders = [];
            foreach($cart as $value) {
                $order[$count++] = $value->quantity.' '.$value->name.', ';
                $price += $value->price;
            }
            
            $order = implode("\n", $order);
          
            $cust_order->cust_id = $id;
            $cust_order->name = $customer->name;
            $cust_order->email = $customer->Email;
            $cust_order->order = $order;
            $cust_order->total = $price;
            $cust_order->save();

            // send email to customer confirming the order
            $total = Cart::getTotal();
            $cartArry = $cartCollection->toArray();
            Cart::clear();
            $email = $customer->Email;

        }

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

        switch ( $pSize) {
          case 'Small':
            $sizeId = 1;
            break;
          case 'Medium':
            $sizeId += 2;
            break;
            case 'Large':
            $sizeId += 3;
            break;
          default:
            $sizeId = 0;
            break;
        }

        $id = $pid.$sizeId;

        $product = Products::where('pid','=',$pid)->first();

        $price = $product->price;
        $topping = $product->topping;
        $desc = $product->desc;
             
        $order = $pSize." ".strtolower($topping)." "." pizza"; 
       #Cart::add($topping, $order, $price, 1, array());

                // array format
        Cart::add(array(
            'id' => $id,
            'name' => $order,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'size' => $pSize,
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


        #Cart::add($itemNum, $order, $price, 1, array());
                       // array format
        Cart::add(array(
            'id' => $id,
            'name' => $order,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'size' => $pSize,
                'topping' => $topping,
            
          ),
        ));

        Session::flash('message',$order.' was added to your order.');

        #Cart::add(005, $order, $price, 1, array());
        // need to hand this to order blade or checkout.

        return view('newOrder');
    }
}
