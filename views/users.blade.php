@extends('layout.menu')
@section('title', 'Users')
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
    
    <a href="/user-add" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Add Users</a>
    
   </div>
<div class="ml-5 relative overflow-x-auto shadow-md sm:rounded-lg">
  
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
              
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
              
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Address
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4">
                    {{$loop->iteration}}
                </td>
                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-20 h-20 rounded-full" src="{{ asset('storage/profile/'.$item->profile_image) }}" alt="Jese image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{$item->name}}</div>
                        <div class="font-normal text-gray-500">{{$item->email}}</div>
                    </div>  
                </th>
                <td class="px-6 py-4">
                    {{ $item->username }}
                </td>
                <td class="px-6 py-4">
                    {{ $item->role->name }}
                </td>
            
                <td class="px-6 py-4">
                    {{$item->nomorTlp}}
                </td>
                <td class="px-6 py-4">
                    {{$item->address}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex space-x-1">
                        <a href="/user-detail/{{ $item->slug }}">
                            <i
                                class="p-2 text-md rounded bg-blue-500 text-white fa-solid fa-circle-info"></i>
                        </a>
                        <a href="/user-edit/{{ $item->slug }}">
                            <i
                                class="p-2 text-md rounded bg-green-500 text-white fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="/user-delete/{{ $item->slug }}">
                        <i class="p-2 text-md rounded bg-red-500 text-white cursor-pointer fa-solid fa-trash"  onclick="event.preventDefault(); deleteUser('{{ $item->slug }}');" ></i>
                            
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
    function deleteUser(slug) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menhapus user ini ? ',
                text: 'Anda tidak dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#ff3d41',
                cancelButtonText: 'Batal',
                cancelButtonColor: '#8fcc34',
            }).then((result) => {
                if (result.isConfirmed || response.status == true) {
                    axios.get(`/user-destroy/${slug}`)
                        .then(response => {
                            Swal.fire(
                                'Terhapus!',
                                'User berhasil dihapus.',
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
