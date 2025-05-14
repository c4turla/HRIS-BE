<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'description'
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