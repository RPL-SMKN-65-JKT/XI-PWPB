<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\PengembalianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store'])->name('register');
    Route::get('/register/success', [RegisterController::class, 'success']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::middleware(['isMember', 'guest'])->group(function () {
});
Route::get('/koleksi', [KoleksiController::class, 'index']);
Route::get('/koleksi/{book:slug}', [KoleksiController::class, 'details']);
Route::get('/peraturan', function () {
    return view('main.peraturan', [
        'date_now' => Carbon::now()->format('Y-m-d')
    ]);
});
Route::get('/', [HomeController::class, 'index']);

Route::middleware(['isEntitled'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/dashboard/books', BooksController::class)->except('show');
    Route::get('/dashboard/books/add/classification', [BooksController::class, 'typeBooks']);
    Route::get('/dashboard/books/add/categories', [BooksController::class, 'categoriesBooks']);
    Route::get('/dashboard/books/add/checkSlug', [BooksController::class, 'checkSlug']);
    Route::resource('/dashboard/types', TypesController::class)->except(['create', 'delete', 'show']);
    Route::resource('/dashboard/categories', CategoriesController::class)->except(['create', 'delete', 'show']);
    Route::resource('/dashboard/users', UsersController::class);
    Route::get('/dashboard/reports', [ReportsController::class, 'index']);
    Route::get('/dashboard/profile', [ProfileController::class, 'dashboardIndex']);
    Route::put('/dashboard/profile/{user}', [ProfileController::class, 'updateImageDashboard']);
    Route::get('/dashboard/verifikasi', [VerifikasiController::class, 'input']);
    Route::post('/dashboard/verifikasi', [VerifikasiController::class, 'submitInput']);
    Route::get('/dashboard/verifikasi/found', [VerifikasiController::class, 'index']);
    Route::put('/dashboard/verifikasi/found/{bookLoan:kode_peminjaman}', [VerifikasiController::class, 'verifLoan']);
    Route::get('/dashboard/pengembalian', [PengembalianController::class, 'input']);
    Route::post('/dashboard/pengembalian', [PengembalianController::class, 'submitInput']);
    Route::get('/dashboard/pengembalian/found', [PengembalianController::class, 'index']);
    Route::get('/dashboard/pengembalian/denda', [PengembalianController::class, "denda"]);
    Route::post('/dashboard/pengembalian/denda/{bookLoan:id}', [PengembalianController::class, "submitLoan"]);
    Route::post('/dashboard/pengembalian/found/{bookLoan:kode_peminjaman}', [PengembalianController::class, 'dendaLoan']);
});

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/dashboard/reports/pdf', [ReportsController::class, 'pdf']);
    Route::get('/dashboard/reports/view/pdf', [ReportsController::class, 'view_pdf']);
});

Route::middleware(['isMember'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/profile/edit', [ProfileController::class, 'edit']);
    Route::put('/profile/{user}', [ProfileController::class, 'updateImage']);
    Route::get('/riwayat', [RiwayatController::class, 'index']);
    Route::get('/riwayat/{bookLoan:kode_peminjaman}', [RiwayatController::class, 'detail'])->middleware('peminjam');
    Route::get('/pinjam/tanggalkembali', [PinjamController::class, 'checkTanggalKembali']);
    Route::get('/pinjam', [PinjamController::class, 'index']);
    Route::get('/pinjam/success', [PinjamController::class, 'success']);
    Route::post('/pinjam', [PinjamController::class, 'store']);
    Route::post('/pinjam/form', [PinjamController::class, 'detailBukuPinjam']);
});
