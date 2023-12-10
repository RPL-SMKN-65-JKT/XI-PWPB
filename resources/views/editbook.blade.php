@extends('layouts.admin')

@section('content')
  
   <div class="p-5 sm:ml-64 bg-[#EDE7E8] h-fit">
      <div class="flex items-center">
         <p class="text-black text-2xl mt-16 sm:mt-10 ml-3">Edit Book</p>
         <a href="/books" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-14 ml-4">Lihat Buku</a>
      </div>
     <div class="flex-col h-fit mb-4 rounded-md bg-gray-50 dark:bg-gray-800 mt-3 border border-black pl-4 pt-2 pr-4">
        <h1 class="text-black text-2xl font-bold">Edit buku</h1>
      
      <form action="/book/edit" method="POST" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="id" value="{{ $book->id }}">

         <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-7">Judul Buku</label>
         <input type="text" id="title" name="title" value="{{ $book->title }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

         <label for="cover" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2">Cover</label>
         <img src="/storage{{ $book->cover }}" class="w-28 mb-5 border border-black">
         <input id="cover" name="cover" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
         <div class="mt-1 text-sm text-gray-500 dark:text-gray-300">abaikan jika Anda tidak ingin mengedit cover buku.</div>

         <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-3">Kategori</label>
         <select required id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option disabled>Choose a category</option>
            <option @if ($book->category == "novel") selected @endif value="novel">Novel</option>
            <option @if ($book->category == "komik") selected @endif value="komik">Komik</option>
            <option @if ($book->category == "sejarah") selected @endif value="sejarah">Sejarah</option>
            <option @if ($book->category == "pendidikan") selected @endif value="pendidikan">Pendidikan</option>
         </select>

         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-3">Jenis buku</label>
         <ul class="grid w-full gap-6 md:grid-cols-2">
             <li>
                 <input type="radio" @if ($book->book_type == "book") checked @endif if id="book" name="book_type" value="book" class="hidden peer/book" required>
                 <label for="book" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked/book:text-blue-500 peer-checked/book:border-blue-600 peer-checked/book:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">                           
                     <div class="block">
                        <div class="w-full text-lg font-semibold">Book</div>
                        <div class="w-full">Buku yang dapat dipinjam</div>
                     </div>
                  </label>
                  <div class="hidden peer-checked/book:block">
         
                     <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-7">Stok Buku</label>
                     <input type="number" @if ($book->stock) value="{{ $book->stock }}" @endif id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
         
                  </div>
               </li>
               <li>
                  <input type="radio" @if ($book->book_type == "ebook") checked @endif id="ebook" name="book_type" value="ebook" class="hidden peer/ebook">
                  <label for="ebook" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked/ebook:text-blue-500 peer-checked/ebook:border-blue-600 peer-checked/ebook:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                     <div class="block">
                        <div class="w-full text-lg font-semibold">eBook</div>
                        <div class="w-full">Buku yang dapat dibaca secara online</div>
                     </div>
                  </label>
                  <div class="hidden peer-checked/ebook:block">
         
                     <label for="ebook_file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2">File eBook</label>
                     <input id="ebook_file" name="ebook_file" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
         
                  </div>
             </li>
         </ul>

         <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-3">Penulis</label>
         <input type="text" id="author" name="author" value="{{ $book->author }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

         <label for="publisher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2">Penerbit</label>
         <input type="text" id="publisher" name="publisher" value="{{ $book->publisher }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

         <label for="date_of_issue" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2">Tanggal rilis buku</label>
         <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                </svg>
            </div>
            <input id="date_of_issue" name="date_of_issue" value="{{ date('d-m-Y', strtotime($book->date_of_issue)) }}" datepicker datepicker-autohide datepicker-format="dd/mm/yyyy" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
          </div>
 

         <label for="summary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-2">Sinopsis</label>
         <textarea id="summary" name="summary" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan Sinopsis...">{{ $book->summary }}</textarea>
         
         <button type="submit" class="text-white bg-[#4B9CD6] hover:bg-[#437ca5] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 w-full mb-6 mt-5">Edit Buku</button>
      </form>
   </div>
 @endsection