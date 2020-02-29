<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Categroy; //Model
use Session;

class WomenSearchController extends Controller
{
    //女生
    public function Women()
    {
        $women=Categroy::where('sex','women')->get();
        return view('women', compact(['women']));
    }
    //女生Cloth
    public function WomenCloth()
    {
        $women=Categroy::where('sex','women')
                        ->Where('categroy', 'cloth')->get();
        //dd($womenclothes);
        return view('women', compact(['women']));
    }
    //女生pant
    public function WomenPant()
    {
        $women=Categroy::where('sex','women')
                    ->Where('categroy', 'pant')->get();
        //dd($womenclothes);
        return view('women', compact(['women']));
    }

    //女生coat
    public function WomenCoat()
    {
        $women=Categroy::where('sex','women')
                    ->Where('categroy', 'coat')->get();
        //dd($womenclothes);
        return view('women', compact(['women']));
    }

}