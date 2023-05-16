<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationRequest extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'employee_id',
        'start_date',
        'end_date',
        'status',
        'note'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(Employee::class);
    }

    public function rejectedBy()
    {
        return $this->belongsTo(Employee::class);
    }

    public function approvers()
    {
        return $this->hasMany(VacationRequestApprovers::class, 'vacation_request_id');
    }

    public function getDurationAttribute()
    {
        $start = new Carbon($this->start_date);
        $end = new Carbon($this->end_date);
        return $start->diffInDays($end);
    }

    public function getApprovers()
    {
        $approvals = $this->approvers->where('status', 'approved');
        foreach ($approvals as $approval) {
            $approvedBy = $approval->approver->username;
        }
        return $approvedBy;
    }
    
    public function getRejectors()
    {
        $approvals = $this->approvers->where('status', 'rejected');
        foreach ($approvals as $approval) {
            $rejectedBy = $approval->approver->username;
        }
        return $rejectedBy;
    }
    

}
