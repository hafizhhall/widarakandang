<?php

namespace App\Models;

use App\Models\User;
use App\Models\Katalog;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function katalog(){
        return $this->belongsTo(Katalog::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
