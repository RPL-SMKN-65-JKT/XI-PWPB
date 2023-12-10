@extends('dashboard.layouts.main')

@section('content')
<div class="mt-2 w-full flex flex-col gap-4 py-1 text-black border-2">
  <div class="w-full flex py-2 gap-2 border-b-2 items-center font-semibold sticky top-0 bg-white text-sm lg:text-base">
    <div class="w-1/4 text-center">Buku</div>
    <div class="w-1/4 text-center">Peminjam</div>
    <div class="w-1/4 text-center">Tanggal Pinjam</div>
    <div class="w-1/4 text-center">Tanggal Pengembalian</div>
  </div>
  <div class="w-full flex flex-col gap-2 px-1">
    <div class="w-full flex py-2 gap-2 font-semibold sticky top-0 bg-white text-xs lg:text-sm">
      <div class="w-1/4 text-center flex flex-col justify-center gap-2 items-center">
        <span>{{ $bookLoan->book->title }}</span>
        <img src="{{ asset('storage/'.$bookLoan->book->image) }}" alt="" class="max-w-[100px]">
      </div>
      <div class="w-1/4 text-center">{{ $bookLoan->user->name }}</div>
      <div class="w-1/4 text-center">{{ $bookLoan->tanggal_peminjaman }}</div>
      <div class="w-1/4 text-center">{{ $bookLoan->tanggal_pengembalian }}</div>
    </div>
  </div>
</div>
<form action="/dashboard/pengembalian/found/{{ $bookLoan->kode_peminjaman }}" class="mt-4 text-end" method="POST">
  @csrf
  <input type="hidden" hidden value="{{ $bookLoan->kode_peminjaman }}">
  <button type="submit" class="bg-orange-primary text-white px-3 py-1 rounded-full">Next</button>
</form>

@endsection  