<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order; //Model
use Session;

class MemberController extends Controller
{
    //
    public function member()
    {
        $member_no=session()->get('member_no');
        $order=Order::where('member_no','=',$member_no)
                        ->get();
                        //dd($order);
        return view('member',compact('order'));
    }
}
