@extends('layouts.master')

@section('content')

@include('header')
<div id="myOrder">
	<h4>{{ $firstName }}'s Order</h4>
</div>


    <div id="cart">
        <div>
          <h4>Thank you for your order.</h4> 
            @foreach($cartArry as $value)
             
                <div id="displayCart-wrapper">

                    <div id="cartLeft">
                        <strong>{{$value['attributes']['topping']}}</strong> <br>
                        <input id="name" type="hidden" name="name" value="{{ $value['name'] }}" > 
                        {{$value['name']}}
                    </div>
        
                   <div id="cartRight">

                      ${{$value['price']}} <br>
                      Qty: {{$value['quantity']}} 

                      <input id="id" type="hidden" name="id" value="{{ $value['id'] }}" >     
                   </div>
     
                <div>

            @endforeach
        
        </div>

    </div>
    Total: ${{$total}} 
    <h4>A confirmation email has been sent to your e-mail address on file.</h4>
    </div>

@endsection