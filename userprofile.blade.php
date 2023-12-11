<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Two+Tone" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="tema/css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- logo -->
<link href="tema/img/65.png" rel="icon" />
    <link href="tema/img/65.png" rel="apple-touch-icon" />
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.1/dist/full.css" rel="stylesheet" type="text/css" />
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Perpustakaan</title>
</head>
<body class="dark:bg-[#2B2B2B]">
<!-- Main navigation container (navbar) -->
<br>
<nav id="navbar" class="mr-10 ml-10 relative flex items-center  dark:bg-[#404040] dark:text-white bg-[#e8e8e8] rounded-full py-2 lg:mb-0 lg:pr-2 shadow-md" data-te-navbar-ref>
    <!-- Collapsible navigation container -->
    <div class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto" id="navbarSupportedContent1" data-te-collapse-item>
      <!-- Logo -->
      <a class="mb-4 ml-5 mr-5 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-white dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0" href="#">
        <img src="tema/img/65.png" style="height:40px; width:40px;" alt="65 logo" loading="lazy" />
      </a>
      <p class="tag text-xl/[128px] font-bold leading-normal w-800 dark:text-white" style="margin-left: -5px;">User's Detail</p>
    </div>
    <!-- Right elements -->
    <button class="text-black dark:text-white bg-white dark:bg-[#2B2B2B] font-semibold text-lg rounded-full  px-5 py-1 text-center inline-flex items-center shadow-md dark:focus:ring-slate-900" type="button">
      {{ Auth::user()->username }}
    {{-- <p class="text-gray-300 font-thin text-2xl ml-5 mr-5">|</p>
        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 36 36" fill="none">
            <path d="M18 3C26.28 3 33 9.72 33 18C33 26.28 26.28 33 18 33C9.72 33 3 26.28 3 18C3 9.72 9.72 3 18 3ZM9.0345 23.124C11.2365 26.409 14.5425 28.5 18.24 28.5C21.936 28.5 25.2435 26.4105 27.444 23.124C24.9476 20.7909 21.6569 19.4952 18.24 19.5C14.8226 19.4948 11.5313 20.7905 9.0345 23.124ZM18 16.5C19.1935 16.5 20.3381 16.0259 21.182 15.182C22.0259 14.3381 22.5 13.1935 22.5 12C22.5 10.8065 22.0259 9.66193 21.182 8.81802C20.3381 7.97411 19.1935 7.5 18 7.5C16.8065 7.5 15.6619 7.97411 14.818 8.81802C13.9741 9.66193 13.5 10.8065 13.5 12C13.5 13.1935 13.9741 14.3381 14.818 15.182C15.6619 16.0259 16.8065 16.5 18 16.5Z" fill="#2B2B2B"/>
        </svg>
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg> --}}
</button>
    <div class="flex ml-2 bg-yellow-300 rounded-full dark:bg-[#C318FF] px-3 py-2">
      <img class="sun cursor-pointer w-[25px]" src="tema/img/sun.svg">
      <img class="moon cursor-pointer w-[20px] display-none" src="tema/img/moon.svg">
    </div>

  </div>
</nav>
  <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
</div>
<br>

<hr class="dark:bg-[#2B2B2B] w-full"
        color="#ECECEC"
        size="5" >
        @if (session('status'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('status') }}!",
                icon: "success"
                });
        </script>
        @endif
<div class="flex flex-wrap justify-center items-start gap-4">
  <a href="/">
    <button class="bg-[#FFEC39] md:w-[50px] md:h-[50px] w-[35px] h-[35px] mt-8 rounded-lg shadow-yellow-200 shadow-xl hover:bg-yellow-200 hover:shadow-none hover:ease-in-out transition duration-200">
      <svg class="ml-3" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
          <path d="M10 8.75V13.75L2.5 7.5L10 1.25V6.25H16.25C18.9022 6.25 21.4457 7.30357 23.3211 9.17893C25.1964 11.0543 26.25 13.5978 26.25 16.25C26.25 18.9022 25.1964 21.4457 23.3211 23.3211C21.4457 25.1964 18.9022 26.25 16.25 26.25H5V23.75H16.25C18.2391 23.75 20.1468 22.9598 21.5533 21.5533C22.9598 20.1468 23.75 18.2391 23.75 16.25C23.75 14.2609 22.9598 12.3532 21.5533 10.9467C20.1468 9.54018 18.2391 8.75 16.25 8.75H10Z" fill="#2B2B2B"/>
      </svg>
  </button>
  </a>
    
    <div class="user-container lg:w-[70%] w-[90%] p-5 mt-8 rounded-xl bg-gray-200 shadow-sm">
        <h1 class="text-4xl font-semibold">{{ Auth::user()->name }}</h1>
        <h2 class="text-gray-600 text-2xl">{{ Auth::user()->username }}</h2>
        <h3 class="mt-2"><span class="text-yellow-400">{{ Auth::user()->TempatLahir }}</span> · {{ Auth::user()->TanggalLahir }}</h3>
        <table class="text-sm mt-2">
            <tr>
                <td><b>Email</b></td>
                <td>:</td>
                <td> {{ Auth::user()->email }}</td>
            </tr>
            <tr class="mt-3">
                <td><b>Nomor HP</b></td>
                <td>:</td>
                <td> {{ Auth::user()->nomorTlp }}</td>
            </tr>
            <tr class="mt-3">
                <td><b>Alamat</b></td>
                <td>:</td>
                <td> {{ Auth::user()->address }}</td>
            </tr>
        </table>
    </div>
    <form method="post" action="/userprofile" enctype="multipart/form-data">
      @csrf
      <div class="user-profile flex flex-col items-center lg:w-[70%] w-[100%]">
        <img id="imagePreview" src="{{ asset('storage/profile/'.Auth::user()->profile_image) }}" style="width: 190px; height: 190px;" class="rounded-md mt-8 shadow-lg">
        <input  type="file" accept="image/*" id="imageInput" name="profile_image" class="pt-2 block w-full border-slate-300 text-sm text-slate-500
        file:mr-4 file:py-2 file:px-4
        file:rounded-full file:border-0
        file:text-sm file:font-semibold
        file:bg-violet-50 file:text-[#287bff]
        hover:file:bg-blue-100
        " />
    </div>
</div>

<div class="edit-container  w-full flex flex-wrap justify-center items-center rounded-xl gap-4 mb-10">
    <div class="left md:border-r-2 border-r-0 md:border-b-0 border-b-2 md:w-[18%] w-[100%] md:p-0 p-7">
        <h1 class="text-2xl font-semibold">Edit Profile</h1>
        <button type="submit" class="save-button mt-3 bg-yellow-300 py-2 px-7 w-auto rounded-lg shadow-yellow-200 shadow-lg font-semibold hover:bg-yellow-200 hover:shadow-none hover:ease-in-out transition duration-200">Save</button>
    </div>
    <div class="edit-form md:w-[80%] w-[100%] md:p-0 p-7">
      <div class="flex flex-wrap justify-center items-start gap-2">
            <div class="flex flex-col gap-1 lg:w-[49%] w-[100%]">
              <div class="input-box ">
                <label class="font-semibold ml-3">Nama Lengkap</label>
                <br>
                <input value="{{ Auth::user()->name }}" class="bg-[#F0F0F0] p-1.5 rounded-lg border-2 border-[#D6D6D6] w-full" name="name" type="text" placeholder="Enter full name" required />
              </div>
              <div class="w-full mt-3 flex justify-start items-center gap-1">
                <div class="input-box w-[59%]">
                  <label class="font-semibold ml-3">Tempat</label>
                  <br>
                  <input  value="{{ Auth::user()->TempatLahir }}" class="bg-[#F0F0F0] p-1.5 rounded-lg border-2 border-[#D6D6D6] w-full" name="TempatLahir" type="text" placeholder="Tempat anda lahir" required />
                </div>
                <div class="input-box w-[40%]">
                  <label class="font-semibold ml-3">Tanggal Lahir</label>
                  <br>
                  <input  value="{{ Auth::user()->TanggalLahir }}" class="bg-[#F0F0F0] p-1.5 rounded-lg border-2 border-[#D6D6D6] w-full" name="TanggalLahir" type="date" placeholder="Enter birth date" required />
                </div>
              </div>
              <div class="input-box w-full flex flex-col gap-1">
                <label class="font-semibold ml-3">Address</label>
                <textarea name="address" class="bg-[#F0F0F0] p-1.5 rounded-lg border-2 border-[#D6D6D6]  outline-none h-52">{{ Auth::user()->address }}</textarea>
              </div>
            </div>
            <div class="flex flex-col gap-1 lg:w-[50%] w-[100%]">
              <div class="input-box flex flex-col gap-2">
                <label class="font-semibold ml-3">Phone Number</label>
                <input  value="{{ Auth::user()->nomorTlp }}" class="bg-[#F0F0F0] p-1.5 rounded-lg border-2 border-[#D6D6D6] w-full " name="nomorTlp" type="tel" id="phone" placeholder="No.Telepon +62" required />
              </div>
              <div class="input-box mt-3">
                <label class="font-semibold ml-3">Email Address</label>
                <br>
                <input  value="{{ Auth::user()->email }}" class="bg-[#F0F0F0] p-1.5 rounded-lg border-2 border-[#D6D6D6] w-full " name="email" type="text" placeholder="Masukan Email" required />
              </div>
              <div class="input-box mt-3">
                <label class="font-semibold ml-3">Username</label>
                <br>
                <input  value="{{ Auth::user()->username }}" class="bg-[#F0F0F0] p-1.5 rounded-lg border-2 border-[#D6D6D6] w-full " name="username" type="text" placeholder="Buat Username" required />
              </div>
              <div class="input-box mt-3">
                <label class="font-semibold ml-3">Password</label>
                <br>
                <input  id="myInput"  value="{{ Auth::user()->password }}" class="bg-[#F0F0F0] p-1.5 rounded-lg border-2 border-[#D6D6D6] w-full " name="password" type="password" placeholder="Buat Password" required />
                <input type="checkbox" onclick="myFunction()">Show Password
              </div>

            </div>
          </div>
      </div>
    </form>
    
    </div>

   <link rel="stylesheet" href="tema/js/main.js">
   <link rel="stylesheet" href="tema/js/main.js">
   <script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

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

</body>

</html>

