@extends('main.layouts.mainWithoutFooter')

@section('content')
    {{-- Hero Section Start --}}
    <section id="hero" class="w-full h-full bg-center bg-cover sm:text-left lg:h-screen" style="background-image: url('{{ asset('img/bg-loginRegister.jpg') }}')">
        <div class="w-full h-full flex items-center justify-around bottom-6 lg:h-screen" style="background-color: rgba(0, 0, 0, 0.50)">
            <form action="/register" method="POST" class="w-full mt-[76px] bg-white flex flex-col border-t-8 border-t-blue-primary border-b-4 border-b-blue-primary p-5 gap-2.5 lg:w-4/5 xl:w-3/5">
                @csrf
                <span class="font-medium text-blue-primary text-xl">Register your account</span>
                <div class="w-full grid grid-cols-1 px-5 py-2 gap-2">
                    <div class="w-full grid grid-cols-1 p-2.5 gap-5 lg:grid-cols-2">
                        <div class="w-full flex flex-col gap-5">
                            <div class="flex flex-col gap-[2px]">
                                <div class="flex bg-white border border-[#afafaf] px-2.5 py-1 @error('name') is-invalid @enderror">
                                    <input type="text" placeholder="Nama Lengkap" class="w-full outline-none" name="name" required value="{{ old('name') }}">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <div class="flex bg-white border border-[#afafaf] px-2.5 py-1 @error('place_of_birth') is-invalid @enderror">
                                    <input type="text" placeholder="Tempat Lahir" class="w-full outline-none" name="place_of_birth" required value="{{ old('place_of_birth') }}">
                                </div>
                                @error('place_of_birth')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="flex bg-white border border-[#afafaf] px-2.5 py-1 @error('date_of_birth') is-invalid @enderror">
                                    <input type="date" placeholder="Tanggal Lahir" class="w-full outline-none" name="date_of_birth" required value="{{ old('date_of_birth') }}">
                                </div>
                                @error('date_of_birth')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col gap-2">
                                <span class="font-bold">Jenis Kelamin</span>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center gap-1">
                                        <input type="radio" name="gender" id="pria" value="Pria">
                                        <label for="pria">Pria</label>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <input type="radio" name="gender" id="wanita" value="Wanita">
                                        <label for="wanita">Wanita</label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex bg-white border border-[#afafaf] px-2.5 py-1 @error('address') is-invalid @enderror">
                                    <textarea name="address" id="address" class="w-full outline-none h-20" placeholder="Alamat" required value="{{ old('address') }}"></textarea>
                                </div>
                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full flex flex-col gap-5">
                            <div class="flex flex-col">
                                <div class="flex bg-white border border-[#afafaf] px-2.5 py-1 @error('email') is-invalid @enderror">
                                    <input type="email" placeholder="Email" class="w-full outline-none" name="email" required value="{{ old('email') }}">
                                </div>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="flex bg-white border border-[#afafaf] px-2.5 py-1 @error('phone_number') is-invalid @enderror">
                                    <input type="text" placeholder="No. Telepon" class="w-full outline-none" name="phone_number" required value="{{ old('phone_number') }}">
                                </div>
                                @error('phone_number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="flex bg-white border border-[#afafaf] px-2.5 py-1 @error('username') is-invalid @enderror">
                                    <input type="text" placeholder="Username" class="w-full outline-none" name="username" required value="{{ old('username') }}">
                                </div>
                                @error('username')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <div class="flex bg-white border border-[#afafaf] px-2.5 py-1">
                                    <input type="password" placeholder="Password" class="w-full outline-none @error('password') is-invalid @enderror" id="password" name="password" required>
                                    <button type="button" class="togglePassword"><i class="fa-solid fa-eye"></i></button>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="bg-orange-primary px-2.5 py-1 text-white text-base w-full self-center">Register</button>
                </div>
                <div class="flex items-center justify-center bg-blue-primary text-white p-2.5 text-sm">
                    <span>Already Have Account? <a href="{{ url("/login") }}"><span class="font-bold">Login Here</span></a></span>
                </div>
            </form>
        </div>
    </section>
    {{-- Hero Section End --}}

    <script>
        const togglePassword = document.querySelectorAll('.togglePassword');

        togglePassword.forEach(e => {
            e.addEventListener('click', function() {
        const inputPassword = this.previousElementSibling;
        if (inputPassword.type === "password") {
            inputPassword.type = "text";
            this.firstElementChild.classList.replace("fa-eye", "fa-eye-slash")
        } else {
            inputPassword.type = "password"
            this.firstElementChild.classList.replace("fa-eye-slash", "fa-eye")
        }
    });
        });

    

    </script>
@endsection