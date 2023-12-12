<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'PCB',
            'slug' => 'pcb'
        ]);
        Category::create([
            'name' => 'Case',
            'slug' => 'case'
        ]);
        Category::create([
            'name' => 'Plate',
            'slug' => 'plate'
        ]);
        Category::create([
            'name' => 'Kit',
            'slug' => 'kit'
        ]);
        Category::create([
            'name' => 'Switches',
            'slug' => 'switches'
        ]);
        Category::create([
            'name' => 'Keycaps',
            'slug' => 'keycaps'
        ]);
        Category::create([
            'name' => 'Keyboard',
            'slug' => 'keyboard'
        ]);
        Category::create([
            'name' => 'Accessories',
            'slug' => 'accessories'
        ]);
    }
}
