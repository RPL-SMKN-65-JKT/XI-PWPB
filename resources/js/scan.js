import {Html5QrcodeScanner} from "html5-qrcode";
import {Html5Qrcode} from "html5-qrcode";

let count = 0;

function onScanSuccess(qrCodeMessage) {
    if (count != 0) {
        return
    }
    console.log(`QR Code hasil pemindaian: ${qrCodeMessage}`);
    window.location.href = qrCodeMessage;

    count++;
  }

  // Fungsi untuk menangani kesalahan saat pemindaian QR code
  function onScanError(error) {
    // console.error(`Error saat pemindaian QR code: ${error}`);
  }

  // Konfigurasi objek untuk inisialisasi QR code scanner
  const html5QrcodeScanner = new Html5QrcodeScanner(
    "reader", // ID elemen HTML untuk menampilkan tampilan kamera
    { fps: 10, qrbox: 350, aspectRatio: 1 }, // Opsi konfigurasi tambahan
  );

  // Inisialisasi QR code scanner dan mulai pemindaian
  html5QrcodeScanner.render(onScanSuccess, onScanError);

  // Fungsi untuk menghentikan pemindaian QR code
  function stopScanning() {
    html5QrcodeScanner.clear();
  }