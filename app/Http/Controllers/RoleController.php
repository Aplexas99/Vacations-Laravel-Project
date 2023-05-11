<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;


class RoleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return RoleResource::collection($roles);
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
    public function store(StoreRoleRequest $request)
    {
        $role = new Role();
        $role->name = $request['name'];
        
        $role->save();

        return new RoleResource($role);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $role = Role::findOrFail($id);
        return new RoleResource($role);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, int $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request['name'] ? $request['name'] : $role->name;
        
        $role->save();

        return new RoleResource($role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return new RoleResource($role);
    }
}
