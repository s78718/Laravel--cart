<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('products')->insert([
            'categroy' => 'cloth',
            'product' => 'billboard印花T恤-02-兒童',
            'sex' => 'kids',
            'size' => 'S',
            'color' => '白',
            'inventory' => '1255',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'categroy' => 'cloth',
            'product' => 'billboard印花T恤-02-兒童',
            'sex' => 'kids',
            'size' => 'S',
            'color' => '白',
            'inventory' => '15',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'categroy' => 'cloth',
            'product' => 'Keith Haring印花T恤-03-女',
            'sex' => 'women',
            'size' => 'M',
            'color' => '白',
            'inventory' => '125',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'categroy' => 'pant',
            'product' => 'billboard印花褲子-02-男',
            'sex' => 'men',
            'size' => '30',
            'color' => '白',
            'inventory' => '122',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'categroy' => 'pant',
            'product' => 'Polar Bear Benjamin印花褲子-女',
            'sex' => 'women',
            'size' => '32',
            'color' => '白',
            'inventory' => '195',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'categroy' => 'pant',
            'product' => 'Keith Haring印花褲子-03-兒童',
            'sex' => 'kids',
            'size' => '38',
            'color' => '白',
            'inventory' => '155',
            'created_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'categroy' => 'pant',
            'product' => 'billboard印花外套-02-女',
            'sex' => 'women',
            'size' => '26',
            'color' => '白',
            'inventory' => '444',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'categroy' => 'coat',
            'product' => 'Polar Bear Benjamin印花外套-兒童',
            'sex' => 'kids',
            'size' => 'M',
            'color' => '白',
            'inventory' => '333',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'categroy' => 'coat',
            'product' => 'Keith Haring印花外套-03-男',
            'sex' => 'men',
            'size' => 'L',
            'color' => '白',
            'inventory' => '222',
            'created_at' => Carbon::now(),
        ]);
    }
}
