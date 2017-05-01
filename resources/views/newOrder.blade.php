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
			        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Meats</span> <span class="caret"></span></button>
			        <ul class="dropdown-menu">
					  <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox" id="pepperoni" name="pepperoni" />&nbsp;Pepperoni</a></li>

					  <li><a href="#" class="small" data-value="option2" tabIndex="-1"><input type="checkbox" id="italian sausage" name="italian sausage" />&nbsp;Italian Sausage</a></li>

					  <li><a href="#" class="small" data-value="option3" tabIndex="-1"><input type="checkbox" id="Beef" name="beef"/>&nbsp;Beef </a></li>

					  <li><a href="#" class="small" data-value="option4" tabIndex="-1"><input type="checkbox" id="ham" name="ham"/>&nbsp;Ham</a></li>

					  <li><a href="#" class="small" data-value="option5" tabIndex="-1"><input type="checkbox" id="pork" name="pork" />&nbsp;Pork</a></li>

			        </ul>
		     </div>
		    </div>
		  </div>
		</div>

		<div  id="veg" >
		  <div class="row">
		      <div class="col-lg-12">
		         <div class="button-group">
			        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Vegetables</span> <span class="caret"></span></button>
			        <ul class="dropdown-menu">
			          <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox" id="mushrooms" name="mushrooms"/>&nbsp;Mushrooms</a></li>

					  <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox" id="spinach" name="spinach"/>&nbsp;Spinach</a></li>

					  <li><a href="#" class="small" data-value="option2" tabIndex="-1"><input type="checkbox" id="red peppers" name="red peppers" />&nbsp;Red Peppers</a></li>

					  <li><a href="#" class="small" data-value="option3" tabIndex="-1"><input type="checkbox" id="bell peppers" name="bell peppers"/>&nbsp;Bell Peppers</a></li>

					  <li><a href="#" class="small" data-value="option4" tabIndex="-1"><input type="checkbox" id="pine apple" name="pina"/>&nbsp;Pineapple</a></li>

					  <li><a href="#" class="small" data-value="option5" tabIndex="-1"><input type="checkbox" id="jalapeno peppers" name="jalapeno peppers"/>&nbsp;Jalapeno Peppers</a></li>

					  <li><a href="#" class="small" data-value="option5" tabIndex="-1"><input type="checkbox" id="tomatoes" name="tomatoes"/>&nbsp;Tomatoes</a></li>
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