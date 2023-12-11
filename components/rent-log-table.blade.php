<div>

  
        <table class="  w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                  
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul Buku
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Pinjam
                    </th>
                  
                    <th scope="col" class="px-6 py-3">
                        Deadline
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Status
                    </th>
                   
                </tr>
            </thead>
            <tbody>
                @foreach ($rentlog as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-black ">
                    <td class="px-6 py-7 items-center">
                        {{$loop->iteration}}
                    </td>
                    <th scope="row" class=" px-6  py-4  whitespace-nowrap dark:text-white">
                        {{ $item->user->username }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->book->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->rent_date }}
                    </td>
                
                    <td class="px-6 py-4">
                        {{$item->return_date}}
                    </td>
                    <td class="px-6 py-6 text-center  ">
                        <p class="{{ $item->actual_return_date == null ? 'bg-[#faad1433] bg-opacity-20 px-10 py-4 font-semibold text-[#faad14] rounded-2xl ' : ($item->return_date < $item->actual_return_date ? 'bg-[#ff4d4f33] bg-opacity-20 px-10 py-4 font-semibold text-[#ff4d4f] rounded-2xl' : 'bg-[#52c41a33] bg-opacity-20 px-10 py-4 font-semibold text-[#52c41a] rounded-2xl')}}">   @if ($item->actual_return_date == null)
                            On Progress
                        @elseif ($item->return_date < $item->actual_return_date)
                            Out of Date
                        @else
                            Done
                        @endif</p>
                        
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    
  
</div>