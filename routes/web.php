<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use  App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


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


Route::get('/', [PageController::class, 'home']);
Route::get('/book/{book:slug}', [BookController::class, 'bookDetails']);

Route::get('/books', [BookController::class, 'showBooks']);

Route::get('/ebooks', [BookController::class, 'showEbooks']);

Route::middleware('guest')->group(function () {

    Route::get('/signin', [AuthController::class, 'signIn'])->name('signin');
    Route::get('/signup', [AuthController::class, 'signUp']);

    Route::post('/signin', [AuthController::class, 'actionSignIn']);
    Route::post('/signup', [AuthController::class, 'actionSignUp']);
});

Route::middleware('auth')->group(function () {
    Route::get('/signout', [AuthController::class, 'signout']);
    
    Route::get('/myaccount', [PageController::class, 'myaccount']);
    Route::post('/myaccount', [PageController::class, 'myaccountAction']);

    

    Route::get('/ebooks', [BookController::class, 'showEbooks']);

    Route::get('/book-details', [BookController::class, 'bookDetails']);

    Route::get('/add-book', [BookController::class, 'addBook']);
    Route::post('/add-book', [BookController::class, 'actionAddBook']);

    Route::get('/book/{book:slug}/edit', [BookController::class, 'editBook']);
    Route::post('/book/edit', [BookController::class, 'actionEditBook']);

    Route::get('/borrow/{book:slug}', [BookController::class, 'borrow']);

    Route::get('/book/{book:slug}/delete', [BookController::class, 'deleteBook']);
    
    Route::get('/admin', [MemberController::class, 'showMembers']);

    Route::get('/members', [MemberController::class, 'showMembers']);

    Route::get('/member/{user}/edit', [MemberController::class, 'editMember']);
    Route::post('/member/edit', [MemberController::class, 'actionEditMember']);
    Route::get('/member/{user}/remove', [MemberController::class, 'deleteMember']);

    Route::get('/add-member', [MemberController::class, 'addMember']);
    Route::post('/add-member', [MemberController::class, 'addNewUser']);

    Route::get('/scan', [PageController::class, 'scan']);

    Route::get('/report', [PageController::class, 'report']);
    
    Route::get('/fine', [PageController::class, 'fine']);

    Route::get('/return/{borrow:kode}', [BookController::class, 'returnBook']);

    Route::get('/read/{book:slug}', [BookController::class, 'readBook']);
});


