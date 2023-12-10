@extends('layouts.admin')

@section('title', 'Daftar User')

@section('dUser')
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

    @if (session('failed'))
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
                icon: "error",
                title: "{{ session('failed') }}"
            });
        </script>
    @endif
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-center items-center gap-2">
            <button
                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                id="pdfDropDown" data-dropdown-toggle="dropdown">
                <i class="fa-regular fa-file-pdf text-white -ml-1 mr-2"></i>PDF
            </button>
        </div>

        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="pdfDropDown">
                <li>
                    <a href="{{ url('/pdf/user') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i
                            class="fa-solid fa-eye mr-1"></i> Lihat PDF</a>
                </li>
                <li>
                    <a href="{{ url('/pdf/user-download') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i
                            class="fa-solid fa-download mr-1"></i> Cetak PDF</a>
                </li>
                <li>
            </ul>
        </div>


        <form class="flex md:flex-nowrap flex-wrap justify-center gap-2 items-center">

            <select id="role" name="role"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block md:w-1/3 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">Pilih Role</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
            </select>

            <div class="md:w-2/3 w-[80%]">
                <label for="searching-user" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="searching-user" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari User...">
            </div>
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
    <div class=" w-full relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4 rounded-l-lg">
                        <div class="flex items-center">
                            No.
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Telepon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="text-center px-6 py-3 rounded-r-lg">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($users->count() > 0)
                    @foreach ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    {{ $loop->iteration }}
                                </div>
                            </td>
                            {{-- <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->nama }}
                </th> --}}
                            <td class="px-6 py-8 font-semibold text-gray-500 font-medium dark:text-white">
                                <div class="flex items-start gap-2">
                                    <img src="{{ $user->foto == null ? asset('/assets/no-img.jpg') : asset('/storage/' . $user->foto) }}"
                                        class="rounded"
                                        style="width: 70px; min-width: 70px; max-width: 70px;
                                    height: 70px; min-height: 70px; max-height: 70px;
                                    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"
                                        alt="user">
                                    <div class="flex flex-col items-start w-full">
                                        <p class="text-lg text-gray-600" style="width: auto !important;">
                                            {{ $user->nama }}<span class="text-gray-500">({{ $user->username }})</span>
                                        </p>
                                        <p class="{{ ($user->role_id == 1 ? 'bg-orange-500' : 'bg-blue-500') }} text-white px-1 rounded-sm">{{ $user->roles->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-8">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-8">
                                {{ $user->telepon }}
                            </td>
                            <td class="px-6 py-8">
                                {{ $user->alamat }}
                            </td>
                            <td class="px-6 py-8 space-x-1">
                                @if ($user->role_id == 1)

                                @else
                                <div class="flex justify-center items-center gap-2">

                                    <a href="detail-user/{{ $user->slug }}" class="" type="button"
                                        data-user-id="{{ $user->slug }}">
                                        <i
                                            class="fa-solid fa-circle-info font-medium text-white text-lg bg-blue-500 rounded p-2"></i>
                                    </a>
                                    <a href="{{ route('editIndex.user', ['slug' => $user->slug]) }}" class="">
                                        <i
                                            class="fa-solid fa-pen-to-square font-medium text-white text-lg bg-green-500 rounded p-2"></i>
                                    </a>
                                    <form id="deleteForm" action="{{ route('delete.user', ['slug' => $user->slug]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="button"
                                            onclick="deleteUser('{{ route('delete.user', ['slug' => $user->slug]) }}')"><i
                                                class="fa-solid fa-trash-can font-medium text-white text-lg bg-red-500 rounded p-2"></i></button>
                                    </form>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 text-center" colspan="8">
                            <div class="flex flex-col justify-center items-center gap-2">
                                <img src="{{ asset('assets/no-data.jpg') }}" class="w-32 h-32" alt="">

                                <p>TIDAK ADA DATA PERIZINAN</p>
                            </div>
                        </td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>


    <script>
        function deleteUser(route) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Anda tidak dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#ff3d41',
                cancelButtonText: 'Batal',
                cancelButtonColor: '#8fcc34',
            }).then((result) => {
                if (result.isConfirmed || result.response == 200) {
                    // Submit form dengan AJAX
                    document.getElementById('deleteForm').action = route;
                    document.getElementById('deleteForm').submit();

                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'USER BERHASIL DIHAPUS',
                        icon: 'success',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading();
                            const timer = Swal.getPopup().querySelector('b');
                            const timerInterval = setInterval(() => {
                                timer.textContent = `${Swal.getTimerLeft()}`;
                            }, 100);
                            Swal.getPopup().timerInterval = timerInterval;
                        },
                        willClose: () => {
                            clearInterval(Swal.getPopup().timerInterval);
                        }
                    }).then(() => {
                        window.location.reload();
                        window.location.href = 'daftar-user'
                    });
                }
            });
        }
    </script>
@endsection
