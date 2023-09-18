@extends('layouts.app')



@section('content')

<div class="container">
    <h1>{{ $store->name }}:管理者画面 </h1>
  <br>

  <h3>{{ $date }} シフト閲覧 <a href="{{ route('store.show_for_admin', $store->id) }}" class="mx-5 btn btn-secondary">戻る</a></h3> 


  <?php
  // 時間枠のベースとなる配列の生成
  $shiftTimes = [];
  for($hour = 11; $hour < 23; $hour++){
    for($min = 0; $min < 60; $min += 30){
      $shiftTimes[] = sprintf('%02d', $hour) . ":" . sprintf('%02d', $min);
    }
  }
  // シフトの時間がタイムラインの時刻を含むかをチェックする関数
  function isInShift($base, $startTime, $endTime){
    $baseTime = strtotime($base);
    $workStart = strtotime($startTime);
    $workEnd = strtotime($endTime);

    return $workStart <= $baseTime && $baseTime <= $workEnd;
  }

  ?>

  <div class="">
    <table class="table w-75  table-hover " style="box-sizing: border-box;">
      <tr>
        <th>名前</th>
        @foreach($shiftTimes as $time)
        <th>{{ $time }}</th>
        @endforeach
      </tr>
      @foreach($confirm_shifts as $confirm_shift)
        <tr>
          <td>{{ $confirm_shift->name }}</td>
          @foreach($shiftTimes as $time)
          <?php 
          $result = isInShift($time, $confirm_shift->start_time, $confirm_shift->end_time)  ? "class='table-info'" : "";
           ?>
          <td <?php echo $result; ?>></td>

          @endforeach
        </tr>
      @endforeach
    </table>
  </div>
  


</div>


@endsection