@extends('layouts.admin')
    

@section('content')

    @if (session('success'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 1500
        })
    </script>

    @endif
    
   <div class="p-5 sm:ml-64 bg-[#EDE7E8] h-fit">
      <div class="lg:flex items-center justify-between">
         <div class="flex items-center">
            <p class="text-black text-2xl mt-16 sm:mt-10 ml-3">Data buku</p>
            <a href="/add-book" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 mt-14 ml-4">Tambah Buku</a>
         </div>
         <div class="mt-4 lg:mt-12">
            <label for="table-search" class="sr-only">Search</label>
           <div class="relative">
               <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                   <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
               </div>
               <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-full sm:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
           </div>
         </div>
      </div>
     {{-- <div class="flex-col h-fit mb-4 rounded-md bg-gray-50 dark:bg-gray-800 mt-3 border border-black pl-4 pt-2 pr-4"> --}}
      
         @if (count($books) > 0)
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-black mt-3">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul Buku
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cover
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penulis
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Penerbit
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->index + 1 }}
                                </th>
                                <td class="px-6 py-4">
                                   {{ $book->title }}
                                </td>
                                <td class="px-6 py-4">
                                   <img src="{{ env('APP_URL') . 'storage' . $book->cover }}" class="w-auto h-24 object-cover" alt="">
                                </td>
                                <td class="px-6 py-4">
                                    {{ ucwords($book->category) }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $book->author }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $book->publisher }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="/book/{{ $book->slug }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="/book/{{ $book->slug }}/delete" class="font-medium text-red-600 hover:underline lg:ml-2">Delete</a>
                                </td>
                            </tr>
                            
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        @else
            <div class="flex justify-center p-5 overflow-x-auto shadow-md rounded-lg border border-black mt-3 bg-gray-50">
                <p>No books</p>
            </div>
        @endif
            
         

      
   </div>
@endsection
