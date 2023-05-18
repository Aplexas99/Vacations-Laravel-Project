<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\RoleRepositoryInterface;
use App\Models\Role;


class RoleRepository implements RoleRepositoryInterface{

    public function getAll()
    {    
        $roles = Role::all();
        return $roles;
    }

    public function find($id)
    {
        $role = Role::find($id);
        return $role;
    }

    public function create($data)
    {
        $role = new Role();

        $role->name = $data['name'];

        $role->save();
        return $role;
    }

    public function update($id, $data)
    {
        $role = Role::find($id);

        $role->name = $data['name'] ?? $role->name;

        $role->save();
        return $role;
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return $role;
    }

}