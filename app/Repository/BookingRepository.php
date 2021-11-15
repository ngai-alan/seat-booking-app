<?php
namespace App\Repository;

use App\Models\Seat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BookingRepository
{
    public function getBookingBySeatAndDate($seatId, $date): Collection;


    public function create(Model $model);
}