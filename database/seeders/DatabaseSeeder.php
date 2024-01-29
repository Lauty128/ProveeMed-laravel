<?php

namespace Database\Seeders;

use CategorySeeder;
use Database\Factories\EquipmentFactory;
use Database\Seeders\CategorySeeder as SeedersCategorySeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProviderSeeder::class,
            \Database\Seeders\CategorySeeder::class,
            EquipmentSeeder::class,
            ProviderEquipmentSeeder::class
        ]);
    }
}
