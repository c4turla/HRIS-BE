<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'description'
    ];

    // Relasi ke Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relasi ke Position
    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}