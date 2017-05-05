<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    /*
     *  newOrder
     */
    public function showNewOrder(Request $request) {

        return view('newOrder');
    }

    /**
     * Edit
     *
     */
    public function edit($id)
    {
        $user = User::find($id);

        $data = $user['attributes']['name'];

        if (($pos = strpos($data, " ")) !== FALSE) { 
            $lastName = substr($data, $pos+1); 
        }

         return view('edit')->with([
            'user' => $user,
            'lastName' => $lastName,
        ]);
    }



     /*
     *  POST
     *  saveEdits
     */
    public function save(Request $request) {
     

        $this->validate($request, [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phoneNumber' => 'required|numeric|size:11 ',
            'zipcode' => 'required|numeric|size:5',
        ]);

        $user = User::find($request->id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phoneNumber = $request->phoneNumber;

        $user->save();

       Session::flash('message', 'Your changes were saved');
       return view('/index');

    }



}
