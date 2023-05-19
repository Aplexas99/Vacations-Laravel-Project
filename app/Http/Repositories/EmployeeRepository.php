<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\EmployeeRepositoryInterface;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Models\Role;
use App\Models\Team;


class EmployeeRepository implements EmployeeRepositoryInterface{
    
        public function getAll()
        {    
            $employees = Employee::all();
            return $employees;
        }
    
        public function find($id)
        {
            $employee = Employee::findOrFail($id);
            return $employee;
        }
    
        public function create($data)
        {
            $employee = new Employee();
            $employee->username = $data['username'];
            $employee->password = $data['password'];
            $employee->email = $data['email'];
            $employee->vacation_days_used = $data['vacation_days_used'] ? $data['vacation_days_used'] : 0;
            $employee->vacation_days_left = $data['vacation_days_left'];
            $employee->role_id = $data['role_id'];
            
            $employee->save();
    
            return $employee;
        }
    
        public function update($id, $data)
        {
            $employee = Employee::findOrFail($id);
            $employee->username = $data['username'] ?? $employee->username;
            $employee->password = $data['password'] ?? $employee->password;
            $employee->email = $data['email'] ?? $employee->email;
            $employee->vacation_days_used = $data['vacation_days_used'] ?? $employee->vacation_days_used;
            $employee->vacation_days_left = $data['vacation_days_left'] ?? $employee->vacation_days_left;
            $employee->role_id = $data['role_id'] ?? $employee->role_id;
            
            $employee->save();
    
            return $employee;
        }
    
        public function delete($id)
        {
            $employee = Employee::findOrFail($id);
            $employee->delete();
        }

}