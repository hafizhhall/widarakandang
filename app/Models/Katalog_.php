<?php

namespace App\Models;

class Katalog
{
   private static $katalog_anggrek = [
        [
            "title" => "Dendrobium Affine",
            "slug" => "judul-post-pertama",
            "jenis" => "Dendrobium",
            "harga" => "Rp500.000",
            "body" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto minima, distinctio quam explicabo blanditiis esse soluta! Id nesciunt, neque similique fuga nihil vel animi aperiam quaerat nam ullam et eveniet consectetur autem voluptatibus dolores sit sed. Deserunt, ea! Delectus, ducimus. Laboriosam ipsum saepe, impedit, explicabo omnis, nisi amet eius voluptates suscipit corporis esse officia ullam delectus aut ad repudiandae voluptatem ducimus fugit reprehenderit exercitationem expedita! Doloremque, amet hic corrupti, voluptates qui rem asperiores quisquam modi quae itaque harum fugit. Dolorum cumque animi aut obcaecati? Nostrum quas sequi voluptates ullam illo?"
        ],
        [
            "title" => "Dendrobium Biconque",
            "slug" => "judul-post-kedua",
            "jenis" => "Dendrobium",
            "harga" => "Rp389.000",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit quibusdam, provident facere omnis perspiciatis labore, cupiditate praesentium voluptatem placeat illum dolore unde perferendis quod, nisi molestiae tenetur deleniti nulla ad commodi enim! Rem corporis eveniet, quidem in quisquam iste nisi deserunt repellat sapiente at corrupti laborum molestiae nesciunt magni, voluptates pariatur voluptatum ad autem facere ipsa accusantium, eius similique ea. Commodi explicabo laudantium quidem! Odit cupiditate excepturi voluptatem, ratione ducimus, quia perferendis nobis quas mollitia, illo quis quidem sint est provident aut molestiae praesentium hic eum nesciunt?"
        ]
    ];

    public static function all(){
        return collect(self::$katalog_anggrek);
    }

    public static function find($slug){
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }

}
