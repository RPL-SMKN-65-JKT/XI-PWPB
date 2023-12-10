@extends('layouts.user')

@section('content')
    <div class="bg-[#EDE7E8] min-h-screen p-6">
        <div class="bg-white p-8 rounded-md">
            {{-- @php
                dd(auth()->user()->credentials || auth()->user()->isMember);
            @endphp --}}
            @if (auth()->user()->credentials || auth()->user()->isMember)
                @if (auth()->user()->isMember)
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium">Hai!</span> Kamu adalah member perpus 65.
                        </div>
                    </div>
                @elseif (auth()->user()->credentials)
                    <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                          <span class="font-medium">Harap bersabar!</span> Admin akan verifikasi akun mu dalam beberapa waktu.
                        </div>
                    </div>
                @endif
            @else
                <h1 class="text-2xl font-bold">Your Account</h1>
                <p class="text-sm mb-6">You must fill your data in order to be a member.</p>

                <form action="/myaccount" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">

                    <label for="NIS" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                    <input type="text" id="NIS" name="nis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4" required>
            
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="nama" name="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4" required>
            
                    <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-4" required>
            
                    <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    
                    <p class="text-sm mt-3"><i class="fa-solid fa-circle-exclamation mr-2 text-yellow-200 text-lg"></i>data cannot be edited.</p>
                    <button type="submit" class="text-white bg-[#4B9CD6] hover:bg-[#437ca5] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 w-full mt-5">Submit</button>
                    <p class="mt-5 text-center">Go to <a href="/" class="text-blue-700">home</a></p>
                </form>
            @endif

            @if (auth()->user()->isMember)
                <h1 class="text-xl font-semibold mb-6 mt-8">Buku yang anda pinjam</h1>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-black mt-3">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Judul Buku
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal Peminjaman
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deadline Pengembalian
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($borrows as $borrow)
                                
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->index + 1 }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $borrow->book->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ date('d/m/Y', strtotime($borrow->created_at)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ date('d/m/Y', strtotime($borrow->deadline)) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($borrow->returned)
                                            <p class="texl-lg text-green-400 font-semibold">Dikembalikan</p>
                                        @elseif(strtotime($borrow->deadline) < time())
                                            <p class="texl-lg text-red-400 font-semibold">Telat!</p>
                                        @else
                                            <p class="texl-lg text-yellow-400 font-semibold">Meminjam</p>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="/return/{{ $borrow->kode }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Kembalikan</a>
                                    </td>
                                </tr>

                            @empty
                                <p>No data</p>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            @endif

            {{-- logout --}}
            <h1 class="text-xl font-semibold mb-6 mt-8">Sign out</h1>
            <a href="/signout">
                <button type="button" class="text-gray-900 bg-white border border-red-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 w-full">Logout</button>
            </a>
        </div>
    </div>
@endsection