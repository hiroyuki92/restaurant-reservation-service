@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/authentication.css')}}">
@endsection

@section('content')
<div class = "card shadow border-0 registration-card">
    <div class = "card-header text-white py-3">
        Registration
    </div>
    <div class = "card-body p-4">
        <form action="/register" method="post" novalidate>
            @csrf
            <!-- ユーザー名 -->
            <div class="input-group mb-3 border-0 border-bottom">
                <span class="input-group-text bg-transparent border-0">
                <i class="bi bi-person-fill text-secondary"></i>
                </span>
                <input name="name" id="name" type="text" class="form-control border-0 shadow-none ps-0" placeholder="Username" value="{{ old('name') }}">
            </div>
            <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
            <!-- メール -->
            <div class="input-group mb-3 border-0 border-bottom">
                <span class="input-group-text bg-transparent border-0">
                <i class="bi bi-envelope-fill text-secondary"></i>
                </span>
                <input name="email" id="mail" class="form-control border-0 shadow-none ps-0" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <!-- パスワード -->
            <div class="input-group mb-4 border-0 border-bottom">
                <span class="input-group-text bg-transparent border-0">
                <i class="bi bi-lock-fill text-secondary"></i>
                </span>
                <input name="password" id="password" class="form-control border-0 shadow-none ps-0" placeholder="Password">
            </div>
            <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <!-- 登録ボタン -->
            <div class="text-end">
                <button type="submit" class="btn register-btn px-3 py-2">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection