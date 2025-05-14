<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;

class Role extends Model
{
    use HasFactory, HasPermissions;

    protected $fillable = [
        'name',
        'slug'
    ];

    // Jika kamu ingin akses permission via resource
    protected $casts = [
        'permissions' => 'array'
    ];

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}