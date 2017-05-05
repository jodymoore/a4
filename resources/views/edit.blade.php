@extends('layouts.master')

@section('content')

@include('header')
<div id="createAccount">
	<h4>Edit Your Quik Pizza Account</h4>
</div>         
    <div class="panel-body">
        <form id="form" class="form-horizontal" role="form" method="POST" action="/save">
            {{ csrf_field() }}
            <input type='hidden' name='id' value='{{ $user->id }}'>

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value={{ old('Name',$user['attributes']['name']) }} required autofocus>

                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value={{ old('you@example.com',$user['attributes']['email']) }} required>

                </div>
            </div>
             <div class="form-group">
                <label for="phoneNumber" class="col-md-4 control-label">Phone Number</label>
                <div class="col-md-6">
                    <input id="phoneNumber" type="text" class="form-control" name="phoneNumber" value={{ old('(xxx)xxx-xxxx)',$user['attributes']['phoneNumber']) }} required>

                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" value={{ old('Password',$user['attributes']['password']) }} required>

                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value={{ old('Confirm Password',$user['attributes']['password']) }} required>
                </div>
            </div>

            <div class="form-group">
                <label for="zipcode" class="col-md-4 control-label">Zipcode</label>

                <div class="col-md-6">
                    <input id="zipcode" type="text" class="form-control" name="zipcode" value={{ old('xxxx',$user['attributes']['zipcode']) }} required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Edit Your Account
                    </button>
                </div>
            </div>
        </form>

        <form action="/delete/{{ $user->id }}" method="get" accept-charset="utf-8">

	        <input type='hidden' name='id' value='{{ $user->id }}'>
		
		     <input id="DeleteAccount" type="submit" name="deleteAccount" value="DELETE YOUR ACCOUNT" class='btn btn-primary  btn-small'>

       </form>
    </div>
@endsection