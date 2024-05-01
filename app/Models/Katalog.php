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

    public function kategorianggrek(){
        return $this->belongsTo(kategorianggrek::class);
    }
}
