<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RequestShift;

class ShiftApiController extends Controller
{

    // 希望シフト登録

    public function create_request_shift(Request $request){
        $request->validate([
            'staff_id' => 'required',
            'store_id' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $request_shift = new RequestShift;

        $request_shift->staff_id = $request->input('staff_id');
        $request_shift->store_id = $request->input('store_id');
        $request_shift->date = date('Y-m-d', $request->input('date'));
        $request_shift->start_time = $request->input('start_time');
        $request_shift->end_time = $request->input('end_time');
        $request_shift->created_at = now();


        $request_shift->save();

        return response()->json(RequestShift::all());
    }
    

    public function index_request_shift(){
        //
    }

    





}
