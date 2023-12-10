@extends('layouts.user')

@section('content')

    <div class="bg-[#EDE7E8] min-h-screen p-6">
        <div class="bg-white p-8 rounded-md flex flex-col items-center justify-center">
            
            
            <div id="qrcode"></div>

            {{-- logout --}}
            <h1 class="text-xl font-semibold mb-6 mt-8">Beri kode qr ini kepada petugas</h1>
            <a href="/">
                <button type="button" class="text-gray-900 bg-white border border-red-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 w-full">Back to Home</button>
            </a>
        </div>
    </div>
    
    <script>
        let link = @json($link);
    </script>
    <script src="/js/qrcode.min.js"></script>
    @vite('resources/js/qrcode.js')
@endsection