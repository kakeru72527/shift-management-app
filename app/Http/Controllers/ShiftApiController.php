<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestShift;

class ShiftApiController extends Controller
{
    //// 希望シフト登録

    public function create_request_shift(Request $request){
        $request->validate([
            'staff_id' => 'required | numeric',
            'store_id' => 'required | numeric',
            'date' => 'required | date_format:Y-m-d',
            'start_time' => 'required | date_format:"H:i"',
            'end_time' => 'required | date_format:"H:i"',
        ]);

        $request_shift = new RequestShift;

        $request_shift->staff_id = (int)$request->input('staff_id');
        $request_shift->store_id = (int)$request->input('store_id');
        $request_shift->date = $request->input('date');
        $request_shift->start_time = $request->input('start_time');
        $request_shift->end_time = $request->input('end_time');


        $request_shift->save();

        return response()->json(RequestShift::all());
    }
    

    public function index_request_shift(){
        //
    }
}
