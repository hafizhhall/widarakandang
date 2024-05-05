<?php

namespace App\Models;

use App\Models\Katalog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jenis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Katalog(){
        return $this->hasMany(Katalog::class);
    }
}
