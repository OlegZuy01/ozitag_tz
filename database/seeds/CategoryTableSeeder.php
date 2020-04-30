<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

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
            'category' => 'Продажа новостроек',
            'category_in_url' => 'newflats'
        ]);
        Category::create([
            'category' => 'Продажа квартир',
            'category_in_url' => 'sale/flats'
        ]);
        Category::create([
            'category' => 'Продажа комнаты',
            'category_in_url' => 'sale/flats/rooms'
        ]);
        Category::create([
            'category' => 'Аренда квартир',
            'category_in_url' => 'rent/flat-for-long'
        ]);
        Category::create([
            'category' => 'Аренда комнаты',
            'category_in_url' => 'rent/flat-for-long/rooms'
        ]);
        Category::create([
            'category' => 'Аренда квартиры на сутки',
            'category_in_url' => 'rent/flat-for-day'
        ]);




    }
}
