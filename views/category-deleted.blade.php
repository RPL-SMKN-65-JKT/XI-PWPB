@extends('layout.menu')
@section('title', 'Deleted categories')
@section('content')
 <h1 class="pl-5 font-bold text-lg"> Deleted Category List </h1>

 <div class="my-5 flex justify-end ">
  <a href="/category-deleted" class="mx-5 mr-2 py-2 px-4 bg-orange-500 text-white font-semibold rounded-lg shadow-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">Deleted Data</a>
  <a href="/categories" class="mx-5 py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">List Data</a>
 </div>
<div>
  @if (session('status'))
 <div class="alert alert-succes bg-green-500 px-3 py-2 w-72 ml-5 mt-5">
  {{session('status')}}
 </div>
 @endif
</div>
 

 <div class="my-5 pl-5">
   
    <div class="not-prose relative bg-slate-50 rounded-xl overflow-hidden dark:bg-slate-800/25"><div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#fff,rgba(255,255,255,0.6))] dark:bg-grid-slate-700/25 dark:[mask-image:linear-gradient(0deg,rgba(255,255,255,0.1),rgba(255,255,255,0.5))]" style="background-position: 10px 10px;"></div><div class="relative rounded-xl overflow-auto"><div class="shadow-sm overflow-hidden my-8">
        <table class="border-collapse table-fixed w-full text-sm">
          <thead>
            <tr>
              <th class="border-b dark:border-slate-600 p-4 pl-8 pt-0 pb-3 text-black font-bold dark:text-slate-200 text-left">No</th>
              <th class="border-b dark:border-slate-600  p-4 pt-0 pb-3  text-black font-bold dark:text-slate-200 text-left">Name</th>
              <th class="border-b dark:border-slate-600 p-4 pr-8 pt-0 pb-3  text-black font-bold dark:text-slate-200 text-left">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white dark:bg-slate-800">
            @foreach ($deletedCategories as $item)
            <tr>
              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $loop->iteration }}</td>
              <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{ $item->name }}</td>
              <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400"><a class="mx-2 py-2 px-4 rounded-lg bg-green-500 text-white" href="category-restore/{{$item->slug}}">Restore</a>
               
              </td>
            </tr>
            
            </tr>
            @endforeach
          </tbody>
        </table>
      </div></div><div class="absolute inset-0 pointer-events-none border border-black/5 rounded-xl dark:border-white/5"></div></div>
 </div>

@endsection