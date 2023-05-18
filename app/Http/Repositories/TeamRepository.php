<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\TeamRepositoryInterface;
use App\Models\Team;



class TeamRepository implements TeamRepositoryInterface{

    public function getAll()
    {    
        $teams = Team::all();
        return $teams;
    }

    public function find($id)
    {
        $team = Team::find($id);
        return $team;
    }

    public function create($data)
    {
        $team = new Team();

        $team->name = $data['name'];
        $team->leader_id = $data['leader_id'];

        $team->save();
        return $team;
    }

    public function update($id, $data)
    {
        $team = Team::find($id);

        $team->name = $data['name'] ?? $team->name;
        $team->leader_id = $data['leader_id'] ?? $team->leader_id;

        $team->save();
        return $team;
    }

    public function delete($id)
    {
        $team = Team::find($id);
        $team->delete();
        return $team;
    }
    
}