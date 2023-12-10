@extends('layouts.admin')

@section('content')
   <div class="p-5 sm:ml-64 bg-[#EDE7E8] h-fit">
      <p class="text-black text-2xl mt-16 sm:mt-10 ml-3">Members</p>
     <div class="flex-col h-fit mb-4 rounded-md bg-gray-50 dark:bg-gray-800 mt-3 border border-black pl-4 pt-2 pr-4">
        <h1 class="text-black text-2xl font-bold">Add New User</h1>
      <form action="/add-member" method="POST">
         @csrf
         <div class="sm:flex sm:mt-8">
           <div class="sm:w-[50%] mb-8 mt-8 sm:mt-0">
               <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama :</label>
               <input type="text" id="name" name="name" placeholder="Masukan Nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full sm:w-[90%]" required>
               <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5 sm:mt-8">Jurusan :</label>
               <select id="jurusan" name="major" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full sm:w-[90%]" required>
                 <option selected disabled>Pilih Jurusan</option>
                 <option value="RPL">Rekayasa Perangkat Lunak</option>
                 <option value="PFTV">PFTV</option>
                 <option value="MM">Multimedia</option>
               </select>
           </div>
           <div class="sm:w-[50%] mb-5">
               <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS :</label>
               <input type="text" id="NIS" name="nis" placeholder="Masukan NIS" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full sm:w-[90%]" required>
               <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5 sm:mt-8">Kelas :</label>
               <input type="text" id="kelas" name="class" placeholder="Kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full sm:w-[90%]" required>
           </div>
        </div>

        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email akun :</label>
        <input type="text" id="email" name="email" placeholder="Masukan email akun yg akan dibuat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full mb-4" required> 
        
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password sementara :</label>
        <input type="text" id="password" name="password" placeholder="Password akun sementara" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full mb-4" required>
        
        <button type="submit" class="text-white bg-[#4B9CD6] hover:bg-[#437ca5] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 w-full ">Buat Member !</button>
      </form>
     
      <p class="text-black text-2xl mt-5 mb-5">Or add member from existing user</p>
      <form action="/add-member" method="post">
         @csrf
         <label for="usertomember" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5 sm:mt-8">User yang bukan member</label>
         <select id="usertomember" name="usertomember" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full">
           <option selected disabled>Pilih User</option>
           @foreach ($users as $user)
           <option value="{{ $user->id }}">{{ $user->name }}</option>
           @endforeach
         </select>
         <p class="mb-5 text-xs text-gray-800">Note: user yang ada pada opsi adalah user yang telah melengkapi profil.</p>
         <button type="submit" class="text-white bg-[#4B9CD6] hover:bg-[#437ca5] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 w-full mb-6">Jadikan Member !</button>
      </form>
   </div>
@endsection