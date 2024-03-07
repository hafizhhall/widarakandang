<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Artikel
{
    private static $artikel = [
        [
            "judul" => "Apa Studi Banding dari Universitas Gadjah Mada Jurusan Biologi",
            "slug" => "judul-post-pertama",
            "isi" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto minima, distinctio quam explicabo blanditiis esse soluta! Id nesciunt, neque similique fuga nihil vel animi aperiam quaerat nam ullam et eveniet consectetur autem voluptatibus dolores sit sed. Deserunt, ea! Delectus, ducimus. Laboriosam ipsum saepe, impedit, explic",
            "gambar" => "2.jpg"
        ],
        [
            "judul" => "Penanaman Bibit Anggrek Pada Media Tanam Pot Kecil Mungil Sekali",
            "slug" => "judul-post-kedua",
            "isi" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto minima, distinctio quam explicabo blanditiis esse soluta! Id nesciunt, neque similique fuga nihil vel animi aperiam quaerat nam ullam et",
            "gambar" => "3.jpg"
        ],
        [
            "judul" => "Sewa Anggrek Di Bank BPD DIY, Pemili Sedang Mempersiapkan Tanaman",
            "slug" => "judul-post-ketiga",
            "isi" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto minima, distinctio quam explicabo blanditiis esse soluta! Id nesciunt, neque similique fuga nihil vel animi aperiam quaerat nam ullam et eveniet consectetur autem voluptatibus dolores sit sed. Deserunt, ea! Delectus, ducimus. Laboriosam ipsum saepe, impedit, explic",
            "gambar" => "lab.jpg"
        ],
        [
            "judul" => "Penanaman Bibit Anggrek Pada Media Tanam Pot Kecil Mungil Sekali",
            "slug" => "judul-post-keempat",
            "isi" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto minima, distinctio quam explicabo blanditiis esse soluta! Id nesciunt, neque similique fuga nihil vel animi aperiam quaerat nam ullam et eveniet consectetur autem voluptatibus dolores sit sed. Deserunt, ea! Delectus, ducimus. Laboriosam ipsum saepe, impedit, explic",
            "gambar" => "pot.jpg"
        ],
        [
            "judul" => "Bibit Anggrek Pada Media Tanam Pot Kecil Mungil Sekali",
            "slug" => "judul-post-kelima",
            "isi" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto minima, distinctio quam explicabo blanditiis esse soluta! Id nesciunt, neque similique fuga nihil vel animi aperiam quaerat nam ullam et eveniet consectetur autem voluptatibus dolores sit sed. Deserunt, ea! Delectus, ducimus. Laboriosam ipsum saepe, impedit, explic",
            "gambar" => "pot.jpg"
        ],
        [
            "judul" => "Penanaman Bibit Anggrek Pada Media Tanam Pot Kecil Mungil Sekali",
            "slug" => "judul-post-keenam",
            "isi" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto minima, distinctio quam explicabo blanditiis esse soluta! Id nesciunt, neque similique fuga nihil vel animi aperiam quaerat nam ullam et eveniet consectetur autem voluptatibus dolores sit sed. Deserunt, ea! Delectus, ducimus. Laboriosam ipsum saepe, impedit, explic",
            "gambar" => "pot.jpg"
        ],
        [
            "judul" => "Penanaman Bibit Anggrek Pada Media Tanam Pot Kecil Mungil Sekali",
            "slug" => "judul-post-ketuju",
            "isi" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto minima, distinctio quam explicabo blanditiis esse soluta! Id nesciunt, neque similique fuga nihil vel animi aperiam quaerat nam ullam et eveniet consectetur autem voluptatibus dolores sit sed. Deserunt, ea! Delectus, ducimus. Laboriosam ipsum saepe, impedit, explic",
            "gambar" => "pot.jpg"
        ]
        ];

    public static function all()
    {
        return collect(self::$artikel);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
