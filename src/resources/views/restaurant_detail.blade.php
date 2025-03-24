@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css')}}">
@endsection

@section('content')
<div class="row h-100">
    <div class="col-md-7 pe-md-5">
        <div class="d-flex align-items-center mb-4 mt-5 ">
            <a href="index.html" class="btn btn-light me-3 custom-icon-btn">
                <i class="bi bi-chevron-left"></i>
            </a>
            <div class="fs-3 fw-bold mb-0">仙人</div>
        </div>
        <div class="mb-3">
            <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-bjL9YmJskhV0HnycLygrULt3nOujbh.png" class="img-fluid restaurant-img" alt="仙人">
        </div>
        <div class="mb-3">
            <span class="badge text-dark bg-light">#東京都</span>
            <span class="badge text-dark bg-light">#寿司</span>
        </div>
        <p class="text">
            料理長厳選の食材から作る寿司を用いたコースをぜひお楽しみください。食材・味・価格、お客様の満足度を徹底的に追及したお店です。特別な日のお食事、ビジネス接待まで気軽に使用することができます。
        </p>
    </div>
    <div class="col-md-5 d-flex">
        <div class="card border-0 rounded-2 reservation-card w-100">
            <div class="card-body flex-grow-1">
                <h3 class="card-title text-white mb-4">予約</h3>
                <form class="d-flex flex-column flex-grow-1">
                    <div class="mb-3">
                        <input type="date" class="form-control" value="2021-04-01">
                    </div>
                    <div class="mb-3">
                        <select class="form-select">
                        <option selected>17:00</option>
                        <option>18:00</option>
                        <option>19:00</option>
                        <option>20:00</option>
                        <option>21:00</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <select class="form-select">
                        <option selected>1人</option>
                        <option>2人</option>
                        <option>3人</option>
                        <option>4人</option>
                        <option>5人以上</option>
                        </select>
                    </div>
                    <div class="card bg-light-blue text-white mb-4">
                    <div class="card-body p-3">
                        <div class="row mb-2">
                            <div class="col-4">Shop</div>
                            <div class="col-8">仙人</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Date</div>
                            <div class="col-8">2021-04-01</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">Time</div>
                            <div class="col-8">17:00</div>
                        </div>
                        <div class="row">
                            <div class="col-4">Number</div>
                            <div class="col-8">1人</div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer p-0 border-0">
                <button type="submit" class="btn btn-primary w-100 py-2 reserve-btn">予約する</button>
            </div>
        </div>
    </div>
</div>

@endsection