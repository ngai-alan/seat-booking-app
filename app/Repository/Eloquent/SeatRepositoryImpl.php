<?php
namespace App\Repository\Eloquent;

use App\Models\Seat;
use App\Repository\SeatRepository;
use Illuminate\Support\Collection;

class SeatRepositoryImpl extends BaseRepositoryImpl implements SeatRepository
{

   /**
    * SeatRepositoryImpl constructor.
    *
    * @param Seat $model
    */
   public function __construct(Seat $model)
   {
       parent::__construct($model);
   }

   public function getAllSeatsByOfficeId($office_id): Collection
    {
        $seats = $this->model->where('office_id', '=', $office_id)->get();
        return $seats;
    }

    /**
     * Return total no. of seats belonging to the office_id
     *
     * @param [type] $office_id
     * @return integer
     */
    public function getSeatCount($office_id): int
    {
        $count = $this->model->where('office_id', '=', $office_id)->count();
        return $count;
    }

    public function createSeat($office)
    {
        for($i = 1 ; $i <= $office->seatCount; $i++) {
            $name = '#' . $i;
            $this->model->create([
                'office_id' => $office->id,
                'name' => $name
            ]);
        }
    }

    public function getSeatWithBooking($office_id, $date)
    {
        $seats = $this->model->with(['bookings' => function ($query) use ($date) {
            $query->whereDate('booking_date', '=', $date);
        }])->where('office_id', '=', $office_id)->get();

        return $seats;
    }
}