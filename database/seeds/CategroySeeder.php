<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategroySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categroys')->insert([
            'categroy' => 'cloth',
            'product' => 'billboard印花T恤-02-兒童',
            'price' => '345',
            'sex' => 'kids',
            'size' => 'S',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'03899',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'cloth',
            'product' => 'Polar Bear Benjamin印花T恤-男',
            'price' => '205',
            'sex' => 'men',
            'size' => 'L',
            'color' => '黑',
            'inventory' => '125',
            'saleprice' => '168',
            'salecode' =>'01168',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'cloth',
            'product' => 'Keith Haring印花T恤-03-女',
            'price' => '45',
            'sex' => 'women',
            'size' => 'M',
            'color' => '白',
            'inventory' => '125',

            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'pant',
            'product' => 'billboard印花褲子-02-男',
            'price' => '245',
            'sex' => 'men',
            'size' => '30',
            'color' => '白',
            'inventory' => '122',

            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'pant',
            'product' => 'Polar Bear Benjamin印花褲子-女',
            'price' => '205',
            'sex' => 'women',
            'size' => '32',
            'color' => '白',
            'inventory' => '125',
            'saleprice' => '168',
            'salecode' =>'01168',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'pant',
            'product' => 'Keith Haring印花褲子-03-兒童',
            'price' => '245',
            'sex' => 'kids',
            'size' => '38',
            'color' => '白',
            'inventory' => '155',

            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);

        DB::table('categroys')->insert([
            'categroy' => 'pant',
            'product' => 'billboard印花外套-02-女',
            'price' => '245',
            'sex' => 'women',
            'size' => '26',
            'color' => '白',
            'inventory' => '255',

            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'coat',
            'product' => 'Polar Bear Benjamin印花外套-兒童',
            'price' => '605',
            'sex' => 'kids',
            'size' => 'M',
            'color' => '白',
            'inventory' => '255',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'coat',
            'product' => 'Keith Haring印花外套-03-男',
            'price' => '545',
            'sex' => 'men',
            'size' => 'L',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
    }
}
