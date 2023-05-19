<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ProjectRepository;
use App\Http\Resources\ProjectResource;
use App\Models\Employee;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Team;

class ProjectController extends Controller
{

    public function __construct(private ProjectRepository $projectRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = $this->projectRepository->getAll();
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
        $project = $this->projectRepository->create($request->validated());
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
    public function update(UpdateProjectRequest $request, int $id)
    {
        $project = $this->projectRepository->update($id, $request->validated());
        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project = $this->projectRepository->delete($project);
        return new ProjectResource($project);
    }

    public function showProjects()
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        if($employee->role->name == 'Admin'){
            $projects = $this->projectRepository->getAll();
            return view('admin.all-projects',compact('projects'));
        }
        return;
    }
    public function showProjectInfo(int $projectId)
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        $project = Project::find($projectId);

        if($employee->role->name == 'Admin'){
            $employees = Employee::all();
            $teams = Team::all();
            return view('admin.project-info',compact('project','employees','teams'));
        }

        return view('employee.my-project-info',compact('project','employee'));
    }
    
    public function updateProject(UpdateProjectRequest $request, int $projectId)
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        $project = $this->projectRepository->update($projectId, $request);
        
        $projects = $this->projectRepository->getAll();
        if($employee->isAdmin()){
            return view('admin.all-projects',compact('projects'));
        }
        return view('employee.my-projects',compact('projects','employee'));
    }

    public function deleteProject(int $projectId)
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        $project = Project::find($projectId);
        $project->delete();
        $projects = $this->projectRepository->getAll();
        if($employee->isAdmin()){
            return view('admin.all-projects',compact('projects'));
        }
        return view('employee.my-projects',compact('projects','employee'));
    }

    public function showAddProject()
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        $employees = Employee::all();
        $teams = Team::all();
        if($employee->isAdmin()){
            return view('admin.add-project-info',compact('employees','teams'));
        }
        return;
    }

    public function addProject(StoreProjectRequest $request)
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        $project = $this->projectRepository->create($request->validated());
        $pm = Employee::find($request->validated()['project_manager_id']);
        $pm->promoteToPM();
        
        $projects = $this->projectRepository->getAll();
        if($employee->isAdmin()){
            return view('admin.all-projects',compact('projects'));
        }
    }

}
