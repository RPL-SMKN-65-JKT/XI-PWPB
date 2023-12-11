@extends('layout.detail')
@section('content')
        <div class="container-box flex flex-wrap justify-center items-start gap-4 mb-10">
         <a href="/bookshelf"><button class="bg-[#FFEC39] w-[50px] h-[50px] mt-8 rounded-lg shadow-yellow-200 shadow-xl hover:bg-yellow-200 hover:shadow-none hover:ease-in-out transition duration-200">
          <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 30 30" fill="none">
            <path d="M10 8.75V13.75L2.5 7.5L10 1.25V6.25H16.25C18.9022 6.25 21.4457 7.30357 23.3211 9.17893C25.1964 11.0543 26.25 13.5978 26.25 16.25C26.25 18.9022 25.1964 21.4457 23.3211 23.3211C21.4457 25.1964 18.9022 26.25 16.25 26.25H5V23.75H16.25C18.2391 23.75 20.1468 22.9598 21.5533 21.5533C22.9598 20.1468 23.75 18.2391 23.75 16.25C23.75 14.2609 22.9598 12.3532 21.5533 10.9467C20.1468 9.54018 18.2391 8.75 16.25 8.75H10Z" fill="#2B2B2B"/>
          </svg>
        </button></a>
          <div class="middle md:w-[70%] w-[80%]">
            <div class="title-box w-full rounded-lg px-[25px] py-[10px]">
              <p class="title sm:text-[45px] text-[25px]">{{$book->title}}</p>

                </div>
                <p class="by-year">By <span>{{$book->penulis}}</span> · {{$book->tanggal_terbit}}</p>
                <p class="type"><b>Type: </b><span class="blue mr-3">{{ $book->classification->name }}</span> - <span class="black ml-3">{{ $book->type->name }}</span></p>
                <p class="type"><b>Tags: </b>
                  @foreach ($book->categories as $category)
                  <a href="" class="category underline-offset-8 underline">{{$category->name}}</a>
                  @endforeach
                </p>
                <div class="flex flex-wrap justify-start items-center gap-2 mt-[20px]">
                    <div class="buttons">
                        <a href="/book-rent" class="pinjam-button font-semibold sm:mt-0 mt-2">Pinjam Buku <i class=" fa-solid fa-newspaper"></i></a>
                        <a href="#" class="pinjam-button font-semibold sm:mt-0 mt-2">{{$book->status}} </a>

                        <a href="#" onclick="toggleEbook()" class="baca-button font-semibold sm:mt-0 mt-2">Baca E-Book <i class=" fa-solid fa-book-open"></i></a>
                        <div id="ebookContainer" style="display: none;">
                          <iframe src="{{ asset('storage/ebook/'.$book->pdf) }}" frameborder="0" style="width: 100%; height: 500px;"></iframe>
                      </div>
                    </div>
                    <div class="share flex items-center dark:bg-[#2B2B2B] dark:text-white">
                      <a class="px-2" href="#">Share <i class='bx bx-share-alt'></i></a>
                      <p class="line"> | </p>
                      <a class="px-2" href="#"><i class='bx bxs-message-alt-add'></i> Wanted To Read</a>
                    </div>
                </div>
            </div>
            <img src="{{ asset('storage/cover/'.$book->cover) }}" class="shadow-lg w-[230px] h-[330px] mt-[30px] bg-red-500">
        </div>

<hr class="w-full" color="#ECECEC" size="5" >

<br>

<div class="caption-container md:ml-[90px] sm:ml-[55px] ml-[35px] w-5/6 flex lg:flex-row flex-col flex-wrap justify-start  items-center rounded-xl mb-10">
    <div class="left lg:border-r-2 border-r-0 lg:border-b-0 border-b-2 lg:w-[40%] w-[100%]">
        <table>
            <tbody>
                <tr>
                    <td><b>ISBN: </b></td>
                    <td> {{$book->book_code}}</td>
                </tr>
                <tr>
                    <td><b>Tanggal Terbit: </b></td>
                    <td> {{$book->tanggal_terbit}}</td>
                </tr>
                <tr>
                    <td><b>Penerbit: </b></td>
                    <td> {{$book->penerbit}}</td>
                </tr>
                <tr>
                    <td><b>Penulis: </b></td>
                    <td>{{$book->penulis}}</td>
                </tr>
                <tr>
                    <td><b>Halaman: </b></td>
                    <td> {{$book->halaman}}</td>
                </tr>
                <tr>
                    <td><b>Bahasa: </b></td>
                    <td> {{$book->bahasa}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="sinopsis text-start p-6  lg:w-[60%] w-[100%]">
      <p><b><i>Sinopsis:</i></b></p>
      <br>
      {{$book->deskripsi}}</div>
    </div>

    <script>
      function toggleEbook() {
          var ebookContainer = document.getElementById('ebookContainer');
          ebookContainer.style.display = (ebookContainer.style.display === 'none') ? 'block' : 'none';
      }
      </script>
 @endsection


