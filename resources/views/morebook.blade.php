@extends('layouts.user')

@section('content')

    <div class="bg-[#EDE7E8] min-h-screen p-6">
        <div class="bg-white p-8 rounded-md flex flex-col h-screen">
            
            <div class="overflow-x-auto flex">
                @forelse ($books as $book)
                  
                  <article class="mr-5 flex-none py-6 px-3">
                    <a href="/book/{{ $book->slug }}">
                      <img class="w-auto h-48"  src="{{ env('APP_URL')."storage".$book->cover }}" alt="">
                      <h1 class="text-black font-normal text-lg">{{ Str::limit(ucwords($book->title), 10, '...') }}</h1>
                    </a>
                  </article>
                
                @empty
                  
                  <p>Tidak ada buku</p>
                    
                @endforelse
            </div>

        </div>
    </div>
    
@endsection