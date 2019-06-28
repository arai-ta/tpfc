<html>
<head>
    <meta charset='utf-8'>
</head>
<body>
Hello!
@if (\Auth::check())
    {{ \Auth::user()->name }}-san
@else
    Guest-san<br>
    <a href="/auth/register">Sign up</a>
@endif
</body>
</html>
