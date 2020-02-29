<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Categroy; //Model
use Session;

class MenSearchController extends Controller
{

    //男生
    public function Men()
    {
        $men=Categroy::where('sex','men')->get();
        return view('men', compact(['men']));
    }

    //男生Cloth
    public function MenCloth()
    {
        $men=Categroy::where('sex','men')
                        ->Where('categroy', 'cloth')->get();
        //dd($menclothes);
        return view('men', compact(['men']));
    }

    //男生pant
    public function MenPant()
    {
        $men=Categroy::where('sex','men')
                        ->Where('categroy', 'pant')->get();

        //dd($womenclothes);
        return view('men', compact(['men']));
    }

    //男生coat
    public function MenCoat()
    {
        $men=Categroy::where('sex','men')
                        ->Where('categroy', 'coat')->get();
        //dd($womenclothes);
        return view('men', compact(['men']));
    }

}
