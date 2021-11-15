<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface TimeslotRepository
{
    public function getAll(): Collection;
}