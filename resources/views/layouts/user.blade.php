<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Flowbite -->
        @vite(['resources/css/app.css','resources/js/app.js'])
        @vite('resources/js/navbar.js')

    </head>
    <body class="antialiased">
        
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="block md:flex columns-1 md:columns-2">
          <div class="bg-[#48BB78] w-full md:w-80 flex justify-between">
            <div class="flex h-24">
                <a href="/" class="flex items-center w-80 p-2">
                    <img src="/img/smk-65.png" class="h-auto w-16 ml-3 md:mr-3 md:w-14" alt="Logo 65" />
                    <p class="self-center text-2xl font-semibold whitespace-nowrap text-white text-center ml-3 hidden md:block">Perpustakaan <br> SMKN 65 Jakarta</p>
                </a>
            </div>
            <div class="flex mr-5 md:hidden justify-center items-center">
              <label for="navButton">
                <i id="open-nav" class="fa-solid fa-bars font-black text-4xl text-white"></i>
              </label>
              <label for="navButton">
                <i id="close-nav" class="fa fa-times font-black text-4xl text-white hidden"></i>
              </label>

              <button id="navButton" class="hidden"></button>
              {{-- <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                      <span class="sr-only">Open main menu</span>
                      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                      </svg>
                  </button> --}}
            </div>
          </div>
          
              <div class="w-full bg-[#48BB78] md:bg-white"> {{--hidden md:block--}}
                <div class="items-center justify-between md:p-4">
                  
                  {{-- <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                      <span class="sr-only">Open main menu</span>
                      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                      </svg>
                  </button> --}}
                  <div class="flex justify-between">
                      <div class="w-full md:block md:w-auto hidden" id="navbar-default">
                        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 md:flex-row md:space-x-8 md:mt-0 bg-[#48BB78] md:bg-white">
                          <li class="mb-1 md:mb-0">
                            <a href="/" class="block py-2 pl-3 pr-4 text-white rounded md:bg-transparent bg-blue-700  md:text-blue-700 md:p-0 dark:text-white 0" aria-current="page">Home</a>
                          </li>
                          <li class="mb-1 md:mb-0">
                            <a href="/books" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Books</a>
                          </li>
                          <li class="mb-3 md:mb-0">
                            <a href="/ebooks" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">eBooks</a>
                          </li>
                          @auth
                            @if (auth()->user()->isAdmin)
                              <li class="mb-1 md:mb-0 md:hidden">
                                <a href="/admin" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Admin Dashboard</a>
                              </li>
                            @else
                              <li class="mb-1 md:mb-0 md:hidden">
                                <a href="/myaccount" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">My account</a>
                              </li>
                            @endif
                          @else 
                            <li class="mb-1 md:mb-0 md:hidden">
                              <a href="/signin" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sign in</a>
                            </li>
                            <li class="mb-3 md:mb-0 md:hidden">
                              <a href="/signup" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sign up</a>
                            </li>
                          @endauth
                          <li class="md:hidden">
                            <div class="w-full">
                              <form action="/search" method="get" class="flex">
                                  <input type="text" name="q" class="h-10 w-full bg-[#D9D9D9] border-[#D9D9D9] placeholder:text-[#BEACAC]" placeholder="what book would you like to borrow?">
                                  <div class="flex justify-center items-center bg-[#48BB78] w-12">
                                      <label for="submit">
                                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                          </svg>
                                      </label>
                                  </div>
                                  <input id="submit" type="submit" class="hidden">
                              </form>
                          </div>
                          </li>
                        </ul>
                      </div>
                      @auth
                        @if (auth()->user()->isAdmin)
                          <div class="hidden w-full md:block md:w-auto">
                            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                              <li>
                                <a href="/admin" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Admin Dashboard</a>
                              </li>
                            </ul>
                          </div>
                        @else
                          <div class="hidden w-full md:block md:w-auto">
                            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                              <li>
                                <a href="/myaccount" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">My Account</a>
                              </li>
                            </ul>
                          </div>
                        @endif
                      @else
                      <div class="hidden w-full md:block md:w-auto">
                        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                          <li>
                            <a href="/signin" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sign in</a>
                          </li>
                          <li>
                            <a href="/signup" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sign up</a>
                          </li>
                        </ul>
                      </div>
                      @endauth

                  </div>
                </div>
                <div class="w-full hidden md:block">
                    <form action="/search" method="get" class="flex">
                        <input type="text" name="q" class="h-10 w-full bg-[#D9D9D9] border-[#D9D9D9] placeholder:text-[#BEACAC]" placeholder="what book would you like to borrow?" autocomplete="off">
                        <div class="flex justify-center items-center bg-[#48BB78] w-12">
                            <label for="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </label>
                        </div>
                        <input id="submit" type="submit" class="hidden">
                    </form>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    </body>
</html>
