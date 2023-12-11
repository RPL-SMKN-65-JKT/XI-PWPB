
@extends('layout.menu')
@section('title', 'Edit Category')
@section('content')
 
<h1 class="px-5 text-base font-semibold leading-7 text-gray-900">Edit Category</h1>
<p class="px-5 mt-1 text-sm leading-6 text-gray-600">Edit Category.</p>

<div>
   
@if ($errors->any())
<div class="alert alert-danger bg-red-500 px-3 py-2 w-72 ml-5 mt-5">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <form action="/category-edit/{{$category->slug}}" method="post">
        @csrf
        @method('put')
        <div class= "space-y-12 border-gray-900/10 pb-12">
           
      
            <div class="px-5 mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                <div class="mt-2">
                  <input name="name" id="name" type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 px-1 py-1.5 text-black shadow-sm ring-1 ring-inset ring-black sm:text-sm sm:leading-6" placeholder="Category name" value="{{$category->name}}">
                </div>
              </div>
            </div>
          </div>
          <div>
            <button type="submit" class="mx-5 py-2 px-4 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75">Update</button>
          </div>
    </form>
</div>
@endsection