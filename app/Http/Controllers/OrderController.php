<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /*
     *  
     */
    public function show(Request $request) {

        return view('order');
    }

     /*
     *  
     */
    public function cheese(Request $request) {

        $custOrder = " $7.99 Cheese pizza "; 

        // need to hand this to order blade or checkout.
        return view('order')->with([
        	'custOrder' => $custOrder,
        	]);
    }
    

    /*
     *  
     */
    public function pep(Request $request) {

        $custOrder = " $7.99 peperonni pizza "; 

        // need to hand this to order blade or checkout.
        return view('order')->with([
        	'custOrder' => $custOrder,
        	]);
    }
     /*
     *  a dynamic order function 
     */
    public function order($n) {

        $custOrder = $n; 

        // need to hand this to order blade or checkout.
        return view('order')->with([
        	'custOrder' => $custOrder,
        	]);
    }

}
