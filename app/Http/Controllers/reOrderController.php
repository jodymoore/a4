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
        // if not logged in redirect to login page /home
        if(!Auth::check()) {
            return redirect()->route('login');
        }

        // query customer_orders database
        // get login id
        $id = Auth::id(); 
        $oldOrders = CustomerOrders::where('cid','=',$id)->get();
        $custOldOrders = [];
        $price = [];
        $id = [];

        $count = 0;

        foreach($oldOrders as $value) {
            $custOldOrders[$count++] = $value->order;
            $price[$count++] = $value->price;
            $id[$count++] = $value->order_id;
        }

        return view('reOrder')->with([
            'custOldOrders' => $custOldOrders,
            'price' => $price,
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
