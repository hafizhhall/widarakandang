<?php

namespace Database\Seeders;

use App\Models\Katalog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KatalogAnggrekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            Katalog::create([
                'jenis_id' => random_int(1, 4),
                'title' => 'Dendrobium Affine',
                'slug' => 'dendrobium-affine',
                'ukuran' => 'Dewasa',
                'berbunga' => 'Januari',
                'suhu' => 'sejuk',
                'status' => 'Berbunga',
                'jumlah' => 0,
                'harga' => random_int(120000, 450000),
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis amet nam aspernatur quo, fuga quis voluptatem hic minima, odit et iusto in atque porro pariatur debitis. Corporis esse libero suscipit ut? Suscipit quis excepturi expedita consequuntur, alias ducimus, consequatur eius nemo non nihil modi laudantium dolores dolor ad! Vero, consectetur at! Libero nemo pariatur a sapiente adipisci voluptas. Magni amet quia ab cupiditate, tempore sit illo sequi ex placeat perferendis similique ipsa eius nam saepe impedit aperiam asperiores quo culpa totam quis. Molestias cumque corrupti excepturi dignissimos ratione animi laboriosam et recusandae tempora! At, repellendus. Rerum praesentium natus est quisquam!',
                'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis amet nam aspernatur quo, fuga quis voluptatem hic minima, odit et iusto in atque porro pariatur debitis. Corporis esse libero suscipit ut? Suscipit quis excepturi expedita consequuntur, alias ducimus, consequatur eius nemo non nihil modi laudantium dolores dolor ad!',
                'perawatan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis amet nam aspernatur quo, fuga quis voluptatem hic minima, odit et iusto in atque porro pariatur debitis. Corporis esse libero suscipit ut? Suscipit quis excepturi expedita consequuntur, alias ducimus, consequatur eius nemo non nihil modi laudantium dolores dolor',
                'gambar' => 'none'
            ]);
            Katalog::create([
                'jenis_id' => random_int(1, 4),
                'title' => 'Dendrobium Bicaudatum',
                'slug' => 'dendrobium-bicaudatum',
                'ukuran' => 'Remaja',
                'berbunga' => 'Feb',
                'suhu' => 'Hangat',
                'status' => 'Kuncup',
                'jumlah' => 0,
                'harga' => random_int(120000, 450000),
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis amet nam aspernatur quo, fuga quis voluptatem hic minima, odit et iusto in atque porro pariatur debitis. Corporis esse libero suscipit ut? Suscipit quis excepturi expedita consequuntur, alias ducimus, consequatur eius nemo non nihil modi laudantium dolores dolor ad! Vero, consectetur at! Libero nemo pariatur a sapiente adipisci voluptas. Magni amet quia ab cupiditate, tempore sit illo sequi ex placeat perferendis similique ipsa eius nam saepe impedit aperiam asperiores quo culpa totam quis. Molestias cumque corrupti excepturi dignissimos ratione animi laboriosam et recusandae tempora! At, repellendus. Rerum praesentium natus est quisquam!',
                'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis amet nam aspernatur quo, fuga quis voluptatem hic minima, odit et iusto in atque porro pariatur debitis. Corporis esse libero suscipit ut? Suscipit quis excepturi expedita consequuntur, alias ducimus, consequatur eius nemo non nihil modi laudantium dolores dolor ad!',
                'perawatan' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis amet nam aspernatur quo, fuga quis voluptatem hic minima, odit et iusto in atque porro pariatur debitis. Corporis esse libero suscipit ut? Suscipit quis excepturi expedita consequuntur, alias ducimus, consequatur eius nemo non nihil modi laudantium dolores dolor',
                'gambar' => 'none'
            ]);
            Katalog::create([
                'jenis_id' => random_int(1, 4),
                'title' => 'Grammatophyllum martae Remaja',
                'slug' => 'grammatophyllum-martae-remaja',
                'ukuran' => 'Remaja',
                'berbunga' => 'Feb',
                'suhu' => 'Hangat',
                'status' => 'Kuncup',
                'jumlah' => 0,
                'harga' => random_int(120000, 450000),
                'body' => 'Grammatophyllum martae, dikenal juga sebagai anggrek raksasa, adalah spesies anggrek eksotis yang mengesankan dengan ukurannya yang besar dan penampilan yang mencolok. Sebagai tanaman remaja, Grammatophyllum martae menunjukkan pertumbuhan yang aktif dengan pseudobulb yang mulai berkembang dan daun-daun hijau panjang yang tumbuh subur. Tanaman ini memiliki potensi untuk mencapai ukuran yang luar biasa saat dewasa, dengan rangkaian bunga yang panjang dan lebat, biasanya berwarna kuning dengan bintik-bintik cokelat, menciptakan tampilan yang spektakuler dan mempesona.',
                'excerpt' => 'Perawatan Grammatophyllum martae remaja memerlukan perhatian khusus untuk mendukung pertumbuhannya yang sehat dan optimal.',
                'perawatan' => 'Merawat Grammatophyllum martae remaja memerlukan perhatian khusus untuk memastikan anggrek ini tumbuh sehat dan optimal. Berikut beberapa tips yang dapat membantu:
                Pencahayaan: Grammatophyllum martae membutuhkan cahaya yang terang tetapi tidak langsung. Letakkan tanaman di tempat yang',
                'gambar' => 'none'
            ]);
            Katalog::create([
                'jenis_id' => random_int(1, 4),
                'title' => 'Cattleya Forbesi Flava Dewasa',
                'slug' => 'cattleya-forbesi-flava-dewasa',
                'ukuran' => 'Remaja',
                'berbunga' => 'Feb',
                'suhu' => 'Hangat',
                'status' => 'Kuncup',
                'jumlah' => 0,
                'harga' => random_int(120000, 450000),
                'body' => 'Cattleya Forbesi Flava adalah salah satu varietas anggrek yang memikat dengan bunganya yang berwarna kuning pucat dan bentuknya yang elegan. Anggrek ini terkenal karena keanggunan bunganya yang besar dan harum, dengan kelopak yang lembut serta labellum yang mencolok. Cattleya Forbesi Flava tumbuh di daerah tropis dan subtropis, memerlukan kondisi yang hangat dan lembab untuk berkembang optimal. Sebagai tanaman dewasa, Cattleya Forbesi Flava memiliki pseudobulb yang kokoh dan daun yang tebal, berwarna hijau gelap, yang menambah pesona keseluruhan tanaman.
                ',
                'excerpt' => 'Perawatan Grammatophyllum martae remaja memerlukan perhatian khusus untuk mendukung pertumbuhannya yang sehat dan optimal.',
                'perawatan' => 'Merawat Cattleya Forbesi Flava dewasa memerlukan perhatian khusus untuk memastikan anggrek ini tumbuh sehat dan berbunga dengan baik. Berikut beberapa tips yang dapat membantu: Pencahayaan: Cattleya Forbesi Flava membutuhkan cahaya yang terang',
                'gambar' => 'none'
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
