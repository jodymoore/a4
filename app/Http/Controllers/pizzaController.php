<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;

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
    public function saveEdits(Request $request)
    {

        // $this->validate($request, [

        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        //     'phoneNumber' => 'required|numeric|size:11 ',
        //     'zipcode' => 'required|numeric|size:5',
        // ]);

        $user = User::find($request->id);
        
        dump($request->name);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->zipcode = $request->zipcode;

        if ( !$request->password )
        {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        Session::flash('message', 'Your account has been updated!');
        return view('index');
    }


    /**
    * GET
    * Page to confirm deletion
    */
    public function confirmDeletion($id) {

        # Get the book they're attempting to delete
        $user = User::find($id);

        if(!$user) {
            Session::flash('message', 'user not found.');
            return redirect('/index');
        }

        return view('delete')->with('user', $user);
    }


    /**
    * POST
    * Actually delete the user
    */
    public function delete(Request $request) {

        # Get the user to be deleted
        $user = User::find($request->id);
        dump($user->id);

        if(!$user) {
            Session::flash('message', 'Deletion failed; user not found.');
            return redirect('/index');
        }


        $user->delete();

        # Finish
        Session::flash('message', $user->name.' was deleted.');
        return redirect('/index');
    }

}
