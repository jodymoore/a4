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
     *  getPrevOrders
     */
    public function getPrevOrders(Request $request) {
        // if not logged in redirect to login page /home
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        
        // get the user name for blade display
        $firstName = $this->getFirstName();

        // query customer_orders database
        // get login id
        $id = Auth::id(); 

        $orders = [];
        $ingred = '';
        $prodPrice = 0;
       
        // need to get products from order_product table
        $prevOrders = Order::with('products','ing')->where('user_id', '=', $id)->take(10)->get();

        foreach($prevOrders as $order) {

            $number = 0;
            $orderPad = new OrderClass($order->id);
            $orderPad->orderId = $order->id;

            foreach ($order->products as $product) {
                $productPad = new ProductClass($product->id);
                if ($product->id > 12) {
                    foreach($order->ing as $ingred) {
                      $ingred = $ingred->desc;
                    }
                    
                    // process the charge for added ingredients
                    $newIngred = explode(' ', $ingred);
                    $number = (count($newIngred)-4);
                    $number *= .25;
                    $prodPrice = $number + $product->price;

                    $productPad->productDesc = $ingred;
                    $productPad->productSize = $product->size;
                }
                else {
                    // fill up Product Pad
                    $productPad->productDesc = $product->size." ".strtolower($product->topping).' '.'pizza';
                    $prodPrice = $product->price;
                    $productPad->productSize = $product->size;
                }
  
                $productPad->productId = $product->id;

                $productPad->topping = $product->topping;

                $productPad->productPrice = $prodPrice; 

                $orderPad->products[] = $productPad;

                $orders[] = $orderPad;
  
            }
            $orderPad->orderPrice = $order->total;
        }

        return view('reorder')->with([
            'orders' => $orders,
            'firstName' => $firstName,
        ]);
    }

    public function submit(Request $request) {
            
        $order = $request->pDesc;
        $price = $request->price;
        $id = $request->id;
        $topping = $request->topping;
        $size = $request->size;

        $firstName = $this->getFirstName();

        // Place order into Cart array format
        Cart::add(array(
            'id' => $id,
            'name' => $order,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'topping' => $topping,
                'pid' => $id, 
                'size' => $size,  
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

    public function getFirstName() {
        /*
         *
         */
        $user = Auth::user()->name;
        $username = list($user) = explode(' ', $user);
        $firstName = $username[0];

        return $firstName;
     }

}
