@extends('layout.menu')
@section('title', 'Delete Book')
@section('content')
<h2 class="font-bold ml-5 text-xl">Are you sure want to delete this book {{$book->title}}?</h2>
<div class="ml-5 mt-5">
    <a class=" py-2 px-4 rounded-lg bg-red-500 text-white" href="/book-destroy/{{$book->slug}}">Hapus</a>
    <a class=" py-2 px-4 rounded-lg bg-green-500 text-white ml-2" href="/books">Cancel</a>

</div>

@endsection