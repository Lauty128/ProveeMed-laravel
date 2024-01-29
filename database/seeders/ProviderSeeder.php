<?php

namespace Database\Seeders;

//----> Dependencies
use Illuminate\Database\Seeder;

//----> Model
use App\Models\Provider;


class ProviderSeeder extends Seeder
{
    public function run()
    {
        Provider::factory()
            ->count(23)
            ->create();
    }
}
