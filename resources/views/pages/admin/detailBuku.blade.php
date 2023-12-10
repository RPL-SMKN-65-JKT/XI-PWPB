@extends('layouts.admin')
@section('title', 'Detail Buku')

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
        <img src="{{ asset('storage/' . $buku->gambar) }}" class="w-100" alt="Buku Gambar">
    </div>
    <div class="text">
        <h3>{{ $buku->nama }}</h3>
        <p><span>Pengarang:</span> {{ $buku->pengarang }}</p>
        <p><span>Penerbit:</span> {{ $buku->penerbit }}</p>
        <p><span>Halaman:</span> {{ $buku->halaman }}</p>
        <p><span>Kategori:</span> {{ $buku->kategori }}</p>
        <p><span>Genre:</span> {{ $buku->genre }}</p>
        <p><span>Tahun Terbit:</span> {{ $buku->tahun_terbit }}</p>
    </div>
</div>
<div class="bungkus-deskripsi">
    <p class="deskripsi"><span >Deskripsi:</span> <br>{{ $buku->deskripsi }}</p>
</div>





@endsection
