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

    public function validators()
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
        $approvals = $this->validators->where('status', 'ACCEPTED');

        return $approvals ?? null;
    }
    
    public function getRejectors()
    {
        $rejectors = $this->validators->where('status', 'REJECTED');
        
        return $rejectors ?? null;
    }

    public function getApproversCount()
    {
        $approvals = $this->validators->where('status', 'ACCEPTED');
        return $approvals->count();
    }

    public function getRejectorsCount()
    {
        $rejectors = $this->validators->where('status', 'REJECTED');
        return $rejectors->count();
    }
    public function updateStatus()
    {
        $approvals = $this->validators->where('status', 'ACCEPTED');
        $rejectors = $this->validators->where('status', 'REJECTED');

        $approvalCount = $approvals->count();
        $rejectorCount = $rejectors->count();
        if ($approvalCount === 2) {
            $this->status = 'ACCEPTED';
            $employee = Employee::find($this->employee_id);
            $employee->vacation_days_left -=$this->getDurationAttribute();
            $employee->save();
        } elseif ($rejectorCount >= 1) {
            $this->status = 'REJECTED';
        } else {
            $this->status = 'PENDING';
        }

        $this->save();
    }

}
