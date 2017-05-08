@extends('layouts.master')

@section('content')
@include('header')
<h2 id="prevOrders">Previous Orders</h2>
	<div id="reOrder-container">
		@if($orders != null)     
            @for($x = 0; $x < count($orders); $x++)
                <div id="reOrder">
                    <form action="reorder_submit" method="post" accept-charset="utf-8">
                    {{ csrf_field() }}
                        <input id="order" type="hidden" name="order" value="{{ $orders[$x] }}" >
                        <input id="price" type="hidden" name="price" value="" >
                        <input id="id" type="hidden" name="id" value="" >
                        $&nbsp;
                        <a href="#">  </a><br>
                        <input id="reOrderNow" type="submit" name="reOrderNow" value="REORDER" class='btn btn-primary  btn-small'>
                    </form>
                </div>
            @endfor
		@endif	
   </div>
@endsection