@extends('layouts.admin')

@section('title', 'Catatan eBook')

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
    <div class="flex justify-end items-center">
        {{-- <button data-modal-target="qr-modal" data-modal-toggle="qr-modal"
            class="w-auto block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            <i class="fa-solid fa-qrcode text-white -ml-1 mr-2"></i>QR SCANNER
        </button> --}}


        <form class="flex items-center">
            <label for="searching-izin" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="searching-izin" name="pengizin"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari Peminjam...">
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
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 text-left" style="padding: 0px 20px;">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3" style="padding: 0px 20px;">
                        Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>

                @if ($perizinan->count() > 0)
                    @foreach ($perizinan as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white"
                                style="padding: 0px 20px;">
                                <div class="flex gap-2">
                                    <img src="{{ ($item->users->foto == null ? asset('assets/no-img.jpg') : asset('/storage/' . $item->users->foto)) }}"
                                        class="w-16 max-w-16 h-16 max-h-16 rounded"
                                        style="width: 60px; max-width: 60px; min-width: 60px;  height: 60px; max-height: 60px; min-height: 60px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                        alt="user">
                                    <div class="flex flex-col items-start">
                                        <p>{{ $item->users->nama }}</p>
                                        <p>{{ $item->users->telepon }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4  font-semibold text-gray-500 font-medium dark:text-white"
                                style="padding: 0px 20px;">
                                <div class="py-2 flex flex-col justify-center items-center w-full">
                                    <img src="{{ asset('/storage/' . $item->buku->gambar) }}" class="rounded"
                                        style="width: 60px; max-width: 60px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" alt="Apple Watch">
                                    <p class="text-md"
                                        style="-webkit-line-clamp: 1;
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;">
                                        {{ $item->buku->nama }}</p>
                                </div>
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->tanggal }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->status }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <form action="{{ route('ebook.setuju', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        <button type="submit">
                                        <i class="fa-regular fa-square-check text-white bg-green-500 p-2 rounded"></i>

                                        </button>
                                    </form>

                                    <form action="{{ route('ebook.delete', ['id' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">
                                            <i class="fa-regular fa-rectangle-xmark text-white bg-red-500 p-2 rounded"></i>
                                        </button>
                                    </form>
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

                                <p>TIDAK ADA DATA PERIZINAN</p>
                            </div>
                        </td>
                    </tr>

                @endif


            </tbody>
        </table>
    </div>



    <div class="flex flex-wrap justify-between items-center mt-8">
        <div class="flex justify-center items-center gap-2">
            <a href="{{ url('/pdf/perizinan/ebook') }}">
                <button id="pdfDropDown" data-dropdown-toggle="dropdown"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                    type="button">
                    <i class="fa-regular fa-file-pdf text-lg text-white -ml-1 mr-2"></i>LIHAT PDF
                </button>
            </a>

            <a href="{{ url('/pdf/perizinan/ebook-download') }}">
                <button id="pdfDropDown" data-dropdown-toggle="dropdown"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                    type="button">
                    <i class="fa-solid fa-download text-lg text-white -ml-1 mr-2"></i>CETAK PDF
                </button>
            </a>
        </div>


        <form class="flex items-center">
            <label for="searching-done" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="searching-done" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Cari Peminjam...">
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
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode
                    </th>
                    <th scope="col" class="px-6 py-3 text-left" style="padding: 0px 20px;">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3" style="padding: 0px 20px;">
                        Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>

                @if ($ebook->count() > 0)
                    @foreach ($ebook as $item)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->kode }}
                            </td>
                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white"
                                style="padding: 0px 20px;">
                                <div class="flex gap-2">
                                    <img src="{{ ($item->users->foto == null ? asset('assets/no-img.jpg') : asset('/storage/' . $item->users->foto)) }}"
                                        class="w-16 max-w-16 h-16 max-h-16 rounded"
                                        style="width: 60px; max-width: 60px; min-width: 60px;  height: 60px; max-height: 60px; min-height: 60px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                        alt="user">
                                    <div class="flex flex-col items-start">
                                        <p>{{ $item->users->nama }}</p>
                                        <p>{{ $item->users->telepon }}</p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4  font-semibold text-gray-500 font-medium dark:text-white"
                                style="padding: 0px 20px;">
                                <div class="py-2 flex flex-col justify-center items-center w-full">
                                    <img src="{{ asset('/storage/' . $item->buku->gambar) }}" class="rounded"
                                        style="width: 60px; max-width: 60px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" alt="Apple Watch">
                                    <p class="text-md"
                                        style="-webkit-line-clamp: 1;
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;">
                                        {{ $item->buku->nama }}</p>
                                </div>
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->tanggal_izin }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                <div class="flex justify-center items-center gap-2">
                                    @if ($item->status == 'Selesai')
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>{{ $item->status }}
                                    @elseif($item->status == 'Siap Download')
                                        <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>
                                        {{ $item->status }}
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

                                <p>TIDAK ADA DATA PERIZINAN</p>
                            </div>
                        </td>
                    </tr>

                @endif


            </tbody>
        </table>
    </div>


@endsection
