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
            'sex' => 'kids',
            'price' => '345',
            'saleprice' => '299',
            'salecode' =>'03899',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'cloth',
            'product' => 'Polar Bear Benjamin印花T恤-男',
            'sex' => 'men',
            'price' => '205',
            'saleprice' => '168',
            'salecode' =>'01168',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'cloth',
            'product' => 'Keith Haring印花T恤-03-女',
            'sex' => 'women',
            'price' => '45',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'pant',
            'product' => 'billboard印花褲子-02-男',
            'sex' => 'men',
            'price' => '245',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'pant',
            'product' => 'Polar Bear Benjamin印花褲子-女',
            'sex' => 'women',
            'price' => '205',
            'saleprice' => '168',
            'salecode' =>'01168',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'pant',
            'product' => 'Keith Haring印花褲子-03-兒童',
            'sex' => 'kids',
            'price' => '245',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);

        DB::table('categroys')->insert([
            'categroy' => 'pant',
            'product' => 'billboard印花外套-02-女',
            'sex' => 'women',
            'price' => '245',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'coat',
            'product' => 'Polar Bear Benjamin印花外套-兒童',
            'sex' => 'kids',
            'price' => '605',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('categroys')->insert([
            'categroy' => 'coat',
            'product' => 'Keith Haring印花外套-03-男',
            'sex' => 'men',
            'price' => '545',
            'saleprice' => '299',
            'salecode' =>'01399',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
    }
}
