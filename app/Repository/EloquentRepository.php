<?php

namespace App\Repository;


use Illuminate\Database\Eloquent\Model;

/**
* Interface EloquentRepository
* @package App\Repositories
*/
interface EloquentRepository
{
   /**
    * @param array $attributes
    * @return Model
    */
   public function create(array $attributes): Model;

   /**
    * @param $id
    * @return Model
    */
   public function find($id): ? Model;
}