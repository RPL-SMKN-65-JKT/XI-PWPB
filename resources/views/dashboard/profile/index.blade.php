@extends('dashboard.layouts.main')

@section('content')
<div class="w-full flex flex-col text-black">

  @if (session()->has('success'))  
    <div class="w-[50vw] absolute right-0 top-24 bg-green-600 flex items-center lg:w-[20vw] xl:w-[15vw] py-4 px-3 text-white text-sm gap-2" id="successNotif">
      <div class=""><i class="fa-solid fa-circle-check fa-2xl"></i></div>
      <span>{{ session('success') }}</span>
      <button type="button" class="font-bold" id="closeNotifBtn">&#10005;</button>
    </div>
    @endif

    @error('profile_picture')
    <div class="w-[50vw] absolute right-0 top-24 bg-red-600 flex items-center lg:w-[20vw] xl:w-[15vw] py-4 px-3 text-white text-sm gap-2" id="successNotif">
      <div class=""><i class="fa-solid fa-circle-xmark fa-xl"></i></div>
      <span>{{ $message }}</span>
      <button type="button" class="font-bold" id="closeNotifBtn">&#10005;</button>
    </div>
    @enderror
  <span class="px-8 py-2 font-bold text-2xl border-b-2">Profil Saya</span>
  <div class="w-full flex gap-4">
    <form action="/dashboard/profile/{{ auth()->user()->id }}" method="POST" class="w-1/5 flex flex-col gap-4 items-center py-4 justify-start" id="formPicture" enctype="multipart/form-data">
      @csrf
      @method('put')
        {{-- <span class="text-3xl font-bold text-orange-primary w-fit py-2 px-2 border-b-2 border-b-orange-primary"><span class="text-blue-dark">My</span> Profile</span> --}}
        <div style="background-image: url({{ asset('/storage/'.auth()->user()->profile_picture) }})" class="w-3/4 aspect-square bg-cover bg-top"></div>
        <label for="profile_picture" class="bg-orange-primary px-3 py-1 rounded-full text-white cursor-pointer transition duration-200 hover:bg-orange-500">Ganti Foto</label>
        <input type="hidden" hidden name="oldImage" value="{{ auth()->user()->profile_picture }}">
        <input type="file" id="profile_picture" name="profile_picture" hidden>
    </form>
    <div class="w-4/5 flex flex-col bg-white py-4">
      <div class="w-full flex px-2 py-2 border-b">
        <div class="w-1/3 text-lg font-bold">Nama</div>
        <div class="w-2/3 text-lg">{{ auth()->user()->name }}</div>
      </div>
      <div class="w-full flex px-2 py-2 border-b">
        <div class="w-1/3 text-lg font-bold">Username</div>
        <div class="w-2/3 text-lg">{{ auth()->user()->username }}</div>
      </div>
      <div class="w-full flex px-2 py-2 border-b">
        <div class="w-1/3 text-lg font-bold">Jenis Kelamin</div>
        <div class="w-2/3 text-lg">{{ auth()->user()->gender }}</div>
      </div>
      <div class="w-full flex px-2 py-2 border-b">
        <div class="w-1/3 text-lg font-bold">Tempat Tanggal Lahir</div>
        <div class="w-2/3 text-lg"><span>{{ auth()->user()->place_of_birth }}</span>, <span>{{ auth()->user()->date_of_birth }}</span></div>
      </div>
      <div class="w-full flex px-2 py-2 border-b">
        <div class="w-1/3 text-lg font-bold">Email</div>
        <div class="w-2/3 text-lg">{{ auth()->user()->email }}</div>
      </div>
      <div class="w-full flex px-2 py-2 border-b">
        <div class="w-1/3 text-lg font-bold">No. Telepon</div>
        <div class="w-2/3 text-lg">{{ auth()->user()->phone_number }}</div>
      </div>
      <div class="w-full flex px-2 py-2 border-b">
        <div class="w-1/3 text-lg font-bold">Alamat</div>
        <div class="w-2/3 text-lg">{{ auth()->user()->address }}</div>
      </div>
      <div class="flex items-center gap-2">
        <a href="" class="w-fit mt-4 px-3 py-1 text-white bg-orange-primary rounded-full shadow-lg transition duration-200 hover:bg-orange-500">Edit Profil</a>
        <a href="" class="w-fit mt-4 px-3 py-1 text-white bg-orange-primary rounded-full shadow-lg transition duration-200 hover:bg-orange-500">Ganti Password</a>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
    <script>
      let formPicture = document.getElementById("formPicture");
      let profilePicture = document.getElementById("profile_picture");

      profilePicture.addEventListener('change', function() {
        formPicture.submit();
      })

      const closeNotifBtn = document.getElementById('closeNotifBtn');
    if (typeof(closeNotifBtn) != 'undefined' && closeNotifBtn != null)
    {
      closeNotifBtn.addEventListener('click', function() {
        this.parentElement.remove();
      });
    }
    </script>
@endsection