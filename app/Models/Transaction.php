<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_account_id',
        'type',
        'date',
        'amount',
        'description',
        'fitid',
        'checknum',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    /**
     * @return Attribute<string, never>
     */
    protected function dateBr(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->date
        );
    }
    /**
     * @return Attribute<string, never>
     */
    protected function typeBr(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->type == 'credit' ? 'C' : 'D'
        );
    }

    /**
     * @return BelongsTo<BankAccount, Transaction>
     */
    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class);
    }
}
