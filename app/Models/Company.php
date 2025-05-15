<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'industry',
        'status',
        'address',
        'city',
        'postal_code',
        'country',
        'phone',
        'email',
        'website',
        'founded_date',
        'description',
        'logo'
    ];

    // Relasi ke Department
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}