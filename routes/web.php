<?php

use App\Models\Jenis;
use App\Models\Katalog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CetakPdfController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardEntryController;
use App\Http\Controllers\DashboardJenisController;
use App\Http\Controllers\DashboardOutputController;
use App\Http\Controllers\DashboardArtikelController;
use App\Http\Controllers\DashboardJualController;
use App\Http\Controllers\DashboardKatalogController;
use App\Http\Controllers\DashboardKategoriController;
use App\Http\Controllers\DashboardRoleController;
use App\Http\Controllers\DashboardSupplierController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserCartController;
use App\Http\Controllers\UserChartController;
use App\Http\Controllers\UserCheckoutController;
use App\Http\Controllers\UserProfilController;
use App\Http\Controllers\UserSettingController;

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
// Dashboard menu penjualan
Route::resource('/dashboard/transaction', DashboardJualController::class)->middleware('aksesPetugas');
Route::get('/dashboard/transaction/{transaction}/generate', [DashboardJualController::class, 'generateInvoice']);
// Role Dashboard
Route::resource('/dashboard/role', DashboardRoleController::class)->middleware('aksesPetugas');
// export excel dan pdf

Route::get('cetak-invoice', [CetakPdfController::class, 'cetakPdf'])->middleware('auth');
Route::get('/dashboard/output/excel', [DashboardOutputController::class, 'export_excel'])->middleware('can:read output');
Route::get('/dashboard/entry/excel', [DashboardEntryController::class, 'export_excel'])->middleware('can:read entry');
Route::get('/dashboard/entry/pdf', [DashboardEntryController::class, 'export_pdf']);
// user dashboard controller
// Route::resource('/chart', UserCartController::class)->middleware('auth');
Route::resource('/user/address', UserAddressController::class)->middleware('aksesPengguna');
Route::get('/user', [UserProfilController::class, 'index'])->middleware('aksesPengguna');
Route::get('/user/change-password', [UserProfilController::class, 'editPassword'])->middleware('aksesPengguna')->name('user.change-password');
Route::post('/user/change-password', [UserProfilController::class, 'processChangePassword'])->middleware('aksesPengguna');
Route::get('/user/change-profil', [UserProfilController::class, 'ediPorfil'])->middleware('aksesPengguna')->name('user.change-profil');
Route::post('/user/change-profil', [UserProfilController::class, 'processEditProfil'])->middleware('aksesPengguna');
Route::get('/user/change-address', [UserProfilController::class, 'addAddress'])->middleware('aksesPengguna')->name('user.change-address');
Route::post('/user/change-address', [UserProfilController::class, 'processAddAddress'])->middleware('aksesPengguna');
Route::get('/chart', [UserChartController::class, 'index'])->middleware('aksesPengguna');
Route::get('/', [UserChartController::class, 'nav'])->middleware('auth');
Route::post('/chart/{id}', [UserChartController::class, 'store'])->middleware('auth');
Route::patch('/chart/{id}', [UserChartController::class, 'update'])->middleware('auth');
Route::delete('/chart/{id}', [UserChartController::class, 'destroy'])->middleware('auth')->name('chart.destroy');
Route::post('/web/chart', [UserChartController::class, 'updateShippingAddress'])->name('chart.updateShippingAddress');
Route::post('/checkout', [UserCheckoutController::class, 'store']);
Route::get('/order', [UserCheckoutController::class, 'index'])->middleware('aksesPengguna');
Route::get('/order/{transactionId}/detail', [UserCheckoutController::class, 'show'])->middleware('aksesPengguna')->name('order.detail');
Route::get('/order/{transactionId}/generate', [UserCheckoutController::class, 'generateInvoice'])->middleware('aksesPengguna');
Route::get('/order/{transactionId}/ongkir', [UserCheckoutController::class, 'tambahOngkir'])->middleware('aksesPengguna')->name('order.ongkir');
// Route::post('/order/{transactionId}/detail', [UserCheckoutController::class, 'getCourierServices']);
// dashboard barang keluar
Route::resource('/dashboard/output', DashboardOutputController::class)->middleware('aksesPetugas');
// dashboar barang masuk
Route::get('/dashboard/entry/filter', [DashboardEntryController::class, 'filter'])->middleware('auth');
Route::resource('/dashboard/entry', DashboardEntryController::class)->middleware('aksesPetugas')->except('show');
// controller dashboard supplier
Route::resource('/dashboard/supplier', DashboardSupplierController::class)->middleware('aksesPetugas')->except('show');
Route::get('/dashboard/supplier/checkSlug', [DashboardSupplierController::class, 'checkSlug'])->middleware('auth');
// Controller dashboard jenis
Route::get('/dashboard/jenis/{jenis}/edit', [DashboardJenisController::class, 'edit'])->name('jenis.edit')->middleware('aksesPetugas');
Route::put('/dashboard/jenis/{jenis}', [DashboardJenisController::class, 'update'])->name('jenis.update');
Route::get('/dashboard/jenis/checkSlug', [DashboardJenisController::class, 'checkSlug'])->middleware('aksesPetugas');
Route::get('/dashboard/jenis', [DashboardJenisController::class, 'index'])->name('jenis.index')->middleware('aksesPetugas');
Route::get('/dashboard/jenis/create', [DashboardJenisController::class, 'create'])->name('jenis.create');
Route::post('/dashboard/jenis/create', [DashboardJenisController::class, 'store'])->name('jenis.store');
Route::delete('/dashboard/jenis/{jenis}', [DashboardJenisController::class, 'destroy'])->name('jenis.destroy');
// controller dashboard katalog
Route::get('/dashboard/katalog/checkSlug', [DashboardKatalogController::class, 'checkSlug'])->middleware('aksesPetugas');
Route::get('/dashboard/katalog/generate', [DashboardKatalogController::class, 'generateLabel']);
Route::resource('/dashboard/katalog', DashboardKatalogController::class)->middleware('aksesPetugas');
// Route::get('/dashboard/katalog', [DashboardKatalogController::class, 'index'])->middleware('auth');
Route::get('/dashboard/artikel/checkSlug', [DashboardArtikelController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/artikel', DashboardArtikelController::class)->middleware('aksesPetugas');

// kategori blog post dashboard
Route::get('/dashboard/kategori/checkSlug', [DashboardKategoriController::class, 'checkSlug'])->middleware('aksesPetugas');
Route::resource('/dashboard/kategori', DashboardKategoriController::class)->except('show')->middleware('aksesPetugas:admin');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('aksesPetugas');

Route::group([], function () {
    Route::get('/search', [HomeController::class, 'search'])->name('home.search');
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/blog', [AboutController::class, 'index']);

    Route::get('/katalog', [KatalogController::class, 'index']);

    // halaman single post
    Route::get('/katalog/{katalog:slug}', [KatalogController::class, 'show']);
    // Route::get('/katalog/{jenis:slug}', [KatalogController::class, 'jenis_anggrek'])->name('jenis.katalog');

    // halaman single post kegiatan artikel
    Route::get('/dartikel/{dartikel:slug}', [HomeController::class, 'show']);
    Route::get('/blog/dartikel/{dartikel:slug}', [AboutController::class, 'show']);

    // Kategori
    Route::get('/blog/{kategori:slug}', [AboutController::class, 'artikel_kategori'])->name('artikel.kategori');

    // Jenis anggrek
    Route::get('/katalog/{jenis:slug}', [KatalogController::class, 'index'])->name('jenis.katalog');
    // Route::get('katalog/{jenis:slug}', [KatalogController::class, 'show']);

    Route::get('/jenis/{jenis:slug}', function (Jenis $jenis) {
        return view('filterjenis', [
            'title' => $jenis->name,
            'katalog' => $jenis->katalog,
            'jenis' => $jenis->name
        ]);
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
});
Route::post('/logout', [LoginController::class, 'logout']);


Route::middleware(['auth', 'aksesPetugas'])->prefix('dashboard')->name('dashboard')->group(function () {

});

Route::middleware('auth')->group(function () {
});
