<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>
    <form action="/signup" method="POST">
        @csrf
        <label for="username">Username</label>
        <input id="username" type="text" name="username">

        <br>

        <label for="email">Email</label>
        <input id="email" type="email" name="email">

        <br>

        <label for="password">Password</label>
        <input id="password" type="password" name="password">

        <br>

        <label for="confirm_password">Confirm Password</label>
        <input id="confirm_password" type="password" name="confirm_password">

        <br>

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <input type="submit">
    </form>
</body>
</html>