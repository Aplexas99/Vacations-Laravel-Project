<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Environment\Console;

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
        return $this->teams->map->projects->flatten();
    }
    public function vacationRequests()
    {
        return $this->hasMany(VacationRequest::class);
    }

    public function isProjectManager()
    {
        return $this->role->name === 'Project Manager';
    }

    public function isTeamLeader()
    {
        return $this->role->name === 'Team Leader';
    }

    public function isAdmin()
    {
        return $this->role->name === 'Admin';
    }

    public function isEmployee()
    {
        return $this->role->name === 'Employee';
    }

    public function promoteToPM(){
        $this->role_id = 4;
        $this->save();
    }
    
    public function promoteToTL(){
        $this->role_id = 5;
        $this->save();
    }
}
