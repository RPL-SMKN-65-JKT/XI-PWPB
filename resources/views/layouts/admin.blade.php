<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://kit.fontawesome.com/4856595809.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="assets/logo sekolah.jpg">
    <title>@yield('title') | Spanca Library</title>
    <link rel="stylesheet" href="css/style.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}

    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('assets/65.png') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" /> --}}

</head>

<body>
    <div class="nav-header flex justify-between items-center">
      <button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
         <span class="sr-only">Open sidebar</span>
         <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
         </svg>
      </button>

      <h3 class="mr-4 text-3xl">Spanca Library</h3>
    </div>

     <aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
           <ul class="mt-2 space-y-4 font-medium">
            <li class="flex justify-center items-center border-b-2 border-gray-300 pb-3">
               <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEivCy6wlBbMHY-Rqaj9Q2ISGB4U392sWzGi4aAlh4nOqz3PMxv8dlYUpylpnfUJioeRK2zQY3dXx4XTHJx6i4BDHKvNZOKrg2ZYGdMdieIs7PFOu9_appqVNu0lB95tCqZQ-cka6vV5YgIP6zUN0Pi7leHx9Hv5FhaqlgnbiTzlzbDjWpc4UNDlFJIRJWxC/s16000/logo%20sekolah.jpg" class="w-1/2" alt="">
            </li>
              <li>
                 <a href="{{ url('dashboard') }}" class="flex items-center p-2 rounded-lg dark:text-white {{ Request::is('dashboard') ? 'text-white bg-blue-500' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group">
                    <svg class="w-5 h-5 {{ Request::is('dashboard') ? 'text-white' : 'text-gray-500 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white' }} transition duration-75 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                       <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                       <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                 </a>
              </li>

              <li>
               <button type="button" class="flex items-center w-full p-2 text-base {{ Request::is('catatan-butuh-persetujuan') || Request::is('catatan-dipinjam') || Request::is('catatan-dikembalikan') ? 'text-white bg-blue-500' : 'text-gray-500 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} transition duration-75 rounded-lg group " aria-controls="catatan" data-collapse-toggle="catatan">
                  <i class="fa-solid fa-clipboard text-2xl {{ Request::is('catatan-butuh-persetujuan') || Request::is('catatan-dipinjam') || Request::is('catatan-dikembalikan') ? 'text-white' : 'text-gray-500' }}"></i>
                     <span class="flex-1 ml-3 text-left whitespace-nowrap {{ Request::is('catatan-butuh-persetujuan') || Request::is('catatan-dipinjam') || Request::is('catatan-dikembalikan') ? 'text-white' : 'text-gray-700' }}">Catatan Peminjaman</span>
                     <svg class="w-3 h-3 {{ Request::is('catatan-butuh-persetujuan') || Request::is('catatan-dipinjam') || Request::is('catatan-dikembalikan') ? 'text-white' : 'text-gray-500' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                     </svg>
               </button>
               <ul id="catatan" class="hidden py-2 space-y-2">
                     <li>
                        <a href="{{ url('catatan-butuh-persetujuan') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Butuh Persetujuan</a>

                     </li>
                     <li>
                        <a href="{{ url('catatan-dipinjam') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Dipinjam</a>

                     </li>
                     <li>
                        <a href="{{ url('catatan-dikembalikan') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Dikembalikan</a>

                     </li>
               </ul>
            </li>


            <li>
               <button type="button" class="flex items-center w-full p-2 transition duration-75 rounded-lg group {{ Request::is('catatan-terlambat') || Request::is('catatan-rusak') || Request::is('catatan-hilang') ? 'text-white bg-blue-500' : 'text-gray-500 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}" aria-controls="catatan-pelanggaran" data-collapse-toggle="catatan-pelanggaran">
                  <i class="fa-solid fa-exclamation text-2xl px-2"></i>
                     <span class="flex-1 ml-3 text-left whitespace-nowrap {{ Request::is('catatan-terlambat') || Request::is('catatan-rusak') || Request::is('catatan-hilang') ? 'text-white' : 'text-gray-700 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }}">Catatan Pelanggaran</span>
                     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                     </svg>
               </button>
               <ul id="catatan-pelanggaran" class="hidden py-2 space-y-2">
                     <li>
                        <a href="{{ url('catatan-terlambat') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Terlambat</a>

                     </li>
                     <li>
                        <a href="{{ url('catatan-rusak') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Rusak</a>

                     </li>
                     <li>
                        <a href="{{ url('catatan-hilang') }}" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Hilang</a>

                     </li>
               </ul>
            </li>

              <li>
                 <a href="{{ url('catatan-ebook') }}" class="flex items-center p-2 rounded-lg dark:text-white {{ Request::is('catatan-ebook') ? 'text-white bg-blue-500' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group">
                  <i class="fa-solid fa-book-atlas text-2xl {{ Request::is('catatan-ebook') ? 'text-white' : 'text-gray-500' }}"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Catatan eBook</span>
                 </a>
              </li>
              <li>
               <a href="{{ url('daftar-buku') }}" class="flex items-center p-2 rounded-lg dark:text-white {{ Request::is('daftar-buku') ? 'text-white bg-blue-500' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group">
                <i class="fa-solid fa-book text-2xl {{ Request::is('daftar-buku') ? 'text-white' : 'text-gray-500' }}"></i>
                  <span class="flex-1 ml-3 whitespace-nowrap">Daftar Buku</span>
               </a>
            </li>
              <li>
                 <a href="{{ url('tambah-buku') }}" class="flex items-center p-2 rounded-lg dark:text-white {{ Request::is('tambah-buku') ? 'text-white bg-blue-500' : 'text-gray-700 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group">
                  <i class="fa-regular fa-square-plus text-2xl {{ Request::is('tambah-buku') ? 'text-white' : 'text-gray-500' }}"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Tambah Buku</span>

                 </a>
              </li>
              <li>
                 <a href="{{ url('daftar-user') }}" class="flex items-center p-2 rounded-lg dark:text-white {{ Request::is('daftar-user') ? 'text-white bg-blue-500' : 'text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700' }} group">
                  <i class="fa-solid fa-users text-2xl {{ Request::is('daftar-user') ? 'text-white' : 'text-gray-500' }}"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Daftar User</span>
                 </a>
              </li>
              <li>
                 <a href="{{ url('logout') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white text-gray-700 hover:bg-gray-100 dark:text-white group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Sign Out</span>
                 </a>
              </li>
              <hr>
              <li>
               <a href="{{ url('/') }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white text-gray-700 hover:bg-gray-100 dark:text-white group">
                  <i class="fa-solid fa-pager w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white text-2xl"></i>
                  <span class="flex-1 ml-3 whitespace-nowrap">Pages</span>
               </a>
            </li>
            <li>
                <a href="{{ url('/setting/'.Auth::user()->slug) }}" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white text-gray-700 hover:bg-gray-100 dark:text-white group">
                   <i class="fa-solid fa-user w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white text-2xl"></i>
                   <span class="flex-1 ml-3 whitespace-nowrap">Setting</span>
                </a>
             </li>

           </ul>
        </div>
     </aside>

     <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
         <div class="flex items-center justify-start h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <div class="flex justify-center items-center w-full bg h-48 rounded">
               <h2 class="text-white text-3xl">Selamat Datang {{ Auth::user()->name }}!</h2>
            </div>
         </div>
         <div class="grid grid-cols-2 total gap-4 ml-2 mb-4">

            @yield('total_user')
            @yield('total_buku')
            @yield('rent_log_online')
            @yield('rent_log_offline')

         </div>
         <div class="grid grid-cols-1 gap-4 ml-2 mb-4">
            @yield('editBuku')

              @yield('detailBuku')
            @yield('dPelanggaran')
            @yield('tambahBuku')
            @yield('dBuku')
            @yield('content')
            @yield('dUser')

         </div>
         <div class="flex items-center justify-strech w-full h-48 mb-4 roundedg b-gray-50 dark:bg-gray-800">
         </div>
      </div>
     </div>








     {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script> --}}
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
