<html>
<head>
    <meta charset='utf-8'>
</head>
<body>
Hello!
@if (\Auth::check())
    {{ \Auth::user()->name }}-san<br>
    <a href="/auth/logout">Logout</a><br>
@else
    Guest-san<br>
    <a href="/auth/login">Login</a><br>
    <a href="/auth/register">Sign up</a><br>
@endif
</body>
</html>
