<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'katalog_id',
        'qty',
        'sub_total',
        'harga_anggrek'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function katalog()
    {
        return $this->belongsTo(Katalog::class);
    }

}
