<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'username',
        'password',
        'role_id',
        'email',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
