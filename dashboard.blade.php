<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link rel="stylesheet" type="text/css" href="tema/css/dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard</title>
</head>
<body>
    @if (session()->has('success')) 
    <script>
     Swal.fire({
         title: "Berhasil!",
         text: " {{session('success')}} {{ Auth::user()->username }}!",
         icon: "success"
         });
 </script>
  
    @endif 
    <div class="container">
        <div class="navigation">
            
            <ul>
                <li>
                    <a href="#">
                        <img src="tema/img/65.png" class="ml-3 mt-4" style="height:40px; width:40px;" alt="65 logo" loading="lazy" />
                        <span class="title">Perpustakaan 65</span>
                    </a>
                </li>
                
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
                    <a href="/categories"  @if(request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-edit/{slug}' || request()->route()->uri == 'category-deleted') class='active' @endif >
                        <span class="icon"><ion-icon name="apps-outline"></ion-icon></span>
                        <span class="title">Categories</span>
                    </a>
                </li>
                <li>
                    <a href="/users">
                        <span class="icon"><i class="fa-solid fa-users"></i></span>
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
        </div>

        {{-- main --}}

        <div class="main">
         <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                
                
             {{-- userImg --}}
             <div class="user">
                <img class="rounded-full" src="{{ asset('storage/profile/'.Auth::user()->profile_image) }}" alt="">
                <p class="text-uppercase">{{ Auth::user()->name }}</p>
            </div>
          </div>
        {{-- cards --}}
        <div class="cardbox">
            <a href="/books">
                <div class="card">
                    <div>
                       <div class="numbers">{{$book_count}}</div> 
                       <div class="CardName">Books</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-book"></i>
                    </div>
                </div>
            </a>
            <a href="/categories">
                <div class="card">
                    <div>
                       <div class="numbers">{{$category_count}}</div> 
                       <div class="CardName">Categories</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-rectangle-list"></i>
                    </div>
                </div>
            </a>
            <a href="/users">
                <div class="card">
                    <div>
                       <div class="numbers">{{$user_count}}</div> 
                       <div class="CardName">Users</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>
            </a>
            <a href="/users">
                <div class="card">
                    <div>
                       <div class="numbers">{{$petugas_count}}</div> 
                       <div class="CardName">Petugas</div>
                    </div>
                    <div class="iconBox">
                        <i class="fa-solid fa-user-secret"></i>
                    </div>
                </div>
            </a>  
        </div>

        {{-- details list --}}
        <div class="details">
            <div class="pinjaman">
                <div class="cardHeader">
                    <h2>
                        List Pengembalian Buku
                    </h2>
                    
                </div>
                <table class="  w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                          
                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Judul Buku
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal Pinjam
                            </th>
                          
                            <th scope="col" class="px-6 py-3">
                                Deadline
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Status
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rentlogs as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-black ">
                            <td class="px-6 py-7 items-center">
                                {{$loop->iteration}}
                            </td>
                            <th scope="row" class=" px-6  py-4  whitespace-nowrap dark:text-white">
                                {{ $item->user->username }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->book->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->rent_date }}
                            </td>
                        
                            <td class="px-6 py-4">
                                {{$item->return_date}}
                            </td>
                            <td class="px-6 py-6 text-center  ">
                                <p class="{{ $item->actual_return_date == null ? 'bg-[#faad1433] bg-opacity-20 px-10 py-4 font-semibold text-[#faad14] rounded-2xl ' : ($item->return_date < $item->actual_return_date ? 'bg-[#ff4d4f33] bg-opacity-20 px-10 py-3 font-semibold text-[#ff4d4f] rounded-2xl' : 'bg-[#52c41a33] bg-opacity-20 px-10 py-4 font-semibold text-[#52c41a] rounded-2xl')}}">   @if ($item->actual_return_date == null)
                                    On Progress
                                @elseif ($item->return_date < $item->actual_return_date)
                                    Out of Date
                                @else
                                    Done
                                @endif</p>
                                
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- List Users --}}
           
            <div class=" shadow-xl shadow-grey-500 min-h-full p-5 rounded-lg" >
                <h1 class="mb-5 text-[#c318ff]">New Users</h1>
                  <div class="overflow-y-auto h-96 p-5">
                    <ul class="max-w-md   dark:divide-gray-700 ">
                        @foreach($users as $user)
                        <li class="mb-5 sm:pb-4">
                           <div class="flex items-center space-x-4 rtl:space-x-reverse">
                              <div class="flex-shrink-0">
                                 <img class="w-10 h-10 rounded-full" src="{{ asset('storage/profile/'.$user->profile_image) }}"  alt="Neil image">
                              </div>
                              <div class="flex-1 min-w-0">
                                 <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                   {{$user->name}}
                                 </p>
                                 <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                   {{$user->email}}
                                 </p>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                 {{$user->address}}
                              </div>
                           </div>
                        </li>
                        @endforeach
                   
                     </ul>
                  </div>
                
                

 
                {{-- <div class="cardHeader">
                    <h2>
                        New Users
                    </h2>
                </div>
                <table>
                    @foreach($users as $user)
                    <tr>
                        <td width="60px"><div class="imgbox"><img src="{{ asset('storage/profile/'.$user->profile_image) }}" alt=""></div></td>
                        <td><h4>{{$user->name}}<br><span>{{$user->address}}</span></h4></td>
                    </tr>
                   @endforeach
                </table> --}}
            </div>
        </div>
       </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

 <script>
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
</body>
</html>