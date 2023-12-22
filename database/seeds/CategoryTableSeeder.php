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
            'name' => 'Đèn',
            'slug' => 'den'
        ]);
        Category::create([
            'name' => 'Luv',
            'slug' => 'luv'
        ]);
        Category::create([
            'name' => 'Hoa quà tặng',
            'slug' => 'hoa'
        ]);
        Category::create([
            'name' => 'Mô hình',
            'slug' => 'mo-hinh'
        ]);
        Category::create([
            'name' => 'Tranh',
            'slug' => 'tranh'
        ]);
        Category::create([
            'name' => 'Đồ sứ',
            'slug' => 'su'
        ]);
        Category::create([
            'name' => 'Thú bông',
            'slug' => 'thu-bong'
        ]);
    }
}
