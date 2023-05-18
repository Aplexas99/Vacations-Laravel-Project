<?php

namespace App\Http\Controllers;

use App\Http\Repositories\RoleRepository;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;


class RoleController extends Controller
{

    public function __construct(private RoleRepository $roleRepository)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleRepository->getAll();
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
        $role = $this->roleRepository->create($request->validated());
        return new RoleResource($role);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $role = $this->roleRepository->find($id);
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
        $role = $this->roleRepository->update($request->validated(), $id);
        return new RoleResource($role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $role = $this->roleRepository->delete($id);
        return new RoleResource($role);
    }
}
