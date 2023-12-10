<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
</head>
<body>
    <form action="/signin" method="POST">
        @csrf
        <label for="username">Username</label>
        <input id="username" type="text" name="username">

        <br>

        <label for="password">Password</label>
        <input id="password" type="password" name="password">
        
        @if (session('error'))
            <br>
            {{ session('error') }}
        @endif
        
        <br>

        <input type="submit">

        <a href="/signup">No have account?</a>
    </form>
</body>
</html>
