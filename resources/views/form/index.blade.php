@extends('layouts.app')

@section('content')

<div class="container">

  <h1>お問い合わせフォーム</h1>
  <h5 class="text-muted">
    意見、質問などはこちらからお願いいたします。<br>
    また、新しく店舗を登録されたい方は「新規店舗登録希望」「店舗名」、「住所」、「説明」を本文に必ず記載してください。
  </h5>

  <!-- error message -->
  @if($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <!-- form -->
  <form action="{{ route('form') }}" method="POST">
    @csrf

    <!-- store -->
    <div>
      <label for="store" class="mt-1">店舗名(必須)</label>
      <input id="store" class="form-control mt-1" type="text" name="store" value="{{ old('store') }}">
      @if($errors->has('store'))
      <p>{{ $errors->first('store') }}</p>
      @endif
    </div>

    <!-- name -->
    <div>
      <label for="name" class="mt-1">お名前(必須)</label>
      <input id="name" class="form-control mt-1" type="text" name="name" value="{{ old('name') }}">
      @if($errors->has('name'))
      <p>{{ $errors->first('name') }}</p>
      @endif
    </div>

    <!-- furigana -->
    <div>
      <label for=name_kana class="mt-1">フリガナ(必須)</label>
      <input id="name_kana" class="form-control mt-1" type="text" name="name_kana" value="{{ old('name_kana') }}">
      @error('name_kana')
      <p>{{ $message }}</p>
      @enderror
    </div>

    <!-- email -->
    <div>
      <label for="email" class="mt-1">メールアドレス(必須)</label>
      <input id="email" class="form-control mt-1" type="email" name="email" value="{{ old('email') }}">
      @if($errors->has('email'))
      <p>{{ $errors->first('email') }}</p>
      @endif
    </div>

    <!-- body -->
    <div>
      <label for="body" class="mt-1">お問い合わせ内容(必須)</label>
      <textarea id="body" class="form-control mt-1" type="text" name="body">{{ old('body') }}</textarea>
      @if($errors->has('body'))
      <p>{{ $errors->first('body') }}</p>
      @endif
    </div>

    
    <div>
      <button type="submit" class="btn btn-primary mt-1">送信</button>
    </div>

  </form>


</div>


@endsection