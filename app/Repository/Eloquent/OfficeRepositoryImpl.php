<?php
namespace App\Repository\Eloquent;

use App\Models\Office;
use App\Repository\OfficeRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OfficeRepositoryImpl extends BaseRepositoryImpl implements OfficeRepository
{
    /**
    * OfficeRepositoryImpl constructor.
    *
    * @param Office $model
    */
   public function __construct(Office $model)
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