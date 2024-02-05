@extends('layouts.custom')
@section('content')

<h1>Product add form</h1>
<div class="container">
<form method="post">
@csrf
<div class="mb-3">
<label>Product name</label>
<input type="text" name="product_name"  class="form-control">
</div>
<div class="mb-3">
<label>Price</label>
<input type="number" name="price" class="form-control">
</div>
<input type="submit" value="Create"
class="btn btn-primary">
</form>
</div>
@endsection