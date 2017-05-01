<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerOrders;
use Session;
use Cart;
use Illuminate\Support\Facades\Auth;



class reOrderController extends Controller
{

     /*
     *  displayReorder
     */
    public function show(Request $request) {
        // get login id
        $id = Auth::id(); 
         $oldOrders = CustomerOrders::where('cid','=',$id)->get();
         $custOldOrders = [];
         $count2 = 0;
         foreach($oldOrders as $cOrder) {
            $custOldOrders[$count2++] = $cOrder->order;
        }

        // query customer_orders database     

    
        return view('reOrder')->with([
            'custOldOrders' => $custOldOrders,
        ]);
    }

        public function submit(Request $request) {
            
            $order = $request->order;

            Cart::add($id, $order, $price, 1, array());


        ]);
    }


}
