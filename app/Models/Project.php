<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'project_manager_id',
        'team_id'
    ];
    
    public function projectManager()
    {
        return $this->belongsTo(Employee::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
