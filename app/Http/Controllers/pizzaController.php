<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Illuminate\Validation\Rule;
use App\Order;

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

    /*
     *  drinkOrder
     */
    public function showDrinkOrder(Request $request) {

        return view('drinks');
    }

    /**
     * Edit
     *
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('edit')->with('user',$user);
    }

     /*
     *  POST
     *  saveEdits
     */
    public function saveEdits(Request $request)
    {

        $user = User::find($request->id);

        $errors = $this->validate($request, [

            'name' => 'required|string|max:255',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'required|string|min:6|confirmed',
            'phoneNumber' => 'required|alpha_dash|size:12 ',
            'zipcode' => 'required|numeric|min:5',
        ]);

    
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
        return view('index')->with('errors',$errors);
    }


    /**
    * GET
    * Page to confirm deletion
    */
    public function confirmDeletion($id) {

        # Get the user you attempting to delete
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

        if(!$user) {
            Session::flash('message', 'Deletion failed; user not found.');
            return redirect('/index');
        }

        $user->orders()->delete();
        $user->delete();

        # Finish
        Session::flash('message', $user->name.' was deleted.');
        return view('index');
    }

}
