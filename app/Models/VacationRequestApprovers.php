<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationRequestApprovers extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'vacation_request_id',
        'approver_id',
        'created_at',
        'updated_at',
        'status',
        'reason',
    ];

    public function vacationRequest()
    {
        return $this->belongsTo(VacationRequest::class);
    }

    public function approver()
    {
        return $this->belongsTo(Employee::class);
    }
}
