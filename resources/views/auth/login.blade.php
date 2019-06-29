<html>
<head>
    <meta charset='utf-8'>
</head>
<body>
<h1>Login form!</h1>
@isset($message)
    <p style="color:red">{{$message}}</p>
@endisset
<form name="loginform" action="/auth/login" method="post">
    {{csrf_field()}}
    <label>メアド: <input type="text" name="email" size="30" value="{{old('email')}}"></label><br>
    <label>パスワード: <input type="password" name="password" size="30"></label><br>
    <button type="submit" name="action" value="send">ログイン</button>
</form>
</body>
</html>
