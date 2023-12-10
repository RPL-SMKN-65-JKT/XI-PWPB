@extends('layouts.admin')
@section('title', $user->username)

<style>
body{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
}



.container-detailBuku{
    margin-left: 10px;
    margin-top: -210px;
    display: flex !important;
    flex-wrap: wrap;
    justify-content: start;
    align-items: start;
    gap: 28px;
    width: 100%;
}

.container-detailBuku .image{
    width: 25%;
    min-width: 250px;
}

.container-detailBuku .image img{
    width: 100%;
    border-radius: 15px;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}

.container-detailBuku .text{
    width: 60%;
}

.container-detailBuku .text h3{
    font-size: 40px;
    font-weight: 600;
    color: #5333f2;
    margin-bottom: -10px
}

.container-detailBuku .text p{
    margin-top: 10px;
    font-size: 22px;
    color: #262626d9;
}

.container-detailBuku .text p span{
    font-size: 24px;
    color: #5333f2be;
    font-weight: 600
}

.bungkus-deskripsi{
    display: flex;
    justify-content: start;
    align-items: center !important;
    width: 100%;
    height: auto;
}

.deskripsi{
    margin-left: 10px;
    width: 90%;
    margin-top: 30px;
    font-size: 22px;
    color: #262626c3;
}

.deskripsi span{
    text-align: center !important;
    line-height: 44px;
    font-size: 22px;
    color: #5333f2be;
    font-weight: 600
}


@media(max-width: 1030px){
    .container-detailBuku{
        margin-left: 0px;
        margin-top: -210px;
        justify-content: center;
        align-items: start;
        gap: 28px;
    }
    .container-detailBuku .image{
        width: 40%;
        min-width: 250px;
    }

    .container-detailBuku .image img{
        width: 100%;
        border-radius: 15px;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    .container-detailBuku .text{
        width: 95%;
    }

    .container-detailBuku .text h3{
        font-size: 40px;
        font-weight: 600;
        color: #5333f2;
        margin-bottom: -10px
    }



    .bungkus-deskripsi{
        display: flex;
        justify-content: center;
        align-items: center !important;
        width: 100%;
        height: auto;
    }

    .deskripsi{
        margin-left: 0px;
        margin-top: -8px;
        width: 95%;
        font-size: 22px;
        color: #262626c3;
    }

    .deskripsi span{
        text-align: center !important;
        line-height: 44px;
        font-size: 22px;
        color: #5333f2be;
        font-weight: 600
    }
}

</style>

@section('detailBuku')
<div class="container-detailBuku h-full w-full">
    <div class="image">
        <img src="{{ asset('storage/' . $user->foto) }}" class="w-100" alt="Buku Gambar">
    </div>
    <div class="text">
        <h3>{{ $user->nama }}</h3>
        <p><span>Username:</span> {{ $user->username }}</p>
        <p><span>Telepon:</span> {{ $user->telepon }}</p>
        <p><span>Email:</span> {{ $user->email }}</p>
        <p><span>Alamat:</span> {{ $user->alamat }}</p>
    </div>
</div>

<h1 class="mt-8 text-xl font-bold">TABLE PEMINJAMAN</h1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-l-lg">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Kode
                </th>
                <th scope="col" class="px-6 py-3" style="padding: 0px 30px;">
                    Buku
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Pinjam
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Kembali
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>

            @if ($rents->count() > 0)
                @foreach ($rents as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            <div class="flex flex-col items-center">
                                <span>{!! QrCode::size(80)->generate($item->kode) !!}</span>
                                <span>{{ $item->kode }}</span>
                            </div>

                        </td>

                        <td class="px-6 py-4  font-semibold text-gray-500 font-medium dark:text-white"
                            style="padding: 0px 30px;">
                            <div class="py-2 flex flex-col justify-center items-center w-full">
                                <img src="{{ asset('/storage/' . $item->buku->gambar) }}" class="rounded"
                                    style="width: 60px; max-width: 60px;" alt="Apple Watch">
                                <p class="text-md"
                                    style="-webkit-line-clamp: 1;
                                            overflow: hidden;
                                            display: -webkit-box;
                                            -webkit-box-orient: vertical;">
                                    {{ $item->buku->nama }}</p>
                            </div>
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            {{ $item->tanggal_pinjam }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            {{ $item->tanggal_kembali }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            <div class="flex justify-center items-center gap-2">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500"></div>{{ $item->status }}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 text-center" colspan="8">
                        <div class="flex flex-col justify-center items-center gap-2">
                            <img src="{{ asset('assets/no-data.jpg') }}" class="w-32 h-32" alt="">

                            <p>TIDAK ADA DATA PEMINJAMAN</p>
                        </div>
                    </td>
                </tr>

            @endif


        </tbody>
    </table>
</div>

<h1 class="mt-8 text-xl font-bold">TABLE DOWNLOAD EBOOK</h1>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 rounded-l-lg">
                    No.
                </th>
                <th scope="col" class="px-6 py-3" style="padding: 0px 30px;">
                    Buku
                </th>
                <th scope="col" class="px-6 py-3">
                    Tanggal Izin
                </th>
                <th scope="col" class="px-6 py-3 rounded-r-lg">
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($ebooks->count() > 0)

                @foreach ($ebooks as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="px-6 py-4  font-semibold text-gray-500 font-medium dark:text-white"
                            style="padding: 0px 30px;">
                            <div class="py-2 flex flex-col justify-center items-center w-full">
                                <img src="{{ asset('/storage/' . $item->buku->gambar) }}" class="rounded"
                                    style="width: 60px; max-width: 60px;" alt="Apple Watch">
                                <p class="text-md"
                                    style="-webkit-line-clamp: 1;
                                            overflow: hidden;
                                            display: -webkit-box;
                                            -webkit-box-orient: vertical;">
                                    {{ $item->buku->nama }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            {{ $item->tanggal_izin }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            <div class="flex justify-center items-center gap-2">
                                <div class="h-2.5 w-2.5 rounded-full bg-green-500"></div>{{ $item->status }}
                            </div>
                        </td>
                    </tr>
                @endforeach
                @else
                <tr
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-6 py-4 text-center" colspan="4">
                    <div class="flex flex-col justify-center items-center gap-2">
                        <img src="{{ asset('assets/no-data.jpg') }}" class="w-32 h-32" alt="">

                        <p>TIDAK ADA DATA PERIZINAN EBOOK</p>
                    </div>
                </td>
            </tr>
                @endif



        </tbody>
    </table>
</div>
@endsection
