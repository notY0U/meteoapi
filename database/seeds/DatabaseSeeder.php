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
        $faker = Faker\Factory::create('lt_LT');
        // seed of values for weather conditions
        $tagers=['clear', 'isolated-clouds', 'scattered-clouds', 'overcast', 
        'light-rain', 'moderate-rain', 'heavy-rain', 'sleet', 'light-snow',
        'moderate-snow', 'heavy-snow', 'fog', 'na'];
        foreach($tagers as $val) {
            DB::table('tags')->insert([
                'title' =>  $val
               
            ]);
        }
        // seed for products
        // DB::table('products')->insert([
        //     'sku'->$faker(),
        //     'name'
        //     'price'
        // ]);
        
    }
}

