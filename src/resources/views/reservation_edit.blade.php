@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/edit.css')}}">
@endsection

@section('content')
<form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="d-flex justify-content-center">
        <div class="card  mb-5 ms-3 me-3 w-50">
            <div class="card-body p-3 ms-5 me-3">
                <h3 class="card-title text-white  mt-5 mb-4">予約変更</h3>
                <div class="row mb-2">
                    <div class="col-5 d-flex align-items-center">Shop</div>
                    <div class="col-7">
                        {{ $reservation->restaurant->name }}
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 d-flex align-items-center">Date</div>
                    <div class="col-7">
                        <input type="date" name="reservation_date"  id="dateInput" class="form-control"
                        value="{{ $reservation->date }}">
                        @error('reservation_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 d-flex align-items-center">Time</div>
                    <div class="col-7">
                        <select name="time" id="timeSelect" class="form-select">
                            <option value="17:00" {{ $reservation->time == '17:00' ? 'selected' : '' }}>17:00</option>
                            <option value="18:00" {{ $reservation->time == '18:00' ? 'selected' : '' }}>18:00</option>
                            <option value="19:00" {{ $reservation->time == '19:00' ? 'selected' : '' }}>19:00</option>
                            <option value="20:00" {{ $reservation->time == '20:00' ? 'selected' : '' }}>20:00</option>
                            <option value="21:00" {{ $reservation->time == '21:00' ? 'selected' : '' }}>21:00</option>
                            <option value="22:00" {{ $reservation->time == '22:00' ? 'selected' : '' }}>22:00</option>
                            <option value="23:00" {{ $reservation->time == '23:00' ? 'selected' : '' }}>23:00</option>
                        </select>
                        @error('time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 d-flex align-items-center">Number</div>
                    <div class="col-7">
                        <select name="number_of_people" id="numberSelect" class="form-select">
                            <option value="1" {{ $reservation->number_of_people == 1 ? 'selected' : '' }}>1人</option>
                            <option value="2" {{ $reservation->number_of_people == 2 ? 'selected' : '' }}>2人</option>
                            <option value="3" {{ $reservation->number_of_people == 3 ? 'selected' : '' }}>3人</option>
                            <option value="4" {{ $reservation->number_of_people == 4 ? 'selected' : '' }}>4人</option>
                            <option value="5" {{ $reservation->number_of_people == 5 ? 'selected' : '' }}>5人</option>
                            <option value="6" {{ $reservation->number_of_people == 6 ? 'selected' : '' }}>6人以上</option>
                        </select>
                        @error('number_of_people')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <input type="hidden" name="restaurant_id" value="{{ $reservation->restaurant->id }}">
            <div class="card-footer mt-5 p-0 border-0">
                <button type="submit" class="btn btn-primary w-100 py-2 reserve-btn">予約を変更する</button>
            </div>
        </div>
    </div>
</form>
@endsection
