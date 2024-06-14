<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Artikel extends Model
{
    use HasFactory, Sluggable;
    // Memberi proteksi pada kolom 'id' agar tidak dapat diisi secara massal
    protected $guarded = ['id'];

    public function kategori(){
        return $this->belongsTo(Kategori::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getTanggalAttribute(){
        return Carbon::parse($this->published_at)->format('Y-m-d');
    }
    // Override metode getRouteKeyName untuk menggunakan kolom 'slug' sebagai identifier di route
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    // Mendefinisikan pengaturan sluggable untuk otomatis mengisi kolom 'slug' berdasarkan kolom 'title'
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
