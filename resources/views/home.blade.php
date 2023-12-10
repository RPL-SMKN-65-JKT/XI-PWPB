@extends('layouts.user')

@section('content')

    <link rel="stylesheet" href="/css/flickity.min.css">
    <style>
      * { box-sizing: border-box; }

      body { font-family: sans-serif; }

      .carousel {
        background: #FFF;
      }

      .carousel-cell {
        height: 300px;
        margin-right: 2.5rem;
        scale: 1.1;
      }

      .carousel-cell.is-selected {
        background: #EEE;
      }

      .carousel-cell.is-selected > img {
        margin-top: 2rem;
        scale: 1.2;
      }

      .carousel-cell.is-selected > .btn-detail {
        display: block;
      }

      .btn-detail{background: linear-gradient(180deg, #48BB78 0%, #3170B5 100%);}

      .carousel-cell--height2 { height: 450px; }

      /* cell number */
      /* .carousel-cell:before {
        display: block;
        text-align: center;
        content: counter(gallery-cell);
        line-height: 200px;
        font-size: 80px;
        color: white;
      } */

    </style>
    
    <div class="mt-10 flex">
        <img class="h-auto w-full lg:w-[70%]" src="/img/gedung-65.png" alt="Gedung smkn 65">
        <div class="bg-[#48BB78] min-h-full w-full justify-center items-center hidden lg:flex">
            <h1 class="text-white text-2xl font-bold text-center">Perpustakaan SMKN 65 Jakarta</h1>
        </div>
    </div>

    <div>
        <hr class="h-px mt-8 my-4 bg-black border-0 dark:bg-black">
        <h1 class="text-2xl text-black text-center font-bold">BOOKS</h1>
        <hr class="h-px my-4 bg-black border-0 dark:bg-black">
    </div>
    
    <div class="mb-10">
      <h1 class="text-xl text-black font-bold ml-5">Daftar Buku | Buku Fisik</h1>

      <div class="buku-fisik">
        <div class="carousel hidden lg:block" data-flickity='{"pageDots": false, "draggable": false }'>
          @forelse ($books as $book)
            <div class="carousel-cell carousel-cell--height2 flex flex-col items-center justify-center min-w-fit p-8">
              <img class="mb-6 w-auto h-[250px]" src="{{ env('APP_URL')."storage".$book->cover }}" alt="">
              <h1 class="mt-2 text-black font-bold text-xl">{{ ucwords($book->title) }}</h1>
              <a href="/book/{{ $book->slug }}" class="w-[100%] btn-detail mt-4 focus:outline-none text-white text-lg font-semibold text rounded-lg px-5 py-2.5 mr-2 text-center hidden">Book Details</a>
            </div>

          @empty
            <p>Tidak ada buku</p>
          @endforelse
        </div>
        <div class="lg:hidden overflow-x-auto flex">
            @forelse ($books as $book)
              
              <article class="mr-5 flex-none py-6 px-3">
                <a href="/book/{{ $book->slug }}">
                  <img class="w-auto h-48"  src="{{ env('APP_URL')."storage".$book->cover }}" alt="">
                  <h1 class="text-black font-normal text-lg">{{ Str::limit(ucwords($book->title), 10, '...') }}</h1>
                </a>
              </article>
            
            @empty
              
              <p>Tidak ada buku</p>
                
            @endforelse
        </div>
      </div>

      
    </div>

    <div class="flex justify-center mb-8">
      <a href="/books" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">See more</a>
    </div>

    <div>
      <hr class="h-px mt-8 my-4 bg-black border-0 dark:bg-black">
      <h1 class="text-2xl text-black text-center font-bold">Daftar Buku | eBook</h1>
      <hr class="h-px my-4 bg-black border-0 dark:bg-black">
    </div>

    <div class="mb-10 ">
      <div class="ebook">
        <div class="carousel hidden lg:block" data-flickity='{"pageDots": false, "draggable": false }'>
          @forelse ($ebooks as $ebook)
            <div class="carousel-cell carousel-cell--height2 flex flex-col items-center justify-center min-w-fit p-8">
              <img class="mb-6 w-auto h-[250px]" src="{{ env('APP_URL')."storage".$ebook->cover }}" alt="">
              <h1 class="mt-2 text-black font-bold text-xl">{{ ucwords($ebook->title) }}</h1>
              <a href="/book/{{ $ebook->slug }}" class="w-[100%] btn-detail mt-4 focus:outline-none text-white text-lg font-semibold text rounded-lg px-5 py-2.5 mr-2 text-center hidden">Book Details</a>
            </div>

          @empty
            <p>Tidak ada buku</p>
          @endforelse
        </div>
        <div class="lg:hidden overflow-x-auto flex">
            @forelse ($ebooks as $ebook)
              
              <article class="mr-5 flex-none py-6 px-3">
                <a href="/book/{{ $ebook->slug }}">
                  <img class="w-auto h-48"  src="{{ env('APP_URL')."storage".$ebook->cover }}" alt="">
                  <h1 class="text-black font-normal text-lg">{{ Str::limit(ucwords($ebook->title), 10, '...') }}</h1>
                </a>
              </article>
            
            @empty
              
              <p>Tidak ada buku</p>
                
            @endforelse
        </div>
      </div>

      
    </div>

    <div class="flex justify-center mb-8">
      <a href="/ebooks" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 ">See more</a>
    </div>


    <footer class="bg-[#48BB78] w-full h-auto flex columns-2 pl-8 pt-5 pb-5">
      <div class="w-[40%]">
        <h1 class="text-2xl text-white font-semibold">Peta Lokasi</h1>
        <hr width="50%" class="h-px mt-6 mb-2 bg-white border-0">
        <iframe class="w-[90%] h-72" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.065718681975!2d106.8783125!3d-6.2285625!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f325cc3523e1%3A0x5e6945075e20de57!2sSMK%20Negeri%2065%20Jakarta!5e0!3m2!1sid!2sid!4v1692109781897!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="w-[60%]">
        <h1 class="text-2xl text-white font-semibold">Profile SMKN 65</h1>
        <hr width="70%" class="h-px mt-6 mb-2 bg-white border-0">
        <div class="w-[90%]">
          <p class="text-white font-medium">SMK Negeri 65 Jakarta merupakan Unit Sekolah Baru, di mana sekolah ini merupakan binaan dari SMKN 51 Jakarta. Sekolah yang didirikan pada tahun 2019. Awal mula akan ditempatkan di Kampung Duku, namun akhirnya berada di Cipinang Besar Selatan.
            SMK NEGERI 65 JAKARTA terletak di Jalan IPN. 09/06 Kel. Cipinang Besar Selatan Kec. Jatinegara Kota Administrasi Jakarta Timur Provinsi DKI Jakarta.</p>
        </div>
      </div>
    </footer>
    
    <script type="text/javascript" src="/js/flickity.pkgd.min.js"></script>
    @vite('resources/js/home.js')
@endsection