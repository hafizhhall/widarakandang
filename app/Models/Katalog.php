<?php

namespace App\Models;

use App\Models\Jenis;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Katalog extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = [
    //     'title',
    //     'jenis',
    //     'harga',
    //     'excerpt',
    //     'body'];
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters) {
        if(isset($filters['search']) ?  $filters['search'] : false) {
            return $query->where('title', 'like', '%' . $filters['search'] . '%')
            ->orWhere('status', 'like', '%' . $filters['search']. '%');
        }

    }

    Public function jenis(){
        return $this->belongsTo(Jenis::class);
    }
    Public function Supplier(){
        return $this->belongsTo(Supplier::class);
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
