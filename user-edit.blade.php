@extends('layout.menu')
@section('title', 'Edit User')
@section('content')

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@if ($errors->any())
<div class="alert alert-danger bg-red-500 px-3 py-2 w-96 ml-5 mt-5">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="ml-5 max-w-7xl h-max mb-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
<form enctype="multipart/form-data" method="POST" action="/user-edit/{{$user->slug}}" >
  @csrf
    <h1 class=" mb-10 text-base font-semibold leading-7 text-gray-900">Edit Buku</h1>
    <div class="grid grid-cols-3 gap-x-4">
        <div class="flex flex-col gap-1">
            <div class="mb-3">
                <label for="name" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Name</label>
                <input value="{{ $user->name}}" name="name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="978162537" required>
            </div>
         
            <div class="input-box mb-3 w-full grid grid-cols-2 gap-x-2">
                <div class="input-box">
                  <label class=" block mb-2 text-sm font-bold text-gray-900 dark:text-white">Tempat</label>
                  <input name="TempatLahir" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tempat anda lahir" value="{{$user->TempatLahir}}" required />
                </div>
                <div class="input-box">
                  <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Tanggal Lahir</label>
                  <input name="TanggalLahir" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter birth date" value="{{$user->TanggalLahir}}"  required />
                </div>
              </div>
            
          
            <div class="input-box mb-3">
              <label for="imageInput" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Profile</label>
                @if ($user->profile_image!='')
                <img id="imagePreview" src="{{ asset('storage/profile/'.$user->profile_image) }}" alt="Preview" style="box-shadow: rgba(189, 189, 212, 0.115) 0px 6px 12px -2px, rgba(0, 0, 0, 0.061) 0px 3px 7px -3px; border-radius: 10px; display: ; border: 1px solid rgba(0, 0, 0, 0.161); max-width: 250px; max-height: 250px;">
                @else 
                <img id="imagePreview" alt="Preview" src="{{ asset('tema/img/noCover.png')}}" alt="" style="box-shadow: rgba(50, 50, 93, 0.115) 0px 6px 12px -2px,rgba(0, 0, 0, 0.061) 0px 3px 7px -3px; border-radius: 10px; display: ; border: 1px solid rgba(0, 0, 0, 0.161); max-width: 250px; max-height: 250px;"> 
                @endif
                <input  type="file" accept="image/*" id="imageInput" name="profile_image" class="pt-2 block w-full border-slate-300 text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-[#287bff]
                hover:file:bg-blue-100
                " />
              </div>
             
         
        </div>

        <div class="flex flex-col gap-1">
          <div class="input-box mb-3">
            <label for="username" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Username</label>
                <input value="{{$user->username}}" name="username" type="text" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Judul Buku" required>
          </div>
          <div class="input-box mb-3">
            <label for="email" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Email</label>
            <input value="{{$user->email}}" name="email" type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Penerbit Buku" required>
          </div>
          <div class="input-box">
            <label for="address" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Address</label>
            <textarea id="address"  name="address" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >{{$user->address}}</textarea>
            

          </div>

        </div>
        <div class="flex flex-col gap-1">
          <div class="input-box mb-3">
            <label for="password" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Password</label>
                <input value="{{$user->password}}" name="password" type="text" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Penulis Buku" required>
          </div>
          <div class="input-box mb-3">
      
                <label class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Phone Number</label>
                <input name="nomorTlp" type="tel" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="No.Telepon +62" value="{{$user->nomorTlp}}" required />
          
          </div>

          <div class="input-box mb-3">
            <label for="role" class="block mb-2 text-sm font-bold text-gray-900 dark:text-white">Role user</label>
       
            <select name="role_id" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
         
                <option selected disabled>Pilih Role</option>
                
                 @foreach ($role as $posisi)
                    <option value="{{ $posisi->id }}" {{ $posisi->id == $user->role_id ? 'selected' : '' }}>
                        {{ $posisi->name }}
                    </option>
                @endforeach 
            </select>
          </div>
          

            
        
            
      
        {{-- <div class="w-full" > --}}
  
        {{-- <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Pilih Kategori Buku<svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
        </svg></button>

        <!-- Dropdown menu -->

        <div id="dropdownSearch" class="z-10 hidden bg-white shadow-slate-500 shadow-2xl rounded-lg  w-60 dark:bg-gray-700">
          <div class="p-3">
            <label for="input-group-search" class="sr-only">Search</label>

          </div>
          <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
            @foreach ($categories as $item)
            <li>
              <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                <input id="category" type="checkbox" name="categories[]" value="{{$item->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500" required>
                <label for="category" class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{$item->name}}</label>
              </div>
            </li>
            @endforeach
          </ul>

        </div> --}}
       {{-- </div> --}}
        </div>
      </div>
    
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
<script src="build/js/intlTelInput.js"></script>
<script> 
   var input = document.querySelector("#phone");
   window.intlTelInput(input,{});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  const imageInput = document.getElementById('imageInput');
  const imagePreview = document.getElementById('imagePreview');

  imageInput.addEventListener('change', function () {
      if (imageInput.files && imageInput.files[0]) {
          const reader = new FileReader();

          reader.onload = function (e) {
              imagePreview.src = e.target.result;
              imagePreview.style.display = 'block';
          };

          reader.readAsDataURL(imageInput.files[0]);
      }
  });
});


</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
  

@endsection