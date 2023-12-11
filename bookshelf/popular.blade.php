<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Two+Tone" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="tema/css/style.css">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')


    <!-- logo -->
    <link href="tema/img/65.png" rel="icon" />
    <link href="tema/img/65.png" rel="apple-touch-icon" />

    <style>
        body {
            font-family: poppins, sans-serif;
        }

        .container-hero {

            background-size: cover;
            background-position: center;
            height: 120vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: white;


        }

        .img {
            box-shadow: #728C9B;
        }

        .container-hero .text {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            gap: 20px;
            width: 60%;
            margin-bottom: 100px;
        }

        .container-hero .text h1 {
            font-size: 50px;
            line-height: 80px;
        }

        .container-hero .text a button {
            font-size: 16px;
            /* Text/Black */

            padding: 8px 10px;
            text-decoration: none;
            border-radius: 7px;
            /* Light/Yellow/100 */

        }

        .username {
            display: flex;
            justify-content: center;
            gap: 10px;
            align-items: center;
        }

        .menu {
            font-family: poppins, sans-serif;
        }

        .navbar {
            background: white;
        }

        .nav-link {
            position: relative;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;

            font-size: 15px;
            font-weight: 600;
            letter-spacing: 0.5px;
            padding: 0 15px;

        }

        /* .nav-link::after {

      content: '';
      position: absolute;
      background: yellow;
      height: 3px;
      width: 100%;
      left: 0;
      bottom: -10px;
      transition: all 0.3s;
      opacity: 0;
      display: block;
    } */

        .nav-link:hover::after {
            opacity: 1;
            color: black;
        }


        .signin {
            font-weight: 600;
        }

        /* .circle {
  background: #FFEC39;
  border: 0.1875em solid #0F1C3F;
  border-radius: 50%;
  box-shadow: 0.375em 0.375em 0 0 rgba(15, 28, 63, 0.125);
  height: 4em;
  width: 4em;

} */
    </style>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Perpustakaan</title>
</head>

<body class=" dark:bg-[#2B2B2B] dark:text-white pb-52">
    <!-- Main navigation container (navbar) -->
    <br>
    <nav id="navbar"
        class="mr-10 ml-10 relative flex items-center dark:bg-[#404040] dark:text-white bg-[#e8e8e8] rounded-full py-2 lg:mb-0 lg:pr-2 shadow-md"
        data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between px-3">
            <!-- Hamburger button for mobile view -->
            <button
                class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden"
                type="button" data-te-collapse-init data-te-target="#navbarSupportedContent1"
                aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                <!-- Hamburger icon -->
                <span class="[&>svg]:w-7">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-7 w-7">
                        <path fill-rule="evenodd"
                            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </button>

            <!-- Collapsible navigation container -->
            <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
                id="navbarSupportedContent1" data-te-collapse-item>
                <!-- Logo -->
                <a class="mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-white dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
                    href="#">
                    <img src="tema/img/65.png" style="height:40px; width:40px;" alt="65 logo" loading="lazy" />
                </a>
                <!-- Left navigation links -->
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
                    <li class="mb-4 lg:mb-0 lg:pr-2 dark:border-[#000000]">
                        <!-- Dashboard link -->
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <!-- Team link -->
                    <li class="mb-4 lg:mb-0 lg:pr-2 dark:border-[#000000]">
                        <!-- Dashboard link -->
                        <a class="nav-link active" href="/bookshelf">Bookshelf</a>
                    </li>
                    <!-- Projects link -->
                    <li class="mb-4 lg:mb-0 lg:pr-2 dark:border-[#000000]">
                        <!-- Dashboard link -->
                        <a class="nav-link" href="/rentlogs">Rent Logs</a>
                    </li>
                </ul>
            </div>

            <!-- Right elements -->
            @if (Auth::check())
                <button
                    class="text-black dark:text-white bg-white dark:bg-[#2B2B2B] font-semibold sm:text-lg text-sm rounded-full sm:px-5 px-2 py-1 text-center inline-flex items-center shadow-md dark:focus:ring-slate-900"
                    type="button">
                    {{ Auth::user()->name }}
                    {{-- <p class="text-gray-300 font-thin text-2xl ml-5 mr-5">|</p>

            <!-- SVG Path here -->
            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 36 36" fill="none">
              <path d="M18 3C26.28 3 33 9.72 33 18C33 26.28 26.28 33 18 33C9.72 33 3 26.28 3 18C3 9.72 9.72 3 18 3ZM9.0345 23.124C11.2365 26.409 14.5425 28.5 18.24 28.5C21.936 28.5 25.2435 26.4105 27.444 23.124C24.9476 20.7909 21.6569 19.4952 18.24 19.5C14.8226 19.4948 11.5313 20.7905 9.0345 23.124ZM18 16.5C19.1935 16.5 20.3381 16.0259 21.182 15.182C22.0259 14.3381 22.5 13.1935 22.5 12C22.5 10.8065 22.0259 9.66193 21.182 8.81802C20.3381 7.97411 19.1935 7.5 18 7.5C16.8065 7.5 15.6619 7.97411 14.818 8.81802C13.9741 9.66193 13.5 10.8065 13.5 12C13.5 13.1935 13.9741 14.3381 14.818 15.182C15.6619 16.0259 16.8065 16.5 18 16.5Z" fill="#2B2B2B"/>
          </svg>
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
      </svg> --}}

                </button>
            @else
                <div
                    class="signin relative flex items-center dark:bg-[#2B2B2B] dark:text-white bg-white rounded-full px-2 py-2 lg:mb-0 lg:pr-2 shadow-md">
                    <a class="px-2 text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                        href="/register">Sign Up</a>

                    <p> | </p>

                    <a class="px-2 text-neutral-500 transition duration-200 hover:text-neutral-700 hover:ease-in-out focus:text-neutral-700 disabled:text-black/30 motion-reduce:transition-none dark:text-neutral-200 dark:hover:text-neutral-300 dark:focus:text-neutral-300 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400 "
                        href="/login">Sign In</a>
                </div>
            @endif
            <div class="flex ml-2 bg-yellow-300 rounded-full dark:bg-[#C318FF] px-3 py-2">
                <img class="sun cursor-pointer w-[25px]" src="tema/img/sun.svg">
                <img class="moon cursor-pointer w-[20px] display-none" src="tema/img/moon.svg">
            </div>
        </div>
    </nav>
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
    <br>
    <hr class="w-screen" color="#ECECEC" size="5">

    <div class="popular">
      <div class="row flex flex-wrap justify-between items-center">
      @foreach ($popular as $item)
       
          <div class="column mQ flex sm:flex-row flex-col sm:justify-evenly justify-center items-center">
            <a href="#">
              @if ($item->cover!='')
              <img class="ml-3 rounded-t-lg px-3 sm:w-[185px] w-[150px] max-w-xs fixed-height-image transition duration-300 ease-in-out hover:scale-110" src="{{ asset('storage/cover/'.$item->cover) }}" />
          @else
              <img class="ml-3 rounded-t-lg px-3 sm:w-[185px] w-[150px] max-w-xs fixed-height-image transition duration-300 ease-in-out hover:scale-110" src="{{ asset('tema/img/noCover.png')}}" />
          @endif
            </a>
            <div class="">
              
                <p class="title-popular">{{$item->title}}</p>
                <p class="artist-tag">By {{$item->penulis}}</p>
                <table class="description-popular">
                    <tbody>
                        <tr>
                            <td class="font-['Poppins'] font-[700]">Peminjaman</td>
                            <td>:</td>
                            <td>89 kali peminjaman</td>
                        </tr>
                        <tr>
                            <td class="font-['Poppins'] font-[700]">Tanggal Perilisan</td>
                            <td>:</td>
                            <td>{{$item->tanggal_terbit}}</td>
                        </tr>
                        <tr>
                            <td class="font-['Poppins'] font-[700]">Jumlah Halaman</td>
                            <td>:</td>
                            <td>{{$item->halaman}}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="/bookdetail/{{ $item->slug }}" class="details-button">Detail Buku<i class='bx bx-chevron-right'></i></a>
            </div>
        </div>
               
          <div class="column mQ flex sm:flex-row flex-col sm:justify-evenly justify-center items-center">
            <a href="#">
              @if ($item->cover!='')
              <img class="ml-3 rounded-t-lg px-3 sm:w-[185px] w-[150px] max-w-xs fixed-height-image transition duration-300 ease-in-out hover:scale-110" src="{{ asset('storage/cover/'.$item->cover) }}" />
          @else
              <img class="ml-3 rounded-t-lg px-3 sm:w-[185px] w-[150px] max-w-xs fixed-height-image transition duration-300 ease-in-out hover:scale-110" src="{{ asset('tema/img/noCover.png')}}" />
          @endif
            </a>
            <div class="">
              
                <p class="title-popular">{{$item->title}}</p>
                <p class="artist-tag">By {{$item->penulis}}</p>
                <table class="description-popular">
                    <tbody>
                        <tr>
                            <td class="font-['Poppins'] font-[700]">Peminjaman</td>
                            <td>:</td>
                            <td>89 kali peminjaman</td>
                        </tr>
                        <tr>
                            <td class="font-['Poppins'] font-[700]">Tanggal Perilisan</td>
                            <td>:</td>
                            <td>{{$item->tanggal_terbit}}</td>
                        </tr>
                        <tr>
                            <td class="font-['Poppins'] font-[700]">Jumlah Halaman</td>
                            <td>:</td>
                            <td>{{$item->halaman}}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="/bookdetail/{{ $item->slug }}" class="details-button">Detail Buku<i class='bx bx-chevron-right'></i></a>
            </div>
        </div>
               <div class="column mQ flex sm:flex-row flex-col sm:justify-evenly justify-center items-center">
                <a href="#">
                    <img class="sm:w-[225px] ml-5 rounded-t-lg px-3 max-w-xs" src="tema/img/tatasurya.png"
                        alt="" />
                </a>
                <div class="">
                    <p class="text-white rank-tag">#4</p>
                    <p class="title-popular">Tata Surya</p>
                    <p class="artist-tag">By Harper Russo</p>
                    <table class="description-popular">
                        <tbody>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Peminjaman</td>
                                <td>:</td>
                                <td>89 kali peminjaman</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Tanggal Perilisan</td>
                                <td>:</td>
                                <td>3 Desember 2019</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Jumlah Halaman</td>
                                <td>:</td>
                                <td>192 Halaman</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="details-button">Detail Buku<i class='bx bx-chevron-right'></i></a>
                </div>
            </div>
        
   
              
          @endforeach
        </div>
        <div class="row flex flex-wrap justify-center items-center">
            <div class="column mQ flex sm:flex-row flex-col sm:justify-evenly justify-center items-center">
                <a href="#">
                    <img class="sm:w-[225px] ml-5 rounded-t-lg px-3 max-w-xs" src="tema/img/jujutsu.png"
                        alt="" />
                </a>
                <div class="">
                    <p class="text-white rank3-tag">#3</p>
                    <p class="title-popular">Jujutsu Kaisen</p>
                    <p class="artist-tag">By Gege Akutami</p>
                    <table class="description-popular">
                        <tbody>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Peminjaman</td>
                                <td>:</td>
                                <td>89 kali peminjaman</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Tanggal Perilisan</td>
                                <td>:</td>
                                <td>3 Desember 2019</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Jumlah Halaman</td>
                                <td>:</td>
                                <td>192 Halaman</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="details-button">Detail Buku<i class='bx bx-chevron-right'></i></a>
                </div>
            </div>
            <div class="column mQ flex sm:flex-row flex-col sm:justify-evenly justify-center items-center">
                <a href="#">
                    <img class="sm:w-[225px] ml-5 rounded-t-lg px-3 max-w-xs" src="tema/img/tatasurya.png"
                        alt="" />
                </a>
                <div class="">
                    <p class="text-white rank-tag">#4</p>
                    <p class="title-popular">Tata Surya</p>
                    <p class="artist-tag">By Harper Russo</p>
                    <table class="description-popular">
                        <tbody>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Peminjaman</td>
                                <td>:</td>
                                <td>89 kali peminjaman</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Tanggal Perilisan</td>
                                <td>:</td>
                                <td>3 Desember 2019</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Jumlah Halaman</td>
                                <td>:</td>
                                <td>192 Halaman</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="details-button">Detail Buku<i class='bx bx-chevron-right'></i></a>
                </div>
            </div>
        </div>
        <div class="row flex flex-wrap justify-center items-center">
            <div class="column mQ flex sm:flex-row flex-col sm:justify-evenly justify-center items-center">
                <a href="#">
                    <img class="sm:w-[225px] ml-5 rounded-t-lg px-3 max-w-xs" src="tema/img/jujutsu.png"
                        alt="" />
                </a>
                <div class="">
                    <p class="text-white rank-tag">#5</p>
                    <p class="title-popular">Jujutsu Kaisen</p>
                    <p class="artist-tag">By Gege Akutami</p>
                    <table class="description-popular">
                        <tbody>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Peminjaman</td>
                                <td>:</td>
                                <td>89 kali peminjaman</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Tanggal Perilisan</td>
                                <td>:</td>
                                <td>3 Desember 2019</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Jumlah Halaman</td>
                                <td>:</td>
                                <td>192 Halaman</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="/bookdetail" class="details-button">Detail Buku<i class='bx bx-chevron-right'></i></a>
                </div>
            </div>
            <div class="column mQ flex sm:flex-row flex-col sm:justify-evenly justify-center items-center">
                <a href="#">
                    <img class="sm:w-[225px] ml-5 rounded-t-lg px-3 max-w-xs" src="tema/img/tatasurya.png"
                        alt="" />
                </a>
                <div class="">
                    <p class="text-white rank-tag">#6</p>
                    <p class="title-popular">Tata Surya</p>
                    <p class="artist-tag">By Harper Russo</p>
                    <table class="description-popular">
                        <tbody>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Peminjaman</td>
                                <td>:</td>
                                <td>89 kali peminjaman</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Tanggal Perilisan</td>
                                <td>:</td>
                                <td>3 Desember 2019</td>
                            </tr>
                            <tr>
                                <td class="font-['Poppins'] font-[700]">Jumlah Halaman</td>
                                <td>:</td>
                                <td>192 Halaman</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="#" class="details-button">Detail Buku<i class='bx bx-chevron-right'></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar" id="myNavbar">
        <a href="/bookshelf"><i class='bx bx-book-bookmark'></i> Books</a>
        <a href="/popular" class="active"><i class='bx bx-medal'></i> Popular</a>
        <a href="/discover"><i class='bx bx-compass'></i> Discover</a>
    </div>

    <link rel="stylesheet" href="tema/js/main.js">

</body>

</html>

