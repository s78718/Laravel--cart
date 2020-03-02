<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Price; //Model
use App\Models\Product; //Model

class AjaxController extends Controller
{
    //存量
    public function Inventory(Request $request)
    {
        //dd($request);
        //庫存
        $inventory=Product::select('inventory')
                            ->where('lotid','=',$request->lotid)
                            ->where('size','=',$request->size)
                            ->where('color','=',$request->color )
                            ->get();

                            //dd($inventory);
        //先做數量判別
        $inventoryBack=0;
        if(!$inventory->count()==0)
        {
            $inventoryBack=$inventory[0]->inventory;
        }

        //dd($inventoryBack);
        return $inventoryBack;

    }
}
