<?php

namespace Database\Seeders;

//----> Dependencies
use Illuminate\Database\Seeder;

//----> Model
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['id' => 1, 'name' => 'Categoria 1'],
            ['id' => 2, 'name' => 'Categoria 2'],
            ['id' => 3, 'name' => 'Categoria 3'],
            ['id' => 4, 'name' => 'Categoria 4'],
            ['id' => 5, 'name' => 'Categoria 5'],
            ['id' => 6, 'name' => 'Categoria 6'],
            ['id' => 7, 'name' => 'Categoria 7'],
            ['id' => 8, 'name' => 'Categoria 8']
        ]);
    }
}