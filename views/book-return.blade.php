@extends('layout.menu')
@section('title', 'Book Return')
@section('content')


<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@if ($errors->any())
<div class="alert alert-danger bg-red-500 px-3 py-2 w-96 ml-5 mt-5">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="ml-5 max-w-7xl h-max mb-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    @if (session('gagal'))
<script>
    Swal.fire({
        title: "Gagal!",
        text: "{{ session('gagal') }}!",
        icon: "error"
        });
</script>
@endif
    @if (session('berhasil'))
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('berhasil') }}!",
        icon: "success"
        });
</script>
@endif

    @if (session('limit'))
<script>
    Swal.fire({
        title: "Gagal!",
        text: "{{ session('limit') }}!",
        icon: "error"
        });
</script>
@endif
<form enctype="multipart/form-data" method="post" action="/book-return" >
  @csrf
    <h1 class=" mb-10 text-2xl font-semibold leading-7 text-gray-900">Pengembalian Buku</h1>
    <div class="grid grid-cols-1 gap-x-4">
        <div class="flex flex-col gap-1">
            <div class="input-box mb-3">
                <label for="user" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">User</label>
           
                <select name="user_id" id="user_id" class="select-multiple w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
             
                    <option value="">Pilih User</option>
                    
                     @foreach (  $user as $item)
                    <option value="{{$item->id}}">{{$item->username}}</option>
                    @endforeach 
                </select>
              </div>
            <div class="input-box mb-3">
                <label for="book_id" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Books</label>
           
                <select name="book_id" id="imageInput" class="select-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
             
                    <option value="">Pilih Buku</option>
                    
                     @foreach (  $books as $item)
                    <option value="{{$item->id}}">{{$item->book_code}} | {{$item->title}}</option>
                    @endforeach 
                </select>
               
              </div>
              
           
              
             
         
        </div>

        
     
      </div>
    
    <button type="submit" class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Balik kan buku</button>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>


$(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>

@endsection