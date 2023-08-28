@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>{{ $store->name }} :管理者画面</h1>

    <h3>
      <a href="{{ route('staff.edit_for_addmin', $store->id) }}">スタッフ管理</a>
    </h3>
    <div id="calendar">
    

    </div>

  </div>


@endsection