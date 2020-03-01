<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Models\Categroy; //Model
use Session;
use Carbon\Carbon;


class NewSearchController extends Controller
{
    //新上架
    public function New()
    {
        $news=Categroy::Where('created_at','>=',Carbon::today())
                        ->Where('status','=' ,'on')->get();
        return view('new', compact(['news']));
    }
}
