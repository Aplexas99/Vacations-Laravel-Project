<?php

namespace App\Http\Repositories;
use App\Http\Interfaces\ProjectRepositoryInterface;
use App\Models\Project;



class ProjectRepository implements ProjectRepositoryInterface {

    public function getAll()
    {    
        $projects = Project::all();
        return $projects;
    }

    public function find($id)
    {
        $project = Project::find($id);
        return $project;
    }

    public function create($data)
    {
        $project = new Project();

        $project->name = $data['name'] ;
        $project->description = $data['description'] ?? null;
        $project->team_id = $data['team_id'];
        $project->start_date = $data['start_date'];
        $project->end_date = $data['end_date'];
        $project->project_manager_id = $data['project_manager_id'];

        $project->save();
        return $project;
    }

    public function update($id, $data)
{
    $project = Project::find($id);

    $project->name = $data['name'] ?? $project->name;
    $project->description = $data['description'] ?? $project->description;
    $project->team_id = $data['team_id'] ?? $project->team_id;
    $project->start_date = $data['start_date'] ?? $project->start_date;
    $project->end_date = $data['end_date'] ?? $project->end_date;
    $project->project_manager_id = $data['project_manager_id'] ?? $project->project_manager_id;

    $project->save();
    return $project;
}


    public function delete($id)
    {
        $project = Project::find($id);
        $project->delete();
        return $project;
    }
}