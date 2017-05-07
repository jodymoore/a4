<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Session;
use Cart;
use Illuminate\Support\Facades\Auth;


class reOrderController extends Controller
{

     /*
     *  displayReorder
     */
    public function show(Request $request) {
        // if not logged in redirect to login page /home
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        // query customer_orders database
        // get login id
        $id = Auth::id(); 

        $oldOrders = Orders::where('user_id','=',$id)->get();

        $custOldOrders = [];
        $total = [];
        $id = [];

        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
      

        foreach($oldOrders as $value) {
            $custOldOrders[$count1++] = $value->order;
            $total[$count2++] = $value->total;
            $id[$count3++] = $value->order_id;

        }

        return view('reorder')->with([
            'orders' => $custOldOrders,
            'total' => $total,
            'id' => $id,
        ]);
    }


    public function submit(Request $request) {
            
        $order = $request->order;
        $price = $request->price;
        $id = $request->id;

        Cart::add($id, $order, $price, 1, array());

        Session::flash('message',$order.' was added to your order.');

        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();

        return view('cart')->with([
            'cart' => $cart,
        ]);

    }
}
