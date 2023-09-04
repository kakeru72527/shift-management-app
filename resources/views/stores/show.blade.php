@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>{{ $store->name }}</h1>
        <div id="calendar">

        </div>


        @include('modals.addRequestShift')
    </div>


@endsection