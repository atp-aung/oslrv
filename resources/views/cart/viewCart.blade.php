<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Cart View</title>
</head>
<body>
<a
href="{{ url("/") }}">
&laquo; Continue Shopping
</a>
<br>
<a
href="{{ url("/products-in-cart/clear") }}">
&times; Clear Cart 
</a>
<h1>Cart View</h1>
@if (count($cartDetails) > 0)
    <ul>
        @foreach ($cartDetails as $cartItem)
            <li>
                {{ $cartItem['productName'] }} - Quantity: {{ $cartItem['quantity'] }}
                - Unit Price: ${{ $cartItem['unitPrice'] }} - Subtotal: ${{ $cartItem['subtotal'] }}
            </li>
        @endforeach
    </ul>

    <p>Total Amount: ${{ $cartItem['totalAmount'] }}</p>

    <form action="{{ url("/orders/create") }}" method="post">
@csrf
<div>
<label>Customer Name:</label>
<input type="text" name="customer_name">
</div>
<div>
<label>Address</label>
<textarea name="address"></textarea>
</div>

<input type="submit" value="Submit">
</form>

@else
    <p>Your cart is empty.</p>
@endif
</body>
</html>