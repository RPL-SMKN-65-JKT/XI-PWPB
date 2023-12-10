<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>
</head>
<body>
    <ul>
        @foreach ($members as $member)
            <li><h1><a href="/member/{{ $member->id }}">{{ $member->username }}</a></h1></li>
        @endforeach
    </ul>

    <a href="/add-member">Add member</a>

    <br><br>
    <a href="/">Back to home</a>
</body>
</html>