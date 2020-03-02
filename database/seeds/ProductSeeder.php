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
            'lotid'=>'2001110101',
            'categroy' => 'cloth',
            'product' => 'billboard印花T恤-02-兒童',
            'sex' => 'kids',
            'size' => 'S',
            'color' => '白',
            'inventory' => '1255',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2001110202',
            'categroy' => 'cloth',
            'product' => 'billboard印花T恤-02-兒童',
            'sex' => 'kids',
            'size' => 'M',
            'color' => '黑',
            'inventory' => '15',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2100102001',
            'categroy' => 'cloth',
            'product' => 'Keith Haring印花T恤-03-女',
            'sex' => 'women',
            'size' => 'M',
            'color' => '白',
            'inventory' => '125',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2010230001',
            'categroy' => 'pant',
            'product' => 'billboard印花褲子-02-男',
            'sex' => 'men',
            'size' => '30',
            'color' => '白',
            'inventory' => '122',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2100232003',
            'categroy' => 'pant',
            'product' => 'Polar Bear Benjamin印花褲子-女',
            'sex' => 'women',
            'size' => '32',
            'color' => '紫',
            'inventory' => '195',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2001238004',
            'categroy' => 'pant',
            'product' => 'Keith Haring印花褲子-03-兒童',
            'sex' => 'kids',
            'size' => '38',
            'color' => '綠',
            'inventory' => '155',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'lotid'=>'2100226001',
            'categroy' => 'pant',
            'product' => 'billboard印花外套-02-女',
            'sex' => 'women',
            'size' => '26',
            'color' => '白',
            'inventory' => '444',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2001202001',
            'categroy' => 'coat',
            'product' => 'Polar Bear Benjamin印花外套-兒童',
            'sex' => 'kids',
            'size' => 'M',
            'color' => '白',
            'inventory' => '20',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2010203001',
            'categroy' => 'coat',
            'product' => 'Keith Haring印花外套-03-男',
            'sex' => 'men',
            'size' => 'L',
            'color' => '白',
            'inventory' => '0',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
    }
}
