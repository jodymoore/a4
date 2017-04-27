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
					  <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox" id="pep" name="pep" />&nbsp;Pepperoni</a></li>

					  <li><a href="#" class="small" data-value="option2" tabIndex="-1"><input type="checkbox" id="itsau" name="itsau" />&nbsp;Italian Sausage</a></li>

					  <li><a href="#" class="small" data-value="option3" tabIndex="-1"><input type="checkbox" id="beef" name="beef"/>&nbsp;Beef </a></li>

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
			          <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox" id="mush" name="mush"/>&nbsp;Mushrooms</a></li>

					  <li><a href="#" class="small" data-value="option1" tabIndex="-1"><input type="checkbox" id="spin" name="spin"/>&nbsp;Spinach</a></li>

					  <li><a href="#" class="small" data-value="option2" tabIndex="-1"><input type="checkbox" id="redp" name="redp" />&nbsp;Red Peppers</a></li>

					  <li><a href="#" class="small" data-value="option3" tabIndex="-1"><input type="checkbox" id="bellp" name="bellp"/>&nbsp;Bell Peppers</a></li>

					  <li><a href="#" class="small" data-value="option4" tabIndex="-1"><input type="checkbox" id="pina" name="pina"/>&nbsp;Pineapple</a></li>

					  <li><a href="#" class="small" data-value="option5" tabIndex="-1"><input type="checkbox" id="jala" name="jala"/>&nbsp;Jalapeno Peppers</a></li>

					  <li><a href="#" class="small" data-value="option5" tabIndex="-1"><input type="checkbox" id="tom" name="tom"/>&nbsp;Tomatoes</a></li>
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