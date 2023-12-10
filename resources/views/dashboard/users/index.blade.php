@extends('dashboard.layouts.main')

@section('content')
  <div class="w-full flex flex-col text-black gap-4">
    @if (session()->has('success'))  
    <div class="w-[50vw] absolute right-0 top-24 bg-green-600 flex items-center lg:w-[20vw] xl:w-[15vw] py-4 px-3 text-white text-sm gap-2" id="successNotif">
      <div class=""><i class="fa-solid fa-circle-check fa-2xl"></i></div>
      <span>{{ session('success') }}<span class="font-bold">{{ session('name') }}</span></span>
      <button type="button" class="font-bold" id="closeNotifBtn">&#10005;</button>
    </div>
    @endif
    <div class="w-full h-full grid grid-cols-4 items-center justify-items-center">
      <a href="{{ url('/dashboard/users') }}" class="w-full flex items-center justify-center py-2 border-2 border-blue-primary {{ !request('role') || request('role') == '' ? 'bg-blue-primary text-white' : 'transition duration-150 hover:bg-blue-secondary' }}">All Users ({{ $total->count() }})</a>
      <a href="{{ url('/dashboard/users?role=1') }}" class="w-full flex items-center justify-center py-2 border-2 border-blue-primary {{ request('role') == 1 ? 'bg-blue-primary text-white' : 'transition duration-150 hover:bg-blue-secondary' }}">Admins ({{ $admins->count() }})</a>
      <a href="{{ url('/dashboard/users?role=2') }}" class="w-full flex items-center justify-center py-2 border-2 border-blue-primary {{ request('role') == 2 ? 'bg-blue-primary text-white' : 'transition duration-150 hover:bg-blue-secondary' }}">Officers ({{ $officers->count() }})</a>
      <a href="{{ url('/dashboard/users?role=3') }}" class="w-full flex items-center justify-center py-2 border-2 border-blue-primary {{ request('role') == 3 ? 'bg-blue-primary text-white' : 'transition duration-150 hover:bg-blue-secondary' }}">Members ({{ $members->count() }})</a>
    </div>
    {{-- Upper Section Start --}}
    <div class="w-full flex flex-col gap-2 pt-4">
      <section class="w-full flex items-center justify-between">
        <a href="{{ url('/dashboard/users/create') }}" id="addButton" class="bg-orange-primary px-[15px] py-3 rounded-full text-white shadow-lg"><i class="fa-solid fa-plus fa-xl"></i></a>
        <form action="" class="w-0 lg:w-2/3 hidden lg:flex items-center border">
          @if (request('sort'))
            <input type="hidden" name="sort" value="{{ request('sort') }}">
          @elseif (request('role'))
            <input type="hidden" name="role" value="{{ request('role') }}">
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
                @elseif (request('role'))
                <input type="hidden" name="role" value="{{ request('role') }}">
                @endif
                <label for="role" class="p-2 transition duration-150 hover:bg-gray-200 cursor-pointer">
                  <input type="radio" name="sort" id="role" value="role" class="hidden radio-sort">
                  <span>Role</span>
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
        <div class="w-2/12 text-center">Gambar & Nama</div>
        <div class="w-1/12 text-center">Username</div>
        <div class="w-1/12 text-center">TTL</div>
        <div class="w-2/12 text-center">No. Telp</div>
        <div class="w-2/12 text-center">Email</div>
        <div class="w-2/12 text-center">Alamat</div>
        <div class="w-1/12 text-center">Role</div>
        <div class="w-1/12 text-center">Action</div>
      </div>
      {{-- Heading Table End --}}
      {{-- Inside Table Start --}}
      <div class="w-full flex flex-col gap-2">
        @foreach ($users as $user)
        <div class="w-full flex py-2 px-4 gap-2 text-sm items-center {{ $loop->iteration % 2 !== 0 ? 'bg-white' : 'bg-[#f2f2f2]' }}">
          <div class="w-6 text-center">{{ $loop->iteration }}</div>
          <div class="w-2/12 text-center flex items-center justify-start gap-x-2">
            <div class="self-start">
              <img src="{{ asset('/storage/'.$user->profile_picture) }}" alt="" class="w-12">
            </div>
            <div class="flex flex-col gap-y-1 items-start justify-center">
              <span>{{ $user->name }}</span>
              <span>{{ $user->gender }}</span>
            </div>
          </div>
          <div class="w-1/12 text-center">{{ $user->username }}</div>
          <div class="w-1/12 text-center">{{ $user->place_of_birth.', '.$user->date_of_birth }}</div>
          <div class="w-2/12 text-center">{{ $user->phone_number }}</div>
          <div class="w-2/12 text-center">{{ $user->email }}</div>
          <div class="w-2/12 text-center">{{ $user->address }}</div>
          <div class="w-1/12 text-center">{{ $user->role->title }}</div>
          <form action="{{ url('/dashboard/users/'.$user->id ) }}" method="POST" class="w-1/12 text-center flex gap-2 items-start justify-center text-white">
            @method('delete')
            @csrf
            @if ($user->id == 1 || $user->id == 2)
            @can('admin')
            <a href="{{ url('/dashboard/users/'.$user->id.'/edit') }}" class="bg-blue-primary py-2 px-4 rounded-md shadow-md"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
            <button type="button" class="bg-red-600 py-2 px-4 rounded-md shadow-md deleteButton"><i class="fa-solid fa-trash fa-lg"></i></button>
            <div class="hidden">
              <div class="absolute top-0 left-0 w-screen h-screen z-[60] bg-[rgba(0,0,0,0.6)] flex items-center justify-center">
                <div class="bg-white w-11/12 lg:w-6/12 xl:w-5/12 2xl:w-3/12 flex flex-col gap-8 items-center justify-between rounded-md overflow-hidden">
                  <div class="w-full text-red-500 font-bold text-2xl bg-gray-300 py-2"><i class="fa-solid fa-circle-exclamation fa-lg"></i> Peringatan!</div>
                  <div class="text-dark text-xl px-2">Kamu yakin ingin menghapus user <span class="font-semibold">{{ $user->name }}</span> ?</div>
                  <div class="w-full flex gap-2 items-center justify-center bg-gray-300 py-2">
                    <button type="button" class="bg-red-600 px-4 py-1 text-lg rounded-full cancelButton">Tidak</button>
                    <button type="submit" class="bg-green-600 px-4 py-1 text-lg rounded-full">Iya</button>
                  </div>
                </div>
              </div>
            </div>
            @endcan
            @else
            <a href="{{ url('/dashboard/users/'.$user->id.'/edit') }}" class="bg-blue-primary py-2 px-4 rounded-md shadow-md"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
            <button type="button" class="bg-red-600 py-2 px-4 rounded-md shadow-md deleteButton"><i class="fa-solid fa-trash fa-lg"></i></button>
            <div class="hidden">
              <div class="absolute top-0 left-0 w-screen h-screen z-[60] bg-[rgba(0,0,0,0.6)] flex items-center justify-center">
                <div class="bg-white w-11/12 lg:w-6/12 xl:w-5/12 2xl:w-3/12 flex flex-col gap-8 items-center justify-between rounded-md overflow-hidden">
                  <div class="w-full text-red-500 font-bold text-2xl bg-gray-300 py-2"><i class="fa-solid fa-circle-exclamation fa-lg"></i> Peringatan!</div>
                  <div class="text-dark text-xl px-2">Kamu yakin ingin menghapus user <span class="font-semibold">{{ $user->name }}</span> ?</div>
                  <div class="w-full flex gap-2 items-center justify-center bg-gray-300 py-2">
                    <button type="button" class="bg-red-600 px-4 py-1 text-lg rounded-full cancelButton">Tidak</button>
                    <button type="submit" class="bg-green-600 px-4 py-1 text-lg rounded-full">Iya</button>
                  </div>
                </div>
              </div>
            </div>
            @endif
            
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