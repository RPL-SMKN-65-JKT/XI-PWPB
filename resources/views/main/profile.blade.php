@extends('main.layouts.main')

@section('content')
<section id="profile_wrapper" class="mt-[76px] w-full h-full p-2 lg:container lg:mx-auto lg:flex lg:gap-4">
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
  {{-- Mobile Profile Start --}}
  <div id="profileMobile" class="lg:hidden w-full h-full flex flex-col items-center">
    <div class="w-full h-[712px] flex items-center justify-center">
      <div class="absolute z-10 rounded-full w-[600px] h-[600px] -top-[385px] flex flex-col items-center justify-end" style="background-color: #5de6de; background-image: linear-gradient(315deg, #5de6de 0%, #b58ecc 74%);">
        <span class="absolute bottom-20 text-white font-semibold text-2xl">{{ $user->name }}</span>
        <div class="w-32 h-32 rounded-full bg-white p-0.5 overflow-hidden absolute -bottom-16">
          <div style="background-image: url({{ asset('/storage/'.auth()->user()->profile_picture) }})" class="w-full h-full rounded-full bg-cover bg-center"></div>
        </div>
        
      </div>
      <div class="w-full px-8 flex flex-col items-center justify-center gap-8 mt-14">
        <div class="w-full flex flex-col gap-2 items-center justify-center">
          <div class="flex px-2 gap-4 w-full border-b items-center justify-between py-1">
            <div class="w-6 text-blue-primary">
              <i class="fa-solid fa-user fa-lg"></i>
            </div>
            <span>{{ $user->username }}</span>
          </div>
          <div class="flex px-2 gap-4 w-full border-b items-center justify-between py-1">
            <div class="w-6 text-blue-primary">
              <i class="fa-solid fa-venus-mars fa-lg"></i>
            </div>
            <span>{{ $user->gender }}</span>
          </div>
          <div class="flex px-2 gap-4 w-full border-b items-center justify-between py-1">
            <div class="w-6 text-blue-primary">
              <i class="fa-solid fa-calendar-days fa-lg"></i>
            </div>
            <span><span>{{ $user->place_of_birth }}, </span>{{ $user->date_of_birth }}</span>
          </div>
          <div class="flex px-2 gap-4 w-full border-b items-center justify-between py-1">
            <div class="w-6 text-blue-primary">
              <i class="fa-solid fa-phone fa-lg"></i>
            </div>
            <span>{{ $user->phone_number }}</span>
          </div>
          <div class="flex px-2 gap-4 w-full border-b items-center justify-between py-1">
            <div class="w-6 text-blue-primary">
              <i class="fa-solid fa-envelope fa-lg"></i>
            </div>
            <span>{{ $user->email }}</span>
          </div>
          <div class="flex px-2 gap-4 w-full border-b items-center justify-between py-1">
            <div class="w-6 text-blue-primary">
              <i class="fa-solid fa-location-dot fa-lg"></i>
            </div>
            <span class="text-right">{{ $user->address }}</span>
          </div>
        </div>
        <div class="w-full flex items-center justify-center gap-2 text-xs">
          <a href="" class="px-3 py-2 text-white bg-orange-primary rounded-full shadow-lg transition duration-200 hover:bg-orange-500">Edit Profil</a>
          <a href="" class="px-3 py-2 text-white bg-orange-primary rounded-full shadow-lg transition duration-200 hover:bg-orange-500">Ganti Password</a>
          <a href="" class="px-3 py-2 text-white bg-orange-primary rounded-full shadow-lg transition duration-200 hover:bg-orange-500">Ganti Foto</a>
        </div>
      </div>
    </div>
  </div>
  {{-- Mobile Profile End --}}
  <div id="profileDesktop" class="hidden w-full h-full lg:flex py-4 gap-4">
    @include('main.partials.sidebar')
    <div class="w-5/6 flex flex-col rounded-lg shadow-lg bg-white border">
      <span class="px-8 py-2 font-bold text-2xl border-b-2">Profil Saya</span>
      <div class="w-full flex gap-4">
        <form action="/profile/{{ auth()->user()->id }}" method="POST" class="w-1/5 flex flex-col gap-4 items-center bg-white py-4 justify-start" id="formPicture" enctype="multipart/form-data">
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
</section>
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