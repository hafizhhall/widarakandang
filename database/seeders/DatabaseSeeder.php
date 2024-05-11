<?php

namespace Database\Seeders;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Katalog;
use App\Models\Jenis;
use App\Models\User;

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
        Katalog::create([
            'title' => 'Oncidium goldern shower dewasa',
            'jenis_id' => 3,
            'slug' => 'oncidium-goldern-shower-dewasa',
            'ukuran' => 'Dewasa',
            'berbungga' => 'Desember',
            'suhu' => 'Sejuk',
            'warna' => 'Merah-merah',
            'jumlah' => 90,
            'harga' => 780000,
            'excerpt' => 'Anggrek Lissochiolides, yang juga dikenal dengan nama Vandopsis Lissochiloides, adalah anggrek epifit yang indah dengan ciri khas bunganya yang unik.',
            'body' => 'Anggrek Lissochiolides, yang juga dikenal dengan nama Vandopsis Lissochiloides, adalah anggrek epifit yang indah dengan ciri khas bunganya yang unik. Anggrek ini biasanya ditemukan di dataran rendah Filipina, Thailand, Laos, dan Papua. Batangnya yang kuat dapat mencapai tinggi 2 meter dengan daun kaku dan kasar. Bunganya memiliki kombinasi warna yang menarik, dengan bagian belakang kuning dan depan berwarna merah muda. Tekstur bunganya yang unik dan ukurannya yang lumayan besar (sekitar 7 cm) menjadikannya semakin menarik. Anggrek ini dapat mekar selama beberapa bulan, sehingga Anda dapat menikmati keindahannya dalam waktu yang lama. Di Indonesia, anggrek Lissochiolides dijual secara online dengan kisaran harga antara Rp 280.000 hingga Rp 323.000.',
            'perawatan' => 'Tempatkan anggrek di tempat yang terkena sinar matahari pagi yang tidak langsung selama beberapa jam setiap hari. Hindari paparan sinar matahari langsung yang berlebihan karena dapat membakar daunnya.',
            'gambar' => 'dendro.jpg'
        ]);
    }
}
