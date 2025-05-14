<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'pic',
        'email',
        'website',
        'tax_id',
        'logo',
        'status'
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