@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/authentication.css')}}">
@endsection

@section('content')
<div class="card shadow border-0 thank-you-card">
    <div class="card-body p-5 text-center">
        <div class="mb-5 fw-nomal fs-5">ご予約ありがとうございます</div>
        <a href="login.html" class="btn login-btn px-3 py-2">戻る</a>
    </div>
</div>

@endsection