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
            'lotid'=>'2011',
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
            'lotid'=>'2012',
            'categroy' => 'pant',
            'product' => 'bill短褲-02-兒童',
            'sex' => 'kids',
            'size' => '22',
            'color' => '黑',
            'inventory' => '15',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2013',
            'categroy' => 'coat',
            'product' => 'Keit外套-05--兒童',
            'sex' => 'kids',
            'size' => 'XL',
            'color' => '青',
            'inventory' => '925',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2014',
            'categroy' => 'cloth',
            'product' => 'Keith Haring襯衫-03-兒童',
            'sex' => 'kids',
            'size' => 'M',
            'color' => '白',
            'inventory' => '125',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);


        DB::table('products')->insert([
            'lotid'=>'2111',
            'categroy' => 'cloth',
            'product' => 'billboard印花襯衫-02-女',
            'sex' => 'women',
            'size' => 'S',
            'color' => '白',
            'inventory' => '122',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2112',
            'categroy' => 'pant',
            'product' => 'Polar Bear Benjamin印花褲子-女',
            'sex' => 'women',
            'size' => '32',
            'color' => '紫',
            'inventory' => '1775',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2113',
            'categroy' => 'pant',
            'product' => 'Keith Haring印花褲子-03-女',
            'sex' => 'women',
            'size' => '38',
            'color' => '綠',
            'inventory' => '155',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'lotid'=>'2114',
            'categroy' => 'coat',
            'product' => 'billboard印花外套-02-女',
            'sex' => 'women',
            'size' => 'XL',
            'color' => '白',
            'inventory' => '444',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);



        DB::table('products')->insert([
            'lotid'=>'2211',
            'categroy' => 'cloth',
            'product' => 'Polar Bear Benjamin印花襯衫-男',
            'sex' => 'men',
            'size' => 'M',
            'color' => '白',
            'inventory' => '120',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2212',
            'categroy' => 'coat',
            'product' => 'Keith Haring印花外套-03-男',
            'sex' => 'men',
            'size' => 'L',
            'color' => '白',
            'inventory' => '0',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2213',
            'categroy' => 'pant',
            'product' => 'Keith Haring印花褲子-03-男',
            'sex' => 'men',
            'size' => '32',
            'color' => '白',
            'inventory' => '0',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
        DB::table('products')->insert([
            'lotid'=>'2214',
            'categroy' => 'pant',
            'product' => 'Keith褲子-03-男',
            'sex' => 'men',
            'size' => '34',
            'color' => '黃',
            'inventory' => '0',
            'status'=>'on',
            'created_at' => Carbon::now(),
        ]);
    }
}
