@extends('layouts.master')

@section('content')
@include('header')
<div id="table">
    <div class= "popPizzas-table" id="left-col">
	    <img  id="chs" src="/images/Cheese.png">
	    <caption><h4>CHEESE</h4></caption><br>
	    <p>marinara topped with fresh mozzarella </p><br><p> cheese.</p>

        <select id="selectSize" name="selectSize" value="Size">
            <option value="Large">Large</option>
            <option value="Medium">Medium</option>
            <option value="Small">Small</option>
        </select> 

	    <input id="orderNowC" type="submit" name="orderNowC" value="Order Now"  onclick="window.location='{{ url("/order/cheese") }}'" class='btn btn-primary  btn-small'>
    </div>

    <div class= "popPizzas-table" id="right-col">
	    <img id="pep" src="/images/pepperoni.png">
	    <caption><h4>PEPERONI</h4></caption>
	    <p>marinara topped with fresh mozzarella</p><br><p> cheese and pepperoni.</p>

	    <select id="selectSize" name="selectSize" value="Size">
            <option value="Large">Large</option>
            <option value="Medium">Medium</option>
            <option value="Small">Small</option>
        </select> 
	     <input id="orderNowP" type="submit" name="orderNowP" value="Order Now" onclick="window.location='{{ url("/order/pepperoni") }}'" class='btn btn-primary  btn-small'>
    </div>

    <div class= "popPizzas-table" id="left-col">
	    <img id="sup" src="/images/Supreme.png">
	    <caption><h4>SUPREME</h4></caption>
	    <p>pepperoni,pork, beef, mushrooms,</p><br><p> green peppers and onions</p>

	    <select id="selectSize" name="selectSize" value="Size">
            <option value="Large">Large</option>
            <option value="Medium">Medium</option>
            <option value="Small">Small</option>
        </select> 
	     <input id="orderNowS" type="submit" name="orderNowS" value="Order Now" class='btn btn-primary  btn-small'>
    </div>

    <div class= "popPizzas-table" id="right-col">
	    <img  id="own" src="/images/Supreme.png">
	    <caption><h4>VEGETABLE</h4></caption>
	    <p>marinara topped with fresh mozzarella</p><br><p> cheese,green peppers,mushrooms,</p><br> <p>and black olives.</p>

	    <select id="selectSize" name="selectSize" value="Size">
            <option value="Large">Large</option>
            <option value="Medium">Medium</option>
            <option value="Small">Small</option>
        </select> 
	     <input id="own-orderV" type="submit" name="orderNowV" value="Order Now" class='btn btn-primary  btn-small'>
    </div>
</div>

@endsection