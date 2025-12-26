<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EmployeeAddress extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'employee_addresses';

    protected $fillable = [
        'employee_id',
        'address_type',
        'street_address',
        'rt',
        'rw',
        'village',
        'district',
        'city',
        'province',
        'postal_code',
        'country',
        'is_primary',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
