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
            'lotid'=>'2001110101',
            'price' => '345',
            'saleprice' => '299',
            'salecode' =>'03899',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2001110202',
            'price' => '205',
            'saleprice' => '168',
            'salecode' =>'01168',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2100102001',
            'price' => '45',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2010230001',
            'price' => '245',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2100232003',
            'price' => '205',
            'saleprice' => '168',
            'salecode' =>'01168',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2001238004',
            'price' => '245',
            'created_at' => Carbon::now(),
        ]);

        DB::table('prices')->insert([
            'lotid'=>'2100226001',
            'price' => '245',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2001202001',
            'price' => '605',
            'saleprice' => '299',
            'salecode' =>'01399',
            'created_at' => Carbon::now(),
        ]);
        DB::table('prices')->insert([
            'lotid'=>'2010203001',
            'price' => '545',
            'saleprice' => '299',
            'salecode' =>'01399',
            'created_at' => Carbon::now(),
        ]);
    }
}
