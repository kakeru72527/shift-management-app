<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Staff;
use App\Models\User;
use App\Models\ConfirmShift;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $user = Auth::user();
        $staff = DB::table('staff')->where('store_id', $store->id)->where('user_id', $user->id)->first();
        return view('stores.show', compact('store', 'user', 'staff'));
    }

    public function confirm_show(Store $store){
        $user = Auth::user();
        $staff = DB::table('staff')->where('store_id', $store->id)->where('user_id', $user->id)->first();
        return view('stores.confirm_show', compact('store', 'user', 'staff'));
    }


    // 店長側カレンダー

    public function show_for_admin(Store $store){
        
        $staffs = $store->staffs;
        return view('admin.show_store', compact('store', 'staffs'));
    }

    // 店長側 確定シフト閲覧画面(day)

    public function confirm_show_day(Store $store, $date){
        $store_id = $store->id;
        // 指定日のconfirm_shifts取得
        $confirm_shifts = ConfirmShift::select([
            "c.start_time",
            "c.end_time",
            "u.name",
        ])->from('confirm_shifts as c')
        ->join("staff as s", function($join) {
            $join->on('c.staff_id', '=', 's.id');
        })->join("users as u", function($join) {
            $join->on('s.user_id', '=', 'u.id');
        })->where("c.date", $date)->where("c.store_id", $store_id)->get();

        return view('admin.confirm_shift', compact('store', 'date' ,  'confirm_shifts'));
    }


   
}
