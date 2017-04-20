@extends('layouts.master')

@section('content')
@include('header')
<div id="table">
    <div class= "popPizzas-table" id="left-col">
	    <img  id="chs" src="/images/Cheese.png">
	    <caption><h4>CHEESE</h4></caption>
	    <input id="orderNow" type="submit" name="Order Now" value="Order Now" class='btn btn-primary  btn-small'>
    </div>

    <div class= "popPizzas-table" id="right-col">
	    <img id="pep" src="/images/pepperoni.png">
	    <caption><h4>PEPERONI</h4></caption>
	     <input id="orderNow" type="submit" name="Order Now" value="Order Now" class='btn btn-primary  btn-small'>
    </div>

    <div class= "popPizzas-table" id="left-col">
	    <img id="sup" src="/images/Supreme.png">
	    <caption><h4>SUPREME</h4></caption>
	     <input id="orderNow" type="submit" name="Order Now" value="Order Now" class='btn btn-primary  btn-small'>
    </div>

    <div class= "popPizzas-table" id="right-col">
	    <img  id="own" src="/images/Supreme.png">
	    <caption><h4>CREATE YOUR OWN</h4></caption>
	     <input id="own-order" type="submit" name="Order Now" value="Order Now" class='btn btn-primary  btn-small'>
    </div>
</div>

@endsection