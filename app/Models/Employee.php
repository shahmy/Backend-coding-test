<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'gender',
        'phone_no',
        'mobile_no',
        'status'
    ];

    public function schedule()
    {
        return $this->hasOne('App\Schedule');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
