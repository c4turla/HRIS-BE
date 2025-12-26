<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EducationHistory extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'education_history';

    protected $fillable = [
        'employee_id',
        'education_level',
        'institution_name',
        'major',
        'start_year',
        'end_year',
        'gpa',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
