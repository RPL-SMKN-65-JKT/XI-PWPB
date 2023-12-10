@extends('dashboard.layouts.main')

@section('content')
  <div class="w-full flex flex-col text-black gap-8">
    @if (session()->has('success'))  
    <div class="w-[50vw] absolute right-0 top-24 bg-green-600 flex items-center lg:w-[20vw] xl:w-[15vw] py-4 px-3 text-white text-sm gap-2" id="successNotif">
      <div class=""><i class="fa-solid fa-circle-check fa-2xl"></i></div>
      <span>{{ session('success') }}<span class="font-bold">{{ session('title') }}</span></span>
      <button type="button" class="font-bold" id="closeNotifBtn">&#10005;</button>
    </div>
    @endif
    {{-- Upper Section Start --}}
    <div class="w-full flex flex-col gap-2 pt-4">
      <section class="w-full flex items-center justify-between">
        <a href="{{ url('/dashboard/books/create') }}" class="bg-orange-primary px-[15px] py-3 rounded-full text-white shadow-lg"><i class="fa-solid fa-plus fa-xl"></i></a>
        <form action="" class="w-0 lg:w-2/3 hidden lg:flex items-center border">
          <div class="flex items-center pl-4 gap-4 flex-1">
            <i class="fa-solid fa-search"></i>
            <input type="text" name="search" class="outline-none w-full" placeholder="Masukkan Keyword">
          </div>
          <button type="submit" class="h-full py-3 text-white flex items-center justify-center px-8 bg-orange-primary">Cari</button>
        </form>
        <div class="gap-1 items-center flex">
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
                <label for="newest" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                  <input type="radio" name="sort" id="newest" value="newest" class="hidden radio-sort">
                  <span>Terbaru</span>
                </label>
                <label for="oldest" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                  <input type="radio" name="sort" id="oldest" value="oldest" class="hidden radio-sort">
                  <span>Terlama</span>
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
        </div>
      </section>
      <section class="flex items-center justify-around ">
        <form action="" class="w-full flex lg:hidden items-center border">
          <div class="flex items-center pl-4 gap-4 flex-1">
            <i class="fa-solid fa-search"></i>
            <input type="text" name="search" class="outline-none w-full" placeholder="Masukkan Keyword">
          </div>
          <button type="submit" class="h-full py-3 text-white flex items-center justify-center px-8 bg-orange-primary">Cari</button>
        </form>
      </section>
    </div>
    {{-- Upper Section End --}}
    <div class="w-full flex flex-col gap-4">
      {{-- Heading Table Start --}}
      <div class="w-fit flex py-2 px-4 gap-2 border-b-2 font-semibold sticky top-0 bg-white">
        <div class="w-6 text-center">No</div>
        <div class="w-[124px] text-center">Judul & Cover</div>
        <div class="w-[249px] text-center">Penulis</div>
        <div class="w-[124px] text-center">Penerbit</div>
        <div class="w-[62px] text-center">Tahun Terbit</div>
        <div class="w-[124px] text-center">ISBN</div>
        <div class="w-[124px] text-center">Klasifikasi</div>
        <div class="w-[124px] text-center">Jenis</div>
        <div class="w-[124px] text-center">Genre</div>
        <div class="w-[124px] text-center">Ebook</div>
        <div class="w-[62px] text-center">Status</div>
        <div class="w-[124px] text-center">Action</div>
      </div>
      {{-- Heading Table End --}}
      {{-- Inside Table Start --}}
      <div class="w-full flex flex-col gap-2">
        @foreach ($books as $book)
        <div class="w-fit flex py-2 px-4 gap-2 text-sm {{ $loop->iteration % 2 !== 0 ? 'bg-white' : 'bg-[#f2f2f2]' }}">
          <div class="w-6 text-center">{{ $loop->iteration }}</div>
          <div class="w-[124px] flex flex-col items-center gap-2">
            <span class="text-center">{{ $book->title }}</span>
            <img src="{{ asset('storage/' . $book->image) }}" alt="" class="w-full">
          </div>
          <div class="w-[249px] text-center">{{ $book->author }}</div>
          <div class="w-[124px] text-center">{{ $book->publisher }}</div>
          <div class="w-[62px] text-center">{{ $book->publication_year }}</div>
          <div class="w-[124px] text-center">{{ $book->isbn }}</div>
          <div class="w-[124px] text-center">{{ $book->classification->name }}</div>
          <div class="w-[124px] text-center">{{ $book->type->name }}</div>
          <div class="w-[124px] text-center flex flex-col gap-2">
          @foreach ($book->categories as $category)
            <span>{{ $category->name }}</span>
          @endforeach
          </div>
          <div class="w-[124px] text-center">
            @if ($book->ebook == 1)
            <i class="fa-solid fa-circle-check text-green-500 fa-2xl"></i>
            @else
            <i class="fa-solid fa-circle-xmark text-red-500 fa-2xl"></i>
            @endif
          </div>
          @if ($book->status === 1)
          <div class="w-[62px] text-center text-green-500"><i class="fa-solid fa-circle-check fa-2xl"></i></div>
          @else
          <div class="w-[62px] text-center text-red-600"><i class="fa-solid fa-circle-xmark fa-2xl"></i></div>
          @endif
          <form action="{{ url('/dashboard/books/'.$book->id ) }}" method="POST" class="w-[124px] text-center flex gap-2 items-start justify-center text-white">
            @method('delete')
            @csrf
            <a href="{{ url('/dashboard/books/'.$book->id.'/edit') }}" class="bg-blue-primary py-2 px-4 rounded-md shadow-md"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
            <button type="button" class="bg-red-600 py-2 px-4 rounded-md shadow-md deleteButton"><i class="fa-solid fa-trash fa-lg"></i></button>
            <div class="hidden">
              <div class="absolute top-0 left-0 w-screen h-screen z-[60] bg-[rgba(0,0,0,0.6)] flex items-center justify-center">
                <div class="bg-white w-11/12 lg:w-6/12 xl:w-5/12 2xl:w-3/12 flex flex-col gap-8 items-center justify-between rounded-md overflow-hidden">
                  <div class="w-full text-red-500 font-bold text-2xl bg-gray-300 py-2"><i class="fa-solid fa-circle-exclamation fa-lg"></i> Peringatan!</div>
                  <div class="text-dark text-xl">Kamu yakin ingin menghapus buku <span class="font-semibold">{{ $book->title }}</span> ?</div>
                  <div class="w-full flex gap-2 items-center justify-center bg-gray-300 py-2">
                    <button type="button" class="bg-red-600 px-4 py-1 text-lg rounded-full cancelButton">Tidak</button>
                    <button type="submit" class="bg-green-600 px-4 py-1 text-lg rounded-full">Iya</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        @endforeach
      </div>
      {{-- Inside Table End --}}
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

    const cancelButtons = document.querySelectorAll('.cancelButton');
    cancelButtons.forEach(cancelBtn => {
      cancelBtn.addEventListener('click', function() {
        let wrapper = this.parentElement.parentElement.parentElement.parentElement;
        wrapper.classList.add('hidden');
      });
    });

    const filterButtons = document.querySelectorAll('.radio-sort');
      filterButtons.forEach(filterBtn => {
      filterBtn.addEventListener('change', function() {
        let wrapper = this.parentElement;
        let radioSiblings = wrapper.parentElement.querySelectorAll('.radio-sort');

    // Hapus kelas 'bg-gray-200' dari semua saudara yang merupakan elemen input radio dengan nilai true
    radioSiblings.forEach(sibling => {
      if (sibling.value && sibling !== this) {
        sibling.parentElement.classList.remove('bg-gray-200');
      }
    });

    if (filterBtn.value) {
      wrapper.classList.add('bg-gray-200');
    } else {
      wrapper.classList.remove('bg-gray-200');
    }
  });
});

    const filterBtn = document.getElementById('filterBtn');
    filterBtn.addEventListener('click', function() {
      this.nextElementSibling.classList.toggle('hidden');
    })
  </script>
@endsection