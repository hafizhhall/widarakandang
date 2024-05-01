<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'gambar',
    //     'minibody',
    //     'body'
    // ];
    protected $guarded = ['id'];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function getTanggalAttribute(){
        return Carbon::parse($this->published_at)->format('Y-m-d');
    }

}
