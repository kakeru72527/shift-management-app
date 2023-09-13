@extends('layouts.app')

@section('content')

    <?php

        /// Access-Control-Allow-Originエラーを回避する
        header("Access-Control-Allow-Origin: *");
    ?>



    <div class="container">

        <h1>{{ $store->name }}</h1>
        <h3 class="text-muted mt-3">シフト閲覧ページ<a href="{{ route('request_shift.show', $store->id) }}" class="btn btn-secondary">シフト希望作成ページへ</a></h3>
        
        <div id="calendar-for-staff-confirm">

        </div>

        @include('modals.showConfirmShift')

    </div>


@endsection