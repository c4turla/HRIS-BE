<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EmergencyContact extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'emergency_contacts';

    protected $fillable = [
        'employee_id',
        'name',
        'relationship',
        'phone_number',
        'address',
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
