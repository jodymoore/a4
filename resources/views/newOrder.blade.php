@extends('layouts.master')

@section('content')
@include('header')

<form action="/newOrder" method="post" accept-charset="utf-8">

    {{ csrf_field() }}

    <div id="newOrderTable">
	    <div class= "newOrder-table" >
		    <img  id="chs" src="/images/pizza_ChickenSupreme.png">
		    <caption><h4>Start Order</h4></caption><br>
		    <label for="selectSize" >Pizza Size</label>
	        <select id="selectSize" name="selectSize" value="Size">
	            <option value="Large">Large</option>
	            <option value="Medium">Medium</option>
	            <option value="Small">Small</option>
	        </select> <br><br>
    
	        <label for="selectCheese" >Cheese</label>
	        <select id="selectCheese" name="selectCheese" >
	            <option value="reg">Reg</option>
	            <option value="light">Light</option>p
	            <option value="none">None</option>
	        </select> <br>
     <div id="wrap" >
		<div  id="meats" >
		  <div class="row">
		      <div class="col-lg-12">
		         <div class="button-group">
			      <h4>Meats</h4>
			        <ul>
					  <input type="checkbox" id="pepperoni" name="pepperoni" />Pepperoni <br>

					  <input type="checkbox" id="italian sausage" name="italian sausage" />Italian Sausage <br>

					  <input type="checkbox" id="Beef" name="beef"/>Beef <br>

					  <input type="checkbox" id="ham" name="ham"/>Ham <br>

					  <input type="checkbox" id="pork" name="pork" />Pork <br>

			        </ul>
		     </div>
		    </div>
		  </div>
		</div>

		<div id="veg" >
		  <div class="row">
		      <div class="col-lg-12">
		         <div class="button-group">
			        <h4>Vegetables</h4>
			        <ul>
			            <input type="checkbox" id="mushrooms" name="mushrooms"/>Mushrooms <br>

					    <input type="checkbox" id="spinach" name="spinach"/>Spinach <br>

					    <input type="checkbox" id="red peppers" name="red peppers" />Red Peppers <br>

					    <input type="checkbox" id="bell peppers" name="bell peppers"/>Bell Peppers <br>

					    <input type="checkbox" id="pineapple" name="pineapple"/>Pineapple <br>

					    <input type="checkbox" id="jalapeno peppers" name="jalapeno peppers"/>Jalapeno Peppers <br>

					    <input type="checkbox" id="tomatoes" name="tomatoes"/>Tomatoes <br>
			        </ul>
		     </div>
		    </div>
		  </div>
		</div>
		</div>

	    <input id="addToOrder" type="submit" name="addToOrder" value="Add To Order" class='btn btn-primary  btn-small'>

    </div>
</form>

@endsection