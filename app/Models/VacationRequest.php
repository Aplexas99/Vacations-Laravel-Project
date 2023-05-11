<?php

namespace App\Models;

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

}
