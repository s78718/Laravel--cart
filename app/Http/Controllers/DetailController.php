<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Price; //Model
use App\Models\Product; //Model
use Session;

class DetailController extends Controller
{

    public function Detail($lotid)
    {

        $detail=Product::where('lotid','=',$lotid)->get();

        //價錢
        $price=Price::where('lotid','=',$lotid)->get();

        //顏色
        $color=Product::select('color')->where('lotid',$lotid)->distinct()->get();
        //尺吋
        $size=Product::select('size')->where('lotid',$lotid)->distinct()->get();

        return view('detail', compact(['detail','price','color','size']));
    }

}
