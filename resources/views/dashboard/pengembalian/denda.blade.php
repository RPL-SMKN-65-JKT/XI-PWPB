@extends('dashboard.layouts.main')

@section('content')
<div class="mt-2 w-full flex flex-col gap-4 py-1 text-black">
  <span class="font-bold text-2xl">Denda</span>
  <form action="/dashboard/pengembalian/denda/{{ $bookLoan->id }}" method="POST" class="w-full flex flex-col">
    @csrf
    <input type="hidden" hidden class="hidden" name="loan_id" value="{{ $bookLoan->id }}">
    <div class="w-full lg:w-1/2 border flex p-2 items-center">
      <div class="w-1/2">
        <span class="font-bold">Denda Keterlambatan 
        @if (session()->has('keterlambatan_hari'))
        <span>({{ session('keterlambatan_hari') }} Hari)</span>
        @endif</span>
      </div>
      <div class="w-1/2 flex items-center gap-1">
        <div class="w-full flex flex-col gap-1">
          <div class="w-full flex gap-1 items-center">
            <span class="font-semibold">Rp</span>
            <input type="number" value="{{ session('denda_keterlambatan') }}" id="denda_keterlambatan" readonly name="denda_keterlambatan" required class="w-full border p-2 remove-arrow bg-gray-200 rounded-md">
          </div>
          <span class="text-sm">* Denda terlambat 2000/hari</span>
        </div>
      </div>
    </div>
    <div class="w-full lg:w-1/2 border flex p-2 items-center">
      <div class="w-1/2">
        <span class="font-bold">Denda Kerusakan</span>
      </div>
      <div class="w-1/2 flex items-center gap-1">
        <div class="w-full flex flex-col gap-1">
          <div class="w-full flex gap-1 items-center">
            <span class="font-semibold">Rp</span>
            <input type="number" placeholder="Example : 65000" required id="denda_kerusakan" name="denda_kerusakan" class="w-full border p-2 remove-arrow bg-gray-200 rounded-md">
          </div>
          <span class="text-sm">* Input Kan Nominal tanpa tanda (.)</span>
          <span class="text-sm">* Jika tidak ada denda kerusakan, Input <span class="font-semibold">0</span></span>
        </div>
      </div>
    </div>
    <div class="w-full lg:w-1/2 border flex p-2 items-center">
      <div class="w-1/2">
        <span class="font-bold">Total Denda</span>
      </div>
      <div class="w-1/2 flex items-center gap-1">
        <div class="w-full flex flex-col gap-1">
          <div class="w-full flex gap-1 items-center">
            <span class="font-semibold">Rp</span>
            <input type="number" id="total_denda" disabled name="total_denda" value="{{ session('denda_keterlambatan') }}" class="w-full border p-2 remove-arrow bg-gray-200 rounded-md">
          </div>
        </div>
      </div>
    </div>
    <div class="w-full lg:w-1/2 flex items-center justify-end pt-2">
      <button type="submit" class="bg-orange-primary px-3 py-1 rounded-full text-white text-lg">Confirm</button>
    </div>
  </form>
</div>

@endsection

@section('script')
<script>
  const totalDendaInput = document.getElementById('total_denda');
  const dendaKeterlambatanInput = document.getElementById('denda_keterlambatan');
  const dendaKerusakanInput = document.getElementById('denda_kerusakan');

  dendaKerusakanInput.addEventListener('input', function() {
    totalDendaInput.value = parseInt(dendaKeterlambatanInput.value) + parseInt(dendaKerusakanInput.value)
    if(!dendaKerusakanInput.value){
      totalDendaInput.value = parseInt(dendaKeterlambatanInput.value)
    }
  })
</script>
@endsection