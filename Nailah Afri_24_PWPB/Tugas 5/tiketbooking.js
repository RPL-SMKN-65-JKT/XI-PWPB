// Menyeleksi beberapa inputan textfield
const nama = document.getElementById("nama");
const destinasi = document.getElementById("pilihanDestinasi");
const pilihan_pesawat = document.getElementById("pilihanpesawat");
const status = document.getElementById("status");
const jumlah = document.getElementById("jumlah");
const subtotal = document.getElementById("subtotal");
const diskon = document.getElementById("diskon");
const total = document.getElementById("total");
const tiket_anak = document.getElementById("tiket_anak");
const tiket_dewasa = document.getElementById("tiket_dewasa");
const cetakPesanan = document.querySelector(".output");

// Menyeleksi bagian tombol dan menjalnkan apabila tombol pesan di klik
const tombolPesan = document.getElementById("pesan");
tombolPesan.addEventListener("click", function (e) {
  e.preventDefault();

  // Pengecekan jika inputan-nya kosong atau tidak diisi
  if (
    nama.value == "" ||
    destinasi.value == "" ||
    tiket_dewasa.value == "" ||
    tiket_anak.value == ""
  ) {
    alert("Anak anak harus didampingi orang dewasa");
  } else {
    // Mengecek jika inputan nama nya sudah tidak kosong
    if (nama.value != "") {
      document.getElementById("namaOutput").innerText = nama.value;
    }
    else {
      alert("Inputan nilai harus diisi terlebih dahulu!");
    }
  }

  // Mengecek inputan destinasi sesuai Pilihan: Yogyakarta, Batam, Surabaya, Bali dan Padang
  if (destinasi.value == "Yogyakarta") {
    document.getElementById("destinasiOutput").innerText = destinasi.value;
  } else if (destinasi.value == "Bali") {
    document.getElementById("destinasiOutput").innerText = destinasi.value;
  } else if (destinasi.value == "Batam") {
    document.getElementById("destinasiOutput").innerText = destinasi.value;
  } else if (destinasi.value == "Surabaya") {
    document.getElementById("destinasiOutput").innerText = destinasi.value;
  } else if (destinasi.value == "Padang") {
    document.getElementById("destinasiOutput").innerText = destinasi.value;
  } else {
    alert(
      "Pilihan Destinasi hanya Yogyakarta, Batam, Surabaya, Bali dan Padang"
    );
  }

  // Mengecek inputan status sesuai 2 pilihan: Dewasa dan Anak-anak
  let dataStatus;
  if (tiket_dewasa.value ) {
    dataStatus = `${tiket_dewasa.value} Tiket Dewasa`
  } 
  if(tiket_anak.value){
    dataStatus = `${tiket_anak.value} Tiket Anak`
  } 
  if (tiket_anak.value && tiket_dewasa.value) {
   dataStatus = `${tiket_dewasa.value} Tiket Dewasa + ${tiket_anak.value} Tiket Anak`
  } 
  document.getElementById("statusOutput").innerText = dataStatus;

  let harga = 0;
  let hargaPerTiketDewasa = document.getElementById("hargaTiketDewasa");
  let hargaPerTiketAnak = document.getElementById("hargaTiketAnak");

  // Mengecek antara status dan destinasi
  if (destinasi.value == "Yogyakarta" && tiket_dewasa.value) {
    harga = harga + 500000 * Number(tiket_dewasa.value);
    hargaPerTiketDewasa.innerText = 500000 + " (Lima Ratus Ribu)";
  } else if (destinasi.value == "Batam" && tiket_dewasa.value) {
    harga = harga + 300000 * Number(tiket_dewasa.value);
    hargaPerTiketDewasa.innerText = 300000 + " (Tiga Ratus Ribu)";
  } else if (destinasi.value == "Surabaya" && tiket_dewasa.value) {
    harga = harga + 400000 * Number(tiket_dewasa.value);
    hargaPerTiketDewasa.innerText = 400000 + " (Empat Ratus Ribu)";
  } else if (destinasi.value == "Bali" && tiket_dewasa.value) {
    harga = harga + 700000 * Number(tiket_dewasa.value);
    hargaPerTiketDewasa.innerText = 700000 + " (Tujug Ratus Ribu)";
  } else if (destinasi.value == "Padang" && tiket_dewasa.value) {
    harga = harga + 600000 * Number(tiket_dewasa.value);
    hargaPerTiketDewasa.innerText = 600000 + " (Enam Ratus Ribu)";
  } 
  if (destinasi.value == "Yogyakarta" && tiket_anak.value) {
    harga = harga + 400000 * Number(tiket_anak.value);
    hargaPerTiketAnak.innerText = 400000 + " (Empat Ratus Ribu)";
  } else if (destinasi.value == "Batam" && tiket_anak.value) {
    harga = harga + 200000 * Number(tiket_anak.value);
    hargaPerTiketAnak.innerText = 200000 + " (Dua Ratus Ribu)";
  } else if (destinasi.value == "Surabaya" && tiket_anak.value) {
    harga = harga + 300000 * Number(tiket_anak.value);
    hargaPerTiketAnak.innerText = 300000 + " (Lima Ratus Ribu)";
  } else if (destinasi.value == "Bali" && tiket_anak.value) {
    harga = harga + 500000 * Number(tiket_anak.value);
    hargaPerTiketAnak.innerText = 500000 + " (Lima Ratus Ribu)";
  } else if (destinasi.value == "Padang" && tiket_anak.value) {
    harga = harga + 500000 * Number(tiket_anak.value);
    hargaPerTiketAnak.innerText = 500000 + " (Lima Ratus Ribu)";
  }
  // Mengecek inputan jumlah / tiket jika lebih dari 5 maka akan dikasih diskon, jika dibawah 5 tidak dapat diskon
  // Ubah dulu yang tipe data nya string menjadi number
  // const convertToNumber = Number(jumlah.value);
  subtotal.value = Number(tiket_anak.value) + Number(tiket_dewasa.value);
  document.getElementById("subtotalOutput").innerText = harga;

  let discount = 0;
  if (subtotal.value >= 6) {
    discount = (harga / 100) * 15;
  } else if (subtotal.value <= 6) {
    discount = 0;
  }

  document.getElementById("jumlahOutput").innerText = subtotal.value;
  diskon.value = discount;
  document.getElementById("diskonOutput").innerText = discount;

  let totalPaid = harga - discount;
  total.value = totalPaid;
  document.getElementById("totalOutput").innerText = totalPaid;
  console.log(pilihan_pesawat);
  // console.log(destinasi);

  document.getElementById("PilihanPesawatOutput").innerHTML =
    pilihan_pesawat.value;
  document.getElementById("destinasiOutput").innerHTML = destinasi.value;
  // document.getElementById("Kelas Penerbangan").innerHTML = kelas_penerbangan.value;

  if (
    nama.value != "" ||
    destinasi.value != "" ||
    tiket_dewasa.value == "" ||
    tiket_anak.value == ""
  ) {
    // Mengecek jika user memasukkan nilai 0 pada inputan jumlah tiket
    if (tiket_dewasa.value == 0 && tiket_anak.value == 0) {
      alert("Jumlah tiket tidak boleh 0");
      cetakPesanan.classList.remove("tampil");
    } else {
      cetakPesanan.classList.add("tampil");
    }
  }
});

// Menyeleksi bagian tombol dan menjalankan apabila tombol hapus di klik
const hapus = document.getElementById("hapus");
hapus.addEventListener("click", function () {
  // Menghapus bagian output pada html
  if (
    nama.value == "" &&
    destinasi.value == "" &&
    (tiket_dewasa.value == "" || tiket_anak.value == "")
  ) {
    alert("Data masih kosong, apa yang mau dihapus?");
  } else if (
    nama.value != "" ||
    destinasi.value != "" ||
    tiket_dewasa.value == "" ||
    tiket_anak.value == ""
  ) {
    nama.value = "";
    destinasi.value = "";
    tiket_anak.value = "";
    tiket_dewasa.value = "";
    // jumlah.value = "";
    subtotal.value = "";
    diskon.value = "";
    total.value = "";
    cetakPesanan.classList.remove("tampil");
  }
});
