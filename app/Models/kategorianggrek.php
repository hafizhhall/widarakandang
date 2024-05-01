<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategorianggrek extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function katalog(){
        return $this->hasMany(Katalog::class);
    }
}
