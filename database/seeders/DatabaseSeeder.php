<?php

namespace Database\Seeders;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Katalog;
use App\Models\Jenis;
use App\Models\User;
use App\Models\Supplier;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // User::factory(5)->create();


        // Artikel::factory(20)->create();
        $this->call([KategoriArtikelSeeder::class]);
        $this->call([JenisAnggrekSeeder::class]);
        $this->call([UserRolePermissionSeeder::class]);
        $this->call([SupplierSeeder::class]);
        $this->call([KatalogAnggrekSeeder::class]);
        $this->call([ArtikelSeeder::class]);
    }
}
