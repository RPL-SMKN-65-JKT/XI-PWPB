<div class="hidden w-1/6 border shadow-lg h-fit lg:flex flex-col rounded-lg">
  <a href="/profile" class="w-full flex justify-between items-center px-4 py-2 border-b-4">
    <div class="w-12 h-12 rounded-full bg-white p-0.5 overflow-hidden">
      <div style="background-image: url({{ asset('/storage/'.auth()->user()->profile_picture) }})" class="w-full h-full rounded-full bg-cover bg-center"></div>
    </div>
    <span class="text-xs lg:text-sm">{{ auth()->user()->name }}</span>
  </a> 
  <div class="w-full flex flex-col py-4 gap-2 border-b-2">
    <span class="font-semibold px-4">Riwayat</span>
    <a href="/riwayat" class="text-sm px-6 py-1.5 transition duration-150 hover:bg-gray-200">Semua</a>
    <a href="/riwayat?sort=menunggu-verifikasi" class="text-sm px-6 py-1.5 transition duration-150 hover:bg-gray-200">Menunggu Verifikasi</a>
    <a href="/riwayat?sort=gagal-verifikasi" class="text-sm px-6 py-1.5 transition duration-150 hover:bg-gray-200">Gagal Verifikasi</a>
    <a href="/riwayat?sort=sedang-dipinjam" class="text-sm px-6 py-1.5 transition duration-150 hover:bg-gray-200">Sedang Dipinjam</a>
    <a href="/riwayat?sort=melewati-tenggat" class="text-sm px-6 py-1.5 transition duration-150 hover:bg-gray-200">Melewati Tenggat</a>
    <a href="/riwayat?sort=sudah-dikembalikan" class="text-sm px-6 py-1.5 transition duration-150 hover:bg-gray-200">Sudah Dikembalikan</a>
  </div>
  <div class="w-full flex flex-col py-4 gap-4">
    <span class="font-semibold px-4">Profil</span>
    <a href="/profile" class="text-sm px-6 py-1.5 transition duration-150 {{ Request::is('profile') ? 'bg-gray-200' : '' }} hover:bg-gray-200">Profil Saya</a>
  </div>
</div>