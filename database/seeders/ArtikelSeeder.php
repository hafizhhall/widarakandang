<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artikel::create([
            'title' =>'Anggrek Widarakandang Berhasil Meraih Juara 1 di Malang',
            'slug' => 'anggrek-aidarakandang-berhasil-meraih-juara-1-di-malang',
            'kategori_id' => random_int(1, 3),
            'user_id' => 1,
            'gambar' => 'none',
            'minibody' => 'Prestasi gemilang telah diraih oleh Anggrek Widarakandang, yang berhasil meraih Juara 1 dalam sebuah kompetisi anggrek yang diadakan di Malang.',
            'body' => 'Prestasi gemilang telah diraih oleh Anggrek Widarakandang, yang berhasil meraih Juara 1 dalam sebuah kompetisi anggrek yang diadakan di Malang. Dalam event yang dihadiri oleh para pecinta anggrek dari berbagai daerah, Anggrek Widarakandang memukau para juri dan pengunjung dengan keindahan dan keunikan bunganya. Kemenangan ini bukan hanya sebuah pencapaian bagi pemiliknya, tetapi juga sebuah pengakuan atas dedikasi dan perawatan yang teliti terhadap tanaman tersebut.
            Anggrek Widarakandang tidak hanya sekadar meraih penghargaan, tetapi juga menjadi inspirasi bagi para pecinta anggrek lainnya. Prestasi ini menunjukkan bahwa dengan perawatan yang tepat dan cinta yang mendalam terhadap tanaman, hasil yang luar biasa dapat dicapai. Kemenangan ini juga menjadi momentum bagi komunitas anggrek lokal untuk terus berkreasi dan berbagi pengetahuan, memperkaya lagi dunia hortikultura di Indonesia.'
        ]);
        Artikel::create([
            'title' =>'Menanam single pot anggrek jadi menu utama ibu-ibu PAI DIY saat kunjungan kebun di Widarakandang',
            'slug' => 'Menanam-single-pot-anggrek-jadi-menu-utama-ibu-ibu-PAI-dIY-saat-kunjungan-kebun-di-widarakandang',
            'kategori_id' => random_int(1, 3),
            'user_id' => 1,
            'gambar' => 'none',
            'minibody' => 'Prestasi gemilang telah diraih oleh Anggrek Widarakandang, yang berhasil meraih Juara 1 dalam sebuah kompetisi anggrek yang diadakan di Malang.',
            'body' => 'Prestasi gemilang telah diraih oleh Anggrek Widarakandang, yang berhasil meraih Juara 1 dalam sebuah kompetisi anggrek yang diadakan di Malang. Dalam event yang dihadiri oleh para pecinta anggrek dari berbagai daerah, Anggrek Widarakandang memukau para juri dan pengunjung dengan keindahan dan keunikan bunganya. Kemenangan ini bukan hanya sebuah pencapaian bagi pemiliknya, tetapi juga sebuah pengakuan atas dedikasi dan perawatan yang teliti terhadap tanaman tersebut.
            Anggrek Widarakandang tidak hanya sekadar meraih penghargaan, tetapi juga menjadi inspirasi bagi para pecinta anggrek lainnya. Prestasi ini menunjukkan bahwa dengan perawatan yang tepat dan cinta yang mendalam terhadap tanaman, hasil yang luar biasa dapat dicapai. Kemenangan ini juga menjadi momentum bagi komunitas anggrek lokal untuk terus berkreasi dan berbagi pengetahuan, memperkaya lagi dunia hortikultura di Indonesia.'
        ]);
        Artikel::create([
            'title' =>'Tanam tanam ubi jangan dibajak',
            'slug' => 'tanam-tanam-ubi-jangan-dibajak',
            'kategori_id' => random_int(1, 3),
            'user_id' => 1,
            'gambar' => 'none',
            'minibody' => 'Prestasi gemilang telah diraih oleh Anggrek Widarakandang, yang berhasil meraih Juara 1 dalam sebuah kompetisi anggrek yang diadakan di Malang.',
            'body' => 'Ibu-ibu PAI DIY berkumpul di kebun Widarakandang dengan semangat, merayakan kebersamaan sambil mempraktikkan kecintaan pada alam. Mereka tidak hanya membuka botol bersama dengan riang, tetapi juga mengadopsi langkah-langkah kecil untuk menanam single pot anggrek sebagai simbol keindahan dan ketekunan dalam perjalanan spiritual mereka.'
        ]);
        Artikel::create([
            'title' =>'Terimakasih telah mempercayakan anggrek kami untuk menjamu Pak Wapres Jusuf Kalla beserta keluarga',
            'slug' => 'terimakasih-telah-mempercayakan-anggrek-kami-untuk-menjamu-pak-wapres-jusuf-kalla-beserta-keluarga',
            'kategori_id' => random_int(1, 3),
            'user_id' => 1,
            'gambar' => 'none',
            'minibody' => 'Prestasi gemilang telah diraih oleh Anggrek Widarakandang, yang berhasil meraih Juara 1 dalam sebuah kompetisi anggrek yang diadakan di Malang.',
            'body' => 'Kami di @bucinishop sangat bersyukur atas kepercayaan yang diberikan kepada kami untuk menyediakan anggrek yang memukau untuk menjamu Pak Wapres Jusuf Kalla dan keluarganya. Setiap anggrek yang kami tawarkan tidak hanya mencerminkan keindahan alam, tetapi juga keanggunan serta ketelatenan dalam perawatannya. Terima kasih atas kesempatan ini, kami berharap pengalaman mereka bersama anggrek dari @bucinishop akan menjadi kenangan yang tak terlupakan.'
        ]);
    }
}
