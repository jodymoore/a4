@extends('layouts.master')
@section('content')
@include('header')
<div id="myOrder">
  @if(isset($firstName))     
   <h4>{{ $firstName }}'s Order</h4>
  @else
    <h4>My Order</h4>  
  @endif
</div>
<div >
<form method="POST" action="/order/submit">

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
                      Qty:{{$cart['quantity']}}                  
                      
                          {{ csrf_field() }}

                      <button id="remove" type="submit" name="remove" value="{{ $cart['id'] }}" formaction="/order/remove" class='btn btn-primary  btn-small' ><i class="fa fa-trash-o"></i></button>

                   </div>
                <div>
            @endforeach
        </div>
      @endif
    </div>
    Total: ${{Cart::getTotal()}}
        <div id="cartOrderButton">
          <input id="cartOrderButton" type="submit" name="cartOrderButton"  formaction="/order/submit" value="SUBMIT ORDER" class='btn btn-primary  btn-small'>
        </div>
    </div>
</form>
</div>
@endsection