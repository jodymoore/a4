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
        @if(Cart::isEmpty())
        <div>
            <h4>Cart Empty</h4>
        </div>
    @else
        <div>

            @foreach($carts as $cart)
             
                <div id="displayCart-wrapper">

                    <div id="cartLeft">
                        <strong>{{$cart['attributes']['topping']}}</strong> <br>
                        <input id="name" type="hidden" name="name" value="{{ $cart['name'] }}" > 
                        {{$cart['name']}}
                    </div>
        
                   <div id="cartRight">

                      ${{$cart['price']}} <br>
                      Qty: {{$cart['quantity']}} 

                      <input id="id" type="hidden" name="id" value="{{ $cart['id'] }}" > 
                      
                          {{ csrf_field() }}

                          <button id="remove" type="submit" name="remove" value="remove" formaction="/order/remove" class='btn btn-primary  btn-small' ><i class="fa fa-trash-o"></i></button>

                   </div>
     
                <div>
 
            @endforeach

        </div>

    @endif
    </div>

    Total: ${{Cart::getTotal()}}
        <div id="cartOrderButton">
          <input id="cartOrderButton" type="submit" name="cartOrderButton"  formaction="/order/execute" value="SUBMIT ORDER" class='btn btn-primary  btn-small'>
        </div>
    </div>
</form>

</div>

<form action="/clearCart" method="post" accept-charset="utf-8">

{{ csrf_field() }}
       <input id="clearCart" type="submit" name="clearCart" value="clearCart" class='btn btn-primary  btn-small'>
</form>

@endsection