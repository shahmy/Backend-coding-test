<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'month',
        'day'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }

    public function shift()
    {
        return $this->belongsTo('App\Shift');
    }

    public function location()
    {
        return $this->belongsTo('App\Location');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
