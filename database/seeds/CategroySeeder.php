<?php

use Illuminate\Database\Seeder;

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
            'categroy' => 'tshirt',
            'product' => 'billboard印花T恤-02-兒童',
            'price' => '345',
            'sex' => 'kids',
            'size' => 'S',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01299',
            'status'=>'on',
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'tshirt',
            'product' => 'Polar Bear Benjamin印花T恤',
            'price' => '205',
            'sex' => 'kid',
            'size' => 'L',
            'color' => '黑',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01299',
            'status'=>'on',
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'tshirt',
            'product' => 'Keith Haring印花T恤-03-兒童',
            'price' => '45',
            'sex' => 'kid',
            'size' => 'M',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01299',
            'status'=>'on',
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'tshirt',
            'product' => 'billboard印花T恤-02-男',
            'price' => '245',
            'sex' => 'men',
            'size' => 'S',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'tshirt',
            'product' => 'Polar Bear Benjamin印花T恤',
            'price' => '205',
            'sex' => 'men',
            'size' => 'M',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'tshirt',
            'product' => 'Keith Haring印花T恤-03-男',
            'price' => '245',
            'sex' => 'men',
            'size' => 'L',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
        ]);

        DB::table('categroys')->insert([
            'categroy' => 'tshirt',
            'product' => 'billboard印花T恤-02-女',
            'price' => '245',
            'sex' => 'women',
            'size' => 'S',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'tshirt',
            'product' => 'Polar Bear Benjamin印花T恤',
            'price' => '105',
            'sex' => 'women',
            'size' => 'M',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'tshirt',
            'product' => 'Keith Haring印花T恤-03-女',
            'price' => '545',
            'sex' => 'women',
            'size' => 'L',
            'color' => '白',
            'inventory' => '1255',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
        ]);
    }
}
