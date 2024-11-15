<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'leader_id'
    ];

    public function leader()
    {
        return $this->belongsTo(Employee::class);
    }

    public function members()
    {
        return $this->belongsToMany(Employee::class, 'team_members');
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

}
