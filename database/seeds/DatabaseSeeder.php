<?php

use Illuminate\Database\Seeder;
use App\Services\Sku;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_EN');
        $faker->addProvider(new \RauweBieten\PhpFakerClothing\Clothing($faker));
        $faker->addProvider(new Liior\Faker\Prices($faker));

        // seed of values for weather conditions
        $tags = ['clear', 'isolated-clouds', 'scattered-clouds', 'overcast',
            'light-rain', 'moderate-rain', 'heavy-rain', 'sleet', 'light-snow',
            'moderate-snow', 'heavy-snow', 'fog', 'na'];
       
        //function to generate SKU for product
        
        // seed for products
        foreach (range(1, 30) as $val) {
            $x = $faker->clothing();
            DB::table('products')->insert([
                'name' => $x,
                'sku' => Sku::sku($x),
                'price' => $faker->price(3, 200, false),
                'tag' => $tags[rand(0, 12)],

            ]);
        }
    }
}
