<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members</title>
</head>
<body>
   
    <h1>{{ $member->username }}</h1>
    <p><strong>Email: </strong>{{$member->email}}</p>

    <a href="/members">Back To Member List</a>

</body>
</html>