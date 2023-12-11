@extends('layout.menu')

@section('title', 'Booklist')

@section('content')

@if (session('status'))
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('status') }}!",
        icon: "success"
        });
</script>
@endif

<div class="my-5 flex justify-start ">
    
    <a href="/book-add" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>add Book</a>
    
   </div>
<div class="ml-5 relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-10 py-6">
                    No
                </th>
            
                <th scope="col" class="px-10 py-6">
                    Cover & nama
                </th>
                <th scope="col" class="px-10 py-6">
                    ISBN
                </th>
                <th scope="col" class="px-10 py-6">
                    Klasifikasi Buku
                </th>
                <th scope="col" class="px-10 py-6">
                    Jenis Buku
                </th>
                <th scope="col" class="px-10 py-"6>
                    Category
                </th>
                <th scope="col" class="px-10 py-6">
                    Penulis
                </th>
                <th scope="col" class="px-10 py-6">
                    Penerbit
                </th>
                <th scope="col" class="px-10 py-6">
                    Halaman
                </th>
                <th scope="col" class="px-10 py-6">
                    Bahasa
                </th>
                <th scope="col" class="px-10 py-6">
                    Tanggal Terbit
                </th>
           
                <th scope="col" class="px-10 py-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-10 py-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <th scope="row" class="px-10 py-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @if ($item->cover!='')
                    <img class="mb-3" id="imagePreview" src="{{ asset('storage/cover/'.$item->cover) }}" alt="Preview" style="box-shadow: rgba(189, 189, 212, 0.115) 0px 6px 12px -2px, rgba(0, 0, 0, 0.061) 0px 3px 7px -3px; border-radius: 10px; display: ; border: 1px solid rgba(0, 0, 0, 0.161); max-width: 250px; max-height: 250px;">
                    @else 
                    <img class="mb-3" id="imagePreview" alt="Preview" src="{{ asset('tema/img/noCover.png')}}" alt="" style="box-shadow: rgba(50, 50, 93, 0.115) 0px 6px 12px -2px,rgba(0, 0, 0, 0.061) 0px 3px 7px -3px; border-radius: 10px; display: ; border: 1px solid rgba(0, 0, 0, 0.161); max-width: 200px; max-height: 200px;"> 
                    @endif
                    {{-- <img class="pb-5" src="{{ asset('storage/cover/'.$item->cover) }}" alt=""> --}}
                   {{$item->title}}
                </th>
                <td class="px-10 py-6">
                    {{$item->book_code}}
                </td>
                <td class="px-10 py-6">
                
                    {{ $item->classification->name }}
                  
                </td>
                <td class="px-10 py-6">
            
                  {{ $item->type->name }}
            
                  
                </td>
                <td class="px-10 py-6">
                    @foreach ($item->categories as $category)
                    {{$category->name}},
                    @endforeach
                </td>
                <td class="px-10 py-6">
                    {{$item->penulis}}
                </td>
                <td class="px-10 py-6">
                    {{$item->penerbit}}
                </td>
                <td class="px-10 py-6">
                    {{$item->halaman}}
                </td>
                <td class="px-10 py-6">
                    {{$item->bahasa}}
                </td>
                <td class="px-10 py-6">
                    {{$item->tanggal_terbit}}
                </td>
                <td class="flex items-center align-middle px-10 py-6">
                    <div class="flex space-x-1">
                        <a href="/book-detail/{{ $item->slug }}">
                            <i
                                class="p-2 text-md rounded bg-blue-500 text-white fa-solid fa-circle-info"></i>
                        </a>
                        <a href="/book-edit/{{ $item->slug }}">
                            <i
                                class="p-2 text-md rounded bg-green-500 text-white fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="/book-delete/{{ $item->slug }}">
                        <i class="p-2 text-md rounded bg-red-500 text-white cursor-pointer fa-solid fa-trash"  onclick="event.preventDefault(); deleteBarang('{{ $item->slug }}');" ></i>
                            
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function deleteBarang(slug) {
            Swal.fire({
                title: 'Apakah Anda yakin ?',
                text: 'Anda tidak dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#ff3d41',
                cancelButtonText: 'Batal',
                cancelButtonColor: '#8fcc34',
            }).then((result) => {
                if (result.isConfirmed || response.status == true) {
                    axios.get(`/book-destroy/${slug}`)
                        .then(response => {
                            Swal.fire(
                                'Terhapus!',
                                'Buku berhasil dihapus.',
                                'success'
                            );
                            window.location.reload(true);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                } else {
                    Swal.fire(
                                'Invalid!',
                                'INVALID DATA BUKU',
                                'error'
                            );
                            window.location.reload(true);
                }
            });
        }
</script>

@endsection