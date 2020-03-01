<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categroy; //Model
use App\Models\Product; //Model

class ajaxController extends Controller
{
    //
    public function inventory(Request $request)
    {

        $detail=Categroy::Where('id','=',$request->id)->get();

        //庫存
        $inventory=Product::where('color','=',$request->color )
                            ->where('size','=',$request->size)
                            ->where('product','=',$detail[0]->product)
                            ->select('inventory')
                            ->get();
                            //dd($inventory);
        return $inventory[0]->inventory;

    }
}
