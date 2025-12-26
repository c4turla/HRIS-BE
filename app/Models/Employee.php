<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Employee extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'employee_id',
        'nik',
        'full_name',
        'gender',
        'place_of_birth',
        'date_of_birth',
        'religion',
        'marital_status',
        'blood_type',
        'email',
        'phone_number',
        'profile_photo_url',
        'current_company_id',
        'current_department_id',
        'current_position_id',
        'current_employment_status',
        'join_date',
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'join_date' => 'date',
    ];

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'current_company_id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'current_department_id');
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class, 'current_position_id');
    }

    public function financialInfo(): HasOne
    {
        return $this->hasOne(FinancialInfo::class, 'employee_id');
    }

    public function familyMembers(): HasMany
    {
        return $this->hasMany(FamilyMember::class, 'employee_id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(EmployeeAddress::class, 'employee_id');
    }

    public function educationHistory(): HasMany
    {
        return $this->hasMany(EducationHistory::class, 'employee_id');
    }

    public function workExperiences(): HasMany
    {
        return $this->hasMany(WorkExperience::class, 'employee_id');
    }

    public function emergencyContacts(): HasMany
    {
        return $this->hasMany(EmergencyContact::class, 'employee_id');
    }
}
