@extends('layouts.master')

@section('content')

@include('header')
<div id="myOrder">
	<h4>My ORDER</h4>
</div>

<div >
<form method="POST" action="/order/execute">

    {{ csrf_field() }}

    <div id="cart">
        @if(is_null($cart))
        <div>
            <h4>Cart Empty</h4>
        </div>
    @else
        <div>

            @foreach($cart as $value)
             
                <div id="displayCart-wrapper">

                    <div id="cartLeft">
                        <strong>{{$value['id']}}</strong> <br>
                        {{$value['name']}}
                    </div>
        
                   <div id="cartRight">

                      ${{$value['price']}} <br>
                      Qty: {{$value['quantity']}} 

                      <input id="id" type="hidden" name="id" value="{{ $value['id'] }}" > 

                      <input id="remove" type="button" name="remove" onclick="window.location='{{ url("/remove") }}'" value="remove" class='btn btn-primary  btn-small'>
                   </div>
    
                <div>
 
            @endforeach

        </div>

    @endif
    <div id="cartOrderButton">
	        <input id="cartOrderButton" type="submit" name="cartOrderButton" value="SUBMIT ORDER" class='btn btn-primary  btn-small'>
        </div>
    </div>

    </div>
</form>

</div>

             <form action="/clearCart" method="post" accept-charset="utf-8">

             {{ csrf_field() }}
                     <input id="clearCart" type="submit" name="clearCart" value="clearCart" class='btn btn-primary  btn-small'>
             </form>

@endsection