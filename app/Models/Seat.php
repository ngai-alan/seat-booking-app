<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'office_id'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}