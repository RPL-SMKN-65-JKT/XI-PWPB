<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
</head>
<body>
    <form action="/book/edit" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $book->id }}">

        <label for="title">Book Title</label>
        <input id="title" type="text" name="title" value="{{ $book->title }}">

        <br>

        <label for="author">Author</label>
        <input id="author" type="text" name="author" value="{{ $book->author }}">

        <br>

        <label for="publisher">Publisher</label>
        <input id="publisher" type="text" name="publisher" value="{{ $book->publisher }}">

        <br>

        <label for="date_of_issue">Date of issue</label>
        <input id="date_of_issue" type="date" name="date_of_issue" value="{{ $book->date_of_issue }}">

        <br>

        <label for="summary">Summary</label><br>
        <textarea name="summary" id="summary" cols="30" rows="10">{{ $book->summary }}</textarea>

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