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

        User::create([
            'name' => 'banyu adem',
            'email' => 'banyu@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'athallah',
            'email' => 'athallah@gmail.com',
            'role' => 'pelanggan',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'widianto',
            'email' => 'widianto@gmail.com',
            'role' => 'pemilik',
            'password' => bcrypt('password')
        ]);
        // User::factory(5)->create();
        // Artikel::factory(20)->create();
        Kategori::create([
            'nama' => 'Prestasi',
            'slug' => 'prestasi'
        ]);
        Kategori::create([
            'nama' => 'Informasi',
            'slug' => 'informasi'
        ]);
        Kategori::create([
            'nama' => 'Kegiatan',
            'slug' => 'kegiatan'
        ]);
        Jenis::create([
            'name' => 'Phalaenopsis',
            'slug' => 'phalaenopsis'
        ]);
        Jenis::create([
            'name' => 'Dendrobium',
            'slug' => 'dendrobium'
        ]);
        Jenis::create([
            'name' => 'Vanda',
            'slug' => 'vanda'
        ]);
        Jenis::create([
            'name' => 'Oncidium',
            'slug' => 'oncidium'
        ]);

        Supplier::create([
            'perusahaan' => 'Mikum jaya anggrek',
            'slug' => 'mikum-jaya-anggrek',
            'nama' => 'Wigunan',
            'phone' => '0899889899',
            'note' => 'Supplier ini sangat baik dan suka datang jam 3 sore setiap hari selasa pagi'
        ]);

    }
}
