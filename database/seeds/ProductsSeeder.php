<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	'name' => "Chan vay chu A",
        	'id_type' => 2,
        	'description' => 'AHihiihihihihi',
        	'unit_price' => 12,
        	'promotion_price' => 10,
        	'image' => "chanvay.jpg",
        	'unit' => 'chiec'
        ]);
    }
}
