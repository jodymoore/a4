@extends('layouts.master')

@section('content')
@include('header')
<h2>Previous Orders</h2>
	<div id="reOrder-container">
		@if($custOldOrders != null)
        
            @foreach($custOldOrders as $order)
            <div id="reOrder">
                <form action="reorder_submit" method="post" accept-charset="utf-8">
                {{ csrf_field() }}
                    <input id="order" type="hidden" name="order" value="{{ $order }}" >
                    <a href="#"> {{ $order }} </a><br>

                    <input id="reOrderNow" type="submit" name="reOrderNow" value="REORDER" class='btn btn-primary  btn-small'>
                </form>
              

            </div>
            @endforeach

		@endif
	
   </div>


@endsection