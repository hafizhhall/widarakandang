<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total',
        'ongkir',
        'status',
        'invoice'
    ];

    public function detail()
    {
        return $this->hasMany(TransactionDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            $transaction->invoice = self::generateInvoiceNumber();
        });
    }
    private static function generateInvoiceNumber()
    {
        return 'INV-' . strtoupper(Str::random(10)). '-WK';
    }
}
