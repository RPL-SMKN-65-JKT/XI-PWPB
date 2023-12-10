<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RentController;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomepageController::class, 'home']);

// Route::get('/home', function(){
//     return view('pages.home');
// });


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticating']);
Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'registerProcess']);


Route::get('peraturan', [HomepageController::class, 'peraturan']);

// USER ROUTE, USER ROUTE, USER ROUTE, USER ROUTE, USER ROUTE,

Route::get('/kategori/novel', [BukuController::class, 'novel'])->name('buku.novels');
Route::get('/kategori/manga', [BukuController::class, 'manga'])->name('buku.mangas');
Route::get('/kategori/study', [BukuController::class, 'study'])->name('buku.studys');

Route::get('/kumpulan-buku', [BukuController::class, 'index_user']);
Route::get('/detail-buku/{slug}', [BukuController::class, 'detail'])->name('buku.detail');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/setting/{slug}', [UserController::class, 'profileIndex']);
    Route::put('/setting/{slug}', [UserController::class, 'profileEdit'])->name('profil.edit');

    Route::post('/buku/{slug}', [RentController::class, 'pinjamBuku'])->name('pinjam.buku');
    Route::get('/histori-peminjaman/{slug}', [UserController::class, 'indexHistori']);
    Route::get('/histori-pelanggaran/{slug}', [UserController::class, 'indexPelanggaran']);
    Route::get('/histori-perizinan-ebook/{slug}', [UserController::class, 'indexPerizinanEbook']);


    Route::post('izin.ebook/{slug}', [EbookController::class, 'izinEbook'])->name('izin.ebook');
    Route::post('download.ebook/{slug}', [EbookController::class, 'downloadEbook'])->name('download.ebook');


    Route::middleware('only_admin')->group(function(){
        // ROUTE ADMIN, ROUTE ADMIN, ROUTE ADMIN, ROUTE ADMIN, ROUTE ADMIN,
        Route::get('/daftar-buku', [BukuController::class, 'index'])->name('dBuku.index');
        Route::get('/daftar-buku/{slug}', [BukuController::class, 'show'])->name('buku.show');
        Route::delete('/delete-buku/{slug}', [BukuController::class, 'destroy'])->name('buku.destroy');

        Route::get('/tambah-buku', [BukuController::class, 'create'])->name('buku.create');
        Route::post('/tambah-buku', [BukuController::class, 'store'])->name('buku.store');

        Route::get('/edit-buku/{slug}', [BukuController::class, 'edit'])->name('buku.edit');
        Route::put('/update-buku/{slug}', [BukuController::class, 'update'])->name('buku.update');

        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('/daftar-user', [UserController::class, 'dUser']);
        Route::get('/detail-user/{slug}', [UserController::class, 'detailUser']);
        Route::get('/edit-user/{slug}', [UserController::class, 'editUser'])->name('editIndex.user');
        Route::put('/edit-user/{slug}', [UserController::class, 'editUserProcess'])->name('edit.user');
        Route::delete('/delete-user/{slug}', [UserController::class, 'deleteUser'])->name('delete.user');



        // RENTLOGS RENTLOGS
        Route::get('/catatan-butuh-persetujuan', [RentController::class, 'butuhPersetujuan']);
        Route::get('/catatan-butuh-persetujuan/setuju/{kode}', [RentController::class, 'peminjamanSetuju']);
        Route::get('/catatan-butuh-persetujuan/tidak-setuju/{kode}', [RentController::class, 'peminjamanTidakSetuju']);

        Route::post('qrButuhSetuju', [RentController::class, 'qrButuhPersetujuan'])->name('qrButuhSetuju');

        Route::post('qrDipinjam', [RentController::class, 'qrDipinjam'])->name('qrDipinjam');
        Route::get('/catatan-dipinjam', [RentController::class, 'dipinjamIndex']);
        Route::get('/catatan-dipinjam/dikembalikan/{kode}', [RentController::class, 'dipinjamSelesai']);

        Route::get('/catatan-dikembalikan', [RentController::class, 'dikembalikanIndex']);

        Route::post('qrTerlambat', [RentController::class, 'qrTerlambat'])->name('qrTerlambat');
        Route::get('/catatan-terlambat', [RentController::class, 'terlambatIndex']);
        Route::get('/catatan-terlambat/selesai/{kode}', [RentController::class, 'terlambatSelesai']);

        Route::post('/catatan-rusak/{kode}', [RentController::class, 'rusakSelesai'])->name('denda.rusak');
        Route::get('/catatan-rusak', [RentController::class, 'rusakIndex']);


        Route::post('/catatan-hilang/{kode}', [RentController::class, 'hilangSelesai'])->name('denda.hilang');
        Route::get('/catatan-hilang', [RentController::class, 'hilangIndex']);



        Route::get('/pdf/peminjaman/dipinjam', [PdfController::class, 'pdfPeminjamanDipinjam']);
        Route::get('/pdf/peminjaman/dikembalikan', [PdfController::class, 'pdfPeminjamanDikembalikan']);
        Route::get('/pdf/peminjaman/terlambat', [PdfController::class, 'pdfPeminjamanTerlambat']);
        Route::get('/pdf/peminjaman/rusak', [PdfController::class, 'pdfPeminjamanRusak']);
        Route::get('/pdf/peminjaman/hilang', [PdfController::class, 'pdfPeminjamanHilang']);
        Route::get('/pdf/perizinan/ebook', [PdfController::class, 'pdfPerizinanEbook']);


        Route::get('/pdf/peminjaman/dipinjam-download', [PdfController::class, 'pdfPeminjamanDipinjamDownload']);
        Route::get('/pdf/peminjaman/dikembalikan-download', [PdfController::class, 'pdfPeminjamanDikembalikanDownload']);
        Route::get('/pdf/peminjaman/terlambat-download', [PdfController::class, 'pdfPeminjamanTerlambatDownload']);
        Route::get('/pdf/peminjaman/rusak-download', [PdfController::class, 'pdfPeminjamanRusakDownload']);
        Route::get('/pdf/peminjaman/hilang-download', [PdfController::class, 'pdfPeminjamanHilangDownload']);
        Route::get('/pdf/perizinan/ebook-download', [PdfController::class, 'pdfPerizinanEbookDownload']);

        Route::get('/pdf/user', [PdfController::class, 'pdfUserLihat']);
        Route::get('/pdf/user-download', [PdfController::class, 'pdfUserDownload']);


        Route::get('/catatan-ebook', [EbookController::class, 'ebookIndex']);
        Route::post('/catatan-ebook/setuju/{id}', [EbookController::class, 'ebookSetuju'])->name('ebook.setuju');
        Route::delete('/catatan-ebook/tidak-setuju/{id}', [EbookController::class, 'ebookTidakSetuju'])->name('ebook.delete');



    });



});





