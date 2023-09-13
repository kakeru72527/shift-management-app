@extends('layouts.app')

@section('content')

    <?php

        /// Access-Control-Allow-Originエラーを回避する
        header("Access-Control-Allow-Origin: *");
    ?>



    <div class="container">

        <h1>{{ $store->name }}</h1>
        <h3 class="text-muted mt-3">シフト希望作成ページ<a href="{{ route('confirm_shift.show', $store->id) }}" class="btn btn-secondary" >確定したシフト閲覧ページへ</a></h3>

        <div id="calendar-for-staff-request" class="w-75 mx-auto mt-5">

        </div>


        @include('modals.addRequestShift')
    </div>


@endsection