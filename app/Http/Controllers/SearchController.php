<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Man_clothes;
use App\Models\Woman_clothes;
use App\Models\Kid_clothes;
use Session;

class SearchController extends Controller
{
    //女生
    public function SearchWoman()
    {
        $womanclothes=Woman_clothes::paginate(15);
        //dd($womanclothes);
        return view('woman', compact(['womanclothes']));
    }
    //男生
    public function SearchMan()
    {
        $manclothes=Man_clothes::paginate(15);
        //dd($manclothes);
        return view('man', compact(['manclothes']));
    }
    //兒童
    public function SearchKid()
    {
        $kidclothes=Kid_clothes::paginate(15);
        //dd($kidclothes);
        return view('kid', compact(['kidclothes']));
    }

}
