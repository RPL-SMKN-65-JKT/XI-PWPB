@extends('layout.menu')
@section('title', 'Rent Logs')
@section('content')
@if (session('berhasil'))
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('berhasil') }}!",
        icon: "success"
        });
</script>
@endif
{{-- <div class="my-5 flex justify-start ">
    
    <a href="/user-add" class="mx-5 py-2 px-4  bg-green-500 text-white font-semibold rounded-xl shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"><i class="fa-solid fa-plus pr-2"></i>Add Users</a>
    
   </div> --}}
<div class="ml-5 relative overflow-x-auto shadow-md sm:rounded-lg">
  
   <x-rent-log-table :rentlog='$rentlogs'/>

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    function deleteUser(slug) {
            Swal.fire({
                title: 'Apakah Anda yakin ingin menhapus user ini ? ',
                text: 'Anda tidak dapat mengembalikan ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#ff3d41',
                cancelButtonText: 'Batal',
                cancelButtonColor: '#8fcc34',
            }).then((result) => {
                if (result.isConfirmed || response.status == true) {
                    axios.get(`/user-destroy/${slug}`)
                        .then(response => {
                            Swal.fire(
                                'Terhapus!',
                                'User berhasil dihapus.',
                                'success'
                            );
                            window.location.reload(true);
                        })
                        .catch(error => {
                            console.error(error);
                        });
                } else {
                    Swal.fire(
                                'Invalid!',
                                'INVALID DATA BUKU',
                                'error'
                            );
                            window.location.reload(true);
                }
            });
        }
</script>

@endsection
