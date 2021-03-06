<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Product; //Model
use Session;

class MenSearchController extends Controller
{

    //男生
    public function Men()
    {
        $men=Product::join('prices','prices.lotid','=','products.lotid')
                        ->where('sex','men')
                        ->Where('status','=' ,'on')
                        ->get();
        return view('men', compact(['men']));
    }

    //男生Cloth
    public function MenCloth()
    {
        $men=Product::join('prices','prices.lotid','=','products.lotid')
                        ->where('sex','men')
                        ->Where('categroy', 'cloth')
                        ->Where('status','=' ,'on')
                        ->get();
        //dd($menclothes);
        return view('men', compact(['men']));
    }

    //男生pant
    public function MenPant()
    {
        $men=Product::join('prices','prices.lotid','=','products.lotid')
                        ->where('sex','men')
                        ->Where('categroy', 'pant')
                        ->Where('status','=' ,'on')
                        ->get();

        //dd($womenclothes);
        return view('men', compact(['men']));
    }

    //男生coat
    public function MenCoat()
    {
        $men=Product::join('prices','prices.lotid','=','products.lotid')
                        ->where('sex','men')
                        ->Where('categroy', 'coat')
                        ->Where('status','=' ,'on')
                        ->get();
        //dd($womenclothes);
        return view('men', compact(['men']));
    }

}
