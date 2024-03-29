@extends('layouts.custom')
@section('content')
<div class="card">
    <div class="card-title">
        <a class="btn btn-secondary" href="{{route('dashboardSub')}}">
            Product Management
        </a>
        <a class="btn btn-secondary" href="{{route('orderMgmtView')}}">
            Order Management
        </a>
    </div>

    <h1 class="alert alert-primary">Orders</h1>
    <ul>
        @foreach($orders as $order)
        <li class="card">
            <div class="card-body">
                <div class="alert alert-secondary">
                    Order ID: {{ $order->id }}
                    <br>
                    Customer Name: {{ $order->customer_name }}
                    <br>
                    Address: {{$order->address}}
                    <br>
                    deli_status: {{ $order->deli_status ? "done" : "not yet delivered" }}
                </div>
                <h3>Order Items</h3>
                <ol>

                    @foreach ($order->orderItems as $item)
                    <li>
                        Product: {{ optional($item->product)->product_name }}
                        <br>
                        Quantity: {{ $item->quantity }}
                    </li>
                    @endforeach
                    <br>

                    @if($order->deli_status == 0)
                    <form action="{{ route('statusChange',['id'=> $order->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-warning" type="submit" name="deli_status" value=1>Mark as Delivered</button>
                    </form>
                    @elseif($order->deli_status == 1)
                    <form action="{{ route('statusChange', ['id'=>$order->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-info" type="submit" name="deli_status" value=0>Undo</button>
                    </form>
                    @endif

                </ol>
            </div>
        </li>
        <br>
        @endforeach
    </ul>
</div>
@endsection