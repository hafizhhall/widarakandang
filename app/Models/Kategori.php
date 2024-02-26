<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori
{
    private static $kategori = [
        "kategori" => 1,
        "kategori" => 2,
        "kategori" => 3

        ];
        public static function all()
        {
            return collect(self::$kategori);
        }
}
