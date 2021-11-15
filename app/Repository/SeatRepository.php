<?php
namespace App\Repository;

use App\Models\Seat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SeatRepository
{
    public function getAllSeatsByOfficeId($office_id): Collection;

    public function getSeatCount($office_id): int;

    public function createSeat(Model $model);

    public function getSeatWithBooking($office_id, $date);
}