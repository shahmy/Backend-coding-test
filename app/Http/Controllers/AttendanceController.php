<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AttendancesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Employee;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    //import excel to store attendance details

    public function importAttendanceDetails(Request $request){

        $this->validate($request, [
            'attendance_file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new AttendancesImport, $request->file('attendance_file'));
        return response()->json(['success' => 'Record Imported'], 200);

    }

    public function listAttendances(){

        $attendanceList = Attendance::with('employee')->groupBy('employee_id')->havingRaw('SUM(total_time) as total_work')->get();
        return response()->json([
            "success" => true,
            "message" => "Employees Attendance List",
            "data" => $attendanceList
            ]);

    }
}
