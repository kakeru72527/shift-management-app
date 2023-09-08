<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestShift;
use Illuminate\Support\Facades\DB;

class ShiftApiController extends Controller
{
    //// シフト希望登録

    public function create_request_shift(Request $request){
        $request->validate([
            'staff_id' => 'required | numeric',
            'store_id' => 'required | numeric',
            'date' => 'required | date_format:Y-m-d',
            'start_time' => 'required | date_format:"H:i"',
            'end_time' => 'required | date_format:"H:i"',
        ]);

        $staff_id = (int)$request->input('staff_id');
        $store_id = (int)$request->input('store_id');
        $date = $request->input('date');

        // 既にシフト希望があれば更新
        if(DB::table('request_shifts')->where('staff_id', $staff_id)->where('store_id', $store_id)->where('date', $date)->exists()){
            //シフト希望のIDと始業時刻と終業時刻のみupdate_request_shift()に渡す。
            $request_shift_id = DB::table('request_shifts')->where('staff_id', $staff_id)->where('store_id', $store_id)->where('date', $date)->select('id');
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');
            return to_route('api.update_request_shift', ['request_shift_id' => $request_shift_id, 'start_time' => $start_time,'end_time' => $end_time]);
        }else{
        // 無ければ新規作成
        $request_shift = new RequestShift;

        $request_shift->staff_id = (int)$request->input('staff_id');
        $request_shift->store_id = (int)$request->input('store_id');
        $request_shift->date = $request->input('date');
        $request_shift->start_time = $request->input('start_time');
        $request_shift->end_time = $request->input('end_time');


        $request_shift->save();
        }

        return response()->json(RequestShift::all());
    }


    // シフト希望更新機能
    public function update_request_shift($request_shift_id, $start_time, $end_time){
        
        $request_shift = DB::table('request_shifts')->where('id', $request_shift_id)->first();
        $request_shift->start_time = $start_time;
        $request_shift->end_time = $end_time;

        $request_shift->update();

        return response()->json(RequestShift::all());
    
    }

    public function index_request_shift(){
        //
    }
}
