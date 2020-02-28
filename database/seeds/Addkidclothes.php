<?php

use Illuminate\Database\Seeder;

class Addkidclothes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('kid_clothes')->insert([
            'categroy' => 'tshirt',
            'product' => 'billboard印花T恤-02-兒童',
            'price' => '345',
            'onsale'=>''
        ]);
        DB::table('kid_clothes')->insert([
            'categroy' => 'tshirt',
            'product' => 'Polar Bear Benjamin印花T恤',
            'price' => '205',
            'onsale'=>''
        ]);
        DB::table('kid_clothes')->insert([
            'categroy' => 'tshirt',
            'product' => 'Keith Haring印花T恤-03-兒童',
            'price' => '45',
            'onsale'=>'V'
        ]);
    }
}
