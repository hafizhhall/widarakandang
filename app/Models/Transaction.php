<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total',
        'ongkir',
        'status'
    ];

    public function detail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
