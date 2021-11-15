<?php
namespace App\Repository\Eloquent;

use App\Models\Timeslot;
use App\Repository\TimeslotRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TimeslotRepositoryImpl extends BaseRepositoryImpl implements TimeslotRepository
{
    /**
    * TimeslotRepositoryImpl constructor.
    *
    * @param Timeslot $model
    */
   public function __construct(Timeslot $model)
   {
       parent::__construct($model);
   }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function create($collection = []): Model
    {
        return $this->model->create([
            'name' => $collection['name']
        ]);
    }
}