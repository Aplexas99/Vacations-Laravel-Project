<?php

namespace App\Http\Controllers;

use App\Http\Resources\VacationRequestApproversResource;
use App\Models\VacationRequestApprovers;
use App\Http\Requests\StoreVacationRequestApproversRequest;
use App\Http\Requests\UpdateVacationRequestApproversRequest;

class VacationRequestApproversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $approvers = VacationRequestApprovers::all();
        return VacationRequestApproversResource::collection($approvers);
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
        $approver = new VacationRequestApprovers();

        $approver->vacation_request_id = $request['vacation_request_id'];
        $approver->approver_id = $request['approver_id'];
        $approver->status = $request['status'];
        $approver->reason = $request['reason'];
        $approver->created_at = $request['created_at'];
        $approver->updated_at = $request['updated_at'];

        $approver->save();

        return new VacationRequestApproversResource($approver);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $vacationRequestApprovers = VacationRequestApprovers::findOrFail($id);
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
    public function update(UpdateVacationRequestApproversRequest $request, int $id)
    {
        $vacationRequestApprovers = VacationRequestApprovers::findOrFail($id);
        $vacationRequestApprovers->vacation_request_id = $request['vacation_request_id'] ? $request['vacation_request_id'] : $vacationRequestApprovers->vacation_request_id;
        $vacationRequestApprovers->approver_id = $request['approver_id'] ? $request['approver_id'] : $vacationRequestApprovers->approver_id;
        $vacationRequestApprovers->status = $request['status'] ? $request['status'] : $vacationRequestApprovers->status;
        $vacationRequestApprovers->reason = $request['reason'] ? $request['reason'] : $vacationRequestApprovers->reason;
        $vacationRequestApprovers->created_at = $request['created_at'] ? $request['created_at'] : $vacationRequestApprovers->created_at;
        $vacationRequestApprovers->updated_at = $request['updated_at'] ? $request['updated_at'] : $vacationRequestApprovers->updated_at;

        $vacationRequestApprovers->save();

        return new VacationRequestApproversResource($vacationRequestApprovers);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $vacationRequestApprovers = VacationRequestApprovers::findOrFail($id);
        $vacationRequestApprovers->delete();

        
        return new VacationRequestApproversResource($vacationRequestApprovers);
    }
}
