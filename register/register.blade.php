<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="boxicons/css/boxicons.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
   
    <link href="build/css/demo.css" rel="stylesheet">
    <link href="build/css/intlTelInput.css" rel="stylesheet">
   
    <title>Registrasi Perpustakaan</title>

    {{-- manggil tailwind --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- end --}}
</head>
<body>
    <section class="w-[1440px] bg-white px-[50px] py-8 rounded-2xl">
      @if ($errors->any())
      {{-- <div class="alert alert-danger bg-red-500 items-center mb-4 p-4 text-white border-t-4 border-red-200 text-center"style="width: auto"> --}}
        <ul>
          @foreach ($errors->all() as $error)
          <script>
            Swal.fire({
                title: "Oops...",
                text: "{{ $error }}!",
                icon: "error"
                });
        </script>
          {{-- <li>{{ $error }}</li> --}}
          @endforeach
        </ul>
      </div>
      @endif

      @if (session('status'))
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('message') }}!",
        icon: "success"
        });
</script>
@endif
      {{-- @if (session('status'))
      <div id="alert-border-3" class="flex items-center mb-4 p-4 text-green-400 border-t-4 border-green-200 bg-green-100 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
        <div class="ml-3 text-sm font-medium">
          {{ session('message')}}
        </div>
        
      </div>
      @endif --}}
      <header class="font-bold pb-5 pt-5 text-2xl">Buat Akun</header>
      <form action="#" class="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-x-4">
          <div class="flex flex-col gap-1">
            <div class="input-box">
              <label class="font-bold">Nama Lengkap</label>
              <input name="name" type="text" placeholder="Enter full name" value="{{old('name')}}" required />
            </div>
            <div class="w-full grid grid-cols-2 gap-x-2">
              <div class="input-box">
                <label class="font-bold">Tempat</label>
                <input name="TempatLahir" type="text" placeholder="Tempat anda lahir" value="{{old('TempatLahir')}}" required />
              </div>
              <div class="input-box">
                <label class="font-bold">Tanggal Lahir</label>
                <input name="TanggalLahir" type="date" placeholder="Enter birth date" {{old('TanggalLahir')}} required />
              </div>
            </div>
            <div class="input-box w-full flex flex-col gap-1">
              <label class="font-bold">Address</label>
              <textarea name="address" class="w-full border outline-none h-52">{{old('address')}}</textarea>
            </div>
          </div>
          <div class="flex flex-col gap-1">
            <div class="input-box flex flex-col gap-2">
              <label class="font-bold">Phone Number</label>
              <input name="nomorTlp" type="tel" id="phone" placeholder="No.Telepon +62" value="{{old('nomorTlp')}}" required />
            </div>
            <div class="input-box ">
              <label class="font-bold">Email Address</label>
              <input  name="email" type="text" placeholder="Masukan Email" value="{{old('email')}}" required />
            </div>
            <div class="input-box">
              <label class="font-bold">Username</label>
              <input name="username" type="text" placeholder="Buat Username" value="{{old('username')}}" required />
            </div>
            <div class="input-box">
              <label class="font-bold">Password</label>
              <input name="password" type="password" placeholder="Buat Password"  required />
            </div>
            <div class="input-box ">
              <label class="font-bold">Profile Image</label>
              <input id="profile_image" type="file" name="profile_image" accept="image/*" value="{{old('profile_image')}}" required />
            </div>

          </div>
        </div>
      


        
        
          
        </div>
        <button type="submit">Sign Up</button>

        <p class="text-center p-10">Sudah punya akun?<a class="text-[#F637EC]" href="/login">Login sekarang!</a></p>
      </form>
    </section>
    <script src="build/js/intlTelInput.js"></script>
    <script> 
       var input = document.querySelector("#phone");
       window.intlTelInput(input,{});
    </script>
  </body>

  <style>
    /* Import Google font - Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}
body {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 20px;
  background: linear-gradient(108deg, #FDFF89 0%, #FFE91F 100%);
}
.container {
  position: relative;
  max-width: 700px;
  width: 100%;
  background: #fff;
  padding: 25px;
  border-radius: 8px;
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}
.container header {
  font-size: 1.5rem;
  color: #333;
  font-weight: 500;
  text-align: center;
}
.container .form {
  margin-top: 30px;
}
.form .input-box {
  width: 100%;
  margin-top: 20px;
}
.input-box label {
  color: #333;
}
.form :where(.input-box input, .select-box) {
  position: relative;
  height: 50px;
  width: 100%;
  outline: none;
  font-size: 1rem;
  color: #707070;
  margin-top: 8px;
  border: 1px solid #ddd;
  border-radius: 6px;
  padding: 0 15px;
}
.input-box input:focus {
  box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
}
.form .column {
  display: flex;
  column-gap: 15px;
}
.form .gender-box {
  margin-top: 20px;
}
.gender-box h3 {
  color: #333;
  font-size: 1rem;
  font-weight: 400;
  margin-bottom: 8px;
}
.form :where(.gender-option, .gender) {
  display: flex;
  align-items: center;
  column-gap: 50px;
  flex-wrap: wrap;
}
.form .gender {
  column-gap: 5px;
}
.gender input {
  accent-color: rgb(130, 106, 251);
}
.form :where(.gender input, .gender label) {
  cursor: pointer;
}
.gender label {
  color: #707070;
}
.address :where(input, .select-box) {
  margin-top: 15px;
}
.select-box select {
  height: 100%;
  width: 100%;
  outline: none;
  border: none;
  color: #707070;
  font-size: 1rem;
}
.form button {
  height: 55px;
  width: 100%;
  color: #fff;
  font-size: 1rem;
  font-weight: 400;
  margin-top: 30px;
  border: none;
  cursor: pointer;
  transition: all 0.2s ease;
  border-radius: 12px;
  background:rgb(253 224 71);
}
.form button:hover {
  
  background: linear-gradient(270deg, #FDFF89 0%, #FFE91F 100%);
}
/*Responsive*/
@media screen and (max-width: 500px) {
  .form .column {
    flex-wrap: wrap;
  }
  .form :where(.gender-option, .gender) {
    row-gap: 15px;
  }
}
  </style>
</html>