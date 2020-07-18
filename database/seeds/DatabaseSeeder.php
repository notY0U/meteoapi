<?php

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
        $tagers = ['clear', 'isolated-clouds', 'scattered-clouds', 'overcast',
            'light-rain', 'moderate-rain', 'heavy-rain', 'sleet', 'light-snow',
            'moderate-snow', 'heavy-snow', 'fog', 'na'];
        foreach ($tagers as $val) {
            DB::table('tags')->insert([
                'title' => $val,

            ]);
        }
        //function to generate SKU for product
        function sku($name)
        {
            $word = str_word_count($name,1);
            $count = count($word);
            $name=$word[$count-1];
           
                return substr($name, 0, 4) . '-' . rand(1, 100);

        }
        // seed for products
        foreach (range(1, 30) as $val) {
            $x = $faker->clothing();
            DB::table('products')->insert([
                'name' => $x,
                'sku' => sku($x),
                'price' => $faker->price(3, 200, false),
                'tag_id' => rand(1, 13),

            ]);
        }
    }
}
