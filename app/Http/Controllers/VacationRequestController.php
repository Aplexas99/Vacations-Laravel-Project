<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EmployeeController;
use App\Http\Repositories\VacationRequestRepository;
use App\Http\Resources\VacationRequestResource;
use App\Models\Employee;
use App\Models\VacationRequest;
use App\Http\Requests\StoreVacationRequestRequest;
use App\Http\Requests\UpdateVacationRequestRequest;

class VacationRequestController extends Controller
{

    public function __construct(private VacationRequestRepository $vacationRequestRepository)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacationRequests = $this->vacationRequestRepository->getAll();        

        return VacationRequestResource::collection($vacationRequests);
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
    public function store(StoreVacationRequestRequest $request)
    {
        $vacationRequest = $this->vacationRequestRepository->create($request->validated());
        $employee = Employee::find(session('employee')->id);
        $vacationRequests = $employee->vacationRequests;
        return view('employee.home', compact('vacationRequests','employee'));
    }

    /**
     * Display the specified resource.
     */
    public function show(VacationRequest $vacationRequest)
    {
        return new VacationRequestResource($vacationRequest);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VacationRequest $vacationRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacationRequestRequest $request, VacationRequest $vacationRequest)
    {
        $vacationRequest = $this->vacationRequestRepository->update($vacationRequest->id, $request->validated());
        return new VacationRequestResource($vacationRequest);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VacationRequest $vacationRequest)
    {
        $vacationRequest->delete();
        return new VacationRequestResource($vacationRequest);
    }

    public function showVacationInfo(int $vacation)
    {
        $employee = session('employee');
        $vacation = VacationRequest::find($vacation);        
        $vacation->updateStatus();
        $vacation->approvedBy = $vacation->getApprovers($vacation);
        $vacation->rejectedBy = $vacation->getRejectors($vacation);

        $vacation->duration = $vacation->getDurationAttribute();
        return view('employee.vacation-info', compact('vacation', 'employee'));
    }

    public function showAddVacationRequest()
    {
        $employee = session('employee');
        $employee = Employee::find($employee->id);
        return view('employee.add-vacation-request', compact('employee'));
    }
}
