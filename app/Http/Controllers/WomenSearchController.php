<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Price; //Model
use App\Models\Product; //Model
use Session;

class WomenSearchController extends Controller
{
    //女生
    public function Women()
    {

        $women=Product::join('prices','prices.lotid','=','products.lotid')
                        ->where('sex','women')
                        ->Where('status','=' ,'on')
                        ->get();
        //dd($women);
        return view('women', compact(['women']));
    }

    //女生Cloth
    public function WomenCloth()
    {
        $women=Product::join('prices','prices.lotid','=','products.lotid')
                        ->where('sex','women')
                        ->Where('categroy', 'cloth')
                        ->Where('status','=' ,'on')
                        ->get();
        //dd($womenclothes);
        return view('women', compact(['women']));
    }

    //女生pant
    public function WomenPant()
    {
        $women=Product::join('prices','prices.lotid','=','products.lotid')
                        ->where('sex','women')
                        ->Where('categroy', 'pant')
                        ->Where('status','=' ,'on')
                        ->get();
        //dd($womenclothes);
        return view('women', compact(['women']));
    }

    //女生coat
    public function WomenCoat()
    {
        $women=Product::join('prices','prices.lotid','=','products.lotid')
                        ->where('sex','women')
                        ->Where('categroy', 'coat')
                        ->Where('status','=' ,'on')
                        ->get();
        //dd($womenclothes);
        return view('women', compact(['women']));
    }

}
