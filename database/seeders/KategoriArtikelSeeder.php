<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            //code..
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
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }


    }
}
