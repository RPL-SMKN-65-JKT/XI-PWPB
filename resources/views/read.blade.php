@extends('layouts.user')

@section('content')

    <div class="bg-[#EDE7E8] min-h-screen p-6">
        <div class="bg-white p-8 rounded-md flex flex-col items-center justify-center h-screen">
            
           <iframe src="{{ '/storage/' . $file }}" frameborder="0" class="h-screen" style="width: 80%"></iframe>

        </div>
    </div>
    
@endsection