<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" type="text/css" href="{{ asset('tema/css/dashboard.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Book Rent | @yield('title') </title>
    <link href="{{ asset('tema/img/65.png') }} " rel="icon" />
    <link href="{{ asset('tema/img/65.png') }}" rel="apple-touch-icon" />
</head>
<body>
    <div class="container">
        <div class="navigation">
            @if (Auth::user())
            <ul>
                <li>
                    <a href="#">
                        <img src="{{ asset('tema/img/65.png') }}" class="ml-3 mt-4" style="height:40px; width:40px;" alt="65 logo" loading="lazy" />
                        <span class="title mt-2">Perpustakaan 65</span>
                    </a>
                </li>
                
           
            @if (Auth::user()->role_id == 1)
                <li>
                    <a href="/dashboard">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/profile">
                        <span class="icon"><i class="fa-solid fa-address-card"></i></span>
                        <span class="title">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="/books">
                        <span class="icon"><ion-icon name="book-outline"></ion-icon></span>
                        <span class="title">Booklist</span>
                    </a>
                </li>
                <li>
                    <a  href="/categories" @if(request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-deleted') class='active' @endif >
                        <span class="icon"><ion-icon name="apps-outline"></ion-icon></span>
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="/users">
                        <span class="icon"><i class="fa-solid fa-users"></i></ion-icon></span>
                        <span class="title">Users</span>
                    </a>
                </li>
               
              
                <li>
                    <a href="/rent-log">
                        <span class="icon"><i class="fa-solid fa-list"></i></span>
                        <span class="title">Rent Log</span>
                    </a>
                </li>
              
                <li>
                    <a href="/book-rent">
                        <span class="icon"><i class="fa-solid fa-book"></i></span>
                        <span class="title">Book Rent</span>
                    </a>
                </li>
                <li>
                    <a href="/book-return">
                        <span class="icon"><i class="fa-solid fa-right-left"></i></span>
                        <span class="title">Book Return</span>
                    </a>
                </li>
                
                <li>
                    <a href="/logout">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
            @elseif (Auth::user()->role_id == 2)
            
            
            <li>
                <a href="/profile">
                    <span class="icon"><i class="fa-solid fa-address-card"></i></span>
                    <span class="title">Profile</span>
                </a>
            </li>
            <li>
                <a href="/users">
                    <span class="icon"><i class="fa-solid fa-users"></i></ion-icon></span>
                    <span class="title">Users</span>
                </a>
            </li>
           
          
            <li>
                <a href="/rent-log">
                    <span class="icon"><i class="fa-solid fa-list"></i></span>
                    <span class="title">Rent Log</span>
                </a>
            </li>
          
            <li>
                <a href="/book-rent">
                    <span class="icon"><i class="fa-solid fa-book"></i></span>
                    <span class="title">Book Rent</span>
                </a>
            </li>
            <li>
                <a href="/book-return">
                    <span class="icon"><i class="fa-solid fa-right-left"></i></span>
                    <span class="title">Book Return</span>
                </a>
            </li>
            
            <li>
                <a href="/logout">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
            @elseif (Auth::user()->role_id == 3)
            <li>
                <a href="/book-rent">
                    <span class="icon"><i class="fa-solid fa-book"></i></span>
                    <span class="title">Book Rent</span>
                </a>
            </li>
            <li>
                <a href="/book-return">
                    <span class="icon"><i class="fa-solid fa-right-left"></i></span>
                    <span class="title">Book Return</span>
                </a>
            </li>
            <li>
                <a href="/">
                    <span class="icon"><i class="fa-solid fa-house"></i></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li>
                <a href="/logout">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="title">Sign Out</span>
                </a>
            </li>
            @endif
        </div>
        @endif

       
        {{-- cards --}}
        <div class="main">
            <div class="topbar mb-5">
                   <div class="toggle">
                       <ion-icon name="menu-outline"></ion-icon>
                   </div>
                   
                   
                {{-- userImg --}}
                <div class="user ">
                    <img class="rounded-full" src="{{ asset('storage/profile/'.Auth::user()->profile_image) }}" alt="">
           
                   <p class="text-uppercase">{{ Auth::user()->name }}</p>
               </div>
            </div>

            <div>
                @yield('content')

            </div>
          

         
        </div>

       
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
 <script>
    // menutoggle
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');
    
    toggle.onclick = function()
    {
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }




    // add hovered class in selected div
    let list = document.querySelectorAll('.navigation li');
    function activeLink(){
        list.forEach((item) => 
        item.classList.remove('hovered'));
        this.classList.add('hovered');
    }
    list.forEach((item) => 
    item.addEventListener('mouseover', activeLink));
 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
 
</body>
</html>