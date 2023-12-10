@extends('layout.menu')
@section('title', 'Tambah Buku')
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
<form enctype="multipart/form-data" method="POST" action="/book-add" >
  @csrf
    <h1 class=" mb-10 text-base font-semibold leading-7 text-gray-900">Add New Books</h1>
    <div class="grid grid-cols-3 gap-x-4">
        <div class="flex flex-col gap-1">
            <div class="mb-3">
                <label for="ISBN" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">ISBN</label>
                <input value="{{old('book_code')}}" name="book_code" type="text" id="ISBN" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="978162537" required>
            </div>
         
           
            <div class="input-box mb-3">
              <label for="tanggal_terbit" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Tanggal Terbit</label>
              <input value="{{old('tanggal_terbit')}}" id="tanggal_terbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="tanggal_terbit" type="date" placeholder="Tanggal terbit buku" required />
            </div>
            <div class="input-box mb-3">
              <label for="categories" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Kategori Buku</label>
              <select value="{{old('categories[]')}}" name="categories[]" id="categories" class="cursor-pointer select-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required multiple="multiple">
                
                @foreach ( $categories as $kategori)
                <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="input-box mb-3">
              <label for="imageInput" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Cover Buku</label>
                    
                <img id="imagePreview" src="" hidden alt="Preview" style="box-shadow: rgba(50, 50, 93, 0.115) 0px 6px 12px -2px, rgba(0, 0, 0, 0.061) 0px 3px 7px -3px; border-radius: 10px; display: ; border: 1px solid rgba(0, 0, 0, 0.161); max-width: 250px; max-height: 250px; min-width: 250px; min-height: 250px; ">
                <input value="{{old('image')}}" type="file" accept="image/*" id="imageInput" name="image" class="pt-2 block w-full border-slate-300 text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-[#287bff]
                hover:file:bg-blue-100
                " />
              </div>
             
         
        </div>

        <div class="flex flex-col gap-1">
          <div class="input-box mb-3">
            <label for="title" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Book Title</label>
                <input value="{{old('title')}}" name="title" type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul Buku" required>
          </div>
          <div class="input-box mb-3">
            <label for="penerbit" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Penerbit</label>
            <input value="{{old('penerbit')}}" name="penerbit" type="text" id="penerbit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Penerbit Buku" required>
          </div>
          <div class="input-box">
            <label for="message" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Deskripsi</label>
            <textarea id="message" value="{{old('deskripsi')}}" name="deskripsi" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
            

          </div>
          <div class="input-box">
            <label for="imageInput" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Ebook Pdf</label>
            <input value="{{old('pdf')}}" type="file" name="pdf" class="pt-2 block w-full border-slate-300 text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-[#287bff]
                hover:file:bg-blue-100
                " />
            

          </div>
          

        </div>
        <div class="flex flex-col gap-1">
          <div class="input-box mb-3">
            <label for="penulis" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Penulis</label>
                <input value="{{old('penulis')}}" name="penulis" type="text" id="penulis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Penulis Buku" required>
          </div>
          <div class="input-box mb-3">
            <label for="halaman" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Halaman</label>
            <input value="{{old('halaman')}}" name="halaman" type="number" id="halaman" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Berapa Halaman Buku" required>
          </div>

          <div class="input-box mb-3">
            <label for="classification" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Klasifikasi Buku</label>
            <select value="{{old('classification_id')}}" name="classification_id" id="classification" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <option selected>Pilih Klasifikasi Buku</option>
              @foreach (  $classification as $klasifikasi)
              <option value="{{$klasifikasi->id}}">{{$klasifikasi->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-box mb-3">
            <label for="type" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Jenis Buku</label>
            <select value="{{old('type_id')}}" name="type_id" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
              <option selected>Pilih Jenis Buku</option>
              @foreach ( $type as $jenis)
              <option value="{{$jenis->id}}">{{$jenis->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="input-box mb-3">
              <label for="bahasa" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Bahasa</label>
              <input value="{{old('bahasa')}}" name="bahasa" type="text" id="bahasa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bahasa Buku" required>
            </div>

            
        
            
      
        {{-- <div class="w-full" > --}}
  
        {{-- <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Pilih Kategori Buku<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg></button>

        <!-- Dropdown menu -->

        <div id="dropdownSearch" class="z-10 hidden bg-white shadow-slate-500 shadow-2xl rounded-lg  w-60 dark:bg-gray-700">
          <div class="p-3">
            <label for="input-group-search" class="sr-only">Search</label>

          </div>
          <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
            @foreach ($categories as $item)
            <li>
              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <input id="category" type="checkbox" name="categories[]" value="{{$item->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                <label for="category" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$item->name}}</label>
              </div>
            </li>
            @endforeach
          </ul>

        </div> --}}
       {{-- </div> --}}
        </div>
      </div>
     <a>
    <button  class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><a href="/books">back</button>
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Book</button>
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const imageInput = document.getElementById('imageInput');
  const imagePreview = document.getElementById('imagePreview');

  imageInput.addEventListener('change', function () {
      if (imageInput.files && imageInput.files[0]) {
          const reader = new FileReader();

          reader.onload = function (e) {
              imagePreview.src = e.target.result;
              imagePreview.style.display = 'block';
          };

          reader.readAsDataURL(imageInput.files[0]);
      }
  });
});


</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
  

@endsection