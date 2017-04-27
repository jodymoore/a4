<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerOrder;
use Illuminate\Contracts\Auth;
use Session;
use Cart;


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

    // /*
    //  *  a dynamic order function 
    //  */
    // public function execute(Request $request) {

    //     // get user id from session user use id to insert order info 
    //     // into customer order database 
    
    //     $CustOrderDB = new CustomerOrder();

    //     $CustOrderDB->cid = 
    //     $CustOrderDB->name = 
    //     $CustOrderDB->email = 
    //     $CustOrderDB->order= 
    //     $CustOrderDB->phoneNumber = 

    // }


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
        $itemNum = 006;

        $pSize = $request->selectSize;

        $amtCheese = $request->selectCheese;
        $amtCheese = $amtCheese." "."cheese";

        $order = $order.$pSize." pizza".", ".$amtCheese;

        // meat selections

        if($request->has('pep')){
            $order = $order.", "."pepperoni";
            $price += .25;
         }

        if($request->has('itsau')){
            $order = $order.", "."italian sausage";
            $price += .25;
         }

        if($request->has('beef')){
            $order = $order.", "."beef";
            $price += .25;
         }

        if($request->has('ham')){
            $order = $order.", "."ham";
            $price += .25;
         }

        if($request->has('pork')){
            $order = $order.", "."pork";
            $price += .25;
         }
        
        // vegetables selections

        if($request->has('mush')){
            $order = $order.", "."mushrooms";
            $price += .25;
         }

        if($request->has('spin')){
            $order = $order.", "."spinach";
            $price += .25;
         }

        if($request->has('redp')){
            $order = $order.", "."red peppers";
            $price += .25;
         }

        if($request->has('bellp')){
            $order = $order.", "."green peppers";
            $price += .25;
         }

        if($request->has('pina')){
            $order = $order.", "."pineapple";
            $price += .25;
         }
        if($request->has('jala')){
            $order = $order.", "."jalapeno peppers";
            $price += .25;
         }
        if($request->has('tom')){
            $order = $order.", "."tomatoes";
            $price += .25;
         }

        Cart::add($itemNum, $order, $price, 1, array());


         Session::flash('message',$order.' was added to your order.');

        #Cart::add(005, $order, $price, 1, array());
        // need to hand this to order blade or checkout.

         return view('newOrder');
    }



}
