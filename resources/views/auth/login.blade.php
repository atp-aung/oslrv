<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- @if(session('add'))
<div >
{{ session('add') }}
</div>
@endif

@if(session('clear'))
<div >
{{ session('clear') }}
</div>
@endif -->

    <h1 class="alert alert-primary">Login Form</h1>
    <div class="container">
        <form action="{{url("/login-action")}}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="text" placeholder="Email" name="email" required autofocus>
            </div>
            <div class="mb-3">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Signin</button>
            </div>
        </form>
    </div>
</body>

</html>