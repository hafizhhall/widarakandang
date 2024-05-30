<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['katalog_id', 'photo_path'];

    public function product()
    {
        return $this->belongsTo(Katalog::class);
    }
}
