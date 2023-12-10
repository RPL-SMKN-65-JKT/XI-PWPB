<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Two+Tone" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="tema/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  
  <!-- logo -->
<link href="tema/img/65.png" rel="icon" />
    <link href="tema/img/65.png" rel="apple-touch-icon" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Perpustakaan</title>
</head>
<body class="dark:bg-[#2B2B2B] pb-96">
<!-- Main navigation container (navbar) -->
<br>
<nav id="navbar" class="mr-10 ml-10 relative flex items-center  dark:bg-[#404040] dark:text-white bg-[#e8e8e8] rounded-full py-2 lg:mb-0 lg:pr-2 shadow-md" data-te-navbar-ref>
  <div class="flex w-full flex-wrap items-center justify-between px-3">
    <!-- Hamburger button for mobile view -->
    <button class="block border-0 bg-transparent px-2 text-neutral-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 dark:text-neutral-200 lg:hidden" type="button"
      data-te-collapse-init
      data-te-target="#navbarSupportedContent1"
      aria-controls="navbarSupportedContent1"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <!-- Hamburger icon -->
      <span class="[&>svg]:w-7">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="h-7 w-7">
          <path
            fill-rule="evenodd"
            d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
            clip-rule="evenodd" />
        </svg>
      </span>
    </button>

    <!-- Collapsible navigation container -->
    <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto  dark:bg-[#404040]" id="navbarSupportedContent1" data-te-collapse-item>
      <!-- Logo -->
      <a class="mb-4 ml-2 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-white dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0" href="#">
        <img src="tema/img/65.png" style="height:40px; width:40px;" alt="65 logo" loading="lazy" />
      </a>
      <!-- Left navigation links -->
      <ul class="list-style-none mr-auto flex flex-col pl-0 lg:flex-row" data-te-navbar-nav-ref>
        <li  class="mb-4 lg:mb-0 lg:pr-2 dark:border-[#000000]" >
          <!-- Dashboard link -->
          <a class="nav-link" href="/">Home</a>
        </li>
        <!-- Team link -->
        <li  class="mb-4 lg:mb-0 lg:pr-2 dark:border-[#000000]" >
          <!-- Dashboard link -->
          <a class="nav-link" href="/bookshelf">Bookshelf</a>
        </li>
        <!-- Projects link -->
        <li  class="mb-4 lg:mb-0 lg:pr-2 dark:border-[#000000]" >
          <!-- Dashboard link -->
          <a class="nav-link active" href="/rentlogs">Rent Logs</a>
        </li>
      </ul>
    </div>

    <!-- Right elements -->
    <button class="text-black dark:text-white bg-white dark:bg-[#2B2B2B] font-semibold text-lg rounded-full px-5 py-1 text-center inline-flex items-center shadow-md dark:focus:ring-slate-900" type="button">
      {{ Auth::user()->name }}
      <p class="text-gray-300 font-thin text-2xl ml-5 mr-5">|</p>
     
          <!-- SVG Path here -->
          <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 36 36" fill="none">
            <path d="M18 3C26.28 3 33 9.72 33 18C33 26.28 26.28 33 18 33C9.72 33 3 26.28 3 18C3 9.72 9.72 3 18 3ZM9.0345 23.124C11.2365 26.409 14.5425 28.5 18.24 28.5C21.936 28.5 25.2435 26.4105 27.444 23.124C24.9476 20.7909 21.6569 19.4952 18.24 19.5C14.8226 19.4948 11.5313 20.7905 9.0345 23.124ZM18 16.5C19.1935 16.5 20.3381 16.0259 21.182 15.182C22.0259 14.3381 22.5 13.1935 22.5 12C22.5 10.8065 22.0259 9.66193 21.182 8.81802C20.3381 7.97411 19.1935 7.5 18 7.5C16.8065 7.5 15.6619 7.97411 14.818 8.81802C13.9741 9.66193 13.5 10.8065 13.5 12C13.5 13.1935 13.9741 14.3381 14.818 15.182C15.6619 16.0259 16.8065 16.5 18 16.5Z" fill="#2B2B2B"/>
        </svg>
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg>
    
  </button>
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
<hr width="1600px;" 
        color="#ECECEC" 
        size="5" >
        @if (session('berhasil'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('berhasil') }}!",
                icon: "success"
                });
        </script>
        @endif
<div class="konten self-center dark:bg-[#2B2B2B">
  <div class="table-style">
    <div class="table-header justify-evenly">
      <p class="text-2xl font-semibold dark:text-white">Table Peminjaman anda</p>

      <form>   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input name="title" type="search" id="default-search" class="w-96 block  p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari Judul Buku..." >
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
      </form>
    </div>
    <div class="table-content">
      <table class="dark:text-white">
        <thead>
          <tr>
            <td><b>No</b></td>
            <td><b>Judul Buku</b></td>
            <td><b>Tanggal Pinjam</b></td>
            <td><b>Deadline</b></td>
            <td><b>Status</b></td>
          </tr>
        </thead>
      </table>
      <table class="peminjaman-list">
        <tbody >
          @foreach ($rentlogs as $item)
          <tr>
            <td class="dark:text-white">{{$loop->iteration}}</td>
            <td class="dark:text-white">{{$item->book->title}}</td>
            <td class="dark:text-white">{{$item->rent_date}}</td>
            <td class="dark:text-white">{{$item->return_date}}</td>
            <td class="px-6 py-6 text-center  ">
              <p class="{{ $item->actual_return_date == null ? 'bg-[#faad1433] bg-opacity-20 px-10 py-4 font-semibold text-[#faad14] rounded-2xl ' : ($item->return_date < $item->actual_return_date ? 'bg-[#ff4d4f33] bg-opacity-20 px-10 py-4 font-semibold text-[#ff4d4f] rounded-2xl' : 'bg-[#52c41a33] bg-opacity-20 px-10 py-4 font-semibold text-[#52c41a] rounded-2xl')}}">   @if ($item->actual_return_date == null)
                  On Progress
              @elseif ($item->return_date < $item->actual_return_date)
                  Out of Date
              @else
                  Done
              @endif</p>
              
          </td>
          </tr>
          @endforeach
          
          
        </tbody>
      </table>
    </div>
  </div>
</div>
        <style>

input[type="text"] {
    display: block;
    width: 1000px; 
    font-size: 15px;
    font-weight: 600;
    color: #000000;
    background: #F0F0F0;
    padding: 10px 20px;
    border-radius: 30px;
}

.filter-button{
    color: #FFEC39;
    background: #404040;
    border-radius: 40px;
    padding: 10px 40px;
    border: 2px solid #404040;
    font-weight: 600;
}
        </style>


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

   <link rel="stylesheet" href="tema/js/main.js">
   
</body>

</html>