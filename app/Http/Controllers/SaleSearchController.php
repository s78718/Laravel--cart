<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Product; //Model
use Session;

class SaleSearchController extends Controller
{
    //特價
    public function Sale()
    {
        $sales=Product::join('prices','prices.lotid','=','products.lotid')
                        ->Where('saleprice','!=',null)
                        ->Where('status','=' ,'on')
                        ->get();
        return view('sale', compact(['sales']));
    }
}
