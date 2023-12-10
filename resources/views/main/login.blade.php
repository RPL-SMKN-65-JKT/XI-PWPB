@extends('main.layouts.mainWithoutFooter')

@section('content')
{{-- Hero Section Start --}}
<section id="hero" class="w-full h-screen bg-center bg-cover sm:text-left" style="background-image: url('{{ asset('img/bg-loginRegister.jpg') }}')">
    <div class="w-full h-screen flex items-center justify-around bottom-6" style="background-color: rgba(0, 0, 0, 0.50)">
        <div class="w-[325px] bg-white flex flex-col border-t-8 border-t-blue-primary border-b-4 border-b-blue-primary p-5">
            <form action="/login" method="POST" class="w-full flex flex-col p-2.5 gap-5">
                @csrf
                <span class="font-medium text-blue-primary text-xl">Login to your account</span>
                <div class="flex bg-white border border-[#afafaf] px-2.5 py-1">
                    <input type="text" placeholder="Username" class="w-full outline-none" name="username" required autocomplete="off">
                </div>
            <div class="flex bg-white border border-[#afafaf] px-2.5 py-1">
                    <input type="password" placeholder="Password" class="w-full outline-none" id="password" name="password" required autocomplete="off">
                    <button type="button" class="togglePassword"><i class="fa-solid fa-eye"></i></button>
                </div>
                @if (session()->has('failed'))
                    <span class="text-xs font-light text-red-500">Error : {{ session('failed') }}</span>
                @endif
                <button type="submit" class="bg-orange-primary px-2.5 py-1 text-white text-base">Login</button>
            </form>
            <div class="flex items-center justify-center bg-blue-primary text-white p-2.5 text-sm">
                <span>Don't Have Account? <a href="/register"><span class="font-bold">Register Here</span></a></span>
            </div>
        </div>
    </div>
</section>
{{-- Hero Section End --}}

<script>
    const togglePassword = document.querySelector('.togglePassword');

    togglePassword.addEventListener('click', function() {
        const inputPassword = this.previousElementSibling;
        if (inputPassword.type === "password") {
            inputPassword.type = "text";
            this.firstElementChild.classList.replace("fa-eye", "fa-eye-slash")
        } else {
            inputPassword.type = "password"
            this.firstElementChild.classList.replace("fa-eye-slash", "fa-eye")
        }
    });
</script>
@endsection