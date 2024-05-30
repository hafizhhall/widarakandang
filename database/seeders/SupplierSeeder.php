<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            //code...
            Supplier::create([
                'perusahaan' => 'Mikum jaya anggrek',
                'slug' => 'mikum-jaya-anggrek',
                'nama' => 'Wigunan yanto peang',
                'phone' => '0899889899',
                'note' => 'Supplier ini sangat baik dan suka datang jam 3 sore setiap hari selasa pagi'
            ]);
            Supplier::create([
                'perusahaan' => 'CV Andi Perkasa',
                'slug' => 'cv-andi-perkasa',
                'nama' => 'Yanti',
                'phone' => '098919191',
                'note' => 'Toop'
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
