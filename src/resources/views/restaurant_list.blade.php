@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css')}}">
@endsection

@section('show_search_bar')
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="container-fluid">
            <div class="card shadow-sm border-0">
                <div class="card-body p-0">
                    <div class="d-flex align-items-center search-container">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-dark border-0 px-3" type="button" data-bs-toggle="dropdown">
                                All area
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">東京都</a></li>
                                <li><a class="dropdown-item" href="#">大阪府</a></li>
                                <li><a class="dropdown-item" href="#">福岡県</a></li>
                                <li><a class="dropdown-item" href="#">北海道</a></li>
                                <li><a class="dropdown-item" href="#">沖縄県</a></li>
                            </ul>
                        </div>

                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-dark border-0 px-3" type="button" data-bs-toggle="dropdown">
                                All genre
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">寿司</a></li>
                                <li><a class="dropdown-item" href="#">焼肉</a></li>
                                <li><a class="dropdown-item" href="#">イタリアン</a></li>
                                <li><a class="dropdown-item" href="#">ラーメン</a></li>
                                <li><a class="dropdown-item" href="#">カフェ</a></li>
                                <li><a class="dropdown-item" href="#">居酒屋</a></li>
                            </ul>
                        </div>

                        <div class="input-group border-0">
                            <span class="input-group-text bg-transparent border-0">
                                <i class="bi bi-search text-secondary"></i>
                            </span>
                            <input type="text" class="form-control border-0 shadow-none" placeholder="Search ...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    <!-- レストラン1 -->
    <div class="col">
    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-hqXx1Slj0w6M9jBwiEFslE2OYICi2K.png" class="card-img-top restaurant-img" alt="仙人">
        <div class="card-body">
        <h5 class="card-title">仙人</h5>
        <p class="card-text">
            <span class="badge text-dark">#東京都</span>
            <span class="badge text-dark">#寿司</span>
        </p>
        <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-primary details-btn">詳しくみる</a>
            <button class="btn btn-link heart-btn p-0">
            <i class="bi bi-heart text-secondary"></i>
            </button>
        </div>
        </div>
    </div>
    </div>

    <!-- レストラン2 -->
    <div class="col">
    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-hqXx1Slj0w6M9jBwiEFslE2OYICi2K.png" class="card-img-top restaurant-img" alt="牛助">
        <div class="card-body">
        <h5 class="card-title">牛助</h5>
        <p class="card-text">
            <span class="badge text-dark bg-light">#大阪府</span>
            <span class="badge text-dark bg-light">#焼肉</span>
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

    <!-- レストラン3 -->
    <div class="col">
    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-hqXx1Slj0w6M9jBwiEFslE2OYICi2K.png" class="card-img-top restaurant-img" alt="戦標">
        <div class="card-body">
        <h5 class="card-title">戦標</h5>
        <p class="card-text">
            <span class="badge text-dark bg-light">#福岡県</span>
            <span class="badge text-dark bg-light">#居酒屋</span>
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

    <!-- レストラン4 -->
    <div class="col">
    <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-hqXx1Slj0w6M9jBwiEFslE2OYICi2K.png" class="card-img-top restaurant-img" alt="ルーク">
        <div class="card-body">
        <h5 class="card-title">ルーク</h5>
        <p class="card-text">
            <span class="badge text-dark bg-light">#東京都</span>
            <span class="badge text-dark bg-light">#イタリアン</span>
        </p>
        <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="btn btn-primary details-btn">詳しくみる</a>
            <button class="btn btn-link heart-btn p-0">
            <i class="bi bi-heart text-secondary"></i>
            </button>
        </div>
        </div>
    </div>
    </div>

    
</div>

@endsection