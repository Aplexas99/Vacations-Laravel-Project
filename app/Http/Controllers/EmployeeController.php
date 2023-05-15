<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return EmployeeResource::collection($employees);
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
    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->username = $request['username'] ? $request['username'] : $employee->username;
        $employee->password = $request['password'] ? $request['password'] : $employee->password;
        $employee->email = $request['email'] ? $request['email'] : $employee->email;
        $employee->vacation_days_used = $request['vacation_days_used'] ? $request['vacation_days_used'] : $employee->vacation_days_used;
        $employee->vacation_days_left = $request['vacation_days_left'] ? $request['vacation_days_left'] : $employee->vacation_days_left;
        $employee->role_id = $request['role_id'] ? $request['role_id'] : $employee->role_id;
        
        $employee->save();

        return new EmployeeResource($employee);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $employee = Employee::findOrFail($id);
        return new EmployeeResource($employee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, int $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->username = $request['username'] ? $request['username'] : $employee->username;
        $employee->vacation_days_used = $request['vacation_days_used'] ? $request['vacation_days_used'] : $employee->vacation_days_used;
        $employee->vacation_days_left = $request['vacation_days_left'] ? $request['vacation_days_left'] : $employee->vacation_days_left;

        $employee->save();
        return new EmployeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return new EmployeeResource($employee);
    }

    public function vacationRequests()
    {
        $employee = session('employee');
        
        $vacationRequests = $employee->vacationRequests;
        
;

        return view('employee/home', compact('vacationRequests', 'employee'));
    }

    public function myTeams(){
        $employee = Employee::findOrFail(2);
        $teams = $employee->teams;

        return view('employee/my-teams', compact('teams'));
    }
}
