<header>
  <nav class="w-full text-white py-2 px-4 fixed top-0 left-0 {{ Request::is('/') || Request::is('login') || Request::is('register/success') ? 'bg-transparent' : 'bg-blue-dark' }} flex items-center justify-between lg:justify-around z-40 transition-all duration-300">
    <div class="px-4">
      <a href="/" class="flex items-center gap-2">
        <img src="{{ asset('img/icon.png') }}" alt="" width="60" />
        <span class="text-xl font-medium">PERPUS65</span>
      </a>
    </div>
    <div class="relative px-4">
      <button id="dropdownTrigger" type="button" class="py-1 px-4 lg:hidden">
        <i class="fa-solid fa-bars fa-lg"></i>
      </button>
      <div id="dropdownNav" class="hidden right-3 top-10 absolute w-64 text-black">
        <div class="px-4 py-2 max-w-[250px] w-full bg-dark flex flex-col gap-5 rounded-tl-lg rounded-b-lg items-center justify-center">
          <div class="px-2 text-white transition-all duration-150 hover:font-bold">
            <a href="/">
              <div class="w-full rounded-lg">Beranda</div>
            </a>
          </div>
          <div class="px-2 text-white transition-all duration-150 hover:font-bold">
            <a href="/koleksi">
              <div class="w-full rounded-lg">Koleksi</div>
            </a>
          </div>
          <div class="px-2 text-white transition-all duration-150 hover:font-bold">
            <a href="/peraturan">
              <div class="w-full rounded-lg">Peraturan</div>
            </a>
          </div>
          @auth
          <div class="px-2 text-white transition-all duration-150 hover:font-bold">
            <a href="/profile">
              <div class="w-full rounded-lg">Profil</div>
            </a>
          </div>
          <div class="px-2 text-white transition-all duration-150 hover:font-bold">
            <a href="/riwayat">
              <div class="w-full rounded-lg">Riwayat</div>
            </a>
          </div>
          <form action="{{ url('/logout') }}" method="POST" class="w-full px-2 text-white bg-red-600 transition-all duration-150 rounded-md py-1 hover:font-bold">
            @csrf
            <button type="submit" class="w-full rounded-lg">Logout</button>
          </form>
          @else
          <div class="px-2 text-white transition-all duration-150 hover:font-bold">
            <a href="/login">
              <div class="w-full rounded-lg">Login</div>
            </a>
          </div>
          <div class="w-full px-2 py-1 text-white bg-orange-primary rounded-md transition-all duration-150 text-center hover:font-bold">
            <a href="/register">
              <div class="w-full rounded-lg">Register</div>
            </a>
          </div>
          @endauth
        </div>
      </div>
    </div>

    <div class="hidden lg:flex gap-6">
      <div class="flex gap-4">
        <a href="/" class="h-full group flex flex-col items-center justify-center gap-1 py-2">
          <div class="px-2 text-lg">Beranda</div>
          <div class="h-[1px] bg-white w-0 group-hover:w-full transition-all duration-300 {{ Request::is('/') ? 'active-navbar' : '' }}"></div>
        </a>
        <div class="h-full group flex flex-col items-center justify-center gap-1 cursor-pointer relative">
          <div class="px-2 text-lg flex gap-2 items-start justify-center">
            <span>Koleksi</span>
            <i class="fa-solid fa-sort-down"></i>
          </div>
          <div class="h-[1px] w-0 transition-all duration-300 {{ Request::is('koleksi*') ? 'active-navbar' : '' }}"></div>
          <div class="absolute top-9 left-2 hidden group-hover:block">
            <div class="w-44 bg-white text-black flex flex-col gap-4 items-start justify-center py-2 rounded-md">
              <a href="/koleksi?classification=2" class="flex w-full gap-2 py-2 px-2 transition duration-150 hover:bg-transparent-hover">
                <div class="px-1 bg-orange-primary rounded-full"></div>
                <span class="font-medium text-base">Buku Non Fiksi</span>
              </a>
              <a href="/koleksi?classification=1" class="flex w-full gap-2 py-2 px-2 transition duration-150 hover:bg-transparent-hover">
                <div class="px-1 bg-blue-primary rounded-full"></div>
                <span class="font-medium text-base">Buku Fiksi</span>
              </a>
            </div>
          </div>
        </div>
        <a href="/peraturan" class="h-full group flex flex-col items-center justify-center gap-1 py-2">
          <div class="px-2 text-lg">Peraturan</div>
          <div class="h-[1px] bg-white w-0 group-hover:w-full transition-all duration-300 {{ Request::is('peraturan') ? 'active-navbar' : '' }}"></div>
        </a>
      </div>
      <div class="border border-white"></div>
      @auth
      <div class="flex items-center relative">
        <div class="flex items-center gap-8 cursor-pointer" id="profile">
          <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-full bg-white p-0.5 overflow-hidden">
              <div style="background-image: url({{ asset('/storage/'.auth()->user()->profile_picture) }})" class="w-full h-full rounded-full bg-cover bg-center"></div>
            </div>
            <div class="flex flex-col items-start justify-center">
              <div class="text-lg">{{ auth()->user()->name }}</div>
              <div class="text-xs font-light">{{ auth()->user()->role->title }}</div>
            </div>
          </div>
          <i class="fa-solid fa-sort-down"></i>
        </div>
        <div class="absolute hidden w-36 right-0 top-12 text-dark" id="dropdownProfile">
          <div class="w-full bg-white flex flex-col rounded-md overflow-hidden">
            @can('entitled')
            <a href="{{ url('/dashboard') }}" class="w-full flex gap-2 items-center justify-start transition duration-150 py-4 px-4 rounded-sm hover:bg-gray-300">
              <div class="w-1/5">
                <i class="fa-solid fa-table-columns"></i>
              </div>
              <span class="w-4/5 text-start text-base font-normal">Dashboard</span>
            </a>
            @endcan
            <a href="{{ url('/profile') }}" class="w-full flex gap-2 items-center justify-start transition duration-150 py-4 px-4 rounded-sm hover:bg-gray-300">
              <div class="w-1/5">
                <i class="fa-solid fa-circle-user"></i>
              </div>
              <span class="w-4/5 text-start text-base font-normal">My Profile</span>
            </a>
            <a href="{{ url('/riwayat') }}" class="w-full flex gap-2 items-center justify-start transition duration-150 py-4 px-4 rounded-sm hover:bg-gray-300">
              <div class="w-1/5">
                <i class="fa-regular fa-note-sticky"></i>
              </div>
              <span class="w-4/5 text-start text-base font-normal">Riwayat</span>
            </a>
            <form action="{{ url('/logout') }}" method="POST" class="w-full hover:bg-gray-300 cursor-pointer">
              @csrf
              <button type="submit" class="w-full h-full py-4 px-4 flex gap-4 items-center justify-start transition duration-150 rounded-sm">
                <div class="w-1/5">
                  <i class="fa-solid fa-arrow-right-from-bracket fa-sm"></i>
                </div>
                <span class="w-4/5 text-start text-base font-normal">Log out</span>
              </button>
            </form>
          </div>
        </div>
      </div>
      @else
      <div class="flex gap-4">
        <a href="/login" class="h-full group flex flex-col items-center justify-center gap-1 py-2">
          <div class="px-2 text-lg">Login</div>
          <div class="h-[1px] bg-white w-0 group-hover:w-full transition-all duration-300 {{ Request::is('login') ? 'active-navbar' : '' }}"></div>
        </a>
        <a href="/register" class="h-full group flex flex-col py-2 gap-2 items-center justify-center bg-orange-primary px-4 rounded-full text-white transition duration-300 hover:bg-orange-500">
          <div class="text-lg transition duration-150">Register</div>
        </a>
      </div>
      @endauth
    </div>
  </nav>
</header>