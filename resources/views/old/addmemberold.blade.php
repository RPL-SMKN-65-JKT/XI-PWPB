<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Member</title>
</head>
<body>
    <h1>User List:</h1>

    <ul>
        @foreach ($users as $user)
            <li>
                <h1>{{ $user->username }}</h1>
                <a href="/add-user/{{ $user->id }}">add to member</a>
            </li>
        @endforeach

        <br><br>
        <a href="/members">Back</a>
    </ul>
</body>
</html>