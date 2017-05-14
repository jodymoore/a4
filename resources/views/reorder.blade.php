@extends('layouts.master')

@section('content')

@include('header')

<h2 id="prevOrders">Previous Orders</h2>
	<div id="reOrder-container">
		@if($orders != null) 
            @foreach($orders as $orderPad)                          
                <div id="reOrder">
                    <form action="/reorder_submit" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}

                        <input id="order" type="hidden" name="order" value="{{$orderPad->orderId}}" >

                        <input id="price" type="hidden" name="price" value="{{$orderPad->orderPrice}}" >

                        <input id="id" type="hidden" name="id" value="{{$orderPad->orderId}}" >
                        &nbsp;${{$orderPad->orderPrice}}&nbsp;
                        <br>

                        @foreach($orderPad->products as $productPad)
                             <input id="topping" type="hidden" name="topping" value="{{$productPad->topping}}" >
                             <input id="pid" type="hidden" name="pid" value="{{$productPad->productId}}" >
                             <input id="pDesc" type="hidden" name="pDesc" value="{{$productPad->productDesc}}" >
                               {{ $productPad->productDesc }} 
                               @if($productPad->productId > 12)
                                   {{ $productPad->productPrice}}
                               @else
                                   {{ $productPad->productPrice }}
                               @endif
                               
                               <br>
                        @endforeach
                        <a href="#">  </a><br>
                        <input id="reOrderNow" type="submit" name="reOrderNow" value="Add To Order" class='btn btn-primary  btn-small'>
                    </form>
                </div>
            @endforeach
		@endif	
   </div>
   
@endsection
