<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisAnggrekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
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
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
