<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
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

        $prevOrders = Order::where('user_id','=',$id)->get();

        $orders = [];
        $total = [];
        $id = [];
        $topping = [];

        $productsOrdered = [];

         

         // need to get products from order_product table

        $products = Order::with('products')->get();

       

        foreach($prevOrders as $order) {
            foreach ($order->products as $product) {

                $orders[] = $product->size." ".strtolower($product->topping)." "." pizza";
                $total[] = $order->total;
                $id[] = $product->id;
                $topping[] = $product->topping;
            }
        }

        dump($orders);


        return view('reorder')->with([
            'orders' => $orders,
            'total' => $total,
            'id' => $id,
            'topping' => $topping,
        ]);
    }


    public function submit(Request $request) {
            
        $order = $request->order;
        $price = $request->price;
        $id = $request->id;
        $topping = $request->topping;

        Cart::add($id, $order, $price, 1, array());

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

        $cartCollection = Cart::getContent();
        $carts = $cartCollection->toArray();


        return view('cart')->with([
            'carts' => $carts,
        ]);

    }
}
