import Swal from 'sweetalert2'

if (sessionStorage.getItem('info')) {
    Swal.fire({
        title: "Thank You",
        text: sessionStorage.getItem('info'),
        icon: "success",
        footer: '<a href="/myaccount">Lihat buku yang saya pinjam</a>'
    });

    sessionStorage.removeItem('info');
}