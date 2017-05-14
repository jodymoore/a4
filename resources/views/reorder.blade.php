@extends('layouts.master')

@section('content')

@include('header')

<h2 id="prevOrders">Previous Orders</h2>
    <div id="reOrder-container">
		@if($orders != null) 
            @foreach($orders as $orderPad) 
                @foreach($orderPad->products as $productPad)           
                    <div id="reOrder">
                        <form action="/reorder_submit" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                            <input id="pDesc" type="hidden" name="pDesc" value="{{ $productPad->productDesc }}" >
                            <input id="price" type="hidden" name="price" value="{{$productPad->productPrice}}" >
                            <input id="topping" type="hidden" name="topping" value="{{$productPad->topping}}" >
                            <input id="id" type="hidden" name="id" value="{{$productPad->productId}}" >
                            <input id="size" type="hidden" name="size" value="{{$productPad->productSize}}" >
                            ${{$productPad->productPrice}}&nbsp;
                            {{ $productPad->productDesc }}
                            <a href="#">  </a><br>
                            <input id="reOrderNow" type="submit" name="reOrderNow" value="Add To Order" class='btn btn-primary  btn-small'>
                        </form>
                    </div>
                @endforeach
            @endforeach
		@endif	
   </div>
   
@endsection


