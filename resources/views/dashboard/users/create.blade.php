@extends('dashboard.layouts.main')

@section('content')
  <form action="{{ url('/dashboard/users') }}" method="POST" enctype="multipart/form-data" class="w-full flex flex-col text-black p-4 gap-6" >
    @csrf
    <span class="w-fit font-bold text-2xl p-2 border-b-2 border-b-cream-primary text-blue-primary self-center lg:self-start">Masukkan Data User</span>
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-4">
      <div class="w-full flex flex-col gap-4">
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Nama Lengkap</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('name') is-invalid @enderror">
              <input type="text" placeholder="Masukkan Nama Lengkap" class="w-full outline-none" name="name" id="name" required value="{{ old('name') }}">
          </div>
          @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Tempat Lahir</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('place_of_birth') is-invalid @enderror">
              <input type="text" placeholder="Masukkan Tempat Lahir" class="w-full outline-none" name="place_of_birth" id="place_of_birth" required value="{{ old('place_of_birth') }}">
          </div>
          @error('place_of_birth')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Tanggal Lahir</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('date_of_birth') is-invalid @enderror">
              <input type="date" placeholder="Masukkan Tanggal Lahir" class="w-full outline-none" name="date_of_birth" id="date_of_birth" required value="{{ old('date_of_birth') }}">
          </div>
          @error('date_of_birth')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Jenis Kelamin</span>
            <select name="gender" id="gender" class="w-full flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md outline-none @error('gender') is-invalid @enderror">
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          @error('gender')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Nomor Telepon</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('phone_number') is-invalid @enderror">
              <input type="text" placeholder="Masukkan Nomor Telepon" class="w-full outline-none" name="phone_number" id="phone_number" required value="{{ old('phone_number') }}">
          </div>
          @error('phone_number')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Email</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('email') is-invalid @enderror">
              <input type="email" placeholder="Masukkan Email" class="w-full outline-none" name="email" id="email" required value="{{ old('email') }}">
          </div>
          @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
      </div>
      <div class="w-full flex flex-col gap-4">
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Username</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('username') is-invalid @enderror">
              <input type="text" placeholder="Masukkan Username" class="w-full outline-none" name="username" id="username" required value="{{ old('username') }}">
          </div>
          @error('username')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Password</span>
          <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('password') is-invalid @enderror">
              <input type="password" placeholder="Masukkan Password" class="w-full outline-none" name="password" id="password" required value="{{ old('password') }}">
              <button type="button" id="pwHiddenBtn"><i class="fa-solid fa-eye"></i></button>
          </div>
          @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Alamat</span>
            <textarea name="address" id="address" class="w-full h-[128px] outline-none bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md resize-none" placeholder="Masukkan Alamat">{{ old('address') }}</textarea>
            @error('address')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        @can('admin')  
        <div class="flex flex-col gap-0.5">
          <span class="text-base font-semibold">Role</span>
            <select name="role_id" id="role_id" class="w-full flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md outline-none @error('role_id') is-invalid @enderror">
              @foreach ($roles as $role)
              <option value="{{ $role->id }}" {{ $role->id == 3 ? 'selected' : '' }}>{{ $role->title }}</option>
              @endforeach
            </select>
          @error('role_id')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>
        @endcan
      </div>
    </div>
    <button type="submit" class="self-end bg-orange-primary text-white py-2 px-8 text-lg font-semibold rounded-full">Register</button>
    </form>
@endsection

@section('script')
  <script>
    const pwHiddenButton = document.getElementById('pwHiddenBtn');

    pwHiddenButton.addEventListener('click', function() {
      const inputPassword = this.previousElementSibling;
      const iconBtn = this.firstElementChild.classList;
      if (inputPassword.type === "password") {
            inputPassword.type = "text";
            iconBtn.replace("fa-eye", "fa-eye-slash")
        } else {
            inputPassword.type = "password"
            iconBtn.replace("fa-eye-slash", "fa-eye")
        }
    })
  </script>
@endsection