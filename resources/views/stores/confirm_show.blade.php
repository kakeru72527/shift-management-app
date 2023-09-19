@extends('layouts.app')

@section('resources')

<script>
  storeId = {{ $store->id }}
</script>

@vite(['resources/js/calendarForStaffConfirm.js'])

@endsection

@section('content')

    <?php

        /// Access-Control-Allow-Originエラーを回避する
        header("Access-Control-Allow-Origin: *");
    ?>



    <div class="container">

        <h1>{{ $store->name }}</h1>
        <h3 class="text-muted mt-3">シフト閲覧ページ<a href="{{ route('request_shift.show', $store->id) }}" class="btn btn-secondary">シフト希望作成ページへ</a></h3>
        
        <div id="calendar-for-staff-confirm" class="w-75 mx-auto mt-5">

        </div>

        @include('modals.showConfirmShift')

    </div>


@endsection