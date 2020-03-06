<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('prices')->insert([
            'lotid'=>'2011',
            'price' => '345',
            'saleprice' => '299',
            'salecode' =>'03899',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2012',
            'price' => '205',
            'saleprice' => '168',
            'salecode' =>'01168',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2013',
            'price' => '45',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2014',
            'price' => '245',
            'created_at' => Carbon::now(),
        ]);


        DB::table('prices')->insert([
            'lotid'=>'2111',
            'price' => '205',
            'saleprice' => '168',
            'salecode' =>'01168',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2112',
            'price' => '245',
            'created_at' => Carbon::now(),
        ]);

        DB::table('prices')->insert([
            'lotid'=>'2113',
            'price' => '245',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2114',
            'price' => '605',
            'saleprice' => '299',
            'salecode' =>'01299',
            'created_at' => Carbon::now(),
        ]);


        DB::table('prices')->insert([
            'lotid'=>'2211',
            'price' => '545',
            'saleprice' => '299',
            'salecode' =>'01299',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2212',
            'price' => '845',
            'saleprice' => '299',
            'salecode' =>'01299',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2213',
            'price' => '845',
            'saleprice' => '399',
            'salecode' =>'01399',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2214',
            'price' => '845',
            'saleprice' => '399',
            'salecode' =>'01399',
            'created_at' => Carbon::now(),
        ]);
    }
}
