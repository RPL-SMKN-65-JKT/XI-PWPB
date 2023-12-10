@extends('layouts.main')

@section('title', 'Homepage')


<style>
    body {
        user-select: none;
    }

    .one {
        margin: 100px 0px 0px 0px;
    }

    .mother-buku-user {
        margin-bottom: 70px;
        width: 90%;
    }

    .mother-buku-user .judul {
        font-size: 42px;
        color: #000;
        font-weight: 600;
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


    .header-buku button {
        background-color: #5333F2;
        font-size: 18px;
        transition: all .2s ease-in;
        border: 1px solid #5333F2;
    }


    .header-buku button:hover {
        background-color: white;
        color: #5333F2;
    }
</style>

@section('body')
    <div class="container-hero">
        <div class="text">
            <h3>Buku adalah teman yang berharga. Namun, sulit untuk menjelaskan hal itu kepada yang tak suka membaca.</h3>
            <a href="{{ url('buku') }}"><button type="button"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">PINJAM
                    SEKARANG <i class="fa-solid fa-arrow-right"></i></button></a>
        </div>
    </div>

    <div class="container-hero-card">
        <div class="bungkus-card">
            <div class="card">
                <i class="fa-solid fa-book"></i>
                <h3>Buku Berkualitas</h3>
            </div>
            <div class="card">
                <i class="fa-solid fa-globe"></i>
                <h3>Pinjam Online</h3>
            </div>
            <div class="card">
                <i class="fa-solid fa-book-open"></i>
                <h3>All Genre</h3>
            </div>
            <div class="card">
                <i class="fa-solid fa-bolt"></i>
                <h3>Layanan Cepat</h3>
            </div>
        </div>
    </div>


    <div class="container-about" id="about">
        <div class="image">
            <img src="https://img.freepik.com/premium-photo/smart-man-casual-black-wear-glasses-relaxing-reading-interesting-book_213441-1749.jpg?size=626&ext=jpg&uid=R56490936&ga=GA1.2.1149922704.1691593168&semt=ais"
                alt="">
        </div>
        <div class="text">
            <h3 class="">Choose <span>Spanca Library</span> For Your Mind</h3>
            <p>Perpustakaan Spanca Library adalah pusat pengetahuan yang memberikan akses luas kepada masyarakat terhadap
                koleksi bahan bacaan, sumber informasi, dan referensi. Kami menjadi tempat nyaman bagi pembelajar, pencari
                ilmu, dan pencinta literasi.</p>
            <a href="{{ url('buku') }}"><button type="button"
                    class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Selengkapnya</button></a>

        </div>
    </div>


    <div class="container-genre-card">
        <div class="bungkus-card">
            <div class="judul">
                <button>Category Book ~</button>
                <h3>The <span>Categories</span> Book</h3>
            </div>
            <div class="card">
                <img src="https://img.freepik.com/free-photo/book-that-has-word-mountain-it_188544-12612.jpg?size=626&ext=jpg"
                    alt="novel" class="thumbnail">
                <div class="text">
                    <button class="label">Novel</button>
                    <h3>Menjelajahi Dunia yang Tersembunyi di Balik Fasad Kehidupan...</h3>
                    <p>Dalam kedipan mata, dunia biasa berpadu dengan keajaiban yang tersembunyi, dan seorang....</p>
                    <div class="more-detail">
                        <div class="image">
                            <img src="{{ asset('assets/65.png') }}" alt="">
                            <p>Spanca Library</p>
                        </div>
                        <div class="text">
                            <p><a href="{{ url('buku/novel') }}">More Details <i class="fa-solid fa-arrow-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="https://img.freepik.com/free-photo/boy-looking-moon-night_1340-38945.jpg?size=626&ext=jpg&ga=GA1.2.1449891322.1692801509&semt=ais"
                    alt="fantasy genre" class="thumbnail">
                <div class="text">
                    <button class="label">Manga</button>
                    <h3>Petualangan di Balik Kehidupan yang Nampaknya Biasa Saja...</h3>
                    <p>Di balik rutinitas sehari-hari yang nampaknya biasa, tersembunyi petualangan epik....</p>
                    <div class="more-detail">
                        <div class="image">
                            <img src="{{ asset('assets/65.png') }}" alt="">
                            <p>Spanca Library</p>
                        </div>
                        <div class="text">
                            <p><a href="{{ url('buku/manga') }}">More Details <i class="fa-solid fa-arrow-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <img src="https://img.freepik.com/premium-photo/ready-school-concept-background-with-books-alarm-ai-generative-ai_590200-2244.jpg?size=626&ext=jpg&ga=GA1.1.1449891322.1692801509&semt=sph"
                    alt="romance genre" class="thumbnail">
                <div class="text">
                    <button class="label">Study</button>
                    <h3>Menggali Pembelajaran Untuk Kehidupan Yang Akan Datang...</h3>
                    <p>Dalam perjalanan menggali pembelajaran untuk kehidupan yang akan datang, kita....</p>
                    <div class="more-detail">
                        <div class="image">
                            <img src="{{ asset('assets/65.png') }}" alt="">
                            <p>Spanca Library</p>
                        </div>
                        <div class="text">
                            <p><a href="{{ url('buku/study') }}">More Details <i class="fa-solid fa-arrow-right"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="flex flex-col justify-center items-center">

        <div class="mother-buku-user one">
            <div style="width: 100%" class="flex justify-center items-center">
                <div style="width: 90%">
                    <div class="flex justify-between items-center header-buku">
                        <h3 class="judul">Buku <span>Terpopuler</span></h3>
                        <a href="{{ url('/kumpulan-buku') }}"><button type="button"
                                class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-2 mb-2">Lainnya</button></a>
        
                    </div>
                </div>
            </div>
            <div class="container-buku-user">
                @foreach ($bukuPopuler as $populer)
                    <div class="buku-cover">
                        <a href="/detail-buku/{{ $populer->slug }}">
                            <div class="cover">
                                <img src="{{ asset('storage/' . $populer->gambar) }}" alt="">
                            </div>
                            <div class="text-detail">
                                <h3>{{ $populer->nama }}</h3>
                                <p>{{ $populer->pengarang }}</p>
                                <div class="flex justify-between items-center md:pr-4 pr-1 mt-2">
                                    <button>{{ $populer->kategori }}</button>
                                    <p class="w-auto flex justify-end items-center gap-1" style="font-size: 14px;"> <span
                                            class="bg-blue-500 py-1 px-2 rounded-full text-white">{{ $populer->total_pinjam }}x</span>
                                        <span class="md:block hidden">Dipinjam</span> </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="mother-buku-user">
            <div style="width: 100%" class="flex justify-center items-center">
                <div style="width: 90%">
                    <div class="flex justify-between items-center header-buku">
                        <h3 class="judul">Buku <span>Novel</span></h3>
                        <a href="{{ url('/kategori/novel') }}"><button type="button"
                                class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-2 mb-2">Lainnya</button></a>
        
                    </div>
                </div>
            </div>
            <div class="container-buku-user">
                @foreach ($bukuNovel as $novel)
                    <div class="buku-cover">
                        <a href="/detail-buku/{{ $novel->slug }}">
                            <div class="cover">
                                <img src="{{ asset('storage/' . $novel->gambar) }}" alt="">
                            </div>
                            <div class="text-detail">
                                <h3>{{ $novel->nama }}</h3>
                                <p>{{ $novel->pengarang }}</p>
                                <div class="flex justify-between items-center md:pr-4 pr-1 mt-2">
                                    <button>{{ $novel->kategori }}</button>
                                    <p class="w-auto flex justify-end items-center gap-1" style="font-size: 14px;"> <span
                                            class="bg-blue-500 py-1 px-2 rounded-full text-white">{{ $novel->total_pinjam }}x</span>
                                        <span class="md:block hidden">Dipinjam</span> </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="mother-buku-user">
            <div style="width: 100%" class="flex justify-center items-center">
                <div style="width: 90%">
                    <div class="flex justify-between items-center header-buku">
                        <h3 class="judul">Buku <span>Manga</span></h3>
                        <a href="{{ url('/kategori/manga') }}"><button type="button"
                                class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-2 mb-2">Lainnya</button></a>
        
                    </div>
                </div>
            </div>
            <div class="container-buku-user">
                @foreach ($bukuManga as $manga)
                    <div class="buku-cover">
                        <a href="/detail-buku/{{ $manga->slug }}">
                            <div class="cover">
                                <img src="{{ asset('storage/' . $manga->gambar) }}" alt="">
                            </div>
                            <div class="text-detail">
                                <h3>{{ $manga->nama }}</h3>
                                <p>{{ $manga->pengarang }}</p>
                                <div class="flex justify-between items-center md:pr-4 pr-1 mt-2">
                                    <button>{{ $manga->kategori }}</button>
                                    <p class="w-auto flex justify-end items-center gap-1" style="font-size: 14px;"> <span
                                            class="bg-blue-500 py-1 px-2 rounded-full text-white">{{ $manga->total_pinjam }}x</span>
                                        <span class="md:block hidden">Dipinjam</span> </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mother-buku-user">
            <div style="width: 100%" class="flex justify-center items-center">
                <div style="width: 90%">
                    <div class="flex justify-between items-center header-buku">
                        <h3 class="judul">Buku <span>Study</span></h3>
                        <a href="{{ url('/kategori/study') }}"><button type="button"
                                class="text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-4 py-2 text-center mr-2 mb-2">Lainnya</button></a>
        
                    </div>
                </div>
            </div>
            <div class="container-buku-user">
                @foreach ($bukuStudy as $study)
                    <div class="buku-cover">
                        <a href="/detail-buku/{{ $study->slug }}">
                            <div class="cover">
                                <img src="{{ asset('storage/' . $study->gambar) }}" alt="">
                            </div>
                            <div class="text-detail">
                                <h3>{{ $study->nama }}</h3>
                                <p>{{ $study->pengarang }}</p>
                                <div class="flex justify-between items-center md:pr-4 pr-1 mt-2">
                                    <button>{{ $study->kategori }}</button>
                                    <p class="w-auto flex justify-end items-center gap-1" style="font-size: 14px;"> <span
                                            class="bg-blue-500 py-1 px-2 rounded-full text-white">{{ $study->total_pinjam }}x</span>
                                        <span class="md:block hidden">Dipinjam</span> </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
