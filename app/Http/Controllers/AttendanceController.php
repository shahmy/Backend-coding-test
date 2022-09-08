<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;
use App\Imports\AttendancesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Src\AppHumanResources\Attendance\Application\AttendanceService;

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

    /**
     * Challenge 1:
     * Create an API endpoint to upload excel attendance and store data in the database
     */

    //import excel to store attendance details

    public function importAttendanceDetails(Request $request){

        $this->validate($request, [
            'attendance_file' => 'required|file|mimes:xls,xlsx'
        ]);

        Excel::import(new AttendancesImport, $request->file('attendance_file'));
        return response()->json(['success' => 'Record Imported'], 200);

    }

    /**
     * Challenge 1:
     * Create an API endpoint to return attendance information of an employee with total
     * working hours.
     */

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


    /**
     * Challenge 2
     * Given an array a[] of size N which contains elements from 0 to N-1, you need to find all
     * the elements occurring more than once in the given array
     */

     function printDuplicateEliments(){

        $elements = array(2,3,2,1,6,3,6,8);

        echo 'Following are Duplicate Numbers in the given Array <br>';

        for($x=0; $x < count($elements); $x++){

            for($y=$x+1; $y < count($elements); $y++){

                if($elements[$x] == $elements[$y]){

                    print($elements[$y] . ",");
                }
            }
        }


     }





}
