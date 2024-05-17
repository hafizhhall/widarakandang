<?php

namespace App\Models;
use App\Models\Katalog;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];


    public function Katalog(){
        return $this->hasMany(Katalog::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'perusahaan'
            ]
        ];
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

}
