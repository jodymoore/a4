@extends('layouts.master')

@section('content')

@include('header')
<div id="createAccount">
	<h4>Create Your Quik Pizza Account</h4>
</div>


<div >
<form method="POST" action="/register">

    {{ csrf_field() }}

    <div id="form">
       <br>
       <div id=Lform>
	        <label for="fullName" ><h5>Full Name</h5></label><br>
	        <input id="Fname" type="text" name="Fname" value={{ old('First Name','Jody') }} required>&nbsp
	        <input id="Lname" type="text" name="Lname"  value={{ old('Last Name','Moore') }} required><br>

	        <label for="Email" ><h5>E-mail Address</h5></label><br>
	        <input id="Email" type='text' name="Email" value={{ old('you@example.com','jodymoorellc@live.com') }} ><br>

	        <label for="phoneNumber" ><h5>Phone Number</h5></label><br>
	        <input id="phoneNumber" type='text' name="phoneNumber" value={{ old('(xxx)xxx-xxxx)','435-555-5555') }} >&nbsp
	        <input id="Ext" type='text' name="Ext"  value="Ext" ><br>

	        <label for="password" ><h5>Password</h5></label><br>
	        <input id="password" type='text' name="password" value={{ old('Password','hashit') }} ><br><br>
	        <input id="confrmPswrd" type='text' name="confrmPswrd" value={{ old('Confirm Password','hashit') }} ><br><br>
       </div>
       <div id="Rform">


	        <label for="zipcode" ><h5>Zipcode</h5></label><br>
	        <input id="zipcode" type='text' name="zipcode" value={{ old('xxxx','72945') }}><br><br>

	        <input id="create" type="submit" name="createAccount" value="CREATE YOUR ACCOUNT" class='btn btn-primary  btn-small'>
        </div>

    </div>
</form>

</div>

@endsection