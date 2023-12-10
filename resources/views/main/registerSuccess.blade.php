@unless (session()->has('RegisterName'))  
    <script>
      window.location.href = "{{ route('register') }}";
    </script>
@endunless

  @extends('main.layouts.mainWithoutFooter')

  @section('content')
    <section id="hero" class="w-full h-screen bg-center bg-cover sm:text-left" style="background-image: url('{{ asset('img/bg-loginRegister.jpg') }}')">
      <div class="w-full h-screen flex items-center justify-around bottom-6" style="background-color: rgba(0, 0, 0, 0.50)">
          <div class="w-[325px] bg-white flex flex-col border-t-8 border-t-blue-primary border-b-4 border-b-blue-primary p-5 items-center gap-2">
            <div class="w-full flex items-center justify-center">
              <lottie-player src="{{ asset('img/success.json') }}" background="#fff" speed="1" style="width: 150px; height: 150px" loop autoplay direction="1" mode="normal" loading="eager"></lottie-player>
            </div>
            <div class="w-full flex flex-col items-center justify-center">
              <span>Akun <span class="font-bold">{{ session('RegisterName') }}</span></span>
              <span class="text-green-400 font-bold">Berhasil di Registrasi</span>
            </div>
            <a href="{{ url('/login') }}" class="px-4 py-1 bg-orange-primary text-white rounded-full transition duration-150 hover:bg-orange-500">Login Sekarang</a>
          </div>
      </div>
    </section>

    <script src="{{ asset('js/lottie-player.js') }}"></script>
  @endsection