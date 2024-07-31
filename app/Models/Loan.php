<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table = 'loans';

    protected $fillable = [
        'borrower_name',
        'borrower_email',
        'borrower_phone',
        'amount',
        'loan_date',
        'loan_status',
    ];

    protected $casts = [
        'loan_date' => 'date',
        'amount' => 'decimal:2',
    ];
}
