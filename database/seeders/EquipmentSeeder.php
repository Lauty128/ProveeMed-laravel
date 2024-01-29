<?php

namespace Database\Seeders;

//----> Dependencies
use Illuminate\Database\Seeder;

//----> Model
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Equipment::factory()
            ->count(187)
            ->create();
    }
}
