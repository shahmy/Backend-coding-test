<?php

namespace App\Src\AppHumanResources\Attendance\Application\Domain;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'check_in_date',
        'check_in_time',
        'check_out_date',
        'check_out_time',
        'total_time',
        'over_time',
        'late_time',
        'fault_status',
        'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function shedule()
    {
        return $this->belongsTo(Schedule::class);
    }

}
