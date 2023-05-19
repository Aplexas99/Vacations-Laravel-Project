<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TeamRepository;
use App\Http\Resources\TeamResource;
use App\Models\Employee;
use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\TeamMember;
use Symfony\Component\HttpFoundation\Request;

class TeamController extends Controller
{

    public function __construct(private TeamRepository $teamRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = $this->teamRepository->getAll();
        return TeamResource::collection($teams);
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
    public function store(StoreTeamRequest $request)
    {
        $team = new Team();
        $team->name = $request['name'];
        $team->leader_id = $request['leader_id'];
        
        $team->save();

        return new TeamResource($team);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $team = $this->teamRepository->find($id);
        return new TeamResource($team);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, int $id)
    {
        $team = $this->teamRepository->update($request->validated(), $id);
        return new TeamResource($team);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $team = $this->teamRepository->delete($id);
        return new TeamResource($team);
    }

    public function showTeams()
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        $teams = Team::all();

        if ($employee->role->name == "Admin"){
            return view('admin.all-teams', compact('teams', 'employee'));
        }
    }
    
    public function showTeamInfo(int $id)
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        $team = Team::findOrFail($id);

        if ($employee->role->name == "Admin"){
            $employees = Employee::all();
            return view('admin.team-info', compact('team', 'employees'));
        }
        return view('employee.my-team-info', compact('team', 'employee'));
    }

    public function showAddTeam()
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        $employees = Employee::all();

        if ($employee->role->name == "Admin"){
            return view('admin.add-team-info', compact('employees', 'employee'));
        }
    }

    public function addTeam(StoreTeamRequest $request)
    {
        $team = $this->teamRepository->create($request->validated());
        $leader = Employee::find($request['leader_id']);
        $leader->promoteToTL();
        $teams = Team::all();
        return view('admin.all-teams', compact('teams'));
    }

    public function addMemberToTeam(Request $request)
    {
        $employeeId = $request->memberId;
        $teamId = $request->teamId;
        
        $teamMember = $this->teamRepository->createTeamMember($teamId, $employeeId);

        $employee = session('employee');
        $employee = Employee::find($employee->id);

        $employees = Employee::all();
        $team = Team::findOrFail($teamId);
        if ($employee->role->name == "Admin"){
            return view('admin.team-info', compact('team', 'employees'));
        }
    }

    public function deleteTeamMember(Request $request){
        $teamId = $request->id;
        $memberId = $request->memberId;

        $teamMember = $this->teamRepository->deleteTeamMember($teamId, $memberId);

        $employee = session('employee');
        $employee = Employee::find($employee->id);

        $employees = Employee::all();
        $team = Team::findOrFail($teamId);
        if ($employee->role->name == "Admin"){
            return view('admin.team-info', compact('team', 'employees'));
        }
    }



}
