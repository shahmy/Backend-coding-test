<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Imports\AttendancesImport;
use Maatwebsite\Excel\Facades\Excel;
use src\AppHumanResources\Attendance\Application\AttendanceService;

class AttendanceController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */

    public function __construct(AttendanceService $attendanceService){

        $this->attendanceService = $attendanceService;
    }

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

    // this method is called from AttendanceService

    public function showAttendanceDetails(){

        $attDetails = $this->attendanceService->showAttendance();
        return view('show_attendance',compact('attDetails'));
    }



}
