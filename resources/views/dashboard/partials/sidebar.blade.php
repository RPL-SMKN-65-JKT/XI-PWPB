<div class="flex w-0 xl:w-1/4 2xl:w-1/6 overflow-y-scroll no-scrollbar">
  <div id="sidebar" class="absolute -left-[1920px] top-0 h-screen w-screen z-50 transition-all duration-500 xl:static xl:left-0 xl:w-full xl:h-full xl:z-0">
    <form action="{{ url('/logout') }}" method="POST" class="bg-white shadow-lg h-full flex flex-col py-8 px-2 gap-2 items-center justify-between rounded-lg">
      @csrf
      <button id="sidebarClose" type="button" class="px-4 self-start xl:hidden">
        <i class="fa-solid fa-chevron-left fa-xl"></i>
      </button>
      <div class="flex flex-col items-center gap-2">
        <div style="background-image: url({{ asset('/storage/'.auth()->user()->profile_picture) }})" class="p-12 rounded-full bg-no-repeat bg-cover bg-center"></div>
          <div class="text-base font-semibold">{{ auth()->user()->name }}</div>
          <div class="px-3 bg-slate-300 rounded-full text-sm">{{ auth()->user()->role->title }}</div>
      </div>
        <div class="w-3/4 grid grid-cols-1 items-center justify-center justify-items-center gap-y-2.5">
          <a href="{{ url('/dashboard') }}" class="w-full flex items-center justify-start gap-3 px-4 py-2 transition duration-150 rounded-full hover:bg-transparent-hover {{ Request::is('dashboard') ? 'active-sidebar' : '' }}">
            <i class="fa-solid fa-table-columns w-1/6"></i>
            <span class="">Dashboard</span>
          </a>
          <a href="{{ url('/dashboard/books') }}" class="w-full flex items-center justify-start gap-3 px-4 py-2 transition duration-150 hover:bg-transparent-hover rounded-full {{ Request::is('dashboard/books*') ? 'active-sidebar' : '' }}">
            <i class="fa-solid fa-book w-1/6"></i>
            <span>Data Buku</span>
          </a>
          <a href="{{ url('/dashboard/types') }}" class="w-full flex items-center justify-start gap-3 px-4 py-2 transition duration-150 hover:bg-transparent-hover rounded-full {{ Request::is('dashboard/types*') ? 'active-sidebar' : '' }}">
            <i class="fa-solid fa-table-cells-large w-1/6"></i>
            <span>Jenis Buku</span>
          </a>
          <a href="{{ url('/dashboard/categories') }}" class="w-full flex items-center justify-start gap-3 px-4 py-2 transition duration-150 hover:bg-transparent-hover rounded-full {{ Request::is('dashboard/categories*') ? 'active-sidebar' : '' }}">
            <i class="fa-solid fa-table-cells w-1/6"></i>
            <span>Genre Buku</span>
          </a>
          <a href="{{ url('/dashboard/users') }}" class="w-full flex items-center justify-start gap-3 px-4 py-2 transition duration-150 hover:bg-transparent-hover rounded-full {{ Request::is('dashboard/users*') ? 'active-sidebar' : '' }}">
            <i class="fa-solid fa-users w-1/6"></i>
            <span>Data User</span>
          </a>
          <a href="{{ url('/dashboard/reports') }}" class="w-full flex items-center justify-start gap-3 px-4 py-2 transition duration-150 hover:bg-transparent-hover rounded-full {{ Request::is('dashboard/reports*') ? 'active-sidebar' : '' }}">
            <i class="fa-solid fa-bars-progress w-1/6"></i>
            <span>Laporan</span>
          </a>
          <a href="{{ url('/dashboard/profile') }}" class="w-full flex items-center justify-start gap-3 px-4 py-2 transition duration-150 hover:bg-transparent-hover rounded-full {{ Request::is('dashboard/profile*') ? 'active-sidebar' : '' }}">
            <i class="fa-solid fa-user w-1/6"></i>
            <span>Profil Saya</span>
          </a>
        </div>
      <button type="submit" class="bg-red-500 text-white w-3/4 flex items-center px-4 py-2 justify-center rounded-full gap-2.5">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Logout</span>
      </button>
    </form>
  </div>
</div>