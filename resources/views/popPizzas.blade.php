@extends('layouts.master')

@section('content')
@include('header')
   

    <div id="table">
        <div class= "popPizzas-table" id="left-col">
        <form action="/popOrder" method="post" accept-charset="utf-8">
         {{ csrf_field() }}
    	    <img  id="chs" src="https://s3.amazonaws.com/jwm-product-images/Cheese.png">
    	    <caption><h4>CHEESE</h4></caption><br>
    	    <p>marinara topped with fresh mozzarella </p><br><p> cheese.</p>
             <br> 
              <br> 
               <br> 

            <select id="selectSize" name="selectSize" value="Size">
                <option value="2">Large</option>
                <option value="1">Medium</option>
                <option value="0">Small</option>
            </select> 
             <br> 

            <input type="checkbox" id="exCheese" name="exCheese"/>Extra Cheese 

            <input id="pid" type="hidden" name="pid" value="1" >
            <br> 
    	    <input id="orderNowC" type="submit" name="orderNowC" value="Order Now" class='btn btn-primary  btn-small'>
            </form>
        </div>

        <div class= "popPizzas-table" id="right-col">
        <form action="/popOrder" method="post" accept-charset="utf-8">
         {{ csrf_field() }}
    	    <img id="pep" src="https://s3.amazonaws.com/jwm-product-images/pepperoni.png">
    	    <caption><h4>PEPPERONI</h4></caption>
    	    <p>marinara topped with fresh mozzarella</p><br><p> cheese and pepperoni.</p>
             <br> 

    	    <select id="selectSize" name="selectSize" value="Size">
                <option value="2">Large</option>
                <option value="1">Medium</option>
                <option value="0">Small</option>
            </select>
             <br>  

            <input type="checkbox" id="exCheese" name="exCheese"/>Extra Cheese 

             <input id="pid" type="hidden" name="pid" value="4" >
              <br> 
    	     <input id="orderNowP" type="submit" name="orderNowP" value="Order Now" onclick="window.location='{{ url("/order/pepperoni") }}'" class='btn btn-primary  btn-small'>
             </form>
        </div>

        <div class= "popPizzas-table" id="left-col">
        <form action="/popOrder" method="post" accept-charset="utf-8">
         {{ csrf_field() }}
    	    <img id="sup" src="https://s3.amazonaws.com/jwm-product-images/Supreme.png">
    	    <caption><h4>SUPREME</h4></caption>
    	    <p>marinara topped with fresh mozzarella</p><p>pepperoni, pork, beef, mushrooms,</p><br><p> green peppers and onions</p>
             <br> 

    	    <select id="selectSize" name="selectSize" value="Size">
                <option value="2">Large</option>
                <option value="1">Medium</option>
                <option value="0">Small</option>
            </select> 
             <br> 

            <input type="checkbox" id="exCheese" name="exCheese"/>Extra Cheese 
             
            <input id="pid" type="hidden" name="pid" value="7" >
             <br> 
    	    <input id="orderNowS" type="submit" name="orderNowS" value="Order Now" class='btn btn-primary  btn-small'>
            </form>
        </div>

        <div class= "popPizzas-table" id="right-col">
        <form action="/popOrder" method="post" accept-charset="utf-8">
         {{ csrf_field() }}
    	    <img  id="own" src="/images/Supreme.png">
    	    <caption><h4>VEGETABLE</h4></caption>
    	    <p>marinara topped with fresh mozzarella</p><br><p> cheese, green peppers, mushrooms,</p><br> <p>and black olives.</p>
             <br> 

    	    <select id="selectSize" name="selectSize" value="Size">
                <option value="2">Large</option>
                <option value="1">Medium</option>
                <option value="0">Small</option>
            </select>
            <br> 

            <input type="checkbox" id="exCheese" name="exCheese"/>Extra Cheese 

             <input id="pid" type="hidden" name="pid" value="10" >
              <br> 
    	     <input id="own-orderV" type="submit" name="orderNowV" value="Order Now" class='btn btn-primary  btn-small'>
             </form>


        </div>
    </div>

@endsection