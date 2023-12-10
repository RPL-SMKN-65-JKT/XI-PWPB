@extends('dashboard.layouts.main')

@section('content')
  <div class="w-full flex flex-col text-black gap-8">
    @if (session()->has('success'))  
    <div class="w-[50vw] absolute right-0 top-24 bg-green-600 flex items-center lg:w-[20vw] xl:w-[15vw] py-4 px-3 text-white text-sm gap-2" id="successNotif">
      <div class=""><i class="fa-solid fa-circle-check fa-2xl"></i></div>
      <span>{{ session('success') }}<span class="font-bold">{{ session('name') }}</span></span>
      <button type="button" class="font-bold" id="closeNotifBtn">&#10005;</button>
    </div>
    @endif
    {{-- Upper Section Start --}}
    <div class="w-full flex flex-col gap-2 pt-4">
      <section class="w-full flex items-center justify-between">
        @can('admin')
        <button type="button" id="cetakButton" class="bg-orange-primary px-[15px] py-2 text-white shadow-lg rounded-md"><i class="fa-solid fa-print"></i> <span> Cetak</span></button>
        @endcan
        {{-- <form action="" class="w-0 lg:w-2/3 hidden lg:flex items-center border">
          @if (request('sort'))
            <input type="hidden" name="sort" value="{{ request('sort') }}">
          @endif
          <div class="flex items-center pl-4 gap-4 flex-1">
            <i class="fa-solid fa-search"></i>
            <input type="text" name="search" class="outline-none w-full" value="{{ request('search') }}" placeholder="Masukkan Keyword">
          </div>
          <button type="submit" class="h-full py-3 text-white flex items-center justify-center px-8 bg-orange-primary">Cari</button>
        </form> --}}
        {{-- <div class="gap-1 items-center flex">
          <div class="outline-none w-36 border border-[#C3C3C3] p-2 relative">
            <div class="flex items-center justify-between cursor-pointer" id="filterBtn">
              <span class="font-semibold text-center">Urutkan</span>
              <i class="fa-solid fa-caret-down"></i>
            </div>
            <div class="hidden w-36 absolute left-0 top-10 z-50 bg-white">
              <form action="" class="w-full flex flex-col gap-2 border-2 shadow-md">
                @if (request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <label for="klasifikasi" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                  <input type="radio" name="sort" id="klasifikasi" value="klasifikasi" class="hidden radio-sort">
                  <span>Klasifikasi</span>
                </label>
                <label for="alphabet" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                  <input type="radio" name="sort" id="alphabet" value="alphabet" class="hidden radio-sort">
                  <span>A-Z</span>
                </label>
                <label for="desc" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                  <input type="radio" name="sort" id="desc" value="desc" class="hidden radio-sort">
                  <span>Z-A</span>
                </label>
                <div class="w-full grid grid-cols-2 gap-x-1 px-1">
                  <button type="button" class="bg-red-600 p-2 text-white"><i class="fa-solid fa-x"></i></button>
                  <button type="submit" class="bg-green-600 p-2 text-white"><i class="fa-solid fa-check fa-lg"></i></button>
                </div>
              </form>
            </div>
          </div>
        </div> --}}
      </section>
      <section class="flex items-center justify-around ">
        <form action="" class="w-full flex lg:hidden items-center border">
          <div class="flex items-center pl-4 gap-4 flex-1">
            <i class="fa-solid fa-search"></i>
            <input type="text" class="outline-none w-full" placeholder="Masukkan Keyword">
          </div>
          <button type="submit" class="h-full py-3 text-white flex items-center justify-center px-8 bg-orange-primary">Cari</button>
        </form>
      </section>
    </div>
    {{-- Upper Section End --}}
    <div class="w-full flex flex-col gap-4">
      {{-- Heading Table Start --}}
      <div class="w-full flex py-2 px-4 gap-2 border-b-2 font-semibold sticky top-0 bg-white">
        <div class="w-1/12 text-center">No</div>
        <div class="w-2/12 text-center">kode_peminjaman</div>
        <div class="w-2/12 text-center">Nama Peminjam</div>
        <div class="w-2/12 text-center">Buku Yang Dipinjam</div>
        <div class="w-1/12 text-center">Tanggal Peminjaman</div>
        <div class="w-2/12 text-center">Tanggal Pengembalian</div>
        <div class="w-1/12 text-center">Tanggal Kembali</div>
        <div class="w-1/12 text-center">Status</div>
      </div>
      {{-- Heading Table End --}}
      {{-- Inside Table Start --}}
      <div class="w-full flex flex-col gap-2">
        @foreach ($bookLoans as $bookLoan)
        <div class="w-full flex py-2 px-4 gap-2 text-sm {{ $loop->iteration % 2 !== 0 ? 'bg-white' : 'bg-[#f2f2f2]' }}">
          <div class="w-1/12 text-center">{{ $loop->iteration }}</div>
          <div class="w-2/12 text-center">{{ $bookLoan->kode_peminjaman }}</div>
          <div class="w-2/12 text-center">{{ $bookLoan->user->name }}</div>
          <div class="w-2/12 text-center">{{ $bookLoan->book->title }}</div>
          <div class="w-1/12 text-center">{{ $bookLoan->tanggal_peminjaman }}</div>
          <div class="w-2/12 text-center">{{ $bookLoan->tanggal_pengembalian }}</div>
          <div class="w-1/12 text-center">{{ $bookLoan->tanggal_kembali == false ? 'Belum Dikembalikan' :  $bookLoan->tanggal_kembali}}</div>
          @php
              if ($bookLoan->status_id == 1) {
                $color = 'bg-blue-primary text-white';
              }
              elseif ($bookLoan->status_id == 2) {
                $color = 'bg-yellow-600 text-white';
              }
              elseif ($bookLoan->status_id == 3) {
                $color = 'bg-green-600 text-white';
              }
              elseif ($bookLoan->status_id == 4) {
                $color = 'bg-red-500 text-white';
              }
              else {
                $color = 'bg-gray-400 text-white';
              }
            @endphp
          <div class="w-1/12 text-center">
            <div class="{{ $color }} px-2 py-0.5 rounded-md">{{ $bookLoan->status->name }}</div>
          </div>
        </div>
        @endforeach
      </div>
      {{-- Inside Table End --}}
    </div>
  </div>
  <div class="hidden w-screen h-screen bg-[rgba(0,0,0,0.5)] absolute top-0 z-40 left-0" id="cetakOverlay">
    <div class="w-full h-full flex items-center justify-center text-black">
      <form action="/dashboard/reports/view/pdf" method="get" class="w-1/4 bg-white p-2 flex flex-col rounded-md">
        @csrf
        <div class="w-full font-semibold py-2 px-2 border-b-2 border-b-black text-lg">Cetak Laporan</div>
        <div class="w-full flex items-center px-2 py-2">
          <div class="w-1/4">Dari : </div>
          <div class="w-3/4"><input type="date" class="w-full bg-gray-200 p-1" name="tanggal_peminjaman_dari"></div>
        </div>
        <div class="w-full flex items-center px-2 py-2">
          <div class="w-1/4">Sampai : </div>
          <div class="w-3/4"><input type="date" class="w-full bg-gray-200 p-1" name="tanggal_peminjaman_sampai"></div>
        </div>
        <div class="self-end flex items-center gap-2">
          <button type="button" id="cancelButton" class="self-end w-fit bg-red-500 text-white px-3 py-1 rounded-full">Cancel</button>
          <button type="submit" class="self-end w-fit bg-orange-primary text-white px-3 py-1 rounded-full">Cetak</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('script')
  <script>
    const closeNotifBtn = document.getElementById('closeNotifBtn');
    if (typeof(closeNotifBtn) != 'undefined' && closeNotifBtn != null)
    {
      closeNotifBtn.addEventListener('click', function() {
        this.parentElement.remove();
      });
    }

    const deleteButtons = document.querySelectorAll('.deleteButton');
    deleteButtons.forEach(deleteBtn => {
      deleteBtn.addEventListener('click', function() {
        this.nextElementSibling.classList.remove('hidden')
      });
    });

    const editButtons = document.querySelectorAll('.editButton')
    editButtons.forEach(editBtn => {
      editBtn.addEventListener('click', function() {
        this.nextElementSibling.classList.remove('hidden')
      })
    });

    const cancelButtons = document.querySelectorAll('.cancelButton');
    cancelButtons.forEach(cancelBtn => {
      cancelBtn.addEventListener('click', function() {
        let wrapper = this.parentElement.parentElement.parentElement.parentElement;
        wrapper.classList.add('hidden');
      });
    });

    const addTypes = document.getElementById('addTypes');

//     const filterButtons = document.querySelectorAll('.radio-sort');
//       filterButtons.forEach(filterBtn => {
//       filterBtn.addEventListener('change', function() {
//         let wrapper = this.parentElement;
//         let radioSiblings = wrapper.parentElement.querySelectorAll('.radio-sort');

//     // Hapus kelas 'bg-gray-200' dari semua saudara yang merupakan elemen input radio dengan nilai true
//     radioSiblings.forEach(sibling => {
//       if (sibling.value && sibling !== this) {
//         sibling.parentElement.classList.remove('bg-gray-200');
//       }
//     });

//     if (filterBtn.value) {
//       wrapper.classList.add('bg-gray-200');
//     } else {
//       wrapper.classList.remove('bg-gray-200');
//     }
//   });
// });

//     const filterBtn = document.getElementById('filterBtn');
//     filterBtn.addEventListener('click', function() {
//       this.nextElementSibling.classList.toggle('hidden');
//     });

    const cetakButton = document.getElementById('cetakButton');
    const cancelButton = document.getElementById('cancelButton');
    const cetakOverlay = document.getElementById('cetakOverlay');
    cetakButton.addEventListener('click', function() {
      cetakOverlay.classList.remove('hidden');
    })

    cancelButton.addEventListener('click', function() {
      cetakOverlay.classList.add('hidden');
    })
  </script>
@endsection