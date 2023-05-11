<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamResource;
use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
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
        $team = Team::findOrFail($id);
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
        $team = Team::findOrFail($id);
        $team->name = $request['name'] ? $request['name'] : $team->name;
        $team->leader_id = $request['leader_id'] ? $request['leader_id'] : $team->leader_id;
        
        $team->save();

        return new TeamResource($team);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return new TeamResource($team);
    }
}
