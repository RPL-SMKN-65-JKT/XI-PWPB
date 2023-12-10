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
        <button type="button" id="addButton" class="bg-orange-primary px-[15px] py-3 rounded-full text-white shadow-lg"><i class="fa-solid fa-plus fa-xl"></i></button>
        <form action="" class="w-0 lg:w-2/3 hidden lg:flex items-center border">
          @if (request('sort'))
            <input type="hidden" name="sort" value="{{ request('sort') }}">
          @endif
          <div class="flex items-center pl-4 gap-4 flex-1">
            <i class="fa-solid fa-search"></i>
            <input type="text" name="search" class="outline-none w-full" value="{{ request('search') }}" placeholder="Masukkan Keyword">
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
        </div>
      </section>
      <section class="flex items-center justify-around">
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
        <div class="w-6 text-center">No</div>
        <div class="w-1/3 text-center">Nama</div>
        <div class="w-1/3 text-center">Klasifikasi</div>
        <div class="w-1/3 text-center">Action</div>
      </div>
      {{-- Heading Table End --}}
      {{-- Inside Table Start --}}
      <div class="w-full flex flex-col gap-2">
        @foreach ($types as $type)
        <div class="w-full flex py-2 px-4 gap-2 text-sm {{ $loop->iteration % 2 !== 0 ? 'bg-white' : 'bg-[#f2f2f2]' }}">
          <div class="w-6 text-center">{{ $loop->iteration }}</div>
          <div class="w-1/3 text-center">{{ $type->name }}</div>
          <div class="w-1/3 text-center">{{ $type->classification->name }}</div>
          <div class="w-1/3 text-center">
            <div class="w-full text-center flex gap-2 items-start justify-center text-white">
              <button type="button" class="bg-blue-primary py-2 px-4 rounded-md shadow-md editButton"><i class="fa-solid fa-pen-to-square fa-lg"></i></button>
              <div class="hidden" id="editTypes">
                <div class="absolute top-0 left-0 w-screen h-screen z-[60] bg-[rgba(0,0,0,0.6)] flex items-center justify-center">
                  <form action="{{ url('/dashboard/types/'.$type->id) }}" method="POST" class="bg-white w-11/12 lg:w-6/12 xl:w-5/12 2xl:w-3/12 flex flex-col gap-8 items-center justify-between rounded-md overflow-hidden">
                    @csrf
                    @method('put')
                    <div class="w-full text-start text-dark font-bold text-2xl bg-gray-300 py-2 px-2">Edit Jenis Buku</div>
                    <div class="w-full flex flex-col gap-0.5 px-2 justify-start items-start text-dark">
                      <input type="hidden" name="id" value="{{ $type->id }}" hidden>
                      <input type="hidden" name="oldName" value="{{ $type->name }}" hidden>
                      <span class="text-base font-semibold">Nama Jenis</span>
                      <div class="w-full flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('name') is-invalid @enderror">
                          <input type="text" placeholder="Masukkan Nama Jenis" class="w-full outline-none text-base" name="name" id="name" required value="{{ old('name', $type->name) }}">
                      </div>
                      @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="w-full flex flex-col gap-0.5 px-2 text-dark items-start">
                      <span class="text-base font-semibold">Klasifikasi Buku</span>
                        <select name="classification_id" id="classification_id" class="w-full outline-none bg-white text-base border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('classification_id') is-invalid @enderror">
                          <option value="0" disabled selected>Pilih Klasifikasi Buku</option>
                          @foreach ($classifications as $classification)
                          @if (old('classification_id', $type->classification_id) == $classification->id)
                            <option value="{{ $classification->id }}" selected>{{ $classification->name }}</option>
                          @else
                            <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                          @endif
                          @endforeach
                        </select>
                        @error('classification_id')
                          <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full flex gap-2 items-center justify-center bg-gray-300 py-2 text-white">
                      <button type="button" class="bg-red-600 px-4 py-1 text-lg rounded-full cancelButton">Cancel</button>
                      <button type="submit" class="bg-green-600 px-4 py-1 text-lg rounded-full">Edit</button>
                    </div>
                  </form>
                </div>
              </div>
              <button type="button" class="bg-red-600 py-2 px-4 rounded-md shadow-md deleteButton"><i class="fa-solid fa-trash fa-lg"></i></button>
              <form action="{{ url('/dashboard/types/'.$type->id) }}" method="POST" class="hidden">
                @csrf
                @method('delete')
                <div class="absolute top-0 left-0 w-screen h-screen z-[60] bg-[rgba(0,0,0,0.6)] flex items-center justify-center">
                  <div class="bg-white w-11/12 lg:w-6/12 xl:w-5/12 2xl:w-3/12 flex flex-col gap-8 items-center justify-between rounded-md overflow-hidden">
                    <div class="w-full text-red-500 font-bold text-2xl bg-gray-300 py-2"><i class="fa-solid fa-circle-exclamation fa-lg"></i> Peringatan!</div>
                    <div class="text-dark text-xl">Kamu yakin ingin menghapus jenis <span class="font-semibold">{{ $type->name }}</span> ?</div>
                    <div class="w-full flex gap-2 items-center justify-center bg-gray-300 py-2">
                      <button type="button" class="bg-red-600 px-4 py-1 text-lg rounded-full cancelButton">Tidak</button>
                      <button type="submit" class="bg-green-600 px-4 py-1 text-lg rounded-full">Iya</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      {{-- Inside Table End --}}
    </div>
    <div class="hidden" id="addTypes">
      <div class="absolute top-0 left-0 w-screen h-screen z-[60] bg-[rgba(0,0,0,0.6)] flex items-center justify-center">
        <form action="" method="POST" class="bg-white w-11/12 lg:w-6/12 xl:w-5/12 2xl:w-3/12 flex flex-col gap-8 items-center justify-between rounded-md overflow-hidden">
          @csrf
          <div class="w-full text-dark font-bold text-2xl bg-gray-300 py-2 px-2">Tambah Jenis Buku</div>
          <div class="w-full flex flex-col gap-0.5 px-2">
            <span class="text-base font-semibold">Nama Jenis</span>
            <div class="flex bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('name') is-invalid @enderror">
                <input type="text" placeholder="Masukkan Nama Jenis" class="w-full outline-none" name="name" id="name" required value="{{ old('name') }}">
            </div>
            @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>
          <div class="w-full flex flex-col gap-0.5 px-2">
            <span class="text-base font-semibold">Klasifikasi Buku</span>
              <select name="classification_id" id="classification_id" class="outline-none bg-white border border-[#333] px-2.5 py-2 rounded-md shadow-md @error('classification_id') is-invalid @enderror">
                <option value="0" disabled selected>Pilih Klasifikasi Buku</option>
                @foreach ($classifications as $classification)
                  <option value="{{ $classification->id }}">{{ $classification->name }}</option>
                @endforeach
              </select>
              @error('classification_id')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
          </div>
          <div class="w-full flex gap-2 items-center justify-center bg-gray-300 py-2 text-white">
            <button type="button" class="bg-red-600 px-4 py-1 text-lg rounded-full cancelButton">Cancel</button>
            <button type="submit" class="bg-green-600 px-4 py-1 text-lg rounded-full">Tambah</button>
          </div>
        </form>
      </div>
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
    const addButton = document.getElementById('addButton');

    addButton.addEventListener('click', function() {
      addTypes.classList.remove('hidden');
    })

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