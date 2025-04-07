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
                    <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn text-white rounded-circle" onclick="return confirm('本当に削除しますか？')">
                            <i class="bi bi-x-circle fs-4"></i>
                        </button>
                    </form>
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
        <div class="fs-2 fw-bold mb-5">{{ auth()->user()->name }}さん</div>
        <div class="mb-4 fw-bold fs-4">お気に入り店舗</div>
        <div class="row favorites-row row-cols-2 row-cols-md-2 row-cols-md-3 g-3">
            @foreach ($favorites as $favorite)
            <div class="col">
                <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                    <img src="{{ $favorite->restaurant->image_url }}"  class="restaurant-img w-100 " alt="{{ $favorite->restaurant->name }}">
                    <div class="p-3">
                        <h5 class="card-title">{{ $favorite->restaurant->name }}</h5>
                        <p class="card-text">
                                <span class="badge text-dark">#{{ $favorite->restaurant->area->name }}</span>
                                <span class="badge text-dark">#{{ $favorite->restaurant->genre->name }}</span>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('detail', $favorite->restaurant->id) }}" class="btn btn-primary details-btn">詳しくみる</a>
                            <button class="btn btn-link heart-btn p-0">
                            <i class="bi bi-heart-fill text-danger fs-3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection