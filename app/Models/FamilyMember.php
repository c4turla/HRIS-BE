<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class FamilyMember extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'employee_id',
        'relationship_type',
        'full_name',
        'gender',
        'date_of_birth',
        'occupation',
        'is_dependent',
        'nik',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'is_dependent' => 'boolean',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
