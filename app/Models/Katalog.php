<?php

namespace App\Models;

use App\Models\Jenis;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function scopeFilter($query, array $filters) {
        if(isset($filters['search']) ?  $filters['search'] : false) {
            return $query->where('title', 'like', '%' . $filters['search'] . '%');
        }
    }

    Public function jenis(){
        return $this->belongsTo(Jenis::class);
    }

}
