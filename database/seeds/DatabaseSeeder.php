<?php

use App\Services\Sku;
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
        $faker = Faker\Factory::create('en_EN');
        $faker->addProvider(new \RauweBieten\PhpFakerClothing\Clothing($faker));
        $faker->addProvider(new Liior\Faker\Prices($faker));

        // seed of values for weather conditions
        $tags = ['clear', 'isolated-clouds', 'scattered-clouds', 'overcast',
            'light-rain', 'moderate-rain', 'heavy-rain', 'sleet', 'light-snow',
            'moderate-snow', 'heavy-snow', 'fog'];


        // seed for products
        foreach ($tags as $tag) {
            foreach (range(1, 2) as $val) {
                $item = $faker->clothing();
                DB::table('products')->insert([
                    'name' => $item,
                    'sku' => Sku::sku($item),
                    'price' => $faker->price(3, 200, false),
                    'tag' => $tag

                ]);
            }
        }
    }
}
