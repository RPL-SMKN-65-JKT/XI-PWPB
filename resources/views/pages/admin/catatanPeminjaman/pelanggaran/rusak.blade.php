@extends('layouts.admin')

@section('title', 'Rusak')

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
    <div class="flex flex-wrap justify-between items-center">
        <div class="flex justify-center items-center gap-2">
            <a href="{{ url('/pdf/peminjaman/rusak') }}">
                <button id="pdfDropDown" data-dropdown-toggle="dropdown"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                    type="button">
                    <i class="fa-regular fa-file-pdf text-lg text-white -ml-1 mr-2"></i>LIHAT PDF
                </button>
            </a>

            <a href="{{ url('/pdf/peminjaman/rusak-download') }}">
                <button id="pdfDropDown" data-dropdown-toggle="dropdown"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                    type="button">
                    <i class="fa-solid fa-download text-lg text-white -ml-1 mr-2"></i>CETAK PDF
                </button>
            </a>
        </div>


        <form class="flex items-center">
            <label for="searching" class="sr-only">Search</label>
            <div class="relative w-full">
                <input type="text" id="searching" name="nama"
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
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kode
                    </th>
                    <th scope="col" class="px-6 py-3" style="padding: 0px 20px;">
                        Peminjam
                    </th>
                    <th scope="col" class="px-6 py-3" style="padding: 0px 20px;">
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
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>

                @if ($rent->count() > 0)
                    @foreach ($rent as $item)
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
                                        class="rounded" style="width: 60px; max-width: 60px; min-width: 60px;  height: 60px; max-height: 60px; min-height: 60px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;" alt="Apple Watch">
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
                                {{ $item->tanggal_pinjam }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->tanggal_kembali }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ number_format($item->denda, 0, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                                {{ $item->status }}
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
