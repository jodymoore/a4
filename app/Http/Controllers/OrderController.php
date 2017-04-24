<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerOrder;

class OrderController extends Controller
{
    /*
     *  
     */
    public function show(Request $request) {

        if(!isset($order)){
            $order = null;
        }
    
        return view('order')->with([
            'order' => $order,
        ]);
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
    public function order($n) {

        $custOrder = $n; 

        // need to hand this to order blade or checkout.
        return view('popPizzas')->with([
        	'custOrder' => $custOrder,
        	]);
    }

    public function CreateOwnOrder(Request $request) {

        $this->validate($request, [
            'selectSize' => 'required',
        ]);

        $order = "";
        $price = 5.99;

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
            $order = $order.", "."bell pepppers";
            $price += .25;
         }

        if($request->has('pina')){
            $order = $order.", "."pineapple";
            $price += .25;
         }
        if($request->has('jala')){
            $order = $order.", "."jalapena peppers";
            $price += .25;
         }
        if($request->has('tom')){
            $order = $order.", "."tomatoes";
            $price += .25;
         }
     $data = $request->session()->all();
     dump($data);

        // need to hand this to order blade or checkout.

         return view('order')->with([

          'order' => $order,
          'price' => $price

        ]);
    }



}
