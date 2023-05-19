<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\TeamRepositoryInterface;
use App\Models\Team;
use App\Models\TeamMember;
use SebastianBergmann\Environment\Console;



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
    
    public function deleteTeamMember($id, $member_id)
    {
        $memberToDelete = TeamMember::where('team_id', $id)->where('employee_id', $member_id)->first();
        return $memberToDelete->delete();
    }

    public function createTeamMember(int $teamId, int $member_id){
        $teamMember = new TeamMember();
        
        $teamMember->team_id = $teamId;
        $teamMember->employee_id = $member_id;
        if(TeamMember::where('team_id', $teamId)->where('employee_id', $member_id)->exists()){
            return false;
        }
        else{
            $teamMember->save();
            return $teamMember;
        }
    }

    


}