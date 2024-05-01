<?php

use App\Models\Katalog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PrestasiController;

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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Hafizh Athallah Widianto",
        "email" => "banyuadem@gmail.com",
        "image" => "pis.jpg"
    ]);
});


Route::get('/katalog', [KatalogController::class, 'index']);

// halaman single post
Route::get('katalog/{katalog:slug}', [KatalogController::class, 'show']);

Route::get('/', [HomeController::class, 'index']);
// halaman single post kegiatan artikel
Route::get('dartikel/{dartikel:slug}', [HomeController::class, 'show']);

// Kategori
Route::get('/{kategori:slug}', [HomeController::class, 'artikel_kategori'])->name('artikel.kategori');
