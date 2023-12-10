@extends('layouts.main')
@section('title', $buku->nama)

<style>
    nav {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        position: fixed;
        top: 0;
        z-index: 999;
        width: 100%;
    }


    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
    }

    .mother-container-detailBukus {
        height: auto;
    }

    .container-detailBukus {
        display: flex !important;
        flex-wrap: wrap;
        justify-content: center;
        align-items: start;
        gap: 28px;
        width: 100%;
        margin-top: 100px;
    }

    .container-detailBukus .image {
        width: 25%;
        min-width: 300px;
        max-width: 300px;
    }

    .container-detailBukus .image img {
        width: 100%;
        border-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    .container-detailBukus .text {
        width: 50%;
    }

    .container-detailBukus .text h3 {
        font-size: 36px;
        font-weight: 600;
        color: #5333f2;
        margin-bottom: -10px
    }

    .container-detailBukus .text p {
        margin-top: 10px;
        font-size: 22px;
        color: #262626d9;
    }

    .container-detailBukus .text p span {
        font-size: 24px;
        color: #5333f2be;
        font-weight: 600
    }


    .container-detailBukus .text .pinjaman {
        display: flex;
        flex-wrap: wrap;
        justify-content: start;
        gap: 10px;
        align-items: center;
        margin-top: 20px;
    }

    .container-detailBukus .text .pinjaman .download {
        border: 1px solid #5333f2;
        background-color: #5333f2;
        color: white;

        font-size: 18px;
        padding: 8px 12px;
        border-radius: 6px;
        transform-origin: right;
        /* Pusat transformasi di tengah gambar */
        transition: all .3s cubic-bezier(0.24, 0.74, 0.58, 1) 0s;
    }

    .container-detailBukus .text .pinjaman .download:hover {
        background-color: white;
        color: #5333f2;
    }

    .container-detailBukus .text .pinjaman .download-disable {
        border: 1px solid #5333f2;
        background-color: #5333f2;
        color: white;

        font-size: 18px;
        padding: 8px 12px;
        border-radius: 6px;
        transform-origin: right;
        /* Pusat transformasi di tengah gambar */
        transition: all .3s cubic-bezier(0.24, 0.74, 0.58, 1) 0s;
    }





    .container-detailBukus .text .pinjaman .offline {
        border: 1px solid #5333f2;
        background-color: white;
        color: #5333f2;

        font-size: 18px;
        padding: 8px 12px;
        border-radius: 6px;
        transform-origin: right;
        /* Pusat transformasi di tengah gambar */
        transition: all .6s cubic-bezier(0.24, 0.74, 0.58, 1) 0s;
    }

    .container-detailBukus .text .pinjaman .baca {
        border: 1px solid #5333f2;
        background-color: white;
        color: #5333f2;

        font-size: 18px;
        padding: 8px 12px;
        border-radius: 6px;
        transform-origin: right;
        /* Pusat transformasi di tengah gambar */
        transition: all .6s cubic-bezier(0.24, 0.74, 0.58, 1) 0s;
    }





    .bungkus-deskripsi-detailBuku {
        display: flex;
        justify-content: center;
        align-items: center !important;
        width: 100%;
        height: auto;
        margin-top: 20px;
        margin-bottom: 100px;
    }

    .bungkus-deskripsi-detailBuku .deskripsi {
        width: 75%;
        font-size: 22px;
        color: #262626c3;
    }

    .bungkus-deskripsi-detailBuku .deskripsi span {
        text-align: center !important;
        line-height: 44px;
        font-size: 22px;
        color: #5333f2be;
        font-weight: 600
    }


    .hr-bawah {
        display: none
    }

    @media(max-width: 1030px) {
        .hr-bawah {
            display: block
        }

        .container-detailBukus {
            margin-left: 0px;
            margin-top: 100px;
            /* margin-bottom: 30px !important; */
            justify-content: center;
            align-items: start;
            gap: 0px;
            height: auto !important;
        }

        .container-detailBukus .image {
            width: 40%;
            min-width: 250px;
            margin-bottom: 40px;
        }

        .container-detailBukus .image img {
            width: 100%;
            border-radius: 15px;
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        }

        .container-detailBukus .text {
            width: 95%;

        }

        .container-detailBukus .text h3 {
            font-size: 40px;
            font-weight: 600;
            color: #5333f2;
            margin-bottom: -10px;
        }



        .bungkus-deskripsi-detailBuku {
            display: flex;
            justify-content: center;
            align-items: center !important;
            width: 100%;
            height: auto;
        }

        .mother-container-detailBukus .bungkus-deskripsi-detailBuku .deskripsi {
            width: 95%;
            font-size: 22px;
            color: #262626c3;
        }

        .mother-container-detailBukus .bungkus-deskripsi-detailBuku .deskripsi span {
            text-align: center !important;
            line-height: 44px;
            font-size: 22px;
            color: #5333f2be;
            font-weight: 600
        }
    }

    @media(max-width: 620px) {
        .container-detailBukus .text h3 {
            font-size: 26px;
            font-weight: 600;
            color: #5333f2;
            margin-bottom: -10px
        }

        .container-detailBukus .text p {
            margin-top: 10px;
            font-size: 18px;
            color: #262626d9;
        }

        .container-detailBukus .text p span {
            font-size: 20px;
            color: #5333f2be;
            font-weight: 600
        }
    }
</style>


@section('detailBuku_User')
    <div class="mother-container-detailBukus">
        <div class="container-detailBukus h-auto w-full">
            <div class="image">
                <img src="{{ asset('storage/' . $buku->gambar) }}" class="w-100" alt="Buku Gambar">
            </div>
            <div class="text">
                <h3>{{ $buku->nama }}</h3>
                <hr class="h-px rounded mt-4 bg-gray-400 border-0 dark:bg-gray-700">
                <p><span>Pengarang:</span> {{ $buku->pengarang }}</p>
                <p><span>Penerbit:</span> {{ $buku->penerbit }}</p>
                <p><span>Halaman:</span> {{ $buku->halaman }}</p>
                <p><span>Tahun Terbit:</span> {{ $buku->tahun_terbit }}</p>
                <p><span>Kategori:</span> {{ $buku->kategori }}</p>
                <p><span>Genre:</span> {{ $buku->genre }}</p>
                <p><span>Total Dipinjam:</span> {{ $buku->total_pinjam }}</p>
                <hr class="h-px rounded mt-4 bg-gray-400 border-0 dark:bg-gray-700">
                <div class="pinjaman">



                    @if ($buku->link_ebook != null)
                        @if (Auth::user())
                            @if (Auth::user()->izin_ebook == 'false')

                                <button class="download" data-modal-target="izinEbook-modal" data-modal-toggle="izinEbook-modal">
                                    Download (eBook)
                                </button>

                            @elseif(Auth::user()->izin_ebook == 'proses-izin')
                                <button class="download-disable" style="opacity: .5;" disabled>Download (eBook)</button>

                            @elseif(Auth::user()->izin_ebook == 'true')
                                <form action="{{ route('download.ebook', ['slug' => $buku->slug]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="download">
                                        Download (eBook) - TRUE
                                    </button>
                                </form>

                            @endif
                        @else
                            <button class="download">
                                <a href="{{ url('/login') }}">Download (eBook)</a>
                            </button>
                        @endif
                    @else

                    @endif







                    @if (Auth::user())
                        @if (Auth::user()->buku_id != null)
                            <button class="offline" style="opacity: .5;" disabled>Pinjam Buku</button>
                        @else
                            <button class="offline" data-modal-target="pinjamBuku-modal"
                                data-modal-toggle="pinjamBuku-modal">Pinjam Buku</button>
                        @endif
                    @else
                        <button class="offline">
                            <a href="{{ url('/login') }}">
                                Pinjam Buku
                            </a>
                        </button>
                    @endif
                    {{-- <a href="#"><button class="baca">Baca Online</button></a> --}}




                </div>
                <hr class="hr-bawah h-px rounded mt-4 bg-gray-500 border-0 dark:bg-gray-700">
            </div>
        </div>
        <div class="bungkus-deskripsi-detailBuku">

            <p class="deskripsi"><span>Deskripsi:</span> <br>{{ $buku->deskripsi }} </p>
        </div>
    </div>


    <!-- Pinjam Buku Modal -->
    <div id="pinjamBuku-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="pinjamBuku-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Peraturan Peminjaman</h3>
                    <form class="space-y-6" action="{{ route('pinjam.buku', ['slug' => $buku->slug]) }}" method="post">
                        @csrf
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pinjam</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- Pinjam Buku Modal -->
    <div id="izinEbook-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="izinEbook-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Peraturan Download eBook</h3>
                    <form class="space-y-6" action="{{ route('izin.ebook', ['slug' => $buku->slug]) }}" method="post">
                        @csrf
                        <button type="submit"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Minta Perizinan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
