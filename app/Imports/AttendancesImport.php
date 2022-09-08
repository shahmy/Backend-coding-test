<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttendancesImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Attendance([
           'schedule_id'     => $row['schedule_id'],
           'employee_id'    => $row['employee_id'],
           'check_in_date' => $row['check_in_date'],
           'check_in_time' => $row['check_in_time'],
           'check_out_date' => $row['check_out_date'],
           'check_out_time' => $row['check_out_time'],
           'total_time' => $row['total_time'],
           'over_time' => $row['over_time'],
           'late_time' => $row['late_time'],
           'fault_status' => $row['fault_status'],
        ]);
    }


}
