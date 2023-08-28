@extends('layouts.app')

@section('content')

<div class="container">

<h1>登録した店舗</h1>

  @if($status_flag == 0 )
    @foreach($staffs as $staff)
      @if($staff->deleted_at == NULL)
        <div class="card mt-5 w-50">
          <div class="card-header pt-3">
            <div class="d-flex">
              <h2 class="justify-content-start">
                @if($staff->role == 'addmin')
                  <a href="{{ route('store.show_for_addmin', $staff->store->id) }}" class="store-link mr-3">{{ $staff->store->name }}</a>
                @else
                  <a href="{{ route('store.show', $staff->store->id) }}" class="store-link mr-3">{{ $staff->store->name }}</a>
                @endif
                </h2>
              
              <form action="{{ route('staff.destroy', $staff) }}" method="post" class="">
                @csrf
                @method('delete')
                <div class="btn delete-link text-right" data-bs-toggle="modal" data-bs-target="#staff-delete-modal">削除</div>
                

                <div class="modal fade" id="staff-delete-modal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{ $staff->store->name }}をリストから削除しますか？</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="閉じる">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn border-dark text-dark" data-bs-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn delete-modal-button">削除</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>

          </div>
          <div class="card-container">
            <h4 class="mt-2 mx-3">住所：{{ $staff->store->address }}</h4>
            <h5 class="mx-3 text-muted">{{ $staff->store->description }}</h4>
            <h5 class="mx-3 text-muted">あなたの役割：
              @if($staff->role == 'parttime')
                アルバイト
              @elseif($staff->role == 'employee')
                正社員
              @elseif($staff->role == 'addmin')
                管理者
              @endif
            </h5>
          </div>
        </div>
      @endif



    @endforeach
  @else
    <h3 class="mt-5 mx-auto">登録されている店舗はありません。店舗の管理者へお問い合わせください。</h3>
  @endif
</div>



@endsection