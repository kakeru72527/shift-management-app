@extends('layouts.app')

@section('content')

  <div class="container">
     <!-- フラッシュメッセージ -->
     <!-- 成功時 -->
      @if (session('successMessage'))
        <div class="alert alert-success">{{ session('successMessage') }}</div>
      @endif
      <!-- エラー時（スタッフが既に存在する場合と、ユーザーが存在しない場合） -->
      @if(session('existsMessage'))
        <div class="alert alert-warning">{{ session('existsMessage') }}</div>
      @endif
      @if(session('dosenotExistsMessage'))
        <div class="alert alert-danger">{{ session('dosenotExistsMessage') }}</div>
      <!-- スタッフ削除 -->
      @elseif(session('deleteMessage'))
        <div class="alert alert-info">{{ session('deleteMessage') }}</div>
      @endif


    <div class="row">
      <div class="col-sm-12">
        <h1>{{ $store->name }}:スタッフ一覧</h1>
        <br>

        <div class="d-flex justify-content-between">
          <a href="{{  route('store.show_for_admin', $store->id) }}" class="btn btn-secondary">戻る</a>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStaffModal">
            スタッフ追加
          </button>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="addStaffModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">スタッフ追加</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ route('staff.store', $store->id) }}" method="post">
              @csrf
                <div class="modal-body">
                
                    <label for="email">メールアドレス </label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" required name="email">

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                    <br>
                    <label for="role" class="mt-2">役職</label>
                    <input type="radio" name="role" id="employee" value="employee" required>
                    <label for="employee">正社員</label>
                    <input type="radio" name="role" id="parttime" value="parttime">
                    <label for="parttime">アルバイト</label>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                  <button type="submit" class="btn btn-primary">登録</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>

      <div class="col-sm-12 mt-3">
        <table class="table table-striped">
          <thead class="">
            <tr>
              <th scope="col">名前</th>
              <th scope="col">役割</th>
              <th scope="col">メールアドレス</th>
              <th scope="col"></th>
            </tr>
            
            @foreach($staffs as $staff)
              <tr>
                <td>{{ $staff->user->name }}</td>
                <td>
                  @if($staff->role == 'parttime')
                    アルバイト
                  @elseif($staff->role == 'employee')
                    正社員
                  @elseif($staff->role == 'admin')
                    管理者
                  @endif
                </td>
                <td>{{ $staff->user->email }}</td>
                <td>
                  <form action="{{ route('staff.destroy_for_admin', $staff) }}" method="post" class="">
                    @csrf
                    @method('delete')
                    <div class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staff-delete-for-admin-modal{{ $staff->id }}">削除</div>
                    

                    <div class="modal fade" id="staff-delete-for-admin-modal{{ $staff->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel{{ $staff->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel{{ $staff->id }}">{{ $staff->user->name }}をスタッフから削除しますか？</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="閉じる">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
                            <button type="submit" class="btn btn-danger">削除</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </td>
              </tr>
            @endforeach
          </thead>
        </table>
      </div>
    </div>

  </div>


@endsection



