<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RequestShift;
use App\Models\ConfirmShift;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Staff;
use App\Models\User;

class ShiftApiController extends Controller
{
    //// シフト希望登録

    public function create_request_shift(Request $request){
        Log::info("処理スタート");
        $request->validate([
            'staff_id' => 'required | numeric',
            'store_id' => 'required | numeric',
            'date' => 'required | date_format:Y-m-d',
            'start_time' => 'required | date_format:"H:i"',
            'end_time' => 'required | date_format:"H:i"',
        ]);

        Log::info("バリデーション実行");

        $staff_id = (int)$request->input('staff_id');
        $store_id = (int)$request->input('store_id');
        $date = $request->input('date');

        // 渡ってきている値をログに出力
        Log::info("staff_id:{$staff_id} store_id: {$store_id} date: {$date}");

        // 既にシフト希望があれば更新
        Log::info("条件分岐開始");
        if(RequestShift::where('staff_id', $staff_id)->where('store_id', $store_id)->where('date', $date)->exists()){

            $request_shift_id = RequestShift::where('staff_id', $staff_id)->where('store_id', $store_id)->where('date', $date)->value('id');
            Log::info("request_shift_id : {$request_shift_id}");
            Log::info("DBから登録済みのデータ取得完了");
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');
            Log::info("start_time : {$start_time} , end_time : {$end_time}");

            $request_shift = RequestShift::where('id', $request_shift_id)->first();
            Log::info("request_shift : {$request_shift}");

            RequestShift::where('id', $request_shift_id)->update([
                'start_time' => $start_time,
                'end_time' => $end_time
            ]);

            
            Log::info("更新処理完了");

            return response()->json(RequestShift::all());
        }else{
        // 無ければ新規作成
        $request_shift = new RequestShift;

        $request_shift->staff_id = (int)$request->input('staff_id');
        $request_shift->store_id = (int)$request->input('store_id');
        $request_shift->date = $request->input('date');
        $request_shift->start_time = $request->input('start_time');
        $request_shift->end_time = $request->input('end_time');


        $request_shift->save();
        Log::info("保存処理完了");
        }

        return response()->json(RequestShift::all());
    }

    // シフト希望入手

    public function get_request_shift(Request $request){
        $store_id = $request->storeId;
        $date = $request->date;

        Log::info("storeId : {$store_id} , date : {$date}");

        // $request_shifts = RequestShift::with('staff.user')->where("store_id", $store_id)->where("date", $date)->get();

        $request_shifts = RequestShift::select([
            "r.start_time",
            "r.end_time",
            "u.name",
        ])->from('request_shifts as r')
        ->join("staff as s", function($join) {
            $join->on('r.staff_id', '=', 's.id');
        })->join("users as u", function($join) {
            $join->on('s.user_id', '=', 'u.id');
        })->where("date", $date)->get();

        Log::info("request_shifts => {$request_shifts}");

        return response()->json($request_shifts);

    }



    // 確定シフト入手

    public function get_confirm_shift(Request $request){
        $store_id = $request->storeId;
        $date = $request->date;

        // Log::info("storeId : {$store_id} , date : {$date}");

        $confirm_shifts = ConfirmShift::select([
            "c.start_time",
            "c.end_time",
            "u.name",
        ])->from('confirm_shifts as c')
        ->join("staff as s", function($join) {
            $join->on('c.staff_id', '=', 's.id');
        })->join("users as u", function($join) {
            $join->on('s.user_id', '=', 'u.id');
        })->where("date", $date)->get();

        // Log::info("confirm_shifts => {$confirm_shifts}");

        return response()->json($confirm_shifts);
    }

}
