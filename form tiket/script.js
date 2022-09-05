
let bangku = document.getElementById("inp_bangku");
let seat_title = document.getElementById("title");
let harga_tiket = document.getElementById("harga_tiket")

function pesan() {

    let nama_bangku = document.getElementById(bangku.value);

    nama_bangku.disabled = true
    nama_bangku.innerHTML = "HABIS"

    bangku.value = seat_title.value

    alert("PESANAN BERHASIL!")
}

function Total(jumlah) {
    let harga = parseInt(jumlah) * 55000

    if (isNaN(harga)){
        harga = 0;
    }
    
    harga_tiket.value = harga
}