<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Product; //Model
use Session;
use Carbon\Carbon;


class NewSearchController extends Controller
{
    //新上架
    public function New()
    {
        $news=Product::join('prices','prices.lotid','=','products.lotid')
                        ->Where('products.created_at','<=',Carbon::parse('+2 weeks'))
                        ->Where('status','=' ,'on')
                        ->get();
        return view('new', compact(['news']));
    }
}
