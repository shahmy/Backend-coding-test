<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'from',
        'to',
        'status'
    ];

    public function schedule()
    {
        return $this->hasOne('App\Schedule');
    }
}
