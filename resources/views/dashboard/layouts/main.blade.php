<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard | PERPUS65</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <style>
    .no-scrollbar::-webkit-scrollbar { 
            display: none; 
        } 
  </style>
</head>
<body class="font-poppins w-screen h-screen overflow-hidden" style="background-image: linear-gradient(180deg, rgba(47,62,80,1) 22%, rgba(243,243,243,1) 22%);">
  {{-- NAVBAR SECTION START --}}
    @include('dashboard.partials.navbar')
   {{-- NAVBAR SECTION END  --}}
   {{-- INSIDE SECTION START --}}
   <div class="px-2 pt-[102px] pb-2 lg:pb-8 flex lg:gap-x-4 h-screen relative bg-overlay lg:px-4">
    {{-- SIDEBAR SECTION START --}}
    @include('dashboard.partials.sidebar')
    {{-- SIDEBAR SECTION END --}}
    <div class="w-full xl:w-3/4 2xl:w-5/6 flex flex-col gap-8 text-white lg:gap-12">
      <span class="text-2xl font-semibold">{{ $title }}</span>
      <div class="bg-blue-primary w-fit text-xl px-4 py-1 font-semibold rounded-full">{{ $title }}</div>
      {{-- CONTENT SECTON START --}}
      <div class="w-full bg-white shadow-md rounded-lg h-full overflow-scroll px-4 pb-4">
        @yield('content')
      </div>
      {{-- CONTENT SECTION END --}}
    </div>
   </div>
   {{-- INSIDE SECTION END --}}
  <script src="https://kit.fontawesome.com/e1744d5724.js" crossorigin="anonymous"></script>
  <script>
    let sidebarBtn = document.getElementById("sidebarBtn");
    let sidebar = document.getElementById("sidebar");
    let sidebarClose = document.getElementById("sidebarClose");
    sidebarBtn.addEventListener('click', () => {
      sidebar.classList.replace('-left-[1920px]', 'left-0');
    })

    sidebarClose.addEventListener('click', () => {
      sidebar.classList.replace('left-0', '-left-[1920px]')
    })
  </script>
  @yield('script')
</body>
</html>