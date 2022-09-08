<?php

namespace Src\AppHumanResources\Attendance\Application;

use src\AppHumanResources\Attendance\Application\Domain\Attendance;

class AttendanceService{

    /* public function getAttendanceCount(){
        return Attendance::where('status',1)->count();
    } */

    public function showAttendance(){
        return Attendance::with('employee')->groupBy('employee_id')->havingRaw('SUM(total_time) as total_work')->get();
    }
}
