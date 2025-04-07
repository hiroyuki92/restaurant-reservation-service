@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
@endsection

@section('content')
<div class="row h-100">
    <div class="col-md-7 pe-md-5">
        <div class="d-flex align-items-center mb-4 mt-5 ">
            <a href="/" class="btn btn-light me-3 custom-icon-btn">
                <i class="bi bi-chevron-left"></i>
            </a>
            <div class="fs-3 fw-bold mb-0">{{ $restaurant->name }}</div>
        </div>
        <div class="mb-3">
            <img src="{{ asset('/' . $restaurant->image_url) }}" class="img-fluid restaurant-img" alt="{{ $restaurant->name }}">
        </div>
        <div class="mb-3">
            <span class="badge text-dark bg-light fs-6">#{{ $restaurant->area->name }}</span>
            <span class="badge text-dark bg-light fs-6">#{{ $restaurant->genre->name }}</span>
        </div>
        <p class="text">
            {{ $restaurant->description }}
        </p>
    </div>
    <div class="col-md-5 d-flex">
        <div class="card border-0 rounded-2 reservation-card w-100">
            <form class="d-flex flex-column flex-grow-1"  method="POST" action="{{ route('reservation') }}">
                @csrf
                <div class="card-body-reservation flex-grow-1">
                    <h3 class="card-title text-white  mt-5 mb-4 ms-3">予約</h3>
                    <div class="mb-3 ms-3 me-3">
                        <input type="date" name="reservation_time"  id="dateInput" class="form-control" value="2021-04-01">
                    </div>
                    <div class="mb-3 ms-3 me-3">
                        <select name="time"  id="timeSelect" class="form-select">
                        <option selected>17:00</option>
                        <option>18:00</option>
                        <option>19:00</option>
                        <option>20:00</option>
                        <option>21:00</option>
                        <option>22:00</option>
                        <option>23:00</option>
                        </select>
                    </div>
                    <div class="mb-4 ms-3 me-3">
                        <select name="number_of_people" id="numberSelect" class="form-select">
                            <option value="1" selected>1人</option>
                            <option value="2">2人</option>
                            <option value="3">3人</option>
                            <option value="4">4人</option>
                            <option value="5">5人</option>
                            <option value="6">6人以上</option>
                        </select>
                    </div>
                    <div class="card bg-light-blue text-white mb-5 ms-3 me-3">
                    <div class="card-body p-3">
                        <div class="row mb-2">
                            <div class="col-4">Shop</div>
                            <div class="col-8">{{ $restaurant->name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Date</div>
                            <div class="col-8" id="dateDisplay">2021-04-01</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Time</div>
                            <div class="col-8" id="timeDisplay">17:00</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Number</div>
                            <div class="col-8" id="numberDisplay">1人</div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                <div class="card-footer p-0 border-0">
                    <button type="submit" class="btn btn-primary w-100 py-2 reserve-btn">予約する</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        const dateInput = document.getElementById('dateInput');
        const timeSelect = document.getElementById('timeSelect');
        const numberSelect = document.getElementById('numberSelect');
        
        const dateDisplay = document.getElementById('dateDisplay');
        const timeDisplay = document.getElementById('timeDisplay');
        const numberDisplay = document.getElementById('numberDisplay');
        
        // 日付、時間、人数が変更されたときに表示を更新
        dateInput.addEventListener('input', function() {
            dateDisplay.textContent = dateInput.value;
        });
        
        timeSelect.addEventListener('change', function() {
            timeDisplay.textContent = timeSelect.value;
        });
        
        numberSelect.addEventListener('change', function() {
            numberDisplay.textContent = numberSelect.value + '人';
        });
    </script>
</div>

@endsection