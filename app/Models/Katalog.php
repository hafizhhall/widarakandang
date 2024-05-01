<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'jenis',
    //     'harga',
    //     'excerpt',
    //     'body'];
    protected $guarded = ['id'];


    Public function jenis(){
        return $this->belongsTo(Jenis::class);
    }

}
