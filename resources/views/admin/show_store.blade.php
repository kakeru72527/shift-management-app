@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>{{ $store->name }} :管理者画面</h1>

    <h3>
      <a href="{{ route('staff.edit_for_admin', $store->id) }}" class="mt-2 btn btn-secondary">スタッフ管理</a>
    </h3>

    <div class="calendarForAdminRequest"></div>



    <div class="calendarForAdminConfirm"></div>



    <div id="calendar">
    

    </div>

  </div>


@endsection