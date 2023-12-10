@extends('layouts.admin')
@section('title', 'Edit User')

<style>
    .bg {
        background-image: url('https://img.freepik.com/premium-photo/3d-illustration-black-thick-books-isolated-black-background_351397-674.jpg?size=626&ext=jpg&uid=R56490936&ga=GA1.2.1149922704.1691593168&semt=ais');
        background-position: bottom;
        background-size: cover;
        background-attachment: fixed;
    }
</style>

@section('editBuku')
    <form method="post" action="{{ route('edit.user', ['slug' => $user->slug]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        @if ($errors->any())
            <div class="alert alert-danger" style="width: auto;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex flex-wrap justify-center items-center w-full">
            <div class="mb-6 w-1/2 pr-1">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="nama" name="nama"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nama Lengkap" value="{{ $user->nama }}" required>
            </div>
            <div class="mb-6 w-1/2 pl-1">
                <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon</label>
                <input type="text" id="telepon" name="telepon"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="08**********" required value="{{ $user->telepon }}">
            </div>
        </div>

        <div class="flex flex-wrap justify-between items-center w-full">
            <div class="mb-6 pr-1" style="width: 25%;">
                <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profil
                    Picture</label>
                <img id="imagePreview"
                    src="{{ $user->foto == null ? asset('assets/no-img.jpg') : asset('storage/' . $user->foto) }}"
                    alt="Preview"
                    style="box-shadow: rgba(50, 50, 93, 0.115) 0px 6px 12px -2px, rgba(0, 0, 0, 0.061) 0px 3px 7px -3px; border-radius: 10px; display: ; border: 1px solid rgba(0, 0, 0, 0.161); max-width: 290px; min-width: 290px; width: 290px; max-height: 290px; min-height: 290px; height: 290px;">
                <input type="file" accept="image/*" id="gambar" name="foto"
                    class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-6 pl-1" style="width: 72%">
                <div class="flex">
                    <div class="w-1/2 mt-6 pr-1">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="text" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required value="{{ $user->email }}">
                    </div>

                    <div class="w-1/2 mt-6 pl-1">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            Role</label>
                        <select id="role" name="role_id"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="{{ $user->role_id }}" selected>Pilih Role</option>
                            <option value="{{ 1 }}">Admin</option>
                            <option value="{{ 2 }}">User</option>
                        </select>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-1/2 mt-6 pr-1">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" id="username" name="username"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required value="{{ $user->username }}">
                    </div>

                    <div class="w-1/2 mt-6 pl-1">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                </div>



                <label for="alamat"
                    class="block mb-2 mt-6 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <textarea name="alamat" id="alamat" rows="5"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>{{ $user->alamat }}</textarea>
            </div>
        </div>


        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>



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
