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
        $projects = $this->projects()->where('project_manager_id', $this->id);
        if ($projects->count() > 0) {
            return true;
        }	
        return false;
    }
}
