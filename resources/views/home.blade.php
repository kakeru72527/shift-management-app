@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="text-center">
            <h1 class="mt-5">ようこそ！シフト管理アプリへ</h1>
            <p class="mt-5">このアプリはユーザーごとに登録したお店のシフトの提出、作成、閲覧ができるサービスです。</p>
            <p>ユーザー登録がお済みの方はログインへ、ユーザー登録がまだの方は新規登録へお進みください。</p>

            <div class="d-flex mt-5 justify-content-center">
                <a href="{{ route('login') }}" class="btn btn-primary mx-3">ログイン画面へ</a>
                <a href="{{ route('register') }}" class="btn btn-primary mx-3">新規登録画面へ</a>
            </div>
        </div>
    </div>
@endsection
