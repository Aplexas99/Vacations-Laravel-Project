<?php

namespace App\Http\Interfaces;

interface TeamRepositoryInterface 
{ 
    public function getAll();

    public function find($id);

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}