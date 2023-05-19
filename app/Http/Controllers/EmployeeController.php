<?php

namespace App\Http\Controllers;

use App\Http\Repositories\EmployeeRepository;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Role;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{

    public function __construct(private EmployeeRepository $employeeRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employeeRepository->getAll();
        return $employees;
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
        $employee = $this->employeeRepository->create($request->validated());
        return $employee;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $employee = $this->employeeRepository->find($id);
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
        $employee = $this->employeeRepository->update($id, $request->validated());
        return new EmployeeResource($employee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->employeeRepository->delete($id);
        return response()->json(['message' => 'Employee deleted successfully.']);
    }

    public function vacationRequests()
    {
        $employee = session('employee');
        $employee = Employee::findOrFail($employee->id);
        
        $vacationRequests = $employee->vacationRequests;
        
;

        return view('employee/home', compact('vacationRequests', 'employee'));
    }

    public function myTeams(){
        $employee = session('employee');
        $employee = Employee::findOrFail($employee->id);
        $teams = $employee->teams;

        return view('employee/my-teams', compact('teams', 'employee'));
    }

    public function myProjects(){
        $employee = session('employee');
        $employee = Employee::findOrFail($employee->id);
        $projects = $employee->projects();

        return view('employee/my-projects', compact('projects', 'employee'));
    }
    public function isProjectManager()
    {
        $employee = session('employee');
        $employee = Employee::findOrFail($employee->id);
        return $employee->isProjectManager();
    }
    
    public function showEmployees()
    {
        $employees = $this->employeeRepository->getAll();
        return view('admin.all-employees', compact('employees'));
    }

    public function showEmployeeInfo($id)
    {
        $employee = $this->employeeRepository->find($id);
        return view('admin.employee-info', compact('employee'));
    }

    public function deleteEmployee($id)
    {
        $this->employeeRepository->delete($id);
        return redirect()->route('admin.employees.showAll');
    }

    public function showAddEmployee()
    {
        $roles = Role::all();
        $teams = Team::all();

        return view('admin.add-employee-info',compact('roles','teams'));
    }

    public function addEmployee(StoreEmployeeRequest $request)
    {
        $employee = $this->employeeRepository->create($request->validated());
        return redirect()->route('admin.employees.showAll');
    }

}
