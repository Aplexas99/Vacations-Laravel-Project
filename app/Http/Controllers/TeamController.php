<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TeamRepository;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

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
    
    public function showTeamInfo(int $id)
    {
        $employee = session('employee');
        $team = Team::findOrFail($id);

        return view('employee.my-team-info', compact('team', 'employee'));
    }
}
