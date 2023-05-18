<?php

namespace App\Http\Controllers;

use App\Http\Repositories\VacationRequestApproversRepository;
use App\Http\Resources\VacationRequestApproversResource;
use App\Http\Resources\VacationRequestResource;
use App\Models\Employee;
use App\Models\VacationRequestApprovers;
use App\Http\Requests\StoreVacationRequestApproversRequest;
use App\Http\Requests\UpdateVacationRequestApproversRequest;

class VacationRequestApproversController extends Controller
{

    public function __construct(private VacationRequestApproversRepository $vacationRequestApproversRepository)
    {
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacationRequestApprovers = $this->vacationRequestApproversRepository->getAll();
        return VacationRequestApproversResource::collection($vacationRequestApprovers);
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
    public function store(StoreVacationRequestApproversRequest $request)
    {
        $vacationRequestApprovers = $this->vacationRequestApproversRepository->create($request->validated());
        return new VacationRequestApproversResource($vacationRequestApprovers);
    }

    /**
     * Display the specified resource.
     */
    public function show(VacationRequestApprovers $vacationRequestApprovers)
    {
        return new VacationRequestApproversResource($vacationRequestApprovers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VacationRequestApprovers $vacationRequestApprovers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacationRequestApproversRequest $request, VacationRequestApprovers $vacationRequestApprovers)
    {
        $vacationRequestApprovers = $this->vacationRequestApproversRepository->update($request->validated(), $vacationRequestApprovers);
        return new VacationRequestApproversResource($vacationRequestApprovers);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VacationRequestApprovers $vacationRequestApprovers)
    {
        $this->vacationRequestApproversRepository->delete($vacationRequestApprovers);
        return response()->noContent();
    }
    
    public function showVacationRequests()
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        $vacationRequestsToApprove = $this->vacationRequestApproversRepository->getPendingVacationRequestsByApprover($employee->id);
        $completedVacationRequests = $this->vacationRequestApproversRepository->getCompletedVacationRequestsByApprover($employee->id);

        return view('project-manager.vacation-requests', compact('vacationRequestsToApprove', 'completedVacationRequests', 'employee'));
    }
}
