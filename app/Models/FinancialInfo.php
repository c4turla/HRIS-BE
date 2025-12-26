<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class FinancialInfo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'financial_info';

    protected $fillable = [
        'employee_id',
        'npwp_number',
        'tax_status',
        'bpjs_kesehatan_number',
        'bpjs_ketenagakerjaan_number',
        'bank_name',
        'bank_account_number',
        'bank_account_name',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
