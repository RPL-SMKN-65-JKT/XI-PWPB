<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Hari Ini</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 10px 5px;
        }

        th {
            background-color: #f2f2f2;
            font-size: 15px;
        }

        td{
            font-size: 14px;
        }
    </style>
</head>
<body>
    <center>
        <div class="header">
            <img src="{{ public_path('assets/65.png') }}" alt="" style="width: 100px;">
            <h1>SPANCA LIBRARY - USER</h1>
        </div>
    </center>
    {{-- <p style="font-size: 18px;"><span style="font-weight: 600;">Total Peminjaman: </span>{{ $dipinjam->count() }}</p> --}}
    </p>
    <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3" >
                    User
                </th>
                <th scope="col" class="px-6 py-3" >
                    Username
                </th>
                <th scope="col" class="px-6 py-3" >
                    Telepon
                </th>
                <th scope="col" class="px-6 py-3" >
                    Email
                </th>
                <th scope="col" class="px-6 py-3" >
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3">
                    Meminjam
                </th>
                <th scope="col" class="px-6 py-3">
                    eBook
                </th>
            </tr>
        </thead>
        <tbody>

                @foreach ($user as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4">
                            {{ $loop->iteration }}
                        </td>

                        <td class="notNum px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white"
                            style="padding: 0px 20px;">
                            <div class="flex gap-2">
                                <img src="{{ $item->foto == null ? public_path('assets/no-img.jpg') : public_path('/storage/' . $item->foto) }}"
                                    class="w-16 max-w-16 h-16 max-h-16 rounded"
                                    style="width: 60px; max-width: 60px; min-width: 60px;  height: 60px; max-height: 60px; min-height: 60px; border: 1px solid #99999999;
                                    border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
                                    alt="foto">
                                <div class="flex flex-col items-start">
                                    <p>{{ $item->nama }}</p>
                                </div>
                            </div>
                        </td>

                        <td class="notNum px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            {{ $item->username }}
                        </td>

                        <td class="notNum px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            {{ $item->telepon }}
                        </td>

                        <td class="notNum px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            {{ $item->email }}
                        </td>

                        <td class="notNum px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            {{ $item->alamat }}
                        </td>

                        <td class="notNum px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            {{ $rents->where('user_id', $item->id)->count() }}
                        </td>

                        <td class="notNum px-6 py-4 font-semibold text-gray-500 font-medium dark:text-white">
                            {{ $ebooks->where('user_id', $item->id)->count() }}
                        </td>
                    </tr>
                @endforeach



        </tbody>
    </table>
</body>
</html>
