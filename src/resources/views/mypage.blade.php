@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 mb-5 pe-md-5 right-spacing">
        <div class="mb-4 fw-bold fs-4 mt-5 pt-5">予約状況</div>
        @foreach ($reservations as $reservation)
        <div class="reservation-card p-5 mb-5">
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-clock fs-4"></i>
                        <div class="mb-0 fs-6 ms-3">予約{{ $loop->iteration }}</div>
                    </div>
                    <button class="btn text-white rounded-circle">
                        <i class="bi bi-x-circle fs-4"></i>
                    </button>
                </div>
                <div class="row mb-2">
                    <div class="col-4">Shop</div>
                    <div class="col-8">{{ $reservation->restaurant->name }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4">Date</div>
                    <div class="col-8">{{ $reservation->date }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-4">Time</div>
                    <div class="col-8">{{ $reservation->time }}</div>
                </div>
                <div class="row">
                    <div class="col-4">Number</div>
                    <div class="col-8">{{ $reservation->number_of_people }}人</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-8">
        <div class="fs-2 fw-bold mb-5">testさん</div>
        <div class="mb-4 fw-bold fs-4">お気に入り店舗</div>
        <div class="row">
            <div class="col-md-5 col-lg-4 mb-4 me-2">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-ATYWg28k4wIyVrLuXGOYoePLnFGq67.png" class="restaurant-img w-100 " alt="仙人">
                    <div class="p-3">
                        <h5 class="card-title">仙人</h5>
                        <p class="card-text">
                            <span class="badge text-dark">#東京都</span>
                            <span class="badge text-dark">#寿司</span>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="btn btn-primary details-btn">詳しくみる</a>
                            <button class="btn btn-link heart-btn p-0">
                            <i class="bi bi-heart-fill text-danger"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection