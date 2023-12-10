@extends('layouts.main')
@section('title', 'Novel')
    <style>
        body {
        user-select: none;
    }

    .slider-buku {
        padding-top: 100px !important;
    }

    .slider-buku .bungkus-slider-buku img {
        margin: 0 10px;
    }



    .one {
        margin: 100px 0px 0px 0px;
    }

    .mother-buku-user {
        margin-bottom: 70px
    }

    .mother-buku-user .judul {
        font-size: 42px;
        color: #000;
        font-weight: 600;
        margin-left: 25px;
        margin-bottom: 18px;
    }

    .mother-buku-user .judul span {
        color: #5333f2;
    }


    .container-buku-user {
        height: auto !important;
        display: flex;
        flex-wrap: wrap !important;
        justify-content: center !important;
        gap: 0px;
        align-items: center;
    }

    .container-buku-user .buku-cover {
        display: flex !important;
        flex-direction: column;
        justify-content: center;
        align-items: center;

        margin-bottom: 40px;
        width: auto;
        min-width: 250px;
        /* transition: all .2s ease-in; */
        transform-origin: right;
        /* Pusat transformasi di tengah gambar */
        transition: all .6s cubic-bezier(0.24, 0.74, 0.58, 1) 0s;
    }

    .container-buku-user .buku-cover:hover {
        transform: translateY(-16px);

    }

    .container-buku-user .buku-cover .cover {
        width: 220px;
        aspect-ratio: 75:118;
    }

    .container-buku-user .buku-cover .cover img {
        /* aspect-ratio: 75:118; */
        height: 320px;
        width: 100%;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }

    .container-buku-user .buku-cover .text-detail {
        width: 220px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: clip;

    }

    .container-buku-user .buku-cover .text-detail h3 {
        font-size: 24px;
        color: #2d2e2e;
        -webkit-line-clamp: 1;
        overflow: hidden;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }

    .container-buku-user .buku-cover .text-detail p {
        font-size: 20px;
        color: #161616ab;
        margin-bottom: 4px
    }

    .container-buku-user .buku-cover .text-detail button {
        background-color: #4587f8;
        padding: 1px 4px;
        border-radius: 4px;
        color: white;
        width: auto;
    }

    @media(max-width: 500px) {
        .one {
            margin: 100px 0px 0px 0px;
        }

        /* .mother-buku-user{
                margin-bottom: 70px
            } */

        .mother-buku-user .judul {
            font-size: 36px;
            color: #000;
            font-weight: 600;
            margin-left: 0px;
            text-align: center;
            margin-bottom: 18px;
        }

        .container-buku-user {
            margin: 0px 0px;
            gap: 8px;
            justify-content: space-evenly
        }

        .container-buku-user .buku-cover {
            min-width: 140px;
            width: auto;
        }

        .container-buku-user .buku-cover .cover {
            width: 130px;
            aspect-ratio: 75:118;
        }

        .container-buku-user .buku-cover .cover img {
            /* aspect-ratio: 75:118; */
            height: 190px;
            width: 100%;
            border-radius: 10px;
        }

        .container-buku-user .buku-cover .text-detail {
            width: 130px;
        }

        .container-buku-user .buku-cover .text-detail p {
            font-size: 18px;
            color: #161616ab;
            margin-bottom: 4px
        }

    }
    </style>
@section('kategoriStudy_User')
<div class="mother-buku-user one">
    <h3 class="judul text-center">Daftar Buku <span>Study</span></h3>
    <div class="flex justify-center items-center w-full" style="margin-bottom: 30px;">
        <form class="flex justify-center md:items-center items-start gap-4" style="width: 80%;">
            <button id="filterDrop" data-dropdown-toggle="dropdown"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Filter <svg class="w-2.5 h-2.5  ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="filterDrop">
                    <div>
                        <li>
                            <button name="filter" value="populer" type="submit"
                                class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Terpopuler
                            </button>
                        </li>
                        <li>
                            <button name="filter" value="ebook" type="submit"
                                class="block w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">eBook
                            </button>
                        </li>
                    </div>
                </ul>
            </div>

            <div class="flex items-center w-full">
                <label for="searching" class="sr-only">Search</label>
                <div class="relative w-full">
                    <input type="text" id="searching" name="nama"
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
            </div>

        </form>
    </div>
    <div class="container-buku-user">
        @foreach ($studys as $study)
            <div class="buku-cover">
                <a href="/detail-buku/{{ $study->slug }}">
                    <div class="cover">
                        <img src="{{ asset('storage/' . $study->gambar) }}" alt="">
                    </div>
                    <div class="text-detail">
                        <h3>{{ $study->nama }}</h3>
                        <p>{{ $study->pengarang }}</p>
                        <button>{{ $study->kategori }}</button>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
