<?php
namespace App\Repository\Eloquent;

use App\Models\Booking;
use App\Repository\BookingRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BookingRepositoryImpl extends BaseRepositoryImpl implements BookingRepository
{

    /**
    * BookingRepositoryImpl constructor.
    *
    * @param Booking $model
    */
   public function __construct(Booking $model)
   {
       parent::__construct($model);
   }

   /**
    * Get all booking
    *
    * @return Collection
    */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * Create new seat booking
     *
     * @param array $collection
     * @return Model
     */
    public function create($collection = []): Model
    {
        return $this->model->create([
            'seat_id' => $collection['seat_id'],
            'employee_id' => $collection['employee_id'],
            'timeslot_id' => $collection['timeslot_id'],
            'booking_date' => $collection['booking_date']
        ]);
    }

    public function getBookingBySeatAndDate($seatId, $date): Collection
    {
        return $this->model->where('seat_id', '=', $seatId)
        ->whereDate('booking_date', '=', $date)->get();
    }

}