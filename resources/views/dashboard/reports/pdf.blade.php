<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CETAK PDF</title>
  {{-- @vite('resources/css/app.css')
  @vite('resources/js/app.js') --}}
  <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
  </style>
</head>
<body>
  {{-- <div class="w-full flex flex-col items-center justify-center">
    <img src="{{ asset('img/LOGO 65.png') }}" alt="" class="w-1/5">
  </div> --}}
  <div style="width: 100%; display: flex; justify-content: center; align-items: center;">
    <img src="{{ asset('img/LOGO 65.png') }}" alt="" style="width: 25%; text-align: center">
  </div>
  <div style="font-weight: 700; padding-top: 4px; padding-bottom: 4px; width: 100%; text-align: center; font-size: 22px">Laporan Peminjaman - Sudah Dikembalikan</div>
  <div style="font-size: 18px">
    <div style="width: 100%;">Dari : <span>{{ $tanggal_peminjaman_dari }}</span></div>
    <div style="width: 100%;">Sampai : <span>{{ $tanggal_peminjaman_sampai }}</span></div>
  </div>
  <table id="customers">
    <thead>
      <tr>
        <th>#</th>
        <th>Kode Peminjaman</th>
        <th>Nama Peminjam</th>
        <th>Buku Dipinjam</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Tanggal Kembali</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($bookLoans as $bookLoan)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $bookLoan->kode_peminjaman }}</td>
        <td>{{ $bookLoan->user->name }}</td>
        <td>{{ $bookLoan->book->title }}</td>
        <td>{{ $bookLoan->tanggal_peminjaman }}</td>
        <td>{{ $bookLoan->tanggal_pengembalian }}</td>
        <td>{{ $bookLoan->tanggal_kembali }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>