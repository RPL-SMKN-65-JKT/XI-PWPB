<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@1.8.1/dist/flowbite.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@1.8.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- logo -->
    <link href="tema/img/65.png" rel="icon" />
    <link href="tema/img/65.png" rel="apple-touch-icon" />

    <style>
        body {
            font-family: poppins, sans-serif;
            background: linear-gradient(90deg, rgba(241, 246, 249, 1) 8%, rgba(189, 230, 255, 1) 75%);
        }

        .container-hero {

            background-size: cover;
            background-position: center;
            height: 120vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;


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

        @media(max-width: 580px) {
            .container-hero .text {
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                gap: 20px;
                width: 90%;
                margin-bottom: 100px;
            }

            .container-hero .text h1 {
                font-size: 45px;
                line-height: 80px;
            }
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

        .question {
            width: 60vw;
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

<body>
    <!-- Main navigation container (navbar) -->
    <nav id="navbar"
        class="px-5 fixed bg-transparent dark:bg-blue-800 flex-no-wrap dark:bg-transparent flex w-full items-center justify-between dark:bg-dark dark:shadow-black/10 lg:flex-wrap lg:justify-start lg:py-5"
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
                    <li
                        class="mb-4 lg:mb-0 lg:pr-2 transition duration-300 ease-in-out hover:scale-110 hover:border-b-2 border-yellow-300 dark:border-[#C318FF]">
                        <!-- Dashboard link -->
                        <a class="nav-link dark:text-white" active href="#">Home</a>
                    </li>
                    <!-- Team link -->
                    <li
                        class="mb-4 lg:mb-0 lg:pr-2 transition duration-300 ease-in-out hover:scale-110 hover:border-b-2 border-yellow-300 dark:border-[#C318FF]">
                        <!-- Dashboard link -->
                        <a class="nav-link dark:text-white" href="/bookshelf">Bookshelf</a>
                    </li>
                    <!-- Projects link -->
                    <li
                        class="mb-4 lg:mb-0 lg:pr-2 transition duration-300 ease-in-out hover:scale-110 hover:border-b-2 border-yellow-300 dark:border-[#C318FF]">
                        <!-- Dashboard link -->
                        <a class="nav-link dark:text-white" href="/rentlogs">Rent Logs</a>
                    </li>
                </ul>
            </div>

            <!-- Right elements -->
            @if (Auth::check())
                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                    class="text-black dark:text-white bg-white dark:bg-[#2B2B2B] hover:bg-slate-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-slate-900 dark:focus:ring-slate-900"
                    type="button"><i class="fa-solid fa-user pr-3"></i>{{ Auth::user()->username }} <svg
                        class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownHover"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                      <li>
                        <a href="/userprofile" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                      </li>
                      <li>
                        <a href="/book-rent" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pinjam Buku</a>
                      </li>
                     
                      <li>
                        <a href="/logout" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                      </li>
                    </ul>
                </div>
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
    <!-- end navbar -->
    <style>
        .dark .dark\:bg-Pic-dark {
            background-image: url("/tema/img/bukuDark.png");
            background-size: cover;
        }

        .bg-Pic {
            background-image: url("/tema/img/buku.png");
            background-size: cover;

        }

        .stroke-svg {
            stroke: #2B2B2B;

        }

        .dark .dark\:stroke-svg-dark {
            stroke: white !important;

        }

        .fill-svg {
            fill: #2B2B2B;

        }

        .dark .dark\:fill-svg-dark {

            fill: white !important;
        }

        .text-base {
            font-size: 20px;
        }

        .bottom .about .container-popular {
            background: linear-gradient(90deg, rgba(241, 246, 249, 1) 8%, rgba(189, 230, 255, 1) 75%);
        }
    </style>

    <div class="container-hero z-50 bg-Pic dark:bg-Pic-dark dark:bg-blue-800" id="container-hero">
        <div class="text">
            <h1 class=" font-bold leading-normal w-800 dark:text-white">Books May<br>Illuminating<br>
                Your Day Like<br>A Sunlight.</h1>
            <a href="#" class=""><button
                    class="text-sm/[32px] font-['Poppins'] font-[700] text-black bg-yellow-300 dark:bg-[#C318FF] dark:text-white px-3 rounded-lg hover:shadow-lg hover:opacity-90 transition duration-300 ease-in-out ">Jelajahi
                    Buku Perpustakaan<i
                        class="fa-solid fa-arrow-right-long px-1 transition duration-300 ease-in-out hover:scale-110 dark:"></i></button></a>
        </div>
    </div>

    <div
        class="container-popular dark:bg-[#C318FF] bg-yellow-300 pt-10 pb-10 flex lg:flex-nowrap flex-wrap justify-evenly items-start">
        <div class="flex flex-col justify-center items-start gap-2 ml-6 w-96 ">
            <h3
                class="border-dashed border-b-2 font-['Poppins'] font-[500] mb-3 dark:border-white border-black mt-8 text-4xl text-medium dark:text-white">
                Most Popular <i class="fa-regular fa-thumbs-up dark:to-white"></i></h3>
            <p class="text-xl font-['Poppins'] font-[500] mt-2dark:text-white">Beberapa Buku yang belakangan
                ini<br>sering dipinjam</p>
            <button
                class="bg-white font-[700] rounded-lg shadow-md text-black py-2 px-4 flex mt-2 hover active:bg-white hover:shadow dark:bg-[#2B2B2B] dark:text-white">Muat
                Lebih Banyak <span class="material-symbols-outlined">expand_content</span></button>

            <div class="book flex dark:svg-dark">
                <svg class="stroke-svg lg:block hidden dark:stroke-svg-dark" xmlns="http://www.w3.org/2000/svg"
                    width="150" height="216" viewBox="0 0 224 216" fill="none">
                    <path
                        d="M38.1731 131.69L26.3869 106.424L55.0835 103.63L77.5038 78.3203L83.7939 107.487L109.704 120.891C106.116 123.306 92.5701 130.49 86.2454 133.78L79.5347 179.16C76.8191 185.435 65.1061 163.452 59.589 151.675C58.533 150.463 40.0425 159.527 30.9293 164.21C26.5138 164.859 33.9187 142.801 38.1731 131.69Z"
                        stroke-width="4" />
                    <path
                        d="M110.526 80.849L104.369 67.6568L119.346 66.2051L131.042 52.9985L134.332 68.2254L147.859 75.2286C145.987 76.4887 138.919 80.2353 135.618 81.9511L132.126 105.639C130.711 108.914 124.592 97.4353 121.709 91.2866C121.158 90.6537 111.509 95.3803 106.753 97.8228C104.449 98.1605 108.309 86.6476 110.526 80.849Z"
                        stroke-width="4" />
                    <path
                        d="M173.429 61.7715L169.521 53.3311L179.151 52.3439L186.716 43.8275L188.773 53.5841L197.439 58.0265C196.232 58.8419 191.676 61.2719 189.548 62.385L187.216 77.5949C186.294 79.7013 182.405 72.36 180.576 68.4261C180.224 68.0221 174.006 71.0905 170.941 72.6752C169.459 72.9005 171.982 65.5 173.429 61.7715Z"
                        stroke-width="4" />
                    <path
                        d="M169.764 104.755L165.857 96.3145L175.486 95.3273L183.051 86.8109L185.109 96.5675L193.775 101.01C192.567 101.825 188.011 104.255 185.884 105.368L183.552 120.578C182.63 122.685 178.741 115.343 176.911 111.409C176.559 111.005 170.342 114.074 167.277 115.659C165.795 115.884 168.318 108.483 169.764 104.755Z"
                        stroke-width="4" />
                </svg>
                <svg class="stroke-svg lg:block hidden dark:stroke-svg-dark mt-20" xmlns="http://www.w3.org/2000/svg"
                    width="150" height="126" viewBox="0 0 181 126" fill="none">
                    <path
                        d="M31.3112 44.2336C23.8346 39.4591 12.9835 24.3664 29.3914 2.19114L166.279 7.31579C174.478 11.6747 186.75 26.1349 170.245 49.1042M31.3112 44.2336C21.219 54.2847 24.2182 72.0793 26.949 79.9683M31.3112 44.2336L170.245 49.1042M170.245 49.1042C173.843 56.7634 177.972 74.9309 166.185 82.3574M166.185 82.3574C170.078 91.7315 174.656 112.002 161.339 122.063L9.58469 123.183C4.66661 116.706 -2.37991 99.0551 8.77869 80.2688L26.949 79.9683M166.185 82.3574L26.949 79.9683"
                        stroke-width="4" />
                </svg>

            </div>

        </div>


        <div
            class="w-auto pt-6 mt-5 bg-white border border-gray-200 rounded-xl shadow dark:bg-gray-800 dark:border-gray-700 flex flex-wrap justify-center px-3">

            <div class="popularBook">

                <a href="#">
                    <img style="width: 200px;"
                        class="rounded-t-lg px-3 max-w-xs transition duration-300 ease-in-out hover:scale-110"
                        src="tema/img/jujutsu.png" alt="" />
                </a>
                <div class="p-3">
                    <a href="#">
                        <h5 class="text-xl font-['Poppins'] font-[500] tracking-tight text-gray-900 dark:text-white">
                            Jujutsu Kaisen</h5>
                    </a>
                    <p class="font-normal text-gray-700 dark:text-gray-400">By Gege Akutami</p>

                </div>
            </div>
            <div class="popularBook">

                <a href="#">
                    <img style="width: 200px;"
                        class="rounded-t-lg px-3 max-w-xs transition duration-300 ease-in-out hover:scale-110"
                        src="tema/img/tatasurya.png" alt="" />
                </a>
                <div class="p-3">
                    <a href="#">
                        <h5 class="text-xl font-['Poppins'] font-[500] tracking-tight text-gray-900 dark:text-white">
                            Tata Surya</h5>
                    </a>
                    <p class="font-normal text-gray-700 dark:text-gray-400">By Harper Russo</p>

                </div>
            </div>
            <div class="popularBook">
                <a href="#">
                    <img style="width: 200px;"
                        class="rounded-t-lg px-3 max-w-xs transition duration-300 ease-in-out hover:scale-110"
                        src="tema/img/bukupohon.png" alt="" />
                </a>
                <div class="p-3">
                    <a href="#">
                        <h5 class="text-xl font-['Poppins'] font-[500] tracking-tight text-gray-900 dark:text-white">
                            The Story Of the Tree</h5>
                    </a>
                    <p class="font-normal text-gray-700 dark:text-gray-400">By Helene Paquet</p>
                </div>
            </div>

        </div>
    </div>




    <div class= "bottom dark:bg-blue-800 dark:text-white tutorial flex items-start justify-start md:pl-20 pl-0 pb-10">
        <div class="flex flex-col justify-center items-start gap-2  ml-6 w-100 pt-20">
            <h3 class=" text-4xl mb-10 flex">How Does It Works
                <svg class="mt-1 ml-3 fill-svg dark:fill-svg-dark" xmlns="http://www.w3.org/2000/svg" width="15"
                    height="30" viewBox="0 0 43 62">
                    <g clip-path="url(#clip0_88_3090)">
                        <path
                            d="M33.082 3.40024C29.1837 1.21895 24.7736 0.138689 20.317 0.273329C16.4422 0.154578 12.5832 0.823662 8.9704 2.24075C5.62191 3.58365 3.17014 5.40145 1.47722 7.7977C0.902714 8.65437 0.509589 9.62128 0.322347 10.638C0.0969681 11.781 0.50748 12.6149 1.44924 12.9262C2.5404 13.2865 3.23045 12.5792 3.81418 11.7615L4.02217 11.4694C4.6703 10.554 5.34054 9.60774 6.18571 8.97736C7.48911 8.0135 8.91328 7.22766 10.421 6.64018C13.6491 5.382 17.2197 4.97819 21.6577 5.37097C24.7312 5.64299 27.327 6.35677 29.593 7.55295C32.8315 9.26233 34.8957 11.4314 35.9037 14.1841C37.331 18.0842 36.5438 21.2135 33.5637 23.4851C31.8632 24.7201 30.0852 25.8427 28.241 26.846L28.1546 26.8953C27.2634 27.4056 26.3157 27.8617 25.399 28.3028C24.7551 28.6128 24.0885 28.9339 23.443 29.2724C19.0079 31.5982 15.9585 34.6696 14.1207 38.6617C13.6521 39.6345 13.3195 40.6677 13.1323 41.7324C12.9989 42.5466 13.0339 43.3795 13.2349 44.1793C13.436 44.9788 13.7988 45.728 14.3007 46.3799C14.8 47.0459 15.3142 47.1891 15.6577 47.1914H15.6678C15.9093 47.1816 16.1452 47.1154 16.3567 46.9973C16.5682 46.8794 16.7493 46.7132 16.8857 46.512C17.1507 46.1698 17.4202 45.8303 17.6906 45.4911C18.4031 44.5926 19.1396 43.6635 19.7871 42.6894C21.8103 39.642 24.5619 37.1539 28.4461 34.8589C30.8478 33.4835 33.1779 31.9849 35.4275 30.3689C37.0058 29.207 38.4235 27.8383 39.6428 26.2987C42.1979 23.0309 43.0431 19.3005 42.1545 15.2107C41.053 10.153 38.0007 6.18018 33.082 3.40024Z" />
                        <path
                            d="M14.6279 61.6779C14.9032 61.7192 15.1812 61.7399 15.4595 61.7396C16.8076 61.7234 18.1159 61.2774 19.1974 60.4658C20.2789 59.6543 21.0779 58.5185 21.4803 57.2214C21.7232 56.2362 21.7381 55.2082 21.524 54.2162C21.3098 53.2245 20.8723 52.2955 20.2452 51.5015C19.7686 50.8477 19.1415 50.3209 18.4179 49.9664C17.6944 49.6116 16.896 49.4399 16.0918 49.4655C15.0232 49.4691 14.8481 49.5438 13.0908 50.5796C11.8697 51.2635 10.9154 52.3461 10.3847 53.6488C9.8541 54.9517 9.7785 56.3979 10.1705 57.7499C10.8257 60.0111 12.3258 61.3325 14.6279 61.6779ZM15.3578 53.0434C15.4544 53.1732 15.5509 53.2953 15.6443 53.4157C15.9261 53.7338 16.1571 54.0941 16.3291 54.484C16.5264 55.0296 16.5679 55.6201 16.4489 56.1885C16.3452 56.466 16.1406 56.6933 15.8765 56.8241C15.5257 57.0526 15.1052 57.1474 14.6912 57.0909C14.4784 57.0334 13.831 56.8578 13.8751 55.5789C13.9225 54.2113 14.3562 53.4589 15.3581 53.0411L15.3578 53.0434Z" />
                    </g>
                    <defs>
                        <clipPath id="clip0_88_3090">
                            <rect width="42.5" height="62" />
                        </clipPath>
                    </defs>
                </svg>
            </h3>
            <div class="flex justify-start items-center text-center md:ml-5 ml-0 md:pl-6 pl-0 pt-5  mb-5 ">
                <i class="fa-solid px-5 py-4 rounded-full dark:bg-[#C318FF] bg-yellow-300 dark:border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="25" viewBox="0 0 24 38"
                        fill="none">
                        <path
                            d="M16.0782 0.305007C16.4582 0.502487 16.7506 0.819945 17.1931 0.952432C17.758 1.12116 17.8943 1.52489 17.7393 2.12107C17.7118 2.22606 17.678 2.33105 17.6368 2.43104C17.3368 3.14847 17.4193 3.80339 17.9155 4.41707C18.0455 4.57831 18.173 4.81328 18.1605 5.00576C18.1155 5.70943 18.468 6.25815 18.7692 6.83559C18.9029 7.09181 18.8879 7.378 18.7529 7.62173C18.4642 8.14418 18.1992 8.69415 17.823 9.14785C17.3193 9.75404 17.0431 10.4452 16.8119 11.1739C16.0182 13.6674 15.4895 16.2221 15.0471 18.7981C14.6484 21.1216 14.7196 23.4576 14.7633 25.7961C14.7646 25.8499 14.7758 25.9036 14.7821 25.9586C14.8346 26.4173 15.1583 26.8398 15.5933 26.8573C17.1593 26.9173 18.6829 27.501 20.2803 27.206C20.774 27.1147 21.2514 27.2972 21.6451 27.6297C22.1013 28.0146 22.5738 28.3871 22.9963 28.8071C23.6787 29.4857 23.7199 30.5331 23.1387 31.3318C23.0137 31.5043 22.8738 31.6693 22.7775 31.8568C22.7063 31.9942 22.6125 32.2042 22.6675 32.3092C22.9738 32.8891 22.7013 33.4903 22.7638 34.079C22.81 34.504 22.7925 34.9352 22.8725 35.3664C22.9638 35.8576 22.74 36.1575 22.2738 36.4C21.9151 36.5863 21.5439 36.6225 21.1652 36.5613C20.5753 36.4663 19.9603 36.4188 19.4104 36.2088C18.488 35.8576 17.4856 35.9201 16.5694 35.5701C16.4369 35.5201 16.2257 35.5426 16.1045 35.6176C15.3433 36.0863 14.4621 36.1788 13.6322 36.4263C13.4272 36.4875 13.2035 36.51 12.9885 36.5063C11.9549 36.4925 10.9375 36.685 9.91135 36.73C9.29766 36.7575 8.73272 36.825 8.21277 37.1812C8.04654 37.2949 7.79531 37.3687 7.60033 37.3412C6.98165 37.2537 6.41545 37.3462 5.87551 37.6599C5.79177 37.7086 5.65303 37.7186 5.56054 37.6861C5.41556 37.6349 5.19683 37.5562 5.17058 37.4487C5.01185 36.82 4.91686 36.1801 4.5444 35.6176C4.43191 35.4489 4.42816 35.2014 4.39941 34.9877C4.22068 33.6366 4.21443 32.2767 4.20818 30.9181C4.20693 30.7581 4.22443 30.5819 4.29067 30.4394C4.37941 30.2482 4.4894 30.0394 4.65064 29.917C4.90686 29.7232 5.19808 29.547 5.5018 29.447C6.43045 29.1408 7.37535 28.8845 8.30901 28.5896C8.74271 28.4533 9.17267 28.5784 9.60388 28.5546C9.78761 28.5446 10.0438 28.3358 10.0663 28.1509C10.1063 27.8284 10.1463 27.5047 10.1488 27.181C10.1576 25.9849 10.1388 24.7875 10.1551 23.5913C10.1713 22.3952 10.2051 21.2003 10.355 20.0092C10.45 19.2555 10.4425 18.4894 10.4825 17.7295C10.5088 17.2295 10.4163 16.7558 10.1938 16.3059L10.2063 16.3196C10.1526 16.4133 10.0701 16.5008 10.0488 16.6021C9.8626 17.5045 9.25641 18.1194 8.62523 18.7218C8.31276 19.0206 7.9678 19.0656 7.58034 18.9118L7.60158 18.9331C7.59533 18.7118 7.58783 18.4894 7.58158 18.2682L7.59283 18.2794C6.9254 18.4744 6.4842 18.9068 6.24547 19.5555C6.09799 19.9567 5.94675 20.3554 5.78927 20.7766C5.23932 20.8766 4.74687 21.0254 4.27817 21.2978C3.84322 21.5516 3.34702 21.5141 2.94831 21.1079C2.76083 20.9166 2.5571 20.7404 2.36087 20.5579C2.15714 20.3842 1.97716 20.1655 1.74594 20.0467C1.32473 19.8292 1.081 19.5368 1.04976 19.0493C1.02476 18.6694 0.869773 18.3244 0.649796 18.0069C0.377324 17.6132 0.41607 17.2195 0.618549 16.7895C0.866024 16.2634 0.861026 15.6347 1.24099 15.1535C1.1535 14.2885 1.5347 13.8423 2.41086 13.7773C2.60209 13.7636 2.80208 13.6049 2.96331 13.4724C3.33577 13.1637 3.69323 12.835 4.04695 12.5037C4.44566 12.1313 4.84437 11.7963 5.4393 11.7651C5.61804 11.7551 5.78552 11.5363 5.958 11.4139L5.9405 11.4264C6.05799 11.3076 6.17673 11.1901 6.29422 11.0714L6.28172 11.0864C6.8904 10.5452 7.49409 9.99776 8.10778 9.46282C8.59773 9.03411 9.07893 8.59165 9.60138 8.20544C10.1326 7.81048 10.5875 7.35551 10.955 6.81056C11.4162 6.12813 11.9711 5.54321 12.6523 5.07451C13.5322 4.46957 14.1422 3.66214 14.4409 2.626C14.5009 2.41852 14.6121 2.2248 14.6671 2.01482C14.7971 1.51362 15.0983 1.15742 15.5183 0.864947C15.7357 0.713712 15.9032 0.487478 16.0932 0.294998L16.0782 0.305007ZM8.56273 12.0576L8.57023 12.065C8.46149 12.175 8.3515 12.285 8.24277 12.395L8.23277 12.385C8.34276 12.2763 8.45399 12.1675 8.56273 12.0576ZM11.1525 9.49281C11.0675 9.57406 10.9362 9.66278 10.8625 9.78652C10.8287 9.84276 10.88 10.0178 10.9387 10.0465C11.01 10.0815 11.1512 10.0478 11.2225 9.99276C11.2987 9.93527 11.3499 9.82276 11.3737 9.72527C11.4049 9.60279 11.3299 9.52406 11.1525 9.49281Z"
                            fill="#2B2B2B" />
                    </svg>
                </i>
                <div class="question ml-5 w-auto">
                    <p class="text-start text-base">Pilih Buku Yang Ingin Dipinjam, </p>
                </div>
            </div>
            <div class="flex justify-start items-center text-center md:ml-5 ml-0 md:pl-6 pl-0 pt-5  mb-5 ">
                <i class="fa-solid px-5 py-4 rounded-full dark:bg-[#C318FF] bg-yellow-300 dark:border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="25" viewBox="0 0 24 38"
                        fill="none">
                        <path
                            d="M11.1796 33.5724C10.8295 33.7162 10.4733 33.8449 10.1358 34.0124C10.0408 34.0599 10.0995 34.1924 10.2258 34.2574C10.3508 34.3224 10.3945 34.4649 10.2895 34.5149C9.94828 34.6774 9.59452 34.8212 9.23326 34.9349C8.14448 35.2787 7.05445 35.6224 5.95567 35.9299C5.1944 36.1425 4.56438 36.52 4.08812 37.1525C4.06187 37.1875 3.99187 37.1888 3.95187 37.2025C3.48186 37.0612 3.02185 36.915 2.55683 36.7837C2.20057 36.6837 2.02932 36.4525 1.96182 36.095C1.89182 35.7237 1.82557 35.3412 1.67556 34.9987C1.2993 34.1412 1.11805 33.2387 0.975548 32.3249C0.900546 31.8424 0.839292 31.3573 0.778041 30.8723C0.674288 30.0523 0.743037 29.2635 1.04054 28.4723C1.3693 27.5997 1.83181 26.801 2.25933 25.9835C2.38183 25.7485 2.59184 25.5584 2.76059 25.3472C3.0331 25.0084 3.34186 24.6922 3.57062 24.3259C3.98063 23.6709 4.42938 23.0684 5.12565 22.6921C5.17315 22.6671 5.21815 22.6321 5.25315 22.5921C5.57316 22.2259 5.83817 21.7821 6.22568 21.5121C6.61569 21.2408 7.13445 21.1583 7.52071 20.8458C7.85697 20.5733 8.22448 20.3208 8.49574 19.9908C8.81075 19.607 9.15825 19.282 9.54951 18.9808C10.4108 18.3158 11.2371 17.607 12.0958 16.9395C13.0084 16.2295 13.8034 15.4307 14.3221 14.3757C14.5609 13.8894 14.8934 13.4494 15.1447 12.9681C15.3597 12.5544 15.3184 12.1256 15.0647 11.7256C14.2684 10.4681 13.2034 9.67678 11.6746 9.43428C10.2083 9.20177 8.86825 9.43178 7.56571 10.0681C6.76319 10.4606 6.13193 11.0368 5.66817 11.8081C5.42691 12.2081 5.32566 12.5956 5.51191 13.0419C5.59441 13.2406 5.69191 13.4556 5.68816 13.6619C5.67691 14.3407 5.80692 14.9494 6.30818 15.4532C6.39818 15.5432 6.37568 15.7595 6.37693 15.9182C6.37943 16.072 6.18193 16.2495 6.05567 16.2295C5.07315 16.077 4.14188 15.8257 3.51186 14.9594C3.38436 14.7844 3.21435 14.6419 3.06685 14.4832C2.56559 13.9419 2.29308 13.3169 2.30558 12.5644C2.32308 11.5331 2.19933 10.4981 2.40558 9.47053C2.49309 9.03302 2.41058 8.59801 2.22933 8.19425C1.96432 7.60924 2.02182 7.03423 2.20808 6.44546C2.35433 5.98295 2.54559 5.53169 2.42058 5.01418C2.37433 4.82293 2.44058 4.57167 2.53433 4.38791C2.75434 3.95415 2.96935 3.50039 3.27936 3.13288C3.87812 2.42286 4.60814 1.84908 5.42941 1.40282C5.86567 1.16532 6.26318 1.21783 6.61444 1.57659C6.39443 1.68285 6.17568 1.7891 5.95567 1.89536C5.84317 2.00661 5.73191 2.11785 5.61941 2.22911C5.51066 2.33786 5.40191 2.44659 5.29316 2.55535C5.07565 2.6616 4.8569 2.76786 4.63939 2.87286L4.63439 2.86786C4.84939 2.76035 5.0644 2.65162 5.28066 2.54412C5.38941 2.43536 5.49816 2.32535 5.60691 2.21659C5.71817 2.10409 5.82942 1.99285 5.94067 1.88159C6.19568 1.84784 6.41693 1.74533 6.59694 1.55908C7.25695 1.44907 7.91823 1.34033 8.57824 1.23033C8.54699 1.27408 8.50824 1.31409 8.48824 1.36159C8.44949 1.45409 8.38074 1.56535 8.40449 1.6441C8.42324 1.70535 8.57074 1.7766 8.64699 1.7641C9.01325 1.70285 9.37451 1.61158 9.73702 1.53408C10.0795 1.46033 10.457 1.61658 10.8058 1.37157C10.042 1.19532 9.29576 1.25032 8.55449 1.24657C8.80575 1.15282 9.05075 1.02282 9.30951 0.972818C10.7095 0.709061 12.1233 0.774053 13.5184 0.962808C14.8484 1.14281 15.9984 1.74284 16.7859 2.87787C17.4935 3.89789 18.271 4.87916 18.6672 6.08794C18.801 6.49545 19.0298 6.87422 19.2373 7.25298C19.7398 8.173 20.046 9.14178 20.0448 10.1981C20.0448 10.3606 20.0285 10.5293 20.0648 10.6843C20.426 12.2281 20.0523 13.7081 19.6035 15.1557C19.266 16.2457 19.011 17.3483 18.7672 18.4583C18.686 18.8283 18.5997 19.197 18.4972 19.5608C18.2885 20.3071 17.906 20.9296 17.3247 21.4696C16.6534 22.0921 15.9172 22.6646 15.4134 23.4534L15.4284 23.4409C15.3109 23.5584 15.1934 23.6759 15.0759 23.7934L15.1009 23.7684C14.9834 23.8859 14.8659 24.0021 14.7497 24.1196L14.7584 24.1084C14.5396 24.3284 14.3221 24.5497 14.1034 24.7697L14.1159 24.7584C13.4596 24.9209 12.9346 25.3034 12.4808 25.7809C12.3858 25.8809 12.3358 26.0922 12.3683 26.226C12.4021 26.3585 12.5508 26.531 12.6771 26.561C13.3234 26.711 13.9809 26.7422 14.5759 26.3847C15.0347 26.1085 15.4997 26.106 15.9922 26.2247C16.2572 26.2885 16.5197 26.3597 16.7872 26.4072C16.9447 26.4347 17.1222 26.4635 17.2672 26.4172C18.3985 26.0572 19.5335 26.4297 20.6648 26.391C20.9323 26.3822 21.1811 26.5272 21.3998 26.7072C21.7348 26.9822 22.0873 27.2372 22.4298 27.5047C22.7824 27.781 23.0224 28.1323 23.1549 28.5648C23.2861 28.9923 23.2986 29.4173 23.2136 29.8536C23.1224 30.3236 23.2999 30.8373 22.9249 31.2623C22.6623 31.5611 22.6236 31.9511 22.6123 32.3386C22.5948 32.9324 22.6411 33.5312 22.3061 34.0812C22.1511 34.3362 22.3448 34.5974 22.4511 34.8462C22.5723 35.1312 22.4586 35.3712 22.2661 35.5862C22.0398 35.8399 21.7473 35.9874 21.4248 36.0537C21.2786 36.0837 21.0723 36.0762 20.9661 35.9937C20.5735 35.6862 20.1848 35.4349 19.6535 35.4049C19.4073 35.3912 19.1335 35.2312 18.9385 35.0624C18.5935 34.7637 18.2097 34.6224 17.7697 34.5387C16.6972 34.3349 15.6284 34.1649 14.5296 34.2462C14.0984 34.2774 13.6609 34.2199 13.2271 34.1962C13.1834 34.1937 13.1184 34.1487 13.1071 34.1099C13.0746 34.0049 13.1384 33.9299 13.2696 33.8986C13.4096 33.8649 13.4571 33.7962 13.3896 33.6412C12.6583 33.6099 11.9033 33.5586 11.1458 33.5974C12.1146 33.1224 13.1396 32.9111 14.2184 32.9124C14.5284 32.9124 14.8409 32.8461 15.1472 32.7874C15.1797 32.7811 15.2247 32.5861 15.1884 32.5199C14.9534 32.0974 14.4646 32.1286 14.0971 31.9411L14.1121 31.9549C14.5971 31.6749 14.9822 31.3211 15.0359 30.7173C15.0484 30.5748 14.8646 30.4123 14.7059 30.4411C14.5996 30.4598 14.4834 30.4548 14.3884 30.4973C13.8721 30.7273 13.1309 30.8586 12.6183 30.7861C12.2858 30.7386 11.9683 30.7886 11.6571 30.8986C10.4283 31.3323 9.1995 31.7661 7.97197 32.2011C7.92197 32.2186 7.86572 32.2461 7.83572 32.2874C7.74322 32.4136 7.60696 32.5411 7.58946 32.6811C7.56321 32.8886 7.60196 33.1124 7.65197 33.3199C7.71572 33.5837 7.99823 33.7861 8.25698 33.7799C8.47324 33.7749 8.69575 33.7824 8.90575 33.7362C9.65702 33.5624 10.4158 33.5462 11.1796 33.5724ZM11.3371 4.26917C11.0483 4.32917 10.5245 4.43667 10.002 4.55042C9.96077 4.55917 9.92952 4.61665 9.89327 4.65165C9.93202 4.6879 9.96577 4.74417 10.0095 4.75542C11.1571 5.03667 12.3296 5.13294 13.5046 5.20794C13.5259 5.20919 13.5709 5.13668 13.5709 5.09917C13.5696 5.05292 13.5446 4.99416 13.5096 4.96416C12.9596 4.4804 12.3008 4.29542 11.3371 4.26917ZM9.35826 6.32421C9.47326 6.32921 9.53701 6.2742 9.52076 6.16045C9.51576 6.1292 9.43201 6.07546 9.42076 6.08296C9.35701 6.12922 9.30451 6.19044 9.24826 6.2467C9.28451 6.27295 9.32201 6.29796 9.35826 6.32421ZM17.4797 31.7674L17.576 31.8224L17.5922 31.7423L17.4797 31.7674Z"
                            fill="#2B2B2B" />
                        <path
                            d="M15.0847 24.1059C14.9759 24.1047 14.8659 24.1047 14.7571 24.1034L14.7484 24.1147C14.8659 24.1147 14.9834 24.1147 15.0997 24.1159L15.0847 24.1059Z"
                            fill="#2B2B2B" />
                        <path
                            d="M15.4134 23.7822C15.3034 23.8909 15.1947 23.9984 15.0847 24.1072L15.0997 24.1172C15.0997 23.9997 15.0997 23.8822 15.0997 23.7659L15.0747 23.7909C15.1922 23.7909 15.3084 23.7909 15.4259 23.7909L15.4134 23.7822Z"
                            fill="#2B2B2B" />
                        <path
                            d="M15.4122 23.4484C15.4122 23.5597 15.4134 23.6709 15.4134 23.7822L15.4259 23.7897C15.4259 23.6722 15.4259 23.5546 15.4259 23.4371C15.4272 23.4359 15.4122 23.4484 15.4122 23.4484Z"
                            fill="#2B2B2B" />
                        <path
                            d="M9.112 32.4499C9.1945 32.4124 9.27576 32.3449 9.35701 32.3449C9.43951 32.3449 9.52326 32.4099 9.60701 32.4461C9.52451 32.4849 9.44201 32.5524 9.35951 32.5536C9.27826 32.5536 9.1945 32.4874 9.112 32.4499Z"
                            fill="#2B2B2B" />
                        <path
                            d="M13.2184 31.9149C13.2009 31.9524 13.1896 32.0112 13.1621 32.0212C13.1346 32.0312 13.0884 31.9924 13.0509 31.9736C13.0684 31.9361 13.0784 31.8761 13.1059 31.8661C13.1359 31.8574 13.1809 31.8974 13.2184 31.9149Z"
                            fill="#2B2B2B" />
                        <path
                            d="M14.0984 31.9336C14.0884 31.9836 14.0771 32.0336 14.0671 32.0849C14.0821 32.0386 14.0984 31.9936 14.1134 31.9474C14.1134 31.9461 14.0984 31.9336 14.0984 31.9336Z"
                            fill="#2B2B2B" />
                    </svg>
                </i>
                <div class="question ml-5 w-auto">
                    <p class="text-start text-base ">Tekan Menu “Pinjam Buku” Pada Halaman Detail Buku,</p>
                </div>
            </div>
            <div class="flex justify-start items-center text-center md:ml-5 ml-0 md:pl-6 pl-0 pt-5 mb-5">
                <i class="fa-solid px-5 py-4 rounded-full dark:bg-[#C318FF] bg-yellow-300 dark:border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="25" viewBox="0 0 26 38"
                        fill="none">
                        <path
                            d="M14.7395 18.3536C13.7607 17.8211 12.7244 17.9648 11.7081 18.1523C11.0731 18.2698 10.4306 18.4436 9.97057 18.9799C9.87557 19.0899 9.69556 19.1549 9.54306 19.1849C8.77428 19.3324 8.25176 19.8599 7.95425 20.4862C7.47424 21.495 6.81797 22.3325 6.01294 23.08C5.82793 23.2513 5.77793 23.5538 5.54917 23.6725C5.0729 23.395 4.8779 22.845 4.32288 22.8025C3.87161 22.4487 3.5841 21.975 3.5541 21.4162C3.47535 19.9511 3.34785 18.4773 3.83161 17.046C3.90037 16.2198 4.39288 15.631 4.9879 15.1435C6.67796 13.7572 8.01426 12.0234 9.58306 10.5196C9.78932 10.3221 9.90682 10.067 9.84181 9.78079C9.74056 9.32827 10.0093 9.21078 10.3606 9.13953C10.3968 9.13203 10.4231 9.07202 10.4543 9.03576C10.3643 8.99701 10.2756 8.92452 10.1868 8.92452C9.04304 8.92577 7.89925 8.93077 6.75671 8.94952C6.27669 8.95702 5.75668 8.87953 5.44042 9.39579C5.41667 9.43454 5.34916 9.46452 5.29916 9.46827C4.48913 9.53328 3.6866 9.73079 2.86658 9.59703C2.48531 9.53578 2.07905 9.46078 1.83029 9.16452C1.39653 8.64701 0.855256 8.31449 0.208984 8.12698C0.208984 7.72822 0.195237 7.40945 0.212738 7.09194C0.230239 6.76568 0.260239 6.44942 0.157736 6.12316C0.0577324 5.8044 0.247737 5.61814 0.546497 5.53189C0.732754 5.47814 0.77901 5.38314 0.707758 5.18938C0.540252 4.73186 0.390241 4.26686 0.248987 3.79935C0.202735 3.64684 0.170236 3.47183 0.196487 3.31807C0.303991 2.6793 0.432742 2.04427 0.560246 1.408C0.630248 1.05424 0.869011 0.851732 1.19027 0.720477C1.71904 0.50422 2.24156 0.460465 2.75782 0.747975C3.48535 1.15174 4.27413 1.33302 5.09415 1.42677C5.52542 1.47552 5.95919 1.55051 6.3792 1.66176C7.28423 1.90302 8.21551 1.86428 9.13304 1.95804C9.24055 1.96929 9.3643 1.98553 9.45681 1.94553C10.2843 1.58426 11.1731 1.74301 12.0269 1.62551C12.6132 1.54425 13.1719 1.26299 13.7582 1.18674C14.3445 1.11049 14.9732 1.288 15.5395 1.15924C16.4908 0.942986 17.4921 0.968004 18.4071 0.55174C18.6321 0.449236 18.9459 0.477963 19.2046 0.526715C19.5221 0.585467 19.8359 0.701723 20.1284 0.841728C20.4359 0.989233 20.6484 1.24674 20.6172 1.618C20.5972 1.85176 20.6234 2.06929 20.8159 2.20304C21.221 2.48555 21.346 2.86804 21.3035 3.33681C21.2885 3.49806 21.296 3.66559 21.321 3.82559C21.366 4.1256 21.2797 4.35812 21.0185 4.51812C20.2872 4.96564 20.0247 5.65939 20.1009 6.46317C20.1634 7.11569 19.9397 7.75822 20.0997 8.41074C20.1334 8.54575 20.0472 8.73825 19.9634 8.8695C19.5547 9.50827 19.1809 10.1671 18.5196 10.6133C17.7358 11.1421 17.9183 11.5871 18.4896 12.2184C18.5984 12.3384 18.7334 12.4371 18.8684 12.5271C20.0534 13.3197 21.0384 14.3397 22.0547 15.3247C22.2497 15.5135 22.4197 15.7348 22.6348 15.8973C23.1323 16.271 23.4323 16.7785 23.6923 17.3248C23.9723 17.9123 24.2111 18.5198 24.6223 19.0436C24.7823 19.2461 24.8548 19.5336 24.9161 19.7949C25.0398 20.3237 25.1461 20.8587 25.2274 21.3962C25.2936 21.8325 25.3749 22.2425 25.6611 22.605C25.7861 22.7625 25.8524 23.0038 25.8599 23.21C25.9149 24.6388 25.7286 26.0101 25.1161 27.3414C24.2236 29.2802 23.1798 31.1228 21.886 32.8128C20.7884 34.2466 19.4522 35.4517 17.9896 36.5092C17.8233 36.6292 17.5846 36.7267 17.3871 36.7142C16.2133 36.638 15.1207 36.998 14.032 37.333C12.8607 37.693 11.7781 37.5005 10.7181 36.978C10.5718 36.9055 10.4281 36.8255 10.2943 36.733C9.96933 36.5055 9.61556 36.4167 9.21804 36.4305C8.43427 36.458 7.72049 36.2417 7.06047 35.8042C6.6092 35.5054 6.10919 35.3054 5.58417 35.1329C5.0704 34.9642 4.64164 34.9454 4.19537 35.2392C4.15412 35.2667 4.08912 35.2804 4.04037 35.2717C3.93786 35.2517 3.82036 35.2379 3.74161 35.1779C3.60285 35.0717 3.55285 34.9029 3.65161 34.7529C3.77286 34.5666 3.90287 34.3916 3.78536 34.1641C3.5266 33.6616 3.4666 33.1366 3.53285 32.5791C3.5716 32.2566 3.5766 31.924 3.55285 31.6003C3.47785 30.5865 3.83411 29.6715 4.17162 28.7514C4.26537 28.4977 4.7679 28.3277 5.02041 28.4627C5.35542 28.6414 5.67917 28.8402 6.00793 29.0289C6.29794 29.604 6.90296 29.979 7.02922 30.6665C7.06547 30.8653 7.19548 31.0753 7.34048 31.2203C7.61799 31.499 7.82425 31.8003 7.90925 32.1878C8.01176 32.6578 8.33302 32.9253 8.76053 33.1016C9.06179 33.2253 9.3543 33.3729 9.64806 33.5179C10.3018 33.8391 10.9731 33.9854 11.7031 33.8041C12.0169 33.7266 12.3494 33.7104 12.6744 33.6879C14.0782 33.5879 15.307 33.0328 16.432 32.2291C17.5958 31.3978 18.5296 30.3352 19.3309 29.1602C19.7597 28.5327 20.1384 27.8702 20.5334 27.2189C20.6747 26.9864 20.7822 26.7326 20.9284 26.5039C21.4735 25.6488 21.4985 24.7813 21.0672 23.8675C20.7159 23.1238 20.3397 22.4087 19.7334 21.8325C19.1809 21.3074 18.6621 20.7462 18.1033 20.2287C17.1333 19.3299 16.062 18.5986 14.727 18.3448L14.7395 18.3536ZM19.2984 19.0074C19.1859 18.6861 18.9834 18.4573 18.6484 18.3586L18.6634 18.3436C18.8784 18.5611 19.0946 18.7786 19.3096 18.9961L19.2984 19.0074ZM7.878 35.0104C8.31177 35.5842 8.86553 35.9479 9.60056 35.9779C9.68806 35.9817 9.77931 35.8929 9.86807 35.8467C9.84307 35.8017 9.82807 35.7304 9.79057 35.7167C9.15054 35.4817 8.50677 35.2529 7.86425 35.0229L7.878 35.0104ZM4.56913 6.19317C4.83789 6.25442 5.09916 6.31817 5.36292 6.37317C5.62792 6.42942 5.89793 6.46442 6.16044 6.53067C6.3917 6.58943 6.68421 6.48693 6.84797 6.76069C6.79547 6.79569 6.75546 6.84194 6.70921 6.84819C6.49545 6.87944 6.27795 6.89071 6.06419 6.92821C5.90668 6.95571 5.75167 7.00694 5.60042 7.06194C5.55667 7.07819 5.51042 7.13944 5.50292 7.18695C5.48167 7.31695 5.54917 7.40697 5.67917 7.41947C7.96425 7.65198 10.2181 7.31196 12.4757 7.04446C12.6269 7.02695 12.7682 6.91446 12.9069 6.83321C12.9382 6.81445 12.9532 6.73819 12.9469 6.69319C12.9407 6.65068 12.9019 6.58319 12.8682 6.57819C12.0081 6.43444 11.1431 6.58818 10.2818 6.53568C10.1593 6.52818 9.97682 6.60317 9.92432 6.34066C10.5106 6.25191 11.0931 6.15693 11.6769 6.07943C12.3207 5.99442 12.9682 5.93191 13.6132 5.8469C13.7707 5.82565 13.922 5.75441 14.0745 5.70441C14.232 5.65316 14.3982 5.40191 14.317 5.33566C14.242 5.2744 14.142 5.19314 14.0582 5.19939C13.4107 5.24814 12.7632 5.37063 12.1156 5.24938C11.4219 5.11938 10.7343 4.98939 10.0293 5.17565C9.92932 5.2019 9.79932 5.20564 9.70807 5.16439C8.83054 4.76437 7.94175 4.78438 7.02547 5.01314C6.77796 5.07439 6.4892 4.97688 6.21919 4.95063C6.00418 4.92938 5.78918 4.89188 5.57417 4.88813C5.33541 4.88438 5.11915 5.01314 5.08665 5.2369C5.03165 5.62566 4.68039 5.82816 4.56913 6.19317ZM8.13176 2.8718C8.78303 3.17556 9.38805 3.31558 10.0443 3.23308C10.1818 3.21557 10.2556 3.15556 10.2293 3.03055C10.2206 2.9893 10.1581 2.93432 10.1143 2.92932C9.57806 2.85807 9.04179 2.78806 8.50302 2.73556C8.41177 2.72556 8.31301 2.80179 8.13176 2.8718ZM7.853 7.96822C7.753 7.98072 7.65049 7.98573 7.55299 8.01074C7.51298 8.02074 7.44924 8.09324 7.45549 8.10199C7.50174 8.18074 7.54674 8.28324 7.62049 8.31699C7.81175 8.40699 8.01551 8.38825 8.20551 8.29325C8.24676 8.27325 8.29176 8.22948 8.30551 8.18698C8.33926 8.07823 8.28176 8.00575 8.15551 7.99075C8.0555 7.97825 7.95425 7.97447 7.853 7.96822ZM13.7932 17.151C13.5694 16.891 13.3057 16.7973 12.9857 16.9385C12.9494 16.9548 12.9182 17.016 12.9119 17.0598C12.9069 17.101 12.9257 17.176 12.9544 17.1885C13.2357 17.3123 13.5182 17.3335 13.7932 17.151ZM11.4819 36.423C11.3006 36.443 11.2919 36.4855 11.4606 36.533C11.5006 36.5442 11.5531 36.5067 11.5994 36.4917C11.5606 36.4705 11.5219 36.4467 11.4819 36.423Z"
                            fill="#2B2B2B" />
                        <path
                            d="M6.79422 5.35939C7.00922 5.19064 7.24923 5.20812 7.49048 5.30812C7.52799 5.32312 7.56674 5.38314 7.56924 5.42314C7.57174 5.4619 7.53549 5.52814 7.50174 5.54064C7.26173 5.63064 7.01797 5.66816 6.79671 5.49065C6.77546 5.4744 6.79422 5.40939 6.79422 5.35939Z"
                            fill="#2B2B2B" />
                    </svg>
                </i>
                <div class="question ml-5 w-auto">
                    <p class="text-start text-base ">Ambil Buku di Perpustakaan SMKN 65,</p>
                </div>
            </div>
            <div class="flex justify-start items-center text-center md:ml-5 ml-0 md:pl-6 pl-0 pt-5  mb-5 ">
                <i class="fa-solid px-5 py-4 rounded-full dark:bg-[#C318FF] bg-yellow-300 dark:border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="25" viewBox="0 0 24 38"
                        fill="none">
                        <path
                            d="M23.4335 11.7325C23.4947 12.335 23.4722 12.9238 23.2435 13.4988C22.9235 14.3063 22.6285 15.1238 22.3035 15.93C22.2222 16.1325 22.0647 16.3013 21.7935 16.1738C21.746 16.1513 21.6885 16.1337 21.6397 16.1387C21.5922 16.1437 21.5197 16.17 21.5047 16.2063C21.2997 16.6888 20.6785 16.7638 20.4772 17.225C20.2835 17.67 20.1572 18.1463 20.006 18.61C19.8885 18.9725 19.7747 19.335 19.6697 19.7013C19.591 19.9725 19.656 20.1475 20.0197 20.3275C20.4235 20.5275 20.5847 20.7925 20.4897 21.2375C20.4335 21.5038 20.3947 21.7638 20.2472 22.0063C20.1085 22.2363 20.0035 22.4913 19.9185 22.7475C19.806 23.0875 19.5897 23.3038 19.251 23.3963C18.8472 23.505 18.6072 23.7925 18.441 24.1463C18.2085 24.6388 17.9735 25.1213 17.5897 25.5263C17.4085 25.7175 17.2735 25.97 17.1672 26.2163C16.7597 27.1663 16.396 28.13 16.1685 29.145C16.0235 29.7913 15.8972 30.4163 16.0847 31.0738C16.1422 31.2763 16.1585 31.515 16.1135 31.7188C15.9635 32.3975 16.1447 33.0013 16.4222 33.6113C16.5535 33.9 16.6085 34.235 16.641 34.5563C16.7547 35.64 16.836 35.7175 15.6535 36.3113C15.216 36.5313 14.786 36.725 14.4035 37.05C14.0172 37.3788 13.3872 37.2175 13.121 36.7888C12.3135 35.4838 11.6847 34.1088 11.4122 32.5838C11.3435 32.1963 11.3385 31.83 11.4847 31.465C11.566 31.2625 11.6535 31.0638 11.731 30.8613C11.911 30.3938 11.991 29.9125 11.8285 29.425C11.681 28.985 11.741 28.5638 11.916 28.1538C12.1722 27.5538 12.4372 26.9575 12.7097 26.365C12.961 25.8175 13.1635 25.28 13.0997 24.6438C13.0522 24.17 13.1722 23.68 13.2072 23.1963C13.2185 23.0425 12.996 22.8563 12.8735 22.9075C11.9722 23.28 11.0147 23.5063 10.1547 23.9925C9.77973 24.2038 9.34847 24.3138 8.94722 24.48C8.59722 24.625 8.23222 24.7513 7.91097 24.9463C6.94972 25.5288 5.93347 25.82 4.80347 25.6988C4.59472 25.6763 4.37471 25.7525 4.15971 25.7838L4.17096 25.7963C3.82846 25.6425 3.45472 25.5338 3.15222 25.3225C2.77847 25.0625 2.75847 24.5725 2.58722 24.1838C2.19847 23.2975 1.93971 22.3575 1.42346 21.5238C1.28721 21.3038 1.21221 21.02 1.19346 20.7588C1.15471 20.2063 0.97721 19.7175 0.70846 19.2388C0.48721 18.8438 0.480954 18.4138 0.687204 17.9963C0.878455 17.61 1.0647 17.2213 1.2647 16.84C1.33845 16.7 1.42596 16.4975 1.54846 16.4625C2.18346 16.2788 2.23721 15.6825 2.46971 15.2225C2.83471 14.5025 3.17096 13.77 3.52096 13.0413L3.50221 13.06C4.24596 12.6338 4.70471 11.9675 5.01471 11.1963C5.70221 9.48252 6.50972 7.81625 6.99722 6.02375C7.12472 5.555 7.33346 5.10625 7.51721 4.65375C8.02971 3.39625 8.54847 2.14251 9.06722 0.887512C9.08597 0.842512 9.13847 0.811244 9.17597 0.774994C9.56722 0.907494 10.0047 0.896244 10.306 1.27499C10.5522 1.58374 10.9397 1.6675 11.3247 1.72C11.5897 1.75625 11.8572 1.80376 12.1135 1.88001C12.431 1.97376 12.7085 2.13751 12.8797 2.44501C12.9847 2.63501 13.1135 2.81125 13.2235 2.99875C13.4597 3.4025 13.4835 3.8175 13.2772 4.24375C13.111 4.58625 12.9697 4.94125 12.7835 5.2725C12.4297 5.905 12.406 6.63 12.1897 7.30125C11.9735 7.97375 11.4722 8.52376 11.3747 9.24751C11.2997 9.80126 11.0735 10.2763 10.6472 10.6663C10.2785 11.0038 10.1347 11.4875 9.94847 11.9263C9.99847 12.035 10.0347 12.135 10.0872 12.225C10.3685 12.7125 10.356 13.105 9.87722 13.3025C9.30972 13.5363 9.37972 13.9325 9.37847 14.36L9.39472 14.3438C8.97097 14.635 8.73097 15.045 8.60347 15.535C8.52097 15.8538 8.78222 16.2175 9.11722 16.2113C9.44222 16.2038 9.77222 16.205 10.0885 16.145C11.4735 15.8838 12.856 15.6138 14.2685 15.5438C14.4297 15.5363 14.5885 15.4838 14.751 15.47C15.5697 15.3988 16.216 15.1288 16.4035 14.2075C16.4547 13.955 16.6497 13.7288 16.7897 13.4963C17.0447 13.0763 17.2185 12.6263 17.3797 12.1625C17.7535 11.0875 18.1697 10.0275 18.5697 8.9625C18.7797 8.40375 18.9822 7.84376 19.2022 7.28876C19.4222 6.73501 19.6435 6.18124 19.8997 5.64374C19.951 5.53624 20.1835 5.42374 20.2985 5.45249C20.661 5.54374 21.0072 5.69875 21.3572 5.83375C21.5697 5.91625 21.6035 6.13125 21.4735 6.52375L21.4897 6.50751C21.526 6.77626 21.5447 7.0275 21.9447 6.995C22.5222 6.9475 22.706 7.39001 22.6735 7.81376C22.6485 8.13251 22.561 8.44499 22.5372 8.76374C22.5185 9.02624 22.4922 9.31375 22.5772 9.5525C22.7485 10.035 22.6872 10.4938 22.5822 10.9675C22.5235 11.2313 22.7047 11.3087 22.9285 11.39C23.1197 11.4587 23.2747 11.6263 23.446 11.7513L23.4335 11.7325ZM5.14221 14.0288C5.15721 13.9863 5.17221 13.9438 5.18721 13.9C5.17721 13.9475 5.16721 13.9938 5.15596 14.0413C5.04721 14.2588 4.93846 14.4775 4.82971 14.695C4.43721 14.8163 4.17222 15.0725 4.05722 15.465C4.02972 15.5588 4.04346 15.6975 4.09846 15.7725C4.14471 15.8363 4.31596 15.8913 4.36471 15.8563C4.76471 15.5663 4.75221 15.1075 4.81221 14.68C4.92221 14.4625 5.03221 14.2463 5.14221 14.0288ZM7.42847 7.81876C7.44222 7.77376 7.45721 7.72875 7.47096 7.6825C7.46221 7.7325 7.45347 7.7825 7.44347 7.8325C7.31722 7.90625 7.18847 7.975 7.06847 8.0575C7.03722 8.07875 7.02472 8.14751 7.02722 8.19251C7.02847 8.23626 7.04972 8.29376 7.08221 8.31751C7.17346 8.38501 7.26971 8.36001 7.31221 8.24751C7.36346 8.11001 7.39097 7.96251 7.42847 7.81876ZM6.44597 14.0263C6.46347 13.9825 6.47972 13.9388 6.49722 13.895C6.48597 13.9438 6.47472 13.9925 6.46347 14.0413C5.95097 14.5575 5.79846 15.2325 5.64596 15.9075C5.63846 15.9425 5.68346 16.01 5.71971 16.0275C5.75096 16.0413 5.83096 16.0175 5.84596 15.9875C6.16846 15.3713 6.40597 14.7288 6.44597 14.0263ZM6.44472 10.7575C6.47347 10.7275 6.50972 10.7025 6.52972 10.6675C6.54472 10.6425 6.53972 10.6063 6.54347 10.575C6.51722 10.6413 6.49097 10.7075 6.46472 10.7738C5.88722 11.115 5.62097 11.695 5.33722 12.2588C5.27472 12.3825 5.40221 12.65 5.51971 12.6325C5.61596 12.6175 5.74097 12.5862 5.79097 12.5175C6.16597 11.9912 6.35972 11.3938 6.44472 10.7575ZM10.0622 20.9013C9.95721 20.9088 9.84972 20.91 9.74597 20.9263C9.71097 20.9325 9.68097 20.9775 9.64972 21.005C9.82097 21.0925 9.92472 20.9513 10.051 20.8875C10.3697 20.9063 10.691 20.9125 11.0072 20.955C11.0772 20.9638 11.1797 21.105 11.1772 21.1838C11.1735 21.34 11.0885 21.4938 11.0772 21.6513C11.0722 21.735 11.1435 21.8325 11.1997 21.9088C11.2172 21.9325 11.311 21.9288 11.3497 21.9038C12.1585 21.3813 12.966 20.8575 13.766 20.3238C13.8472 20.27 13.8897 20.1538 13.9435 20.0613C14.1147 19.7638 13.9022 19.355 13.5722 19.34C13.466 19.335 13.3535 19.305 13.2522 19.3288C12.3147 19.5425 11.351 19.6513 10.416 20.0113C10.2985 20.3075 10.181 20.605 10.0622 20.9013Z"
                            fill="#2B2B2B" />
                        <path d="M3.52347 13.0375L3.50471 13.0563C3.50346 13.0563 3.52347 13.0375 3.52347 13.0375Z"
                            fill="#2B2B2B" />
                    </svg>
                </i>
                <div class="question ml-5 w-auto">
                    <p class="text-start text-base ">Waktu Peminjaman 7 Hari & Bisa Diperpanjang Sebanyak 2x.</p>
                </div>
            </div>
        </div>

    </div>
    {{-- </div> --}}
    <div class="about dark:bg-blue-800 flex flex-wrap justify-center items-center">
        <p class="text-start text-5xl flex items-center font-[600] dark:text-white">
            About Us
            <svg
                class="pl-3 fill-svg dark:fill-svg-dark" xmlns="http://www.w3.org/2000/svg" width="60"
                height="80" viewBox="0 0 78 70" fill="none">
                <g clip-path="url(#clip0_91_3179)">
                    <path
                        d="M42.5332 0.307068C50.7297 0.476395 56.7635 3.99239 60.4527 11.1499C62.4161 14.9585 64.2288 18.8411 66.1973 22.6471C66.9967 24.1812 67.9179 25.652 68.9526 27.046C70.5189 29.1667 69.5277 32.2646 66.9296 32.8303C65.3591 33.1466 63.7707 33.3712 62.1727 33.5026C58.5976 33.8501 55.0167 34.1414 51.438 34.4554C51.3291 34.4762 51.2179 34.4838 51.1071 34.4781C48.9865 34.1332 47.1524 34.9852 45.226 35.658C42.2882 36.6538 39.1568 36.9871 36.068 36.6323C32.3078 36.2573 28.7963 35.3055 25.5602 33.3743C25.0837 33.09 24.4069 33.1042 23.8163 33.0249C20.7433 32.6143 17.7676 33.3857 14.7553 33.7335C13.7638 33.8403 12.7659 33.8795 11.7688 33.8514C9.78402 33.8097 8.37788 31.8269 9.51501 30.0604C12.1808 25.9191 13.6927 21.2446 15.9446 16.9131C18.5812 11.8412 22.2847 7.6902 27.2286 4.63725C30.62 2.55829 34.4356 1.22507 38.41 0.730645C39.7779 0.549629 41.1582 0.446068 42.5332 0.307068ZM23.6999 19.2357C22.8895 23.7908 25.944 28.8776 30.5499 30.5228C33.4181 31.5394 36.4703 31.9701 39.5167 31.7886C44.3738 31.5299 47.9728 29.1643 50.557 25.2613C51.4821 23.8378 51.9706 22.1862 51.9644 20.5012C46.707 18.7953 41.9951 16.5549 39.7322 10.9118C35.6881 16.4487 29.8423 18.1556 23.6999 19.2357Z" />
                    <path
                        d="M48.2474 69.2439C41.0956 69.2439 33.9435 69.2104 26.792 69.2549C21.0324 69.2906 15.2735 69.4492 9.51462 69.4906C8.02035 69.4839 6.52869 69.3677 5.05231 69.1431C1.63444 68.6616 0.262623 66.6913 1.39554 63.5123C2.17273 61.379 3.18858 59.335 4.42472 57.4181C9.62866 49.2569 17.1964 43.9111 26.2866 40.5135C30.8346 38.7747 35.6466 37.7828 40.5277 37.5774C46.7774 37.3465 52.7849 38.0854 58.3577 41.0543C63.3104 43.6931 67.3076 47.3545 70.6295 51.7769C73.0071 54.943 74.6464 58.4878 76.3151 62.0149C76.7057 62.9683 76.9459 63.9739 77.0282 64.9974C77.3112 67.217 76.1271 68.6676 73.8409 68.8995C72.1365 69.0726 70.4194 69.2063 68.7072 69.2154C61.8884 69.2505 55.0692 69.2296 48.25 69.2296L48.2474 69.2439ZM5.02414 64.7649C5.19737 64.8382 5.37484 64.9014 5.55572 64.9541C7.53305 65.3869 9.50652 65.1206 11.4997 65.0119C15.5335 64.7908 19.5776 64.6907 23.6185 64.6704C36.9789 64.6031 50.3398 64.6076 63.7001 64.5491C66.1338 64.5387 68.5669 64.3643 70.9997 64.2503C71.1864 64.2136 71.3653 64.1467 71.5296 64.0525C71.553 63.8516 71.6058 63.7319 71.5718 63.6437C69.3004 57.7362 66.0502 52.4568 61.055 48.3389C58.1512 45.9452 54.9479 44.0163 51.203 43.1337C45.5738 41.8255 39.7141 41.7762 34.0628 42.9893C23.8318 45.1059 15.3004 49.986 8.94956 58.2114C7.39039 60.23 5.9363 62.3283 5.02414 64.763V64.7649Z" />
                </g>
                <defs>
                    <clipPath id="clip0_91_3179">
                        <rect width="76.5" height="69.5" fill="white" transform="translate(0.75 0.25)" />
                    </clipPath>
                </defs>
            </svg>
        </p>
    </div>
    <div class="container-popular dark:bg-blue-800 pt-10 pb-10 flex justify-evenly items-start h-100">


        <div
            class="mx-auto bg-white dark:bg-[#2B2B2B] dark:text-white w-5/6 p-7 grid lg:grid-cols-2 grid-cols-1 items-center shadow-md rounded-xl gap-10 mb-10">
            <img src="{{ asset('tema/img/Img.png') }}" alt="" class="w-full">
            <div class="sm:text-[20px] text-[16px]">Perpustakaan 65 sejatinya adalah perpustakaan yang didirikan di SMKN 65 Jakarta
                untuk para siswa yang gemar, ingin dan butuh membaca buku. Kemudahan yang kami tawarkan berupa layanan
                daring yang secara jelas bisa diakses dimana saja, kapan saja dan oleh siapa saja.
                Sebagai perpustakaan, tentu kami mengoleksi dan menyimpan banyak buku dengan beragam jenis antara fiksi
                dan non fiksi. Sebut saja seperti novel, komik, ensiklopedia, kamus, buku sejarah, majalah, biografi,
                atlas, cerpen, antologi, karya ilmiah dan bahkan kitab suci. Yap, semua buku yang disebutkan bisa kamu
                pinjam dan baca dengan mudahnya akses pinjam buku online yang kami tawarkan ini. Kamu bisa mulai
                menjelajah halaman ini untuk mencari buku yang ingin kamu baca!</div>
        </div>

    </div>

    <footer class="bg-[#404040] shadow dark:bg-white  ">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://smkn65-jkt.sch.id/home/" class="flex items-center mb-4 sm:mb-0 text-white">
                    <img src="tema/img/65.png" class="h-8 mr-3 ml-3" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-black">Perpustakaan
                        65</span>
                </a>
                <span class="block text-sm text-white sm:text-center dark:text-black">© 2023 <a
                        href="https://flowbite.com/" class="hover:underline"> PWPB’s 6th Group.</a>All Rights
                    Reserved.</span>
                <ul class="text-white flex flex-wrap items-center mb-6 text-sm font-medium  sm:mb-0 dark:text-black">
                    <li>
                        <a href="/home" class="mr-4  md:mr-6 ">Home</a>
                    </li>
                    <li>
                        <a href="/bookshelf" class="mr-4  md:mr-6">Bookshelf</a>
                    </li>
                    
                    <li>
                        <a href="/login" class="mr-4">Login</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 dark:border-black sm:mx-auto  lg:my-8" />
            <div class="flex flex-wrap sm:justify-between justify-center">
                <div class="grid grid-cols-1">
                    <div>

                        <ul class=" text-white font-medium dark:text-black">
                            <li class="ml-3 mb-4">
                                <p class=""><i class="fa-sharp fa-solid fa-location-dot pr-3"></i>SMKN 65
                                    Jakarta :</p>
                                <p class="pl-6">Cipinang Besar Selatan,Kec.Jatinegara,Jakarta 13410</p>
                            </li>
                            <li class="ml-3 mb-4">
                                <p class=""><i class="fa-solid fa-phone pr-3"></i>+62 812-8818-5922</p>
                            </li>
                            <li class="ml-3">
                                <p class=""><i class="fa-solid fa-envelope pr-3"></i>info@smkn65-jkt.sch.id</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex mt-4 space-x-5 sm:justify-end sm:mt-0 mr-5">

                    <a href="https://www.instagram.com/smkn65jakarta.official/" class="text-white hover:text-gray-900 dark:hover:text-white dark:text-black">
                        <i class="fa-brands fa-instagram"></i>
                        <span class="sr-only">Instagram</span>
                    </a>
                    <a href="https://api.whatsapp.com/send?text=https://smkn65-jkt.sch.id/" class="text-white hover:text-gray-900 dark:hover:text-white dark:text-black">
                        <i class="fa-brands fa-whatsapp"></i>
                        <span class="sr-only">whatsapp</span>
                    </a>
                    <a href="https://twitter.com/65smkn" class="text-white hover:text-gray-900 dark:hover:text-white dark:text-black">
                        <i class="fa-brands fa-square-twitter"></i>
                        <span class="sr-only">Twitter</span>
                    </a>
                </div>

            </div>


        </div>
    </footer>

    <!-- back to top -->
    <a href="#container-hero"
        class="h-14 w-14 bg-white items-center rounded-full fixed z-[9999] bottom-4 right-4 p-4 justify-center flex">
        <i class="fa-solid fa-arrow-up"></i>
    </a>




    <!-- kebanyakan taiwind element library mar ntar berat ganti yang perlu aja -Dimas  -->

    <!-- hero section -->
    <!-- <section id="hero" class="pt-36">
    <div class=" relative mt-10">
      <img style="width: 100%; height: 100%;" src="tema/img/buku.png" alt="hero image background" class="max-w-full mx-auto -z-99">
    </div>
    <div class="w-full absolute bottom-0  align-middle p-[100px] text-center">
                  <h1 class="font-['League_Spartan'] text-4xl/[128px] font-bold leading-normal text-primary w-800">Books May<br>Illuminating<br> Your Day Like<br>A Sunlight.</h1>

                  <a href="#" class="text-sm/[32px] font-['Poppins'] font-[700] text-primary bg-secondary py-2 px-3 rounded-lg hover:shadow-lg hover:opacity-90 transition duration-300 ease-in-out">Jelajahi Buku Perpustakaan<i class="fa-solid fa-arrow-right-long px-1"></i></a>
            </div>

   </section> -->
    <!-- end hero section -->
</body>

</html>
