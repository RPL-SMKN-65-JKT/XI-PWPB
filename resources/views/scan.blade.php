@extends('layouts.admin')

@section('content')
    <div class="p-5 mt-14 sm:ml-64 bg-[#EDE7E8] h-fit">
        <div id="reader" width="600px"></div>
    </div>
    @vite('resources/js/scan.js')

@endsection