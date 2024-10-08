<?php

namespace App\Models;

use App\Models\Katalog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Jenis extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function Katalog(){
        return $this->hasMany(Katalog::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
