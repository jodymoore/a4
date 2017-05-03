@extends('layouts.master')

@section('content')
@include('header')
<h2 id="prevOrders">Previous Orders</h2>
	<div id="reOrder-container">
		@if($custOldOrders != null)
        
            @foreach($custOldOrders as $order)
                 @foreach($total as $value)
                     @foreach($id as $idValue)
                        <div id="reOrder">
                            <form action="reorder_submit" method="post" accept-charset="utf-8">
                            {{ csrf_field() }}
                                <input id="order" type="hidden" name="order" value="{{ $order }}" >
                                <input id="price" type="hidden" name="price" value="{{ $value }}" >
                                <input id="id" type="hidden" name="id" value="{{ $idValue }}" >
                                ${{ $value }}&nbsp;
                                <a href="#"> {{ $order }} </a><br>

                                <input id="reOrderNow" type="submit" name="reOrderNow" value="REORDER" class='btn btn-primary  btn-small'>
                            </form>
                        </div>
                    @endforeach
                @endforeach
            @endforeach

		@endif
	
   </div>


@endsection