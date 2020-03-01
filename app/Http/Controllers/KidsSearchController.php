<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Categroy; //Model
use Session;

class KidsSearchController extends Controller
{
    //兒童
    public function Kids()
    {
        $kids=Categroy::where('sex','kids')
                        ->Where('status','=' ,'on')->get();
        return view('kids', compact(['kids']));
    }

    //兒童Cloth
    public function KidsCloth()
    {
        $kids=Categroy::where('sex','kids')
                        ->Where('categroy', 'cloth')
                        ->Where('status','=' ,'on')->get();
        //dd($kidsclothes);
        return view('kids', compact(['kids']));
    }

    //兒童pant
    public function KidsPant()
    {
        $kids=Categroy::where('sex','kids')
                        ->Where('categroy', 'pant')
                        ->Where('status','=' ,'on')->get();
        //dd($womenclothes);
        return view('kids', compact(['kids']));
    }

    //兒童coat
    public function KidsCoat()
    {
        $kids=Categroy::where('sex','kids')
                        ->Where('categroy', 'coat')
                        ->Where('status','=' ,'on')->get();
        //dd($womenclothes);
        return view('kids', compact(['kids']));
    }
}
