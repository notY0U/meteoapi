<?php

use App\Product;
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
        $faker->addProvider(new Liior\Faker\Prices($faker));

        // seed of values for weather conditions
        $tags = [1 => 'clear', 2 => 'isolated-clouds', 3 => 'scattered-clouds', 4 => 'overcast',
            5 => 'light-rain', 6 => 'moderate-rain', 7 => 'heavy-rain', 8 => 'sleet', 9 => 'light-snow',
            10 => 'moderate-snow', 11 => 'heavy-snow', 12 => 'fog', 13 => 'na'];
        //seed of products
        $items = [
            'Umbrella' => [1, 5, 6, 7],
            'Hat' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            'Dress' => [1, 2, 3, 4, 5, 6, 12, 13],
            'Shorts' => [1, 2, 3], 'Skirt' => [1, 2, 3, 4],
            'Pullover' => [4, 5, 6, 8, 9, 10, 11, 12],
            'Knitted=Hat' => [8, 9, 10, 11, 12],
            'Jacket' => [4, 5, 6, 7, 8, 9, 10, 11, 12, 13],
            'T-shirt' => [1, 2, 3, 4], 'Trousers' => [4, 5, 6],
            'Sandals' => [1, 2, 3], 'Gloves' => [8, 9, 10, 11],
            'Scarf' => [8, 9, 10, 11], 'Jeans' => [4, 5, 6, 7, 8, 9, 10, 11, 12, 13]];

        foreach ($tags as $tag) {
            \App\Tag::create([
                'name' => $tag,
            ]);

        }
        // seed for products
        foreach ($items as $key => $item) {
            $prod = $faker->colorName . ' ' . $key;
            $product = Product::create([
                'name' => $prod,
                'sku' => Sku::sku($prod),
                'price' => $faker->price(3, 200, false),
            ]);
            $prodName = $product['name'];
            $newItem = substr($prodName, strpos($prodName, ' ') + 1, strlen($prodName));

            $product->tags()->attach($items[$newItem]);
            $product->save();
        }

    }

}
