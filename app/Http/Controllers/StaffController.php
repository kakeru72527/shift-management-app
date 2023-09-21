<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Store;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $staffs = $user->staffs;
        $status_flag = 0;

        foreach($staffs as $staff){
            if($staff->deleted_at !== NULL){
                $status_flag +=1;
            }
        }

        return view('staff.index', compact('staffs', 'status_flag'));
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
    public function store(Request $request, Store $store)
    {
        $email = $request->input('email');


        if(User::where('email',$email)->exists()){
            $user = DB::table('users')->where('email', $email)->first();
            if(Staff::where('user_id',$user->id)->where('store_id',$store->id)->exists()){
                $messagekey = 'existsMessage';
                $flashMessage = "既に登録されています。";
            }else{
                
                $staff = new Staff();
                $staff->user_id = $user->id;
                $staff->store_id = $store->id;
                $staff->role = $request->input('role');
                $staff->save();

                $messagekey = 'successMessage';
                $flashMessage = "スタッフを追加しました。";
            }

        }else{
            $messagekey = "dosenotExistsMessage";
            $flashMessage = "入力したメールアドレスを持つユーザーが存在しません。";
        }

        return to_route('staff.edit_for_admin',$store->id)->with($messagekey, $flashMessage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit_staff(Staff $staff ,Store $store)
    {

        // 管理者確認

        $staffs = $store->staffs;
        return view('admin.edit_staff', compact('staffs', 'store'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $user = Auth::user();
        if($staff->user_id == $user->id){
            $staff->delete();
        }

        return to_route('staff.index');
    }

    public function destroy_for_admin(Staff $staff)
    {
        $user = Auth::user();
        $store = $staff->store;
        $admin = DB::table('staff')->where('store_id', $store->id)->where('role', '=', 'admin')->first();
        if($admin->user_id == $user->id){
            $staff->delete();
        }


        return to_route('staff.edit_for_admin', $store->id)->with('deleteMessage', "スタッフのリストからの削除に成功しました。");
    }
}
