@extends('layouts.master')

@section('content')
@include('header')
   
    <div id="table">
        <div class= "popPizzas-table" id="left-col">
        <form action="/popOrder" method="post" accept-charset="utf-8">
         {{ csrf_field() }}
    	    <img   src="/images/coke.png">
    	    <caption><h4>Coke</h4></caption>
    	    <br>
    	    <br>
    	    <br>
    	    <p>2 liter bottle Coca Cola.&nbsp;&nbsp;&nbsp;$2.99</p>
    	    <br>
    	    <br>
    	    <br>

            <input id="selectSize" type="hidden" name="selectSize" value="0" >

            <input id="pid" type="hidden" name="pid" value="16" >

    	    <input id="orderNowDC" type="submit" name="orderNowDC" value="Order Now" class='btn btn-primary  btn-small'>
            </form>
        </div>

        <div class= "popPizzas-table" id="right-col">
        <form action="/popOrder" method="post" accept-charset="utf-8">
         {{ csrf_field() }}
    	    <img  src="/images/pepsi.png">
    	    <caption><h4>Pepsi</h4></caption>
    	    <br>
    	    <br>
    	    <br>
    	    <p>2 liter bottle Pepsi.&nbsp;&nbsp;&nbsp;$2.99</p>
    	    <br>
    	    <br>
    	    <br>
    	    <input id="selectSize" type="hidden" name="selectSize" value="0" >

             <input id="pid" type="hidden" name="pid" value="17" >

    	     <input id="orderNowDP" type="submit" name="orderNowDP" value="Order Now"  class='btn btn-primary  btn-small'>
             </form>
        </div>

        <div class= "popPizzas-table" id="left-col">
        <form action="/popOrder" method="post" accept-charset="utf-8">
         {{ csrf_field() }}
    	    <img  src="/images/dr-pepper.png">
    	    <caption><h4>Dr. Pepper</h4></caption>
    	    <br>
    	    <br>
    	    <br>
    	    <p>2 liter bottle Dr Pepper.&nbsp;&nbsp;&nbsp;$2.99</p>
    	    <br>
    	    <br>
    	    <br>
    	    <input id="selectSize" type="hidden" name="selectSize" value="0" >

             
            <input id="pid" type="hidden" name="pid" value="18" >

    	    <input id="orderNowDDP" type="submit" name="orderNowDDP" value="Order Now" class='btn btn-primary  btn-small'>
            </form>
        </div>

        <div class= "popPizzas-table" id="right-col">
        <form action="/popOrder" method="post" accept-charset="utf-8">
         {{ csrf_field() }}
    	    <img  src="/images/diet-coke.png">
    	    <caption><h4>Diet Coke</h4></caption>
    	    <br>
    	    <br>
    	    <br>
    	    <p>2 liter bottle Diet Coke.&nbsp;&nbsp;&nbsp;$2.99</p>
    	    <br>
    	    <br>
    	    <br>
    	    <input id="selectSize" type="hidden" name="selectSize" value="0" >

             <input id="pid" type="hidden" name="pid" value="19" >

    	     <input id="orderNowDDC" type="submit" name="orderNowDDC" value="Order Now" class='btn btn-primary  btn-small'>
             </form>

        </div>
    </div>

@endsection