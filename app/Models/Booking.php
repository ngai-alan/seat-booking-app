<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function seat()
    {
        return $this->belongsTo(OfficeSeat::class);
    }

    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
    }
}