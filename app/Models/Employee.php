<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'vacation_days_used',
        'vacation_days_left',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'team_members');
    }

    public function projects()
    {
        return $this->hasManyThrough(TeamMember::class, Employee::class, 'id', 'employee_id', 'id', 'id');
 
    }


}
