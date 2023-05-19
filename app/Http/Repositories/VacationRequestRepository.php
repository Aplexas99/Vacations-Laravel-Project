<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\VacationRequestRepositoryInterface;
use App\Models\VacationRequest;
use App\Models\VacationRequestApprovers;

class VacationRequestRepository implements VacationRequestRepositoryInterface{

    public function getAll()
    {    
        $vacationRequests = VacationRequest::all();
        return $vacationRequests;
    }

    public function find($id)
    {
        $vacationRequest = VacationRequest::find($id);
        return $vacationRequest;
    }

    public function create($data)
    {
        $vacationRequest = new VacationRequest();

        $vacationRequest->employee_id = $data['employee_id'];
        $vacationRequest->start_date = $data['start_date'];
        $vacationRequest->end_date = $data['end_date'];
        $vacationRequest->status = "PENDING";
        $vacationRequest->note = $data['note'] ?? null;


        $vacationRequest->save();
        return $vacationRequest;
    }

    public function update($id, $data)
    {
        $vacationRequest = VacationRequest::find($id);

        $vacationRequest->employee_id = $data['employee_id'] ?? $vacationRequest->employee_id;
        $vacationRequest->start_date = $data['start_date'] ?? $vacationRequest->start_date;
        $vacationRequest->end_date = $data['end_date'] ?? $vacationRequest->end_date;
        $vacationRequest->status = $data['status'] ?? $vacationRequest->status;
        $vacationRequest->note = $data['note'] ?? $vacationRequest->note;

        $vacationRequest->save();
        return $vacationRequest;
    }

    public function delete($id)
    {
        $vacationRequest = VacationRequest::find($id);
        $vacationRequest->delete();
        return $vacationRequest;
    }

    public function getVacationRequestsByEmployeeId($id)
    {
        $vacationRequests = VacationRequest::where('employee_id', $id)->get();
        return $vacationRequests;
    }
    
    public function generateVacationRequestApprovals($vacationRequest)
    {
        $vacationRequest = VacationRequest::find($vacationRequest);

        $vacationRequestApproval = new VacationRequestApprovers();
        $vacationRequestApproval->vacation_request_id = $vacationRequest->id;
        $projectManager = $vacationRequest->employee->projects()->first();
        $vacationRequestApproval->approver_id = $projectManager->projectManager->id;
        $vacationRequestApproval->status = "PENDING";
        $vacationRequestApproval->save();

        $vacationRequestApproval = new VacationRequestApprovers();
        $vacationRequestApproval->vacation_request_id = $vacationRequest->id;
        $vacationRequestApproval->approver_id = $vacationRequest->employee->teams->first()->leader_id;
        $vacationRequestApproval->status = "PENDING";
        $vacationRequestApproval->save();
    }
    

}