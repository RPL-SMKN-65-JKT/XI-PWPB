@extends('dashboard.layouts.main')

@section('content')
<a href="/dashboard" class="block text-black py-2"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
  <div class="w-full lg:w-2/5 flex flex-col text-black py-2 gap-4 items-center mx-auto">
    <span class="font-bold text-2xl">Verifikasi Peminjaman</span>
    <span class="font-semibold text-xl">Input Kode Peminjaman</span>
    <div class="p-4 bg-white border-2 shadow-lg">
      <video id="preview"></video>
    </div>
    <form action="/dashboard/verifikasi" method="POST" id="formVerifikasi" class="w-full flex flex-col gap-2">
      @csrf
      <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('kode_peminjaman') is-invalid @enderror">
          <input type="text" placeholder="Masukkan Kode Peminjaman" class="w-full outline-none" name="kode_peminjaman" id="kode_peminjaman" required value="{{ old('kode_peminjaman') }}">
      </div>
      @error('kode_peminjaman')
      <span class="self-center text-red-600 font-semibold">{{ $message }}</span>
      @enderror
      @if(session()->has('failed'))
      <span class="self-center text-red-600 font-semibold">{{ session('failed') }}</span>
      @endif
      <button type="submit" class="self-end lg:self-start text-white bg-orange-primary w-fit px-4 py-1 rounded-full transition duration-150 hover:bg-orange-500">Cari</button>
    </form>
  </div>
@endsection

@section('script')
<script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<script>
  const kodePeminjamanInput = document.getElementById('kode_peminjaman');
  const formVerifikasi = document.getElementById('formVerifikasi');
  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
  scanner.addListener('scan', function (content) {
    kodePeminjamanInput.value = content;
    formVerifikasi.submit();
  });
  Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[0]);
    } else {
      console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });
</script>
@endsection