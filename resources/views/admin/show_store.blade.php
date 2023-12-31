@extends('layouts.app')

@section('resources')
<script>
  storeId = {{ $store->id }}
</script>


@vite(['resources/js/calendarForAdminRequest.js'])

@endsection

@section('content')

  <div class="container">

    <h1>{{ $store->name }} :管理者画面</h1>

    <h3>
      <a href="{{ route('staff.edit_for_admin', $store->id) }}" class="mt-2 btn btn-secondary">スタッフ管理</a>
    </h3>

    <div id="calendar-for-admin-add-confirm" class="w-75 mx-auto mt-5"></div>

    @include('modals.addConfirmShift')





  

  </div>


@endsection