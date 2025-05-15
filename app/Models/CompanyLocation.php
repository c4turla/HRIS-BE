<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'type',
        'address',
        'city',
        'postal_code',
        'country',
        'phone',
        'is_headquarters'
    ];

    // Relasi ke Department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}