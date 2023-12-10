@extends('dashboard.layouts.main')

@section('content')
@if (session()->has('success'))  
    <div class="w-[50vw] absolute right-0 top-24 bg-green-600 flex items-center lg:w-[20vw] xl:w-[15vw] py-4 px-3 text-white text-sm gap-2" id="successNotif">
      <div class=""><i class="fa-solid fa-circle-check fa-2xl"></i></div>
      <span>{{ session('success') }}<span class="font-bold">{{ session('name') }}</span></span>
      <button type="button" class="font-bold" id="closeNotifBtn">&#10005;</button>
    </div>
    @endif
@if (session()->has('failed'))  
    <div class="w-[50vw] absolute right-0 top-24 bg-red-600 flex items-center lg:w-[20vw] xl:w-[15vw] py-4 px-3 text-white text-sm gap-2" id="successNotif">
      <div class=""><i class="fa-solid fa-circle-xmark fa-2xl"></i></div>
      <span>{{ session('failed') }}</span>
      <button type="button" class="font-bold" id="closeNotifBtn">&#10005;</button>
    </div>
    @endif
<div class="w-full grid grid-cols-2 px-4 py-4 gap-2">
  <a href="/dashboard/verifikasi" class="bg-orange-primary text-white flex items-center justify-center gap-2 px-3 py-1 lg:py-4 rounded-full">
    <i class="fa-solid fa-list-check lg:fa-lg"></i>
    <span class="text-xs text-center font-semibold">Verifikasi Peminjaman</span>
  </a>
  <a href="/dashboard/pengembalian" class="bg-orange-primary text-white flex items-center justify-center gap-2 px-3 py-1 lg:py-4 rounded-full">
    <i class="fa-solid fa-hand-holding lg:fa-lg"></i>
    <span class="text-xs text-center font-semibold">Pengembalian Buku</span>
  </a>
</div>
<div class="w-full grid grid-cols-1 p-2 xl:grid-cols-2">
  <div class="flex items-center justify-between p-2">
    <div style="background: linear-gradient(92deg, #BCCFFF 0%, #20C5CF 100%);" class="w-full flex gap-2 justify-between items-center text-white p-4 rounded-lg shadow-md">
      <div class="flex flex-col items-center">
        <span class="text-2xl">{{ $members->count() }}</span>
        <span class="text-2xl">Total Member</span>
      </div>
      <div class="flex items-center justify-center">
        <i class="fa-solid fa-users fa-xl"></i>
      </div>
    </div>
  </div>
  <div class="flex items-center justify-between p-2">
    <div style="background: linear-gradient(92deg, #BCCFFF 0%, #20C5CF 100%);" class="w-full flex gap-2 justify-between items-center text-white p-4 rounded-lg shadow-md">
      <div class="flex flex-col items-center">
        <span class="text-2xl">{{ $books->count() }}</span>
        <span class="text-2xl">Total Buku</span>
      </div>
      <div class="flex items-center justify-center">
        <i class="fa-solid fa-book fa-2xl"></i>
      </div>
    </div>
  </div>
  <div class="flex items-center justify-between p-2">
    <div style="background: linear-gradient(92deg, #BCCFFF 0%, #20C5CF 100%);" class="w-full flex gap-2 justify-between items-center text-white p-4 rounded-lg shadow-md">
      <div class="flex flex-col items-center">
        <span class="text-2xl">3</span>
        <span class="text-2xl">Total Peminjaman</span>
      </div>
      <div class="flex items-center justify-center">
        <i class="fa-solid fa-scroll fa-2xl"></i>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script>
      const closeNotifBtn = document.getElementById('closeNotifBtn');
    if (typeof(closeNotifBtn) != 'undefined' && closeNotifBtn != null)
    {
      closeNotifBtn.addEventListener('click', function() {
        this.parentElement.remove();
      });
    }
    </script>
@endsection