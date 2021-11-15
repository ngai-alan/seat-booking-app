<?php
namespace Database\Seeders;

use \App\Models\Timeslot;
use Illuminate\Database\Seeder;

class TimeslotsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timeslotNames = ['All day', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'];
        foreach ($timeslotNames as $timeslotName) {
            Timeslot::factory()->create(['name' => $timeslotName]);
        }
    }
}