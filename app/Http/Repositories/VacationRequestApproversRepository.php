<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\VacationRequestApproversRepositoryInterface;
use App\Models\VacationRequest;
use App\Models\VacationRequestApprovers;
use Carbon\Carbon;


class VacationRequestApproversRepository implements VacationRequestApproversRepositoryInterface{
    
    public function getAll()
    {    
        $vacation_request_approvers = VacationRequestApprovers::all();
        return $vacation_request_approvers;
    }

    public function find($id)
    {
        $vacation_request_approvers = VacationRequestApprovers::find($id);
        return $vacation_request_approvers;
    }

    public function create($data)
    {
        $vacation_request_approver = new VacationRequestApprovers();

        $vacation_request_approver->employee_id = $data['employee_id'];
        $vacation_request_approver->vacation_request_id = $data['vacation_request_id'];
        $vacation_request_approver->status = $data['status'];
        $vacation_request_approver->created_at = $data['created_at'];
        $vacation_request_approver->updated_at = $data['updated_at'];

        $vacation_request_approver->save();

        return $vacation_request_approver;
    }

    public function update($id, $data)
    {
        $vacation_request_approvers = VacationRequestApprovers::find($id);
        
        $vacation_request_approvers->employee_id = $data['employee_id'] ?? $vacation_request_approvers->employee_id;
        $vacation_request_approvers->vacation_request_id = $data['vacation_request_id'] ?? $vacation_request_approvers->vacation_request_id;
        $vacation_request_approvers->status = $data['status'] ?? $vacation_request_approvers->status;
        $vacation_request_approvers->created_at = $data['created_at'] ?? $vacation_request_approvers->created_at;
        $vacation_request_approvers->updated_at = $data['updated_at'] ?? Carbon::now();

        $vacation_request_approvers->save();
        return $vacation_request_approvers;
    }

    public function delete($id)
    {
        $vacation_request_approvers = VacationRequestApprovers::find($id);
        $vacation_request_approvers->delete();
        return $vacation_request_approvers;
    }

    public function getVacationRequestsByApprover($approverId){
        $vacation_requests = VacationRequestApprovers::where('approver_id', $approverId)->get();
        return $vacation_requests;
    }
    
    public function getPendingVacationRequestsByApprover($approverId){
        $vacation_requests = VacationRequestApprovers::where('approver_id', $approverId)->where('status', 'PENDING')->get();
        return $vacation_requests;
    }

    public function getCompletedVacationRequestsByApprover($approverId){
        $vacation_requests = VacationRequestApprovers::where('approver_id', $approverId)
        ->where(function ($query) {
            $query->where('status', 'ACCEPTED')
                ->orWhere('status', 'REJECTED');
        })
        ->get();

        return $vacation_requests;
    }
}