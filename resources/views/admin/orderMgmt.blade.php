@extends('layouts.custom')
@section('content')
<a
href="{{route('dashboardSub')}}">
Product Management
</a>
<br>
<a
href="{{route('orderMgmtView')}}">
Order Management
</a>
<br>
<h1>Orders</h1>
<ul>
@foreach($orders as $order)
<li>Order ID: {{ $order->id }} ---- Customer Name: {{ $order->customer_name }} ---- Address: {{$order->address}} ---- delistatus: {{ $order->deli_status ? "done" : "not yet delivered" }}    

<h2>Order Items</h2>
<ul>
    @foreach ($order->orderItems as $item)
        <li>
        Product: {{ optional($item->product)->product_name }}
            Quantity: {{ $item->quantity }}
        </li>
    @endforeach
</ul>
<div></div>
@if($order->deli_status == 0)
        <form action="{{ route('statusChange',['id'=> $order->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" name="deli_status" value=1>Mark as Delivered</button>
        </form>
    @elseif($order->deli_status == 1)
        <form action="{{ route('statusChange', ['id'=>$order->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" name="deli_status" value=0>Undo</button>
        </form>
    @endif
</li>
<br>
@endforeach
</ul>

@endsection