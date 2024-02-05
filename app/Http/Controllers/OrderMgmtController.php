<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class OrderMgmtController extends Controller
{
    public function orderMgmtView()
{
    //$orders = Order::All();
    $orders = Order::with('orderItems')->get();
    return view('admin.orderMgmt',[
    'orders' => $orders
    ]);
}

public function statusChange($id)
    {      
       $order = Order::find($id);
        $order->deli_status = request()->deli_status;  
        //$order->deli_status = !$order->deli_status;        
        $order->update();

        return redirect()->route('orderMgmtView');
    }
}
