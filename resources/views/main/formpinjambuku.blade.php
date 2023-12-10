@extends('main.layouts.main')

@section('content')
  <section id="formpinjam" class="w-full mt-[76px] px-4 lg:px-20 xl:px-28 2xl:px-40">
    <div class="w-full flex flex-col gap-8 py-2">
      <span class="font-bold text-2xl py-2 text-orange-primary border-b border-b-blue-dark w-fit"><span class="text-blue-primary">Form</span> Peminjaman</span>
      <form action="/pinjam" method="POST" class="w-full">
        @csrf
        <div class="w-full lg:w-1/2 grid grid-cols-1 py-1 gap-2">
          <div class="flex flex-col gap-0.5">
            <span class="text-base font-semibold">Nama Peminjam</span>
            <div class="flex bg-gray-300 border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('user_id') is-invalid @enderror">
              <span class="w-full prevent-selected">{{ auth()->user()->name }}</span>
                <input type="hidden" placeholder="User" class="w-full outline-none" name="user_id" required hidden value="{{ auth()->user()->id }}">
            </div>
            @error('user_id')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="flex flex-col gap-0.5">
            <span class="text-base font-semibold">Buku Yang Ingin Dipinjam</span>
            <div class="flex bg-gray-300 border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('book_id') is-invalid @enderror">
              <span class="w-full prevent-selected">{{ session('bookName') }}</span>
                <input type="hidden" placeholder="book" class="w-full outline-none" name="book_id" required hidden value="{{ session('bookId') }}">
            </div>
            @error('book_id')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="flex flex-col gap-0.5">
            <span class="text-base font-semibold">Tanggal Peminjaman</span>
            <div class="flex bg-gray-300 border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('tanggal_peminjaman') is-invalid @enderror">
                <input type="date" placeholder="now" class="prevent-selected w-full bg-transparent outline-none" name="tanggal_peminjaman" required readonly value="{{ $date_now }}">
            </div>
            @error('tanggal_peminjaman')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="flex flex-col gap-0.5">
            <span class="text-base font-semibold">Lama Peminjaman</span>
            <select name="durasi" id="durasi" class="outline-none bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('durasi') is-invalid @enderror">
              <option value="0" disabled selected>Pilih Durasi Pinjam</option>
              <option value="7">Seminggu</option>
              <option value="14">Dua Minggu</option>
            </select>
            @error('durasi')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="flex flex-col gap-0.5">
            <span class="text-base font-semibold">Tanggal Pengembalian</span>
            <div class="flex bg-gray-300 border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('tanggal_peminjaman') is-invalid @enderror">
                <input type="date" placeholder="later" class="prevent-selected w-full bg-transparent outline-none" id="tanggal_pengembalian" name="tanggal_pengembalian" required readonly value="">
            </div>
            @error('tanggal_pengembalian')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <button type="submit" class="w-full lg:w-auto lg:px-4 text-white mt-2 bg-orange-primary py-2 rounded-full">Submit</button>
      </form>
    </div>
  </section>

@endsection

@section('script')
  <script>
    let selectDurasi = document.getElementById('durasi');
    selectDurasi.addEventListener('change', async function() {
      let optionDurasi = this.options[selectDurasi.selectedIndex].value;
      let inputTanggalPengembalian = document.getElementById('tanggal_pengembalian');
      await fetch(`/pinjam/tanggalkembali?durasi=${optionDurasi}`).then(response => response.json()).then(response => {
        let tanggal_pengembalian = response.tanggal_pengembalian;
        inputTanggalPengembalian.value = tanggal_pengembalian;
      });
    })
  </script>
@endsection


