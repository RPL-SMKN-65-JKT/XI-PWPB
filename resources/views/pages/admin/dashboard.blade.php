@extends('layouts.admin')

@section('title', 'Dashboard')
@section('count_buku', $totalBuku)
@section('count_user', $totalUsers)

<style>
    .hero {
        height: 30vh;
        background-image: url('https://img.freepik.com/premium-photo/3d-illustration-black-thick-books-isolated-black-background_351397-674.jpg?size=626&ext=jpg&uid=R56490936&ga=GA1.2.1149922704.1691593168&semt=ais');
    }
</style>


@section('total_user')
    @csrf
    <a href="{{ url('daftar-user') }}"
        class="flex justify-between items-center text-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">
        <div class="flex justify-between items-center p-4 leading-normal ">
            <div class="text-left">
                <p class="text-3xl pl-4">
                    {{ $totalUsers }}
                </p>
                <h5 class=" mb-2 text-xl font-bold tracking-tight ">Total User</h5>
            </div>

        </div>
        <div class="icon flex justify-between items-center p-4 leading-normal">
            <i class="fa-solid fa-users text-2xl"></i>
        </div>
    </a>
@endsection

@section('total_buku')
    @csrf
    <a href="{{ url('daftar-buku') }}"
        class="flex justify-between items-center text-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">
        <div class="flex justify-between items-center p-4 leading-normal ">
            <div class="text-left">
                <p class="text-3xl pl-4">{{ $totalBuku }}</p>
                <h5 class=" mb-2 text-xl font-bold tracking-tight ">Total Buku</h5>
            </div>

        </div>
        <div class="icon flex justify-between items-center p-4 leading-normal">
            <i class="fa-solid fa-book text-2xl"></i>
        </div>
    </a>
@endsection

@section('rent_log_online')
    @csrf
    <a href="#"
        class="flex justify-between items-center text-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">
        <div class="flex justify-between items-center p-4 leading-normal ">
            <div class="text-left">
                <p class="text-3xl pl-4">{{ $totalPeminjaman }}</p>
                <h5 class=" mb-2 text-xl font-bold tracking-tight ">Total Peminjaman</h5>
            </div>

        </div>
        <div class="icon flex justify-between items-center p-4 leading-normal">
            <i class="fa-solid fa-clipboard text-3xl"></i>
        </div>
    </a>
@endsection

@section('rent_log_offline')
    @csrf
    <a href="#"
        class="flex justify-between items-center text-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300">
        <div class="flex justify-between items-center p-4 leading-normal ">
            <div class="text-left">
                <p class="text-3xl pl-4">{{ $totalPerizinan }}</p>
                <h5 class=" mb-2 text-xl font-bold tracking-tight ">Total Perizinan eBook</h5>
            </div>

        </div>
        <div class="icon flex justify-between items-center p-4 leading-normal">
            <i class="fa-solid fa-clipboard text-3xl"></i>
        </div>
    </a>
@endsection



@section('dPelanggaran')
    <div class="flex justify-between items-center" style="margin-top: 30px;">
        <div class="flex justify-center items-center gap-2">
            <button data-modal-target="qr-modal" data-modal-toggle="qr-modal"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                type="button">
                <i class="fa-solid fa-qrcode text-white -ml-1 mr-2"></i>QR SCANNER
            </button>
            <button id="pdfDropDown" data-dropdown-toggle="dropdown"
                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                type="button">
                <i class="fa-regular fa-file-pdf text-lg text-white -ml-1 mr-2"></i>PDF
            </button>
        </div>



        <!-- Dropdown menu -->
        <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="pdfDropDown">
                <li>
                    <a href="{{ url('/pdf/peminjaman/dipinjam') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i
                            class="fa-solid fa-eye mr-1"></i> Lihat PDF</a>
                </li>
                <li>
                    <a href="{{ url('/pdf/peminjaman/dipinjam-download') }}"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><i
                            class="fa-solid fa-download mr-1"></i> Cetak PDF</a>
                </li>
                <li>
            </ul>
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
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 rounded-l-lg">
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
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-r-lg">
                        Action
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
                                    <img src="{{ $item->users->foto == null ? asset('assets/no-img.jpg') : asset('/storage/' . $item->users->foto) }}"
                                        class="w-16 max-w-16 h-16 max-h-16 rounded"
                                        style="width: 60px; max-width: 60px; min-width: 60px;  height: 60px; max-height: 60px; min-height: 60px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                        alt="Apple Watch">
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
                                        style="width: 60px; max-width: 60px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                        alt="Buku">
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
                                {{ $item->status }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <a href="{{ url('/catatan-dipinjam/dikembalikan/' . $item->kode) }}">
                                        <i class="fa-regular fa-square-check text-white bg-green-500 p-2 rounded"></i>
                                    </a>

                                    <button data-modal-target="pelanggaran-{{ $item->kode }}"
                                        data-modal-toggle="pelanggaran-{{ $item->kode }}">
                                        <i class="fa-regular fa-rectangle-xmark text-white bg-red-500 p-2 rounded"></i>
                                    </button>
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









    @foreach ($rent as $item)
        <!-- Main modal -->
        <div id="pelanggaran-{{ $item->kode }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Pilih Jenis Pelanggaran
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="pelanggaran-{{ $item->kode }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Masukkan total denda sesuai dengan
                            besarnya pelanggaran.</p>
                        <ul class="my-4 space-y-3">
                            <li class="">
                                <button data-modal-target="rusak-{{ $item->kode }}"
                                    data-modal-toggle="rusak-{{ $item->kode }}"
                                    class="flex justify-start items-center p-3 text-left font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white w-full">
                                    <i
                                        class="fa-solid fa-circle-exclamation text-xl text-white bg-red-500 rounded p-2"></i>
                                    <span class="ml-3 flex-1 ms-3 whitespace-nowrap text-xl">Rusak</span>
                                </button>
                            </li>
                            <li class="">
                                <button data-modal-target="hilang-{{ $item->kode }}"
                                    data-modal-toggle="hilang-{{ $item->kode }}"
                                    class="flex justify-start items-center p-3 text-left font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white w-full">
                                    <i
                                        class="fa-solid fa-circle-exclamation text-xl text-white bg-red-500 rounded p-2"></i>
                                    <span class="ml-3 flex-1 ms-3 whitespace-nowrap text-xl">Hilang</span>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div id="rusak-{{ $item->kode }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Masukkan Denda Rusak
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="rusak-{{ $item->kode }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{ route('denda.rusak', ['kode' => $item->kode]) }}"
                            method="post">
                            @csrf
                            <div>
                                <input type="text" name="denda" id="dendaRusak"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Rp 50.000" required>
                            </div>

                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <div id="hilang-{{ $item->kode }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Masukkan Denda Hilang
                        </h3>
                        <button type="button"
                            class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="hilang-{{ $item->kode }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form class="space-y-4" action="{{ route('denda.hilang', ['kode' => $item->kode]) }}"
                            method="post">
                            @csrf
                            <div>
                                <input type="text" name="denda" id="dendaHilang"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Rp 50.000" required>
                            </div>

                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Main modal -->
    <div id="qr-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        <i class="fa-solid fa-qrcode text-white bg-blue-700 rounded p-1 text-lg -ml-1 mr-1"></i>QR SCANNER
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="qr-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div id="reader" width="600px" height="600px"></div>
                    <input type="hidden" name="result" id="result">
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button"
                        class="ms-3 text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                </div>
            </div>
        </div>
    </div>



    <div class="w-full bg-white rounded-lg dark:bg-gray-800 p-4 md:p-6" style="margin-top: 20px; box-shadow: rgba(0, 0, 0, 0.148) 0px 3px 8px;">
        <div class="flex justify-between">
            <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">{{ $chartTotalData }}</h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Peminjaman Seminggu Ini</p>
            </div>
        </div>
        <div id="peminjaman-chart"></div>
        {{-- <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
            <div class="flex justify-between items-center pt-5">
                <!-- Button -->
                <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                    data-dropdown-placement="bottom"
                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    7 Hari Terakhir
                    <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="lastDaysdropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <form>
                            <li>
                                <button name="filterChart" value="7-hari" type="submit"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">7 Hari Terakhir</button>
                            </li>
                            <li>
                                <button name="filterChart" value="14-hari" type="submit"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">14 Hari Terakhir</button>
                            </li>
                            <li>
                                <button name="filterChart" value="30-hari" type="submit"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">30 Hari Terakhir</button>
                            </li>
                            <li>
                                <button name="filterChart" value="60-hari" type="submit"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">60 Hari Terakhir</button>
                            </li>
                            <li>
                                <button name="filterChart" value="90-hari" type="submit"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">90 Hari Terakhir</button>
                            </li>
                            <li>
                                <button name="filterChart" value="setahun" type="submit"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">1 Tahun Terakhir</button>
                            </li>
                        </form>
                    </ul>
                </div>
                <a href="#"
                    class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                    Lihat Selengkapnya
                    <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                </a>
            </div>
        </div> --}}
    </div>



    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // $('#result').val('test');
        function onScanSuccess(decodedText, decodedResult) {
            // alert(decodedText);
            $('#result').val(decodedText);
            let id = decodedText;
            html5QrcodeScanner.clear().then(_ => {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({

                    url: "{{ route('qrDipinjam') }}",
                    type: 'POST',
                    data: {
                        _methode: "POST",
                        _token: CSRF_TOKEN,
                        qr_code: id
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status != false) {
                            if (response.status == true) {
                                let timerInterval;
                                Swal.fire({
                                    title: "PEMINJAMAN BERHASIL!",
                                    html: "Peminjam Telah Mengembalikan Buku",
                                    icon: "success", // Add this line for success icon
                                    timer: 2500,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                        const timer = Swal.getPopup().querySelector("b");
                                        timerInterval = setInterval(() => {
                                            timer.textContent =
                                                `${Swal.getTimerLeft()}`;
                                        }, 100);
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval);
                                    }
                                }).then((result) => {
                                    /* Read more about handling dismissals below */
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        location.reload(true);
                                    }
                                });
                            } else {
                                let timerInterval;
                                Swal.fire({
                                    title: "PEMINJAMAN TERLAMBAT!",
                                    html: "Peminjaman Terlambat Mengembalikan Buku",
                                    icon: "warning", // Add this line for success icon
                                    timer: 3500,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading();
                                        const timer = Swal.getPopup().querySelector("b");
                                        timerInterval = setInterval(() => {
                                            timer.textContent =
                                                `${Swal.getTimerLeft()}`;
                                        }, 100);
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval);
                                    }
                                }).then((result) => {
                                    /* Read more about handling dismissals below */
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        location.reload(true);
                                        window
                                    }
                                });
                            }

                        } else {
                            let timerInterval;
                            Swal.fire({
                                title: "QR CODE INVALID!",
                                html: "Invalid Qr Code! Silahkan Scan Ulang!",
                                icon: "error", // Add this line for success icon
                                timer: 2500,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent =
                                            `${Swal.getTimerLeft()}`;
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    location.reload(true);
                                    // window.location.href = '/catatan-terlambat';

                                }
                            });

                        }

                    }
                });
            }).catch(error => {
                alert('something wrong');
            });

        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
    <script>
        // Fungsi untuk menghapus karakter selain angka
        function formatRupiah(angka) {
            var numberString = angka.toString().replace(/[^,\d]/g, '');
            var split = numberString.split(',');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp ' + rupiah;
        }

        // Event listener untuk memformat input saat nilai berubah
        document.getElementById('dendaRusak').addEventListener('input', function(event) {
            var inputValue = event.target.value;
            event.target.value = formatRupiah(inputValue);
        });

        document.getElementById('dendaHilang').addEventListener('input', function(event) {
            var inputValue = event.target.value;
            event.target.value = formatRupiah(inputValue);
        });
    </script>
    <script>
        var chartData = <?= json_encode($chartData->toArray()) ?>;

        window.addEventListener("load", function() {
            let peminjamanChart = {
                chart: {
                    height: "100%",
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.75,
                        opacityTo: 0,
                        shade: "#1b63f1",
                        gradientToColors: ["#1b63f1"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: 0
                    },
                },
                series: [{
                    name: "Total Peminjaman",
                    data: chartData.map(item => item
                    .total_peminjaman),
                    color: "#1b63f1",
                }],
                xaxis: {
                    categories: chartData.map(item => item.tanggal_pinjam),

                    labels: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
            }

            if (document.getElementById("peminjaman-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("peminjaman-chart"), peminjamanChart);
                chart.render();
            }
        });
    </script>
@endsection
