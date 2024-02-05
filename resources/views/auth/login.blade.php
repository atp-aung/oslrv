<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Login Form</title>
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

<h1>Login Form</h1>
<form action="{{url("/login-action")}}" method="POST">
                            @csrf
                            <div>
                                <input type="text" placeholder="Email" name="email"
                                    required autofocus>                               
                            </div>
                            <div>
                                <input type="password" placeholder="Password"                              name="password" required>                                
                            </div>
                            <div >
                                <button type="submit">Signin</button>
                            </div>
                        </form>
</body>
</html>