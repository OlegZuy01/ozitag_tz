<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'city' => 'Брест и область',
            'city_in_url' => 'brest-region'
        ]);
        City::create([
            'city' => 'Витебск и область',
            'city_in_url' => 'vitebsk-region'
        ]);
        City::create([
            'city' => 'Гомель и область',
            'city_in_url' => 'gomel-region'
        ]);
        City::create([
            'city' => 'Гродно и область',
            'city_in_url' => 'grodno-region'
        ]);
        City::create([
            'city' => 'Могилев и область',
            'city_in_url' => 'mogilev-region'
        ]);
        City::create([
            'city' => 'Минск и область',
            'city_in_url' => ''
        ]);

    }
}
