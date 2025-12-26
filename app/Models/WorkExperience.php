<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class WorkExperience extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'work_experiences';

    protected $fillable = [
        'employee_id',
        'company_name',
        'position',
        'start_date',
        'end_date',
        'job_description',
        'reason_for_leaving',
        'reference_name',
        'reference_contact',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
