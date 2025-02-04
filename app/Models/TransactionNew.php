<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionNew extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_date',
        'operation',
        'brand',
        'gross_value',
        'net_value',
        'fee_value',
        'status',
    ];
}
