<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Categroy; //Model
use Session;

class SearchController extends Controller
{
    //女生Cloth
    public function WomenCloth()
    {
        $womenclothes=Categroy::where('sex','women')->get();
        //dd($womenclothes);
        return view('women', compact(['womenclothes']));
    }

    //男生Cloth
    public function MenCloth()
    {
        $menclothes=Categroy::where('sex','men')->get();
        //dd($menclothes);
        return view('men', compact(['menclothes']));
    }

    //兒童Cloth
    public function KidsCloth()
    {
        $kidsclothes=Categroy::where('sex','kids')->get();
        //dd($kidsclothes);
        return view('kids', compact(['kidsclothes']));
    }

}
