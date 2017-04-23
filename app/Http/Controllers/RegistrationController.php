<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;



class RegistrationController extends Controller
{

     /*
     *  
     */
    public function show(Request $request) {

        return view('register');
    }

    public function storeNewBook(Request $request) {


      # Redirect the user to the page to view the book
      return redirect('/');
  }

     /*
     *  Create Account
     */
    public function CreateAccount(Request $request) {

        

       $this->validate($request, [
            'Fname' => 'required',

        ]);

       // insert data to customers table

        $customer = new Customer();

        $customer->fName  = $request->Fname; 

        $customer->lName = $request->Lname;

        $customer->Email = $request->Email;

        $customer->phoneNumber = $request->phoneNumber;


        $customer->password = $request->password; 

        $confirmPassword = $request->ConfirmPassword;

        $month = 'september';

        $year = '1968';

        $customer->birthday = $month."/".$year;

        $customer->zipcode = $request->zipcode;

        $customer->save();


       
        Session::flash('message','Thank you '.$request->Fname.' your acoount has been created.');
       
        // and then rerdirect to the home page.

        return redirect('/');


    }
}
