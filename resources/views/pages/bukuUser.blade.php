@extends('layouts.main')

@section('title', 'Buku')
<style>
    body {
        user-select: none;
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
@section('bukuUser')

    <div class="mother-buku-user one">
        <div class="flex justify-center items-center w-full" style="margin-bottom: 30px;">
            <form class="flex justify-center md:items-center items-start gap-4" style="width: 80%;">
                <select name="kategori"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-start inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700  dark:focus:ring-blue-800">

                    <!-- Dropdown menu -->
                    <option class="bg-white text-black" value="" selected>Filter <svg
                            class="text-white w-2.5 h-2.5  ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </option>
                    <option class="bg-white text-black" value="Novel">Novel</option>
                    <option class="bg-white text-black" value="Manga">Manga</option>
                    <option class="bg-white text-black" value="Study">Study</option>

                </select>

                <div class="flex items-center w-full">
                    <label for="cari-buku" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <input type="text" id="cari-buku" name="nama"
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
            @if ($bukus->count() > 0)
                @foreach ($bukus as $buku)
                    <div class="buku-cover">
                        <a href="/detail-buku/{{ $buku->slug }}">
                            <div class="cover">
                                <img src="{{ asset('storage/' . $buku->gambar) }}" alt="">
                            </div>
                            <div class="text-detail">
                                <h3>{{ $buku->nama }}</h3>
                                <p>{{ $buku->pengarang }}</p>
                                <button>{{ $buku->kategori }}</button>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <dv class="flex flex-col justify-center items-center">
                    <img src="{{ asset('assets/no-data.jpg') }}" class="w-48 h-48" alt="">
                    <h1>BUKU TIDAK DITEMUKAN</h1>
                </dv>
            @endif
        </div>
    </div>

    <div class="mother-buku-user one">
        <h3 class="judul">Buku <span>Terpopuler</span></h3>
        <div class="container-buku-user">
            @foreach ($terpopuler as $populer)
                <div class="buku-cover">
                    <a href="/detail-buku/{{ $populer->slug }}">
                        <div class="cover">
                            <img src="{{ asset('storage/' . $populer->gambar) }}" alt="">
                        </div>
                        <div class="text-detail">
                            <h3>{{ $populer->nama }}</h3>
                            <p>{{ $populer->pengarang }}</p>
                            <div class="flex justify-between items-center pr-4 mt-2">
                                <button class="">{{ $populer->kategori }}</button>
                                <p class="flex items-center justify-end gap-1" style="font-size: 15px;"> <span
                                        class="bg-blue-500 py-1 px-2 rounded-full text-white">{{ $populer->total_pinjam }}x</span>
                                    <span class="md:block hidden">Dipinjam</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    <div class="mother-buku-user one">
        <h3 class="judul">Daftar Buku <span>Novel</span></h3>
        <div class="container-buku-user">
            @foreach ($novels as $novel)
                <div class="buku-cover">
                    <a href="/detail-buku/{{ $novel->slug }}">
                        <div class="cover">
                            <img src="{{ asset('storage/' . $novel->gambar) }}" alt="">
                        </div>
                        <div class="text-detail">
                            <h3>{{ $novel->nama }}</h3>
                            <p>{{ $novel->pengarang }}</p>
                            <button>{{ $novel->kategori }}</button>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mother-buku-user">
        <h3 class="judul">Daftar Buku <span>Manga</span></h3>
        <div class="container-buku-user">
            @foreach ($mangas as $manga)
                <div class="buku-cover">
                    <a href="/detail-buku/{{ $manga->slug }}">
                        <div class="cover">
                            <img src="{{ asset('storage/' . $manga->gambar) }}" alt="">
                        </div>
                        <div class="text-detail">
                            <h3>{{ $manga->nama }}</h3>
                            <p>{{ $manga->pengarang }}</p>
                            <button>{{ $manga->kategori }}</button>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>


    <div class="mother-buku-user">
        <h3 class="judul">Daftar Buku <span>Pelajaran</span></h3>
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
