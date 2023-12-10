@extends('layouts.main')

@section('title', 'Histori Peminjaman')

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
    }

    nav {
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        position: fixed;
        top: 0;
        z-index: 999;
        width: 100%;
    }

    .mother-container-detailBukus {
        height: auto;
        margin: 100px 0px;
    }

    .container-detailBukus {
        display: flex !important;
        flex-wrap: wrap;
        justify-content: center;
        align-items: start;
        gap: 28px;
        width: 100%;
    }

    .container-detailBukus .image {
        width: 25%;
        min-width: 250px;
    }

    .container-detailBukus .image img {
        width: 100%;
        border-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    .container-detailBukus .text {
        width: 30%;
    }

    .container-detailBukus .qr-code {
        width: 25%;
    }

    .container-detailBukus .text h3 {
        font-size: 40px;
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
        margin-bottom: 100px;
    }

    .bungkus-deskripsi-detailBuku .deskripsi {
        margin-left: 50px;
        width: 80%;
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

    .banner {
        width: 80%;
    }

    .banner-informasi {
        width: 70%;
    }

    .banner-status {
        width: 30%;
    }

    @media(max-width: 1030px) {
        .hr-bawah {
            display: block
        }

        .container-detailBukus {
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

        .banner {
            width: 90%;
        }

        .banner-informasi {
            display: none;
        }

        .banner-status {
            width: 100%;
        }
    }

    @media(max-width: 650px) {
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

@section('content')
    @if (session('status'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('status') }}"
            });
        </script>
    @endif

    @if ($terlambat)
        <div class="mother-container-detailBukus">
            <div class="flex justify-center lg:mb-6 mb-2">
                <div class="flex justify-between items-center border banner" style="border-color: black;">
                    <div class="banner-status bg-red-500 text-white px-3 py-2">
                        <p class="text-center text-xl">TERLAMBAT</p>
                    </div>
                    <div class="banner-informasi bg-white  px-3 py-2">
                        <p class="text-center text-xl ">KAMU TERLAMBAT MENGEMBALIKAN BUKU</p>
                    </div>
                </div>
            </div>
            <div class="container-detailBukus h-full w-full">
                <div class="image">
                    <img src="{{ asset('storage/' . $terlambat->buku->gambar) }}" class="w-100" alt="Buku Gambar">
                </div>
                <div class="text">
                    <h3>{{ $terlambat->buku->nama }}</h3>
                    <hr class="h-px rounded mt-4 bg-gray-400 border-0 dark:bg-gray-700">
                    <p><span>Pengarang:</span> {{ $terlambat->buku->pengarang }}</p>
                    <p><span>Penerbit:</span> {{ $terlambat->buku->penerbit }}</p>
                    <p><span>Halaman:</span> {{ $terlambat->buku->halaman }}</p>
                    <p><span>Tahun Terbit:</span> {{ $terlambat->buku->tahun_terbit }}</p>
                    <p><span>Kategori:</span> {{ $terlambat->buku->kategori }}</p>
                    <p><span>Genre:</span> {{ $terlambat->buku->genre }}</p>
                </div>
                <div class="lg:mt-0 mt-4 qr-code flex flex-col items-center justify-center">
                    <div class="flex flex-col items-center justify-center gap-3 px-4 py-3 rounded"
                        style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                        <span>
                            {!! QrCode::size(200)->generate($terlambat->kode) !!}
                        </span>
                        <span class="text-lg">
                            {{ $terlambat->kode }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col justify-center items-center" style="margin: 100px 0px;">
            <img src="{{ asset('assets/no-data.jpg') }}" class="w-48 h-48" alt="">
            <h3>TIDAK ADA DATA PELANGGARAN</h3>
        </div>
    @endif


    <div class="flex flex-col justify-center items-center w-full mb-8">
        <div class="flex justify-between items-center mb-1" style="width: 90%;">
            <button
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                id="filterDropDown" data-dropdown-toggle="dropdown">
                <i class="fa-solid fa-sort text-white -ml-1 mr-2 md:inline-block hidden"></i>FILTER
            </button>

            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="filterDropDown">
                    <form>
                    <li>
                        <button name="filter" value="novel" type="submit"
                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Novel</button>
                    </li>
                    <li>
                        <button name="filter" value="manga" type="submit"
                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Manga</a>
                    </li>
                    <li>
                        <button name="filter" value="study" type="submit"
                            class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Study</a>
                    </li>
                </form>
                </ul>
            </div>


            <form class="flex items-center">
                <label for="search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <input type="text" id="search" name="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari Buku...">
                </div>
                <button type="submit"
                    class="p-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg" style="width: 90%;">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-l-lg">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode
                        </th>
                        <th scope="col" class="px-6 py-3" style="padding: 0px 30px;">
                            Buku
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Pinjam
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Kembali
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Denda
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @if ($pelanggaran->count() > 0)
                        @foreach ($pelanggaran as $item)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="p-4">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                    <div class="flex flex-col items-center">
                                        <span>{!! QrCode::size(80)->generate($item->kode) !!}</span>
                                        <span>{{ $item->kode }}</span>
                                    </div>

                                </td>

                                <td class="px-6 py-4  font-semibold text-gray-500 font-medium dark:text-white"
                                    style="padding: 0px 30px;">
                                    <div class="py-2 flex flex-col justify-center items-center w-full">
                                        <img src="{{ asset('/storage/' . $item->buku->gambar) }}" class="rounded"
                                            style="width: 60px; max-width: 60px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                            alt="Apple Watch">
                                        <p class="text-md"
                                            style="-webkit-line-clamp: 1;
                                                    overflow: hidden;
                                                    display: -webkit-box;
                                                    -webkit-box-orient: vertical;">
                                            {{ $item->buku->nama }}</p>
                                    </div>
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                    {{ $item->tanggal_pinjam }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                    {{ $item->tanggal_kembali }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                    Rp {{ number_format($item->denda, 0, ',', '.') }}
                                </td>

                                <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                    <div class="flex justify-center items-center gap-2">
                                        @if ($item->status == 'Hilang')
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>{{ $item->status }}
                                        @elseif($item->status == 'Rusak')
                                            <div class="h-2.5 w-2.5 rounded-full bg-yellow-500 me-2"></div>
                                            {{ $item->status }}
                                        @elseif($item->status == 'Dikembalikan')
                                            <div class="h-2.5 w-2.5 rounded-full bg-yellow-300 me-2"></div> Terlambat ({{ $item->hari_terlambat }})
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 text-center" colspan="8">
                                <div class="flex flex-col justify-center items-center gap-2">
                                    <img src="{{ asset('assets/no-data.jpg') }}" class="w-32 h-32" alt="">

                                    <p>TERIMA KASIH SUDAH TERTIB <span class="text-red-500">❤️</span></p>
                                </div>
                            </td>
                        </tr>

                    @endif


                </tbody>
            </table>
        </div>
    </div>

@endsection
