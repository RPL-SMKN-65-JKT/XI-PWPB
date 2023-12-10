@extends('main.layouts.main')

@section('content')
  <section id="detailRiwayat" class="mt-[76px] w-full py-2">
    <div class="w-full lg:container lg:mx-auto border flex flex-col gap-4">
      <div class="w-full flex items-center px-4 border-b-2">
        <a href="/riwayat"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
        <span class="font-bold text-xl px-4 py-2 ">Detail</span>
      </div>
      <div class="w-full flex flex-col px-4 py-2 items-center justify-between border-b-8 gap-4">
        <div class="w-full flex items-center justify-between">
          <span class="font-semibold text-sm">Status</span>
          @php
              if ($bookLoan->status_id == 1) {
                $color = 'bg-blue-primary text-white';
              }
              elseif ($bookLoan->status_id == 2) {
                $color = 'bg-yellow-600 text-white';
              }
              elseif ($bookLoan->status_id == 3) {
                $color = 'bg-green-600 text-white';
              }
              elseif ($bookLoan->status_id == 4) {
                $color = 'bg-red-500 text-white';
              }
              else {
                $color = 'bg-white border border-red-500 text-red-500';
              }
            @endphp
            <div class="{{ $color }} px-2 py-0.5 rounded-md">{{ $bookLoan->status->name }}</div>
        </div>
        @if ($bookLoan->status_id == 3)

        @elseif ($bookLoan->status_id == 5)

        @else
        <div class="w-full flex flex-col items-center justify-center gap-2">
          {{ QrCode::size(100)->generate($bookLoan->kode_peminjaman) }}
          <span class="text-sm">Scan di Petugas Untuk Verifikasi</span>
        </div>
        @endif
      </div>
      <div class="w-full flex flex-col px-4 py-2 gap-4 border-b-8">
        <span class="text-base font-semibold">Detail Peminjaman</span>
        <div class="w-full flex items-center justify-between">
          <span class="text-sm">Buku</span>
          <span class="text-sm font-semibold">{{ $bookLoan->book->title }}</span>
        </div>
        <div class="w-full flex items-center justify-between">
          <span class="text-sm">Peminjam</span>
          <span class="text-sm font-semibold">{{ $bookLoan->user->name }}</span>
        </div>
        <div class="w-full flex items-center justify-between">
          <span class="text-sm">Kode Peminjaman</span>
          <span class="text-sm font-semibold">{{ $bookLoan->kode_peminjaman }}</span>
        </div>
        <div class="w-full flex items-center justify-between">
          <span class="text-sm">Tanggal Peminjaman</span>
          <span class="text-sm font-semibold">{{ $bookLoan->tanggal_peminjaman }}</span>
        </div>
        <div class="w-full flex items-center justify-between">
          <span class="text-sm">Tanggal Pengembalian</span>
          <span class="text-sm font-semibold">{{ $bookLoan->tanggal_pengembalian }}</span>
        </div>
      </div>
      <div class="w-full h-full flex flex-col px-4 py-2 gap-4">
        <span class="text-base font-semibold">Detail Buku</span>
        <a href="/koleksi/{{ $bookLoan->book->slug }}" class="self-center w-fit rounded-md border px-4 py-2 flex flex-col items-center justify-between lg:justify-start gap-2 transition duration-150 hover:bg-gray-200">
          <img src="{{ asset('storage/'.$bookLoan->book->image) }}" alt="" class="max-w-[108px]">
          <div class="flex flex-col justify-between text-sm text-center">
            <span>{{ $bookLoan->book->title }}</span>
            <span>{{ $bookLoan->book->classification->name }}</span>
            <span>{{ $bookLoan->book->type->name }}</span>
          </div>
        </a>
      </div>
    </div>
  </section>
@endsection