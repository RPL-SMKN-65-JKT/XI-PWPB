@extends('main.layouts.main')

@section('content')
{{-- Klasifikasi Buku Section Start --}}
<section id="klasifikasi" class="mt-[76px]">
  <div class="bg-blue-secondary p-8 flex justify-evenly md:gap-5 md:justify-start">
    <a href="/koleksi" class="bg-white flex items-center justify-center py-2 px-3 rounded-xl shadow-md {{ !request('classification') ? 'border-2 border-orange-primary' : '' }}">
      <span class="text-sm md:text-lg">Semua</span>
    </a>
    <a href="/koleksi?classification=2" class="bg-white flex items-center justify-center py-2 px-3 rounded-xl shadow-md {{ request('classification') == 2 ? 'border-2 border-orange-primary' : '' }}">
      <span class="text-sm md:text-lg">Buku Non Fiksi</span>
    </a>
    <a href="/koleksi?classification=1" class="bg-white flex items-center justify-center py-3 px-4 rounded-xl shadow-md {{ request('classification') == 1 ? 'border-2 border-orange-primary' : '' }}">
      <span class="text-sm md:text-lg">Buku Fiksi</span>
    </a>
  </div>
</section>
{{-- Klasifikasi Buku Section End --}}

{{-- Content Container Section Start --}}
<section id="content-container" class="py-10 px-2.5 bg-white">
    <div class="w-full flex flex-col gap-5">
      <div class="w-full flex flex-col gap-5 p-2 md:flex-row md:items-end md:justify-between">
        @if (request('classification'))
          @foreach ($classifications as $classification)
            @if ($classification->id == request('classification'))
            <span class="font-medium text-3xl">Buku {{ $classification->name }}</span>
            @else
            @endif
          @endforeach
        @else
        <span class="font-medium text-3xl">Buku</span>
        @endif
        <span class="font-light text-base">Menampilkan {{ $books->count() }} buku ({{ $books->count() }} dari 591 buku)</span>
      </div>
      <div class="w-full flex justify-between gap-5">
        <div class="hidden w-0 xl:block xl:w-1/4 2xl:w-1/5">
          <form action="" method="GET">
            <div class="w-full bg-white flex flex-col gap-y-4 px-4 py-8 transition-all duration-300">
              <div class="flex items-center font-bold text-xl">Filter</div>
              <div class="border border-[#c3c3c3] w-full flex flex-col rounded-2xl overflow-hidden">
                <div class="w-full flex py-2 px-4 bg-gray-300 text-lg">Jenis Buku</div>
                <div class="w-full grid grid-cols-2 py-4 px-4 gap-4 overflow-y-scroll">
                  @if (request('classification'))
                    <input type="hidden" name="classification" value="{{ request('classification') }}">
                  @endif
                  @foreach ($types as $type)
                    @if (request('classification'))
                      @if (request('classification') == $type->classification_id)
                      <label for="{{ $type->name }}" class="flex items-center gap-2">
                        <input type="radio" value="{{ $type->id }}" name="jenis" id="{{ $type->name }}" {{ request('jenis') == $type->id ? 'checked' : '' }}>
                        <span>{{ $type->name }}</span>
                      </label>
                      @endif
                    @else
                      <label for="{{ $type->name }}" class="flex items-center gap-2">
                        <input type="radio" value="{{ $type->id }}" name="jenis" id="{{ $type->name }}" {{ request('jenis') == $type->id ? 'checked' : '' }}>
                        <span>{{ $type->name }}</span>
                      </label>
                    @endif
                  @endforeach
                </div>
              </div>
              <div class="grid grid-cols-2 gap-4">
                <button type="submit" class="bg-orange-primary text-white py-2 rounded-full transition duration-150 hover:bg-orange-500">Apply</button>
              </div>
            </div>
          </form>
        </div>
        <div class="w-full flex flex-col items-center gap-y-5 xl:w-3/4 2xl:w-4/5">
          {{-- Search Bar Start --}}
          <div class="w-full p-2 flex items-center justify-between gap-8">
            <form action="" class="w-full flex items-center border">
              @if (request('classification'))
                <input type="hidden" name="classification" value="{{ request('classification') }}">
              @endif
              <div class="flex items-center pl-4 gap-4 flex-1">
                <i class="fa-solid fa-search"></i>
                <input type="text" name="search" class="outline-none w-full" placeholder="Masukkan Keyword">
              </div>
              <button type="submit" class="h-full py-3 text-white flex items-center justify-center px-8 bg-orange-primary">Cari</button>
            </form>
            <div class="hidden gap-1 items-center xl:flex">
              <div class="outline-none w-36 border border-[#C3C3C3] p-2 relative">
                <div class="flex items-center justify-between cursor-pointer" id="sortBtn">
                  <span class="font-semibold text-center">Urutkan</span>
                  <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="hidden w-36 absolute left-0 top-10 z-50 bg-white">
                  <form action="" class="w-full flex flex-col gap-2 border-2 shadow-md">
                    @if (request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if (request('classification'))
                    <input type="hidden" name="classification" value="{{ request('classification') }}">
                    @endif
                    @if (request('jenis'))
                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">
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
          </div>
          {{-- Search Bar End --}}
          {{-- SortBy Start --}}
          <div class="px-2 w-full flex justify-between items-center relative xl:hidden">
            <div class="">
              <div class="flex items-center justify-center bg-blue-primary text-white p-3 rounded-md gap-2" id="filterBtn">
                <i class="fa-solid fa-filter"></i>
                <span>Filter</span>
              </div>
            </div>
            <div class="flex gap-1 items-center">
              <div class="outline-none w-36 border border-[#C3C3C3] p-2 relative">
                <div class="flex items-center justify-between cursor-pointer" id="sortBtnMbl">
                  <span class="font-semibold text-center">Urutkan</span>
                  <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="hidden w-36 absolute left-0 top-10 z-50 bg-white">
                  <form action="" class="w-full flex flex-col gap-2 border-2 shadow-md">
                    @if (request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if (request('classification'))
                    <input type="hidden" name="classification" value="{{ request('classification') }}">
                    @endif
                    @if (request('jenis'))
                    <input type="hidden" name="jenis" value="{{ request('jenis') }}">
                    @endif
                    <label for="newest_mobile" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                      <input type="radio" name="sort" id="newest_mobile" value="newest" class="hidden radio-sort">
                      <span>Terbaru</span>
                    </label>
                    <label for="oldest_mobile" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                      <input type="radio" name="sort" id="oldest_mobile" value="oldest" class="hidden radio-sort">
                      <span>Terlama</span>
                    </label>
                    <label for="alphabet_mobile" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                      <input type="radio" name="sort" id="alphabet_mobile" value="alphabet" class="hidden radio-sort">
                      <span>A-Z</span>
                    </label>
                    <label for="desc_mobile" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                      <input type="radio" name="sort" id="desc_mobile" value="desc" class="hidden radio-sort">
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
          </div>
          {{-- SortBy End --}}
          {{-- List Book Start --}}
          @if ($books->count() != 0)
          <div class="p-2 grid grid-cols-2 gap-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-4">
            @foreach ($books as $book)
            <a href="{{ url()->current() . '/' . $book->slug }}" class="flex bg-white flex-col items-center gap-5 border py-3 px-2 shadow-md cursor-pointer transition-all duration-150 hover:bg-[#d3d3d3]">
              {{-- <div style="background-image: url({{ asset('storage/' . $book->image) }});" class="w-1/2 aspect-[0.66/1] shadow-book bg-center bg-no-repeat bg-cover"></div> --}}
              <div class="w-full flex items-center justify-center relative">
                <img src="{{ asset('storage/' . $book->image) }}" alt="" class="w-1/2 shadow-book aspect-[0.66/1] md:w-2/3 lg:w-2/3 xl:w-1/2 xl:min-w-[1/2]">
                @if ($book->ebook == 1)
                <div class="absolute w-full flex self-start items-center justify-center">
                  <div class="bg-[rgba(0,0,0,0.5)] text-white px-4 py-0.5 rounded-md font-medium">Ebook</div>
                </div>
                @endif
              </div>
              <div class="flex flex-col gap-2 items-center">
                <span class="text-center font-medium">{{ $book->title }}</span>
                <span class="font-light text-center text-sm">{{ $book->type->name }}</span>
              </div>
            </a>
            @endforeach
          </div>
          @else
          <div class="py-20 w-full text-center font-bold text-lg">Not Found.</div>
          @endif
          {{-- List Book End --}}
          {{-- Pagination Start --}}
          <div class="p-2 flex items-center justify-center h-[42px]">
            <a href="" class="flex items-center justify-center border border-[#bfbfbf] px-4 py-2 font-bold">1</a>
            <a href="" class="flex items-center justify-center border border-[#bfbfbf] px-4 py-2">2</a>
            <a href="" class="flex items-center justify-center border border-[#bfbfbf] px-4 py-2">3</a>
            <a href="" class="flex items-center justify-center border border-[#bfbfbf] px-4 py-2">4</a>
            <a href="" class="flex items-center justify-center border border-[#bfbfbf] px-4 py-3"><i class="fa-solid fa-arrow-right"></i></a>
            <a href="" class="flex items-center justify-center border border-[#bfbfbf] px-4 py-2">Last</a>
          </div>
          {{-- Pagination End --}}
        </div>
      </div>
    </div>
</section>
{{-- Content Container Section End --}}

<section id="filter-mobile" class="hidden fixed top-0 w-full h-screen flex items-end z-50 transition-all duration-100" style="background-color: rgba(0, 0, 0, 0.75)">
  <div class="h-2/3 w-full bg-white flex flex-col gap-4 px-4 py-8 overflow-y-scroll transition-all duration-300 translate-y-full" id="filter-box">
    <div class="flex items-center font-bold text-xl">Filter</div>
    <div class="border border-[#c3c3c3] w-full flex flex-col rounded-2xl overflow-hidden">
      <div class="w-full flex py-2 px-4 bg-gray-300 text-lg">Jenis Buku</div>
      <form class="w-full grid grid-cols-2 py-4 px-4 gap-4 overflow-y-scroll">
        @if (request('classification'))
          <input type="hidden" name="classification" value="{{ request('classification') }}">
        @endif
        @foreach ($types as $type)
                    @if (request('classification'))
                      @if (request('classification') == $type->classification_id)
                      <label for="{{ $type->name }}-mbl" class="flex items-center gap-2">
                        <input type="radio" value="{{ $type->id }}"  name="jenis" id="{{ $type->name }}-mbl" {{ request('jenis') == $type->id ? 'checked' : '' }}>
                        <span>{{ $type->name }}</span>
                      </label>
                      @endif
                    @else
                      <label for="{{ $type->name }}" class="flex items-center gap-2">
                        <input type="radio" value="{{ $type->id }}" name="jenis" id="{{ $type->name }}-mbl" {{ request('jenis') == $type->id ? 'checked' : '' }}>
                        <span>{{ $type->name }}</span>
                      </label>
                    @endif
                  @endforeach
      </form>
    </div>
    <div class="grid grid-cols-2 gap-4">
      <button type="button" class="bg-white border border-orange-primary py-2 rounded-full transition duration-150 hover:border-orange-900" id="cancel-filter">Cancel</button>
      <button type="submit" class="bg-orange-primary text-white py-2 rounded-full transition duration-150 hover:bg-orange-500">Apply</button>
    </div>
  </div>
</section>

<script>
  const filterBtn = document.getElementById('filterBtn');
  const filterMobile = document.getElementById('filter-mobile');
  const filterBox = document.getElementById('filter-box');
  const cancelFilter = document.getElementById('cancel-filter');

  filterBtn.addEventListener('click', () => {
    filterMobile.classList.remove('hidden');
    setTimeout(() => {
      filterBox.classList.remove('translate-y-full');
    }, 200);
  });

  cancelFilter.addEventListener('click', () => {
    filterBox.classList.add('translate-y-full');
    setTimeout(() => {
      filterMobile.classList.add('hidden');
    }, 250)
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

//   const sortButtonsMobile = document.querySelectorAll('.radio-sort-mbl');
//       sortButtonsMobile.forEach(sortBtn => {
//       sortBtn.addEventListener('change', function() {
//         let wrapper = this.parentElement;
//         let radioSiblings = wrapper.parentElement.querySelectorAll('.radio-sort-mbl');

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

    const sortBtn = document.getElementById('sortBtn');
    sortBtn.addEventListener('click', function() {
      this.nextElementSibling.classList.toggle('hidden');
    })
    const sortBtnMbl = document.getElementById('sortBtnMbl');
    sortBtnMbl.addEventListener('click', function() {
      this.nextElementSibling.classList.toggle('hidden');
    })
</script>
@endsection