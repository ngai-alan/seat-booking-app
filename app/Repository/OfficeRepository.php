<?php
namespace App\Repository;

use Illuminate\Support\Collection;

interface OfficeRepository
{
    public function getAll(): Collection;
}