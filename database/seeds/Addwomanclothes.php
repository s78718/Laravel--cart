<?php

use Illuminate\Database\Seeder;

class Addwomanclothes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('woman_clothes')->insert([
            'categroy' => 'tshirt',
            'product' => 'billboard印花T恤-02-女',
            'price' => '245',
            'onsale'=>''
        ]);
        DB::table('woman_clothes')->insert([
            'categroy' => 'tshirt',
            'product' => 'Polar Bear Benjamin印花T恤',
            'price' => '105',
            'onsale'=>''
        ]);
        DB::table('woman_clothes')->insert([
            'categroy' => 'tshirt',
            'product' => 'Keith Haring印花T恤-03-女',
            'price' => '545',
            'onsale'=>'V'
        ]);
    }
}
