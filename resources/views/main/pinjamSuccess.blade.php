@extends('main.layouts.main')

@section('content')

{{-- @dd($bookLoan) --}}
<section id="suksesPinjam" class="mt-[76px] bg-gray-200 w-full flex items-center justify-center p-2">
  <div class="container mx-auto bg-white rounded-md shadow-md flex flex-col items-center p-4 gap-4">
    <a href="/riwayat" class="self-start"><i class="fa-solid fa-arrow-left fa-lg"></i></a>
    <span class="text-2xl font-bold text-center">Request Peminjaman Buku</span>
    <div class="w-full flex flex-col gap-2 items-center justify-center">
      {{ QrCode::size(180)->generate($bookLoan->kode_peminjaman) }}
    </div>
    <span>Kode Peminjaman : <span class="font-bold">{{ $bookLoan->kode_peminjaman }}</span></span>
    <div class="w-full flex flex-col px-2 gap-1 bg-slate-300 py-1">
      <span class="self-start px-2">Nama : <span class="font-bold">{{ $bookLoan->user->name }}</span></span>
      <span class="self-start px-2">Buku : <span class="font-bold">{{ $bookLoan->book->title }}</span></span>
    </div>
  </div>
</section>

@endsection