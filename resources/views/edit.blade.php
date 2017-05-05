@extends('layouts.master')

@section('content')

@include('header')
<div id="createAccount">
	<h4>Edit Your Quik Pizza Account</h4>
</div>


<div >
<form method="POST" action="/save" >

    {{ csrf_field() }}

    <div id="form">

       <br>
       <div id=Lform>
	        <label for="fullName" ><h5>Full Name</h5></label><br>
	        <input id="Fname" type="text" name="Fname" value={{ old('First Name',$user['attributes']['name']) }} required>&nbsp
	        <input id="Lname" type="text" name="Lname"  value={{ old('Last Name',$lastName) }} required><br>

	        <label for="Email" ><h5>E-mail Address</h5></label><br>
	        <input id="Email" type='text' name="Email" value={{ old('you@example.com',$user['attributes']['email']) }} ><br>

	        <label for="phoneNumber" ><h5>Phone Number</h5></label><br>
	        <input id="phoneNumber" type='text' name="phoneNumber" value={{ old('(xxx)xxx-xxxx)',$user['attributes']['phoneNumber']) }} >&nbsp
	        <input id="Ext" type='text' name="Ext"  value="Ext" ><br>

	        <label for="password" ><h5>Password</h5></label><br>
	        <input id="password" type='text' name="password" value={{ old('Password',$user['attributes']['password']) }} ><br><br>
	        <input id="confrmPswrd" type='text' name="confrmPswrd" value={{ old('Confirm Password',$user['attributes']['password']) }} ><br><br>
       </div>
       <div id="Rform">


	        <label for="zipcode" ><h5>Zipcode</h5></label><br>
	        <input id="zipcode" type='text' name="zipcode" value={{ old('xxxx',$user['attributes']['zipcode']) }}><br><br>

	        <input id="editAccount" type="submit" name="editAccount" value="Edit YOUR ACCOUNT" class='btn btn-primary  btn-small'>

	        <input type='hidden' name='id' value='{{ $user->id }}'>
        </div>

    </div>
</form>

</div>

@endsection