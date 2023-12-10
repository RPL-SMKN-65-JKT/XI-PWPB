@extends('main.layouts.main')

@section('content')
{{-- Hero Section Start --}}
<section id="hero" class="w-full h-screen bg-center bg-cover" style="background-image: url({{ asset('img/bg-hero.jpg') }})">
  <div class="w-full h-screen flex items-center justify-around" style="background-color: rgba(0, 0, 0, 0.30)">
    <div class="w-full flex flex-col gap-5 justify-center px-2 lg:px-20 xl:px-28 2xl:px-40">
      <div class="text-white font-bold tracking-widest text-3xl leading-10 lg:text-4xl 2xl:text-6xl">Selamat Datang <br> di Perpustakaan 65</div>
      <div class="text-white text-sm font-light leading-8 tracking-widest lg:text-lg">"Menjelajahi Halaman, Merasakan Dunia: <br>
        Temukan Hikmah di Antara Baris-Baris Buku."</div>
      <a href="/koleksi" class="w-40 flex items-center justify-center text-white px-1 py-2 bg-orange-primary rounded-full shadow-lg transition duration-200 hover:bg-orange-500">
        <div>Baca Sekarang</div>
      </a>
    </div>
  </div>
</section>
{{-- Hero Section End --}}

{{-- Manfaat Section Start --}}
<section id="manfaat" class="p-5">
  <div class="w-full flex flex-col gap-5 items-center">
    <div class="py-2 px-4 border-b-2 border-b-blue-secondary font-bold text-2xl text-center lg:text-3xl">Manfaat Membaca Buku</div>
    <div class="w-full grid grid-cols-1 items-center gap-8 md:grid-cols-3 md:gap-0 md:justify-between fhd:px-8">
      <div class="h-full flex flex-col gap-3 items-center justify-center px-2">
        <img src="{{ asset('img/manfaat1.svg') }}" alt="" class="w-1/4">
        <span class="font-bold text-center text-xl">Meningkatkan Pengetahuan dan Wawasan</span>
        <span class="text-center hidden font-light md:block">Membaca buku memperluas pengetahuan Anda tentang berbagai hal, dari sejarah hingga ilmu pengetahuan, membuka jendela baru untuk memahami dunia.</span>
      </div>
      <div class="h-full flex flex-col gap-3 items-center justify-center px-2">
        <img src="{{ asset('img/manfaat2.svg') }}" alt="" class="w-1/4">
        <span class="font-bold text-center text-xl">Meningkatkan Kemampuan Berpikir Kritis</span>
        <span class="text-center hidden font-light md:block">Buku merangsang pemikiran kritis dan membantu Anda melihat perspektif beragam, mengasah keterampilan berpikir Anda.</span>
      </div>
      <div class="h-full flex flex-col gap-3 items-center justify-center px-2">
        <img src="{{ asset('img/manfaat3.svg') }}" alt="" class="w-1/3 md:w-1/2">
        <span class="font-bold text-center text-xl">Pengembangan Keterampilan Bahasa dan Komunikasi</span>
        <span class="text-center hidden font-light md:block">Membaca memperkaya kosa kata dan meningkatkan kemampuan berkomunikasi, memungkinkan Anda menyampaikan ide dengan lebih jelas dan efektif.</span>
      </div>
    </div>
  </div>
</section>
{{-- Manfaat Section End --}}

{{-- Buku Terpopuler Section Start --}}
<section id="populer" class="p-5 bg-cream-primary">
  <div class="w-full flex flex-col p-2 items-center gap-y-5 md:flex-row">
    <div class="w-full flex flex-col gap-6 items-center md:w-2/4 lg:items-start xl:w-1/4">
      <span class="text-2xl font-bold text-black lg:text-4xl">Terpopuler</span>
      <span class="text-center text-lg lg:text-left lg:text-xl">Kita memilihkan 3 buku yang populer untukmu, berdasarkan seringnya peminjaman</span>
      <a href="/koleksi" class="bg-orange-primary rounded-full flex justify-between items-center gap-2 overflow-hidden hover:bg-orange-500 transition duration-300">
        <span class="px-4 text-white capitalize font-semibold md:text-sm lg:text-base">Lihat seluruh buku</span>
        <div class="bg-white px-4 py-2 rounded-full"><i class="fa-solid fa-angle-right"></i></div>
      </a>
    </div>
    <div class="w-full grid grid-cols-1 gap-8 bg-cream-secondary rounded-xl p-4 md:grid-cols-3">
      @foreach ($books as $book)
      <a href="{{ url('/koleksi/'.$book->slug) }}" class="flex flex-col items-center gap-5 pt-1 transition duration-300 hover:bg-transparent-hover cursor-pointer">
        <img src="{{ asset('/storage/'.$book->image) }}" alt="" class="w-1/2 shadow-book md:w-full lg:w-2/3 xl:w-1/2">
        <div class="flex flex-col gap-2 items-center">
          <span class="text-center font-medium">{{ $book->title }}</span>
          <span class="font-light text-center ">Jenis : {{ $book->type->name }}</span>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
{{-- Buku Terpopuler Section End --}}

{{-- CTA Section Start --}}
<section id="cta" class="p-5 bg-blue-secondary">
  <div class="flex flex-col gap-5 items-center md:flex-row-reverse">
    <div class="flex items-center justify-center w-full">
      <lottie-player src="{{ asset('img/animation_ll50ljqt.json') }}" background="#e5f8ff" speed="1" style="width: 300px; height: 300px" loop autoplay direction="1" mode="normal"></lottie-player>
    </div>
    <div class="flex flex-col items-center gap-3 md:w-2/3">
      <span class="text-center text-dark text-xl lg:text-2xl">“Buka jendela dunia melalui buku. Mari jelajahi, belajar, dan tumbuh bersama di antara halaman-halaman yang menunggu Anda.”</span>
      <a href="/koleksi" class="bg-orange-primary flex items-center px-4 py-2 rounded-full transition duration-150 hover:bg-orange-500"><span class="text-white font-bold text-lg">Telusuri Buku</span></a>
    </div>
  </div>
</section>
{{-- CTA Section End --}}

{{-- Script JS --}}
<script src="{{ asset('js/lottie-player.js') }}"></script>
<script>
  window.onscroll = function () {
      const navbar = document.getElementsByTagName('nav')[0];
      if(window.scrollY > 1)  {
        navbar.classList.replace('bg-transparent', 'bg-blue-dark');
    } else if (this.window.scrollY <= 0) {
        navbar.classList.replace('bg-blue-dark', 'bg-transparent')
    }

    }
</script>
@endsection