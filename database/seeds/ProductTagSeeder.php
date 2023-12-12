<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\ProductTag;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 40; $i++) {
            ProductTag::create([
                'product_id' => rand(1, 40),
                'tag_id' => rand(1, 8)
            ]);
        }
    }
}
