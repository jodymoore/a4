<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use Session;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\CustomClasses\CustomDirectory\OrderClass;
use App\CustomClasses\CustomDirectory\ProductClass;


class reOrderController extends Controller
{

     /*
     *  displayReorder
     */
    public function getPrevOrders(Request $request) {
        // if not logged in redirect to login page /home
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        
        // get the user name for blade display
        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];

        // query customer_orders database
        // get login id
        $id = Auth::id(); 

        $prevOrders = Order::where('user_id','=',$id)->take(10)->get();

        $orders = [];
        $total = [];
        $orderId = [];
        $ingred = '';
        
        $productsOrdered = [];

        $prodPrice = 0;
       
        // need to get products from order_product table
        $products = Order::with('products')->where('user_id', '=', $id)->get();

        foreach($prevOrders as $order) {
            $ingred = $order['attributes']['ingred'];
            $number = 0;
            $orderPad = new OrderClass($order->id);
            $orderPad->orderId = $order->id;
            foreach ($order->products as $product) {
                $productPad = new ProductClass($product->id);
                if ($product->id > 12) {
                    
                    // process the charge for added ingredients
                    $newIngred = explode(' ', $ingred);
                    $number = (count($newIngred)-4);
                    $number *= .25;

                    $productPad->productDesc = $ingred.' '.'pizza';
                }
                else {
                                  // fill up Product Pad
                    $productPad->productDesc = $product->size." ".strtolower($product->topping).' '.'pizza';
                }
  

                $productPad->productId = $product->id;

                $productPad->topping = $product->topping;

                $productPad->productPrice = $product->price; 


                $orderPad->products[] = $productPad;
                $orders[] = $orderPad;
                $total[] = $number + $product->price;
  
            }
            $orderPad->orderPrice = $order->total;
        }

        return view('reorder')->with([
            'orders' => $orders,
            'total' => $total,
            'firstName' => $firstName,
        ]);
    }

    public function submit(Request $request) {
            
        $order = $request->pDesc;
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
