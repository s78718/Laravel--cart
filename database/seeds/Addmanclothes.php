<?php

use Illuminate\Database\Seeder;

class Addmanclothes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('man_clothes')->insert([
            'categroy' => 'tshirt',
            'product' => 'billboard印花T恤-02-男',
            'price' => '245',
            'onsale'=>''
        ]);
        DB::table('man_clothes')->insert([
            'categroy' => 'tshirt',
            'product' => 'Polar Bear Benjamin印花T恤',
            'price' => '205',
            'onsale'=>''
        ]);
        DB::table('man_clothes')->insert([
            'categroy' => 'tshirt',
            'product' => 'Keith Haring印花T恤-03-男',
            'price' => '245',
            'onsale'=>'V'
        ]);
    }
}
