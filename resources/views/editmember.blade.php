@extends('layouts.admin')

@section('content')
   <div class="p-5 sm:ml-64 bg-[#EDE7E8] h-fit">
      <p class="text-black text-2xl mt-16 sm:mt-10 ml-3">Members</p>
     <div class="flex-col h-fit mb-4 rounded-md bg-gray-50 dark:bg-gray-800 mt-3 border border-black pl-4 pt-2 pr-4">
        <h1 class="text-black text-2xl font-bold">Edit Member</h1>
      <form action="/member/edit" method="POST">
         @csrf
         <input type="hidden" name="id" value="{{ $member->id }}">
         <div class="sm:flex sm:mt-8">
           <div class="sm:w-[50%] mb-8 mt-8 sm:mt-0">
               <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edit Nama :</label>
               <input type="text" id="name" name="name" value="{{ $member->name }}" placeholder="Masukan Nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full sm:w-[90%]" required>
               <label for="jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5 sm:mt-8">Jurusan :</label>
               <select id="jurusan" name="major" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full sm:w-[90%]" required>
                 <option selected disabled>Edit Jurusan</option>
                 <option value="RPL" @if ($member->major == "RPL") selected @endif>Rekayasa Perangkat Lunak</option>
                 <option value="PFTV" @if ($member->major == "PFTV") selected @endif>PFTV</option>
                 <option value="MM" @if ($member->major == "MM") selected @endif>Multimedia</option>
               </select>
           </div>
           <div class="sm:w-[50%] mb-5">
               <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edit NIS :</label>
               <input type="text" id="NIS" name="nis" value="{{ $member->nis }}" placeholder="Masukan NIS" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full sm:w-[90%]" required>
               <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5 sm:mt-8">Edit kelas :</label>
               <input type="text" id="kelas" name="class" value="{{ $member->class }}" placeholder="Kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full sm:w-[90%]" required>
           </div>
        </div>

        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Edit email akun :</label>
        <input type="text" id="email" name="email" value="{{ $member->email }}" placeholder="Masukan email akun yg akan dibuat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full mb-4" required> 
        
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Edit password :</label>
        <input type="text" id="password" name="password" placeholder="Abaikan jika tidak ingin mengganti password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 w-full mb-4">
        
        <button type="submit" class="mb-5 text-white bg-[#4B9CD6] hover:bg-[#437ca5] focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 w-full ">Edit Member !</button>
      </form>
   </div>
@endsection