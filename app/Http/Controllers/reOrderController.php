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

        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];

        // query customer_orders database
        // get login id
        $id = Auth::id(); 

        $prevOrders = Order::where('user_id','=',$id)->get();

        $orders = [];
        $total = [];
        $idArry = [];
        $desc = [];
        $orderId = [];
        $ingred = '';
        

        $productsOrdered = [];

        $prodPrice = 0;
       
        // need to get products from order_product table
        $products = Order::with('products')->where('user_id', '=', $id)->get();

        foreach($prevOrders as $order) {
            $ingred = $order['attributes']['ingred'];
            $number = 0;
            foreach ($order->products as $product) {
                
                if ($product->id > 12) {
                    $orders[] = $ingred.' '.'pizza';
                    $newIngred = explode(' ', $ingred);
                    $number = (count($newIngred)-4);
                    $number *= .25;
                }
                else {

                    $orders[] = $product->size." ".strtolower($product->topping).' '.'pizza';
                }

                $total[] = $number + $product->price;
                $idArry[] = $product->id;
                $desc[] = $product->topping;
                $orderId[]= $order->id;
            }
        }

        return view('reorder')->with([
            'orders' => $orders,
            'total' => $total,
            'idArry' => $idArry,
            'desc' => $desc ,
            'orderId' => $orderId,
            'firstName' => $firstName,
        ]);
    }

    public function submit(Request $request) {
            
        $order = $request->order;
        $price = $request->price;
        $id = $request->id;
        $topping = $request->topping;

        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];

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
            'firstName' => $firstName,
        ]);

    }
}
