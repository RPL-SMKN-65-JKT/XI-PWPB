<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="icon" href="assets/logo sekolah.jpg"> --}}
    <title>@yield('title') | Spanca Library</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('assets/65.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    {{-- <link rel="shortcut icon" href="{{ asset('assets/65.png') }}" type="image/x-icon"> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" /> --}}

    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- Slick.js -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}

</head>

<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900 dark:border-gray-700">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ url('/') }}" class="flex items-center">
                {{-- <img src="assets/logo sekolah.jpg" class="h-8 mr-3" alt="Spanca Logo"/> --}}
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEivCy6wlBbMHY-Rqaj9Q2ISGB4U392sWzGi4aAlh4nOqz3PMxv8dlYUpylpnfUJioeRK2zQY3dXx4XTHJx6i4BDHKvNZOKrg2ZYGdMdieIs7PFOu9_appqVNu0lB95tCqZQ-cka6vV5YgIP6zUN0Pi7leHx9Hv5FhaqlgnbiTzlzbDjWpc4UNDlFJIRJWxC/s16000/logo%20sekolah.jpg"
                    class="h-8 mr-3" alt="Spanca Logo" /> <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SPANCA LIBRARY</span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-dropdown" aria-expanded="false"> <span class="sr-only">Open main menu</span> <svg
                    class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg> </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li> <a href="{{ url('/') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            aria-current="page">Home</a> </li>
                    <li> <a href="{{ url('/#about') }}"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li> <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                            class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Books
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg></button> <!-- Dropdown menu -->
                        <div id="dropdownNavbar"
                            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                aria-labelledby="dropdownLargeButton">
                                <li> <a href="{{ url('/kumpulan-buku') }}"
                                        class="block px-4 py-2 bg-indigo-500 text-white">Semua Buku</a>
                                </li>
                                <li> <a href="{{ url('/kategori/novel') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Novel</a>
                                </li>
                                <li> <a href="{{ url('/kategori/manga') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manga</a>
                                </li>
                                <li> <a href="{{ url('/kategori/study') }}"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Study / Umum</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li> <a href="{{ url('/peraturan') }}"
                        class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Peraturan</a>
                </li>
                    @if (Auth::user())
                        <li> <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar2"
                                class="flex items-center justify-between w-full py-2 pl-3 pr-4 uppercase text-blue-500 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">
                                {{ Auth::user()->username }}
                                <img src="{{ Auth::user()->foto == null ? asset('assets/no-img.jpg') : asset('storage/' . Auth::user()->foto) }}"
                                    alt=""
                                    class="ml-1 bg-white shadow w-7 max-w-7 min-w-7 h-7 max-h-7 min-h-7 border rounded-full">
                                <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg></button> <!-- Dropdown menu -->
                            <div id="dropdownNavbar2"
                                class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    <li> <a href="{{ url('/setting/' . Auth::user()->slug) }}"
                                            class="block px-4 py-2 bg-indigo-500 text-white">Profile</a>
                                    </li>
                                    <li> <a href="{{ url('/histori-peminjaman/' . Auth::user()->slug) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Histori
                                            Peminjaman</a>
                                    </li>
                                    <li> <a href="{{ url('/histori-pelanggaran/' . Auth::user()->slug) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Histori
                                            Pelanggaran</a>
                                    </li>
                                    <hr>
                                    <li> <a href="{{ url('/histori-perizinan-ebook/' . Auth::user()->slug) }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Histori
                                            Perizinan eBook</a>
                                    </li>

                                    <li> <a href="{{ url('logout') }}"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logout</a>
                                    </li>
                                    @if (Auth::user()->role_id == 1)
                                        <hr>
                                        <li> <a href="{{ url('/dashboard') }}"
                                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @else
                        <li> <a href="{{ url('login') }}"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
                        </li>
                        <li> <a href="{{ url('register') }}"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('body')
    @yield('login')
    @yield('register')
    <div class="">
        @yield('content')
        @yield('bukuUser')
        @yield('detailBuku_User')
        @yield('kategoriNovel_User')
        @yield('kategoriManga_User')
        @yield('kategoriStudy_User')
    </div>



    <footer class="h-auto footer w-full bg-gray-900">
        <div class="mx-auto w-full max-w-screen-xl">
            <div class="flex flex-wrap md:justify-start justify-center items-center gap-8 text-left py-8">
                <div class="md:w-auto w-full flex md:justify-start justify-center">
                    <img src="{{ asset('assets/65.png') }}" alt="" class=" w-60">
                </div>
                <div class="md:w-2/3 w-full md:px-0 px-4">
                    <h1 class="mb-3 text-2xl font-semibold uppercase text-white">SMKN 65 Jakarta</h1>
                    <p class="text-xl text-white">Jl. IPN, RT. 09/RW 06, Kelurahan Cipinang Besar Selatan, Kecamatan Jatinegara, Kota Jakarta Timur, DKI Jakarta, 13410</p>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2664297176407!2d106.87573757494198!3d-6.228562493759532!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f325cc3523e1%3A0x5e6945075e20de57!2sSMK%20Negeri%2065%20Jakarta!5e0!3m2!1sid!2sid!4v1701928254203!5m2!1sid!2sid" class="w-full mb-8 md:rounded-lg rounded-2xl lg:px-0 px-4" height="200" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <div class="px-4 py-6 bg-gray-100 bg-gray-700 md:flex md:items-center md:justify-between">
                <span class="text-sm text-gray-500 text-gray-300 sm:text-center">© 2023 <a href="/">Spanca
                        Library™</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-5 justify-center md:mt-0">
                    <a href="https://maps.app.goo.gl/YKNQP1Mebj9nmgFK9" class="text-gray-400 hover:text-white">
                        <i class="fa-solid fa-location-dot"></i>
                    </a>
                    <a href="https://smkn65-jkt.sch.id/home/" class="text-gray-400 hover:text-white">
                        <i class="fa-solid fa-link"></i>
                    </a>
                    <a href="https://www.instagram.com/smkn65jakarta.official/" class="text-gray-400 hover:text-white">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script> --}}

</body>

</html>
