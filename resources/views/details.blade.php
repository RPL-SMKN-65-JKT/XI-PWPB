<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
            background-image: url('/img/bg-details.png');
        }
    </style>

    <!-- Flowbite -->
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- @vite('resources/js/rating.js') --}}
    @vite('resources/css/rating.css')
</head>
<body>
    
   
    <div class="flex justify-center items-center ">
        <div class="bg-white w-[90%] mt-8 md:mt-0 mb-8 lg:mt-16 lg:mb-0 rounded-lg p-5"> <!-- ⬅️ THIS DIV WILL BE CENTERED -->
            <div class="block lg:flex">
                <div class="min-w-fit">
                    <img src="{{env('APP_URL') .'storage'. $book->cover }}" class="h-56" alt="">
                    <p class="text-xl mt-5 mb-8 lg:mb-0 font-bold text-center w-[100%] border-black border-2 shadow-xl">Peminjaman</p>
                </div>
                <div class="ml-8 min-w-[30%]">
                    <span class="bg-[#5BC0DE] text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300"><i class="fa-solid fa-book"></i> Informasi Umum</span>
                    <div class="w-[96%] mt-3">
                        <p class="text-2xl mb-2 font-semibold">{{ $book->title }}</p>
                        <p class="text-sm mb-2">by {{ $book->author }}</p>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="w-4 h-4 text-yellow-300 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <svg class="w-4 h-4 text-gray-300 mr-1 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                            <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of 5</p>
                        </div>
                        <p class="mt-8 text-2xl font-semibold">Category</p>
                        <div class="inline-block mt-3">
                            <span class=" text-white text-sm font-medium mr-2 px-2.5 py-0.5 rounded-full bg-[#5BC0DE]">{{ ucfirst($book->category) }}</span>
                        </div>
                    </div>
                    
                    

                </div>
                <div class="w-full mt-8 ml-8 lg:ml-0">
                    <h1 class="font-bold">Sinopsis</h1>
                    <p class="mb-5">{{ $book->summary }}</p>
                    
                    @if ($book->book_type == "book")
                        <h1 class="font-bold mb-5">Stock: {{ $book->stock }}</h1>
                    @endif
                    
                    @auth
                        @if (auth()->user()->isMember or auth()->user()->isAdmin)
                            @if ($book->book_type == "book")
                                <a href="/borrow/{{ $book->slug }}" class="w-[90%] lg:w-full block text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pinjam Buku</a>
                            @elseif($book->book_type == "ebook")
                                <a href="/read/{{ $book->slug }}" class="w-[90%] lg:w-full block text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Baca Buku</a>
                            @endif
                        @else
                            <div id="alert-additional-content-1" class="p-4 w-[90%] lg:w-full mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                                <div class="flex items-center mb-2">
                                  <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                  </svg>
                                  <span class="sr-only">Info</span>
                                  <h3 class="text-lg font-medium">Lengkapi profil untuk pinjam/baca buku</h3>
                                </div>
                                <div class="flex">
                                  <a href="/myaccount" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> 
                                    My account
                                  </a>
                                </div>
                            </div>
                        @endif
                    @else
                        <div id="alert-additional-content-1" class="p-4 w-[90%] lg:w-full mb-4 text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                            <div class="flex items-center mb-2">
                              <svg class="flex-shrink-0 w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                              </svg>
                              <span class="sr-only">Info</span>
                              <h3 class="text-lg font-medium">Sign in untuk pinjam/baca buku</h3>
                            </div>
                            <div class="flex">
                              <a href="/signin" class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> 
                                Sign in
                              </a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</body>
</html>