@extends('main.layouts.main')

@section('content')
  <div class="mt-[76px] w-full h-full p-2 lg:container lg:mx-auto lg:flex lg:gap-4">
    @include('main.partials.sidebar')
    <div class="w-full lg:w-5/6 flex flex-col gap-2">
      <div class="w-full flex items-center justify-between px-4 py-2 border-b-2">
        <span class="text-xl font-bold">Riwayat</span>
        <div class="md:hidden outline-none w-48 border border-[#C3C3C3] p-2 relative">
          <div class="flex items-center justify-between cursor-pointer" id="filterBtn">
            <span class="font-semibold text-center text-sm">Menunggu Verifikasi</span>
            <i class="fa-solid fa-caret-down"></i>
          </div>
          <div class="hidden w-48 absolute left-0 top-10 z-50 bg-white">
            <div class="w-full flex flex-col gap-2 border-2 shadow-md">
                <a href="/riwayat" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">Semua</a>
                <a href="/riwayat?sort=menunggu-verifikasi" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">Menunggu Verifikasi</a>
                <a href="/riwayat?sort=gagal-verifikasi" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">Gagal Verifikasi</a>
                <a href="/riwayat?sort=sedang-dipinjam" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">Sedang Dipinjam</a>
                <a href="/riwayat?sort=melewati-tenggat" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">Melewati Tenggat</a>
                <a href="/riwayat?sort=sudah-dikembalikan" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">Sudah Dikembalikan</a>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full grid grid-cols-1 px-2 gap-y-2">
        @foreach ($bookloans as $bookloan)
        <div class="w-full flex flex-col px-4 py-1 rounded-lg border border-gray-300 gap-2">
          <div class="w-full flex justify-between items-center text-sm py-0.5 border-b-2">
            <div class="">{{ $bookloan->tanggal_peminjaman }}</div>
            @php
              if ($bookloan->status_id == 1) {
                $color = 'bg-blue-primary text-white';
              }
              elseif ($bookloan->status_id == 2) {
                $color = 'bg-yellow-500 text-white';
              }
              elseif ($bookloan->status_id == 3) {
                $color = 'bg-green-600 text-white';
              }
              elseif ($bookloan->status_id == 4) {
                $color = 'bg-red-500 text-white';
              }
              else {
                $color = 'bg-gray-400 text-white';
              }
            @endphp
            <div class="{{ $color }} px-2 py-0.5 rounded-md">{{ $bookloan->status->name }}</div>
          </div>
          <div class="w-full flex items-center gap-2 pb-1 border-b-2">
            <img src="{{ asset('storage/' . $bookloan->book->image) }}" class="aspect-[0.66/1] w-1/6 max-w-[104px]" alt="">
            <div class="w-5/6 flex flex-col items-start justify-evenly h-full">
              <span class="text-base font-bold">{{ $bookloan->book->title }}</span>
              <span class="text-xs">Kode Peminjaman : {{ $bookloan->kode_peminjaman }}</span>
            </div>
          </div>
            <a href="/riwayat/{{ $bookloan->kode_peminjaman }}" class="w-fit self-end text-sm px-3 py-1 font-semibold text-blue-primary rounded-full transition duration-150">Lihat Detail</a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('script')
<script>
  const filterBtn = document.getElementById('filterBtn');
    filterBtn.addEventListener('click', function() {
      this.nextElementSibling.classList.toggle('hidden');
    })
</script>
@endsection