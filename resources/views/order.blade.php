@extends('layouts.master')

@section('content')

@include('header')
<div id="myOrder">
	<h4>MY ORDER</h4>
</div>


<div >
<form method="POST" action="/order">

    {{ csrf_field() }}



    <div id="form">
        @if(!$custOrder)
        <div>
            <h4>Cart Empty</h4>
        </div>
    @else
        <div>
            {{ $custOrder }}
        </div>

    @endif
	        <input id="create" type="submit" name="createAccount" value="PLACE ORDER" class='btn btn-primary  btn-small'>
        </div>

    </div>
</form>

</div>

@endsection