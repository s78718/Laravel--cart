<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Categroy; //Model
use App\Models\Product; //Model
use Session;

class DetailController extends Controller
{

    public function Detail($id)
    {
        $detail=Categroy::Where('id','=',$id)->get();
        //顏色
        $color=Product::select('color')->where('product',$detail[0]->product)->distinct()->get();
        //尺吋
        $size=Product::select('size')->where('product',$detail[0]->product)->distinct()->get();
        return view('detail', compact(['detail','color','size']));
    }


}
