<?php

namespace App\Http\Controllers;

use App\Http\Resources\VacationRequestResource;
use App\Models\VacationRequest;
use App\Http\Requests\StoreVacationRequestRequest;
use App\Http\Requests\UpdateVacationRequestRequest;

class VacationRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacationRequests = VacationRequest::all();
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
        $vacationRequest = new VacationRequest();

        $vacationRequest->employee_id = $request['employee_id'];
        $vacationRequest->start_date = $request['start_date'];
        $vacationRequest->end_date = $request['end_date'];
        $vacationRequest->status = $request['status'];
        $vacationRequest->note = $request['note'] ? $request['note'] : null;

        $vacationRequest->save();

        return new VacationRequestResource($vacationRequest);
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
        $vacationRequest->employee_id = $request['employee_id'] ? $request['employee_id'] : $vacationRequest->employee_id;
        $vacationRequest->start_date = $request['start_date'] ? $request['start_date'] : $vacationRequest->start_date;
        $vacationRequest->end_date = $request['end_date'] ? $request['end_date'] : $vacationRequest->end_date;
        $vacationRequest->status = $request['status'] ? $request['status'] : $vacationRequest->status;
        $vacationRequest->note = $request['note'] ? $request['note'] : $vacationRequest->note;

        $vacationRequest->save();

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
}
