<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionNew extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'transaction_date',
        'operation',
        'flag',
        'payment_method',
        'gross_value',
        'net_value',
        'fee_value',
        'status',
    ];
}
