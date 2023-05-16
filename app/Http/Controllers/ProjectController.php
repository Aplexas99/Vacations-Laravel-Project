<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return ProjectResource::collection($projects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $project = new Project();

        $project->name = $request['name'];
        $project->project_manager_id = $request['project_manager_id'];
        $project->team_id = $request['team_id'];
        $project->start_date = $request['start_date'];
        $project->end_date = $request['end_date'];
        $project->description = $request['description'];
        
        $project->save();

        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->name = $request['name'] ? $request['name'] : $project->name;
        $project->project_manager_id = $request['project_manager_id'] ? $request['project_manager_id'] : $project->project_manager_id;
        $project->team_id = $request['team_id'] ? $request['team_id'] : $project->team_id;
        $project->start_date = $request['start_date'] ? $request['start_date'] : $project->start_date;
        $project->end_date = $request['end_date'] ? $request['end_date'] : $project->end_date;
        $project->description = $request['description'] ? $request['description'] : $project->description;
        
        $project->save();

        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->delete();

        return new ProjectResource($project);
    }

    public function showProjectInfo(int $projectId)
    {
        $employee = session('employee');
        $project = Project::find($projectId);
        return view('employee.my-project-info',compact('project','employee'));
    }
}
