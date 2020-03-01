<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categroy; //Model
use App\Models\Product; //Model

class ajaxController extends Controller
{
    //存量
    public function inventory(Request $request)
    {

        $detail=Categroy::Where('id','=',$request->id)->get();

        //庫存
        $inventory=Product::select('inventory')
                            ->where('size','=',$request->size)
                            ->where('product','=',$detail[0]->product)
                            ->where('color','=',$request->color )
                            ->get();

        $inventoryBack=0;
        if(!$inventory->count()==0)
        {
            $inventoryBack=$inventory[0]->inventory;
        }

        //dd($inventoryBack);
        return $inventoryBack;

    }
}
