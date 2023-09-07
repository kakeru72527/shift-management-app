@extends('layouts.app')

@section('content')

    <?php

        /// Access-Control-Allow-Originエラーを回避する
        header("Access-Control-Allow-Origin: *");
    ?>



    <div class="container">

        <h1>{{ $store->name }}</h1>
        <div id="calendar">

        </div>


        @include('modals.addRequestShift')
    </div>


@endsection