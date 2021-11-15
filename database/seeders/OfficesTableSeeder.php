<?php

namespace Database\Seeders;

use App\Models\Office;
use App\Models\Seat;
use Illuminate\Database\Seeder;

class OfficesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = Office::factory(5)->create();
        foreach ($offices as $office) {
            Seat::factory(rand(10,15))->create(['office_id' => $office->id]);
        }
    }
}