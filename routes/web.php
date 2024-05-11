<?php

use App\Models\Jenis;
use App\Models\Katalog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DashboardArtikelController;
use App\Http\Controllers\DashboardKategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\RegisterController;



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


// halaman tentang
Route::get('/dashboard/artikel/checkSlug',[DashboardArtikelController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/artikel', DashboardArtikelController::class)->middleware('auth');
Route::post('/logout',[LoginController::class, 'logout']);
Route::get('/dashboard/kategori/checkSlug', [DashboardKategoriController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/kategori', DashboardKategoriController::class)->middleware('auth');
Route::get('/dashboard/kategori', [DashboardKategoriController::class, 'index'])->middleware('auth');
Route::get('/dashboard', function(){
    return view ('dashboard.index');
})->middleware('auth');
Route::get('/register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);
Route::post('/login',[LoginController::class, 'authenticate']);
Route::get('/login',[LoginController::class, 'index'])->name('login')->middleware('guest');


Route::get('/', [HomeController::class, 'index']);

Route::get('about/', [AboutController::class,'index']);

Route::get('katalog/', [KatalogController::class, 'index']);

// halaman single post
Route::get('katalog/{katalog:slug}', [KatalogController::class, 'show']);
// Route::get('/katalog/{jenis:slug}', [KatalogController::class, 'jenis_anggrek'])->name('jenis.katalog');

// halaman single post kegiatan artikel
Route::get('dartikel/{dartikel:slug}', [HomeController::class, 'show']);

// Kategori
Route::get('/{kategori:slug}', [HomeController::class, 'artikel_kategori'])->name('artikel.kategori');

// Jenis anggrek
Route::get('katalog/{jenis:slug}', [KatalogController::class, 'index'])->name('jenis.katalog');
// Route::get('katalog/{jenis:slug}', [KatalogController::class, 'show']);

Route::get('/jenis/{jenis:slug}',function(Jenis $jenis){
    return view('filterjenis', [
        'title' => $jenis->name,
        'katalog' => $jenis->katalog,
        'jenis' => $jenis->name
    ]);
});


