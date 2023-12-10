<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')

  <title>PERPUS65</title>
</head>
<body class="font-poppins">
  {{-- Navbar Start --}}
  @include('main.partials.navbar')
  {{-- Navbar End --}}

  {{-- Content Start --}}
  @yield('content')
  {{-- Content End --}}
  <script src="https://kit.fontawesome.com/e1744d5724.js" crossorigin="anonymous"></script>
  <script>
    const dropdownT = document.getElementById("dropdownTrigger");
    const navM = document.getElementById("dropdownNav");
    const profile = document.getElementById("profile");
    const dropdownProfile = document.getElementById("dropdownProfile");

    dropdownT.addEventListener("click", () => navM.classList.toggle("hidden"));

    profile.addEventListener("click", () => dropdownProfile.classList.toggle("hidden"));
  </script>
</body>
</html>