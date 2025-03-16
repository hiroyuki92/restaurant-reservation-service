@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/authentication.css')}}">
@endsection

@section('content')
<div class="card shadow border-0 thank-you-card">
    <div class="card-body p-5 text-center">
        <div class="mb-5 fw-bold">会員登録ありがとうございます</div>
        <a href="login.html" class="btn login-btn px-3 py-2">ログインする</a>
    </div>
</div>

@endsection