<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{

    /*
     *  Show
     */
    public function show(Request $request) {

        return view('index');
    }

    /*
     *  popPizzas
     */
    public function show2(Request $request) {

        return view('popPizzas');
    }

}
