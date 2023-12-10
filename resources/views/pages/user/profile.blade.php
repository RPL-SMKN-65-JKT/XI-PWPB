@extends('layouts.main')

@section('title', Auth::user()->username)

@section('content')
    <style>
        .informasi {
            min-width: 300px;
            margin-top: -60px;
            width: 30%;
        }

        .informasi-form {
            min-width: 500px;
            width: 70%;
        }

        @media(max-width: 1000px) {
            .informasi {
                min-width: 100px !important;
                width: 90%;
            }

            .informasi-form {
                min-width: 100px !important;
                width: 90%;
            }
        }


        .bg-header {
            height: 300px;
        }

        @media(max-width: 1245px) {
            .bg-header {
                height: 230px;
            }
        }

        @media(max-width: 1000px) {
            .bg-header {
                height: 190px;
            }
        }

        @media(max-width: 700px) {
            .bg-header {
                height: 140px;
            }
        }

        @media(max-width: 400px) {
            .bg-header {
                height: 70px;
            }
        }
    </style>

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

    <div class="h-full bg-gray-200" style="margin-top: 80px;">
        <div class="bg-white rounded-lg shadow-xl md:p-8 p-0">
            <div class="w-full bg-header">
                <img src="{{ asset('assets/profile-bg.jpg') }}" class="rounded-tl-lg rounded-tr-lg">
            </div>
            <div class="flex flex-wrap justify-center items-start w-full">

                <div class="informasi">

                    <div class="flex flex-col items-center">
                        <img src="{{ Auth::user()->foto == null ? asset('assets/no-img.jpg') : asset('storage/' . Auth::user()->foto) }}"
                            style="width: 120px; box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset; max-width: 120px; min-width: 120px;  height: 120px; max-height: 120px; min-height: 120px;"
                            class="bg-white rounded-full" id="imagePreview">
                        <div class="flex justify-center items-center gap-8 w-full mt-4">
                            <div class="flex flex-col items-center">
                                <p class="text-xl font-semibold">{{ $pinjamCount }}</p>
                                <p class="text-md">Meminjam</p>
                            </div>

                            <div class="flex flex-col items-center">
                                <p class="text-xl font-semibold">7</p>
                                <p class="text-md">Izin eBook</p>
                            </div>

                            <div class="flex flex-col items-center">
                                <p class="text-xl font-semibold">{{ $pelanggaranCount }}</p>
                                <p class="text-md">Pelanggaran</p>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 flex flex-col space-y-4 2xl:space-y-0 2xl:space-x-4" style="width: 100%;">
                        <div class="flex flex-col ">
                            <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
                                <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
                                <ul class="mt-2 text-gray-700">
                                    <li class="flex border-y py-2">
                                        <span class="font-bold w-24">Username:</span>
                                        <span class="text-gray-700">{{ Auth::user()->username }}</span>
                                    </li>
                                    <li class="flex border-y py-2">
                                        <span class="font-bold w-24">Nama:</span>
                                        <span class="text-gray-700">{{ Auth::user()->nama }}</span>
                                    </li>
                                    <li class="flex border-b py-2">
                                        <span class="font-bold w-24">Email:</span>
                                        <span class="text-gray-700">{{ Auth::user()->email }}</span>
                                    </li>
                                    <li class="flex border-b py-2">
                                        <span class="font-bold w-24">Telepon:</span>
                                        <span class="text-gray-700">{{ Auth::user()->telepon }}</span>
                                    </li>
                                    <li class="flex flex-wrap gap-1 border-b py-2">
                                        <span class="font-bold w-24">Alamat:</span>
                                        <span class="text-gray-700">{{ Auth::user()->alamat }}</span>
                                    </li>

                                    <li class="flex flex-col gap-1 border-b py-2">
                                        <a href="{{ url('histori-peminjaman/' . Auth::user()->slug) }}"
                                            class="text-semibold w-24 text-white bg-indigo-500 px-2 py-1 w-full rounded uppercase text-center">
                                            <span class="">Histori Peminjaman</span>
                                        </a>

                                        <a href="{{ url('histori-peminjaman/' . Auth::user()->slug) }}"
                                            class="text-semibold w-24 text-white bg-green-500 px-2 py-1 w-full rounded uppercase text-center">
                                            <span class="">Histori Izin eBook</span>
                                        </a>

                                        <a href="{{ url('histori-pelanggaran/' . Auth::user()->slug) }}"
                                            class="text-semibold w-24 text-white bg-red-500 px-2 py-1 w-full rounded uppercase text-center">
                                            <span class="">Histori Pelanggaran</span>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="md:p-6 p-2 md:mb-0 mb-8 flex flex-col informasi-form"
                    action="{{ route('profil.edit', ['slug' => Auth::user()->slug]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mt-4">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="username" name="username" id="username" value="{{ Auth::user()->username }}"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                    </div>

                    <div class="mt-4">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="nama" name="nama" id="nama" value="{{ Auth::user()->nama }}"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                    </div>

                    <div class="mt-4">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                    </div>

                    <div class="mt-4">
                        <label for="telepon"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon</label>
                        <input type="telepon" name="telepon" id="telepon" value="{{ Auth::user()->telepon }}"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                    </div>

                    <div class="mt-4">
                        <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profil
                            Picture</label>
                        <input type="file" accept="image/*" name="foto" id="gambar"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full px-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mt-4">
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="20"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-md shadow-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>{{ Auth::user()->alamat }}</textarea>
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                            class="sign-button w-full text-white bg-indigo-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-md shadow-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save</button>
                    </div>
                </form>


            </div>
        </div>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('gambar');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', function() {
                if (imageInput.files && imageInput.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.style.display = 'block';
                    };

                    reader.readAsDataURL(imageInput.files[0]);
                }
            });
        });
    </script>

@endsection
