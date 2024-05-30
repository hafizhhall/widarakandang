<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Yogameleniawan\SearchSortEloquent\Traits\Searchable;

class Artikel extends Model
{
    use HasFactory, Sluggable, Searchable;

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

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getTanggalAttribute(){
        return Carbon::parse($this->published_at)->format('Y-m-d');
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
