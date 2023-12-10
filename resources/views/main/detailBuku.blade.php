@extends('main.layouts.main')

@section('content')

<section id="detail" class="mt-[76px] lg:container lg:mx-auto lg:flex">

  @if (session()->has('failed'))  
    <div class="w-[50vw] absolute right-0 top-24 bg-red-600 flex items-center lg:w-[20vw] xl:w-[15vw] py-4 px-3 text-white text-sm gap-2" id="successNotif">
      <div class=""><i class="fa-solid fa-circle-xmark fa-2xl"></i></div>
      <span>{{ session('failed') }}</span>
      <button type="button" class="font-bold" id="closeNotifBtn">&#10005;</button>
    </div>
    @endif
  <div class="w-full flex flex-col p-2.5 gap-5 lg:w-4/5">
    <span class="text-xs text-blue-primary lg:text-sm"><a href="{{ url('/') }}">Beranda</a> / <a href="{{ url('/koleksi') }}">Koleksi</a> / <a href="{{ url()->current() }}" class="font-bold">{{ $book->title }}</a></span>
    <div class="w-full flex flex-col gap-2.5">
      <div class="w-full flex flex-col px-10 py-5 gap-10 items-center justify-center bg-blue-secondary lg:flex-row">
        <img src="{{ asset('storage/' . $book->image) }}" alt="" class="w-[200px] shadow-book">
        <div class="w-full flex flex-col py-2 items-start gap-2.5">
          <a href="{{ url('/koleksi?classification='.$book->classification_id) }}" class="flex items-center justify-center text-white bg-orange-primary px-2 py-1 text-xs font-semibold rounded-md">{{ $book->classification->name }}</a>
          <span class="text-xl font-semibold">{{ $book->title }}</span>
          <a href="{{ url('/koleksi?classification='.$book->classification_id.'&jenis='.$book->type_id) }}" class="text-lg text-white px-2 py-0.5 bg-blue-primary rounded-full">{{ $book->type->name }}</a>
          <div class="flex flex-col lg:flex-row lg:items-center items-start gap-1">
            <span>Genre : </span>
            <div class="flex items-center gap-1">
              @foreach ($book->categories as $category)
              <div class="text-white px-2 py-0.5 bg-blue-primary rounded-full cursor-default">{{ $category->name }}</div>
              @endforeach
            </div>
          </div>
          <div class="flex flex-col lg:flex-row lg:items-center items-start gap-1">
            <span>Bentuk Buku : </span>
            <div class="flex items-center gap-1">
              <div class="text-black py-0.5 rounded-full cursor-default">{{ $book->ebook == 1 ? "Ebook" : "Fisik" }}</div>
            </div>
          </div>
          <div class="w-full flex gap-2 items-center">
            <span class="text-lg font-medium">Detail Buku</span>
            <div class="bg-[#c3c3c3] h-[1px] flex-1"></div>
          </div>
          <div class="w-full grid grid-cols-2 gap-y-2 lg:grid-cols-4">
            <div class="flex flex-col gap-1.5">
              <span class="font-semibold">ISBN</span>
              <div class="flex flex-col gap-0.5 text-sm">
                <span>{{ $book->isbn }}</span>
              </div>
            </div>
            <div class="flex flex-col gap-1.5">
              <span class="font-semibold">Pengarang</span>
              <div class="flex flex-col gap-0.5 text-sm">
                <span>{{ $book->author }}</span>
              </div>
            </div>
            <div class="flex flex-col gap-1.5">
              <span class="font-semibold">Penerbit</span>
              <div class="flex flex-col gap-0.5 text-sm">
                <span>{{ $book->publisher }}</span>
              </div>
            </div>
            <div class="flex flex-col gap-1.5">
              <span class="font-semibold">Tahun Terbit</span>
              <div class="flex flex-col gap-0.5 text-sm">
                <span>{{ $book->publication_year }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full flex flex-col px-10 py-5 gap-5 items-start">
        <span class="text-lg font-semibold">Deskripsi</span>
        <p class="text-base text-justify">{{ $book->description }}</p>
      </div>
    </div>
  </div>
  <div class="w-1/5 hidden lg:flex text-black mt-[50px] items-start">
    <div class="w-full grid grid-cols-1 gap-y-3 items-center justify-center p-4 bg-blue-secondary shadow-lg">
      @auth
      <form action="{{ url('/pinjam/form') }}" method="POST">
        @csrf
        <input type="hidden" hidden name="bookId" value="{{ $book->id }}">
        <input type="hidden" hidden name="bookName" value="{{ $book->title }}">
        <button type="submit" class="w-full bg-white h-full py-2 px-4 flex items-center justify-center text-blue-primary gap-2 shadow-lg rounded-full">
          <i class="fa-solid fa-book"></i>
          <div class="font-semibold text-sm">Pinjam Buku</div>
        </button>
      </form>
      @else
      <button type="button" class="bg-[#c3c3c3] h-full py-2 px-4 flex items-center justify-center text-white gap-2 shadow-lg rounded-full" disabled>
        <i class="fa-solid fa-book"></i>
        <div class="font-semibold text-sm">Pinjam Buku</div>
      </button>
      <div class="w-full text-center"><a href="/login" class="text-blue-600 underline">Login</a> untuk pinjam</div>
      @endauth
    </div>
  </div>
</section>

<section id="borrowMobile" class="lg:hidden w-screen fixed bg-white border border-gray-300 bottom-0 h-14 p-2">
  <div class="w-full h-full grid grid-cols-1 gap-x-3 items-center justify-center">
    @auth
      <form action="{{ url('/pinjam/form') }}" method="POST">
        @csrf
        <input type="hidden" hidden name="bookId" value="{{ $book->id }}">
        <input type="hidden" hidden name="bookName" value="{{ $book->title }}">
        <button type="submit" class="w-full bg-blue-primary h-full py-2 px-4 flex items-center justify-center text-white gap-2 shadow-lg rounded-full">
          <i class="fa-solid fa-book"></i>
          <div class="font-semibold text-sm">Pinjam Buku</div>
        </button>
      </form>
      @else
      <button type="button" class="bg-blue-primary h-full py-2 px-4 flex items-center justify-center text-white gap-2 shadow-lg rounded-full" disabled>
        <i class="fa-solid fa-book"></i>
        <div class="font-semibold text-sm">Pinjam Buku</div>
      </button>
      @endauth
  </div>
</section>

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