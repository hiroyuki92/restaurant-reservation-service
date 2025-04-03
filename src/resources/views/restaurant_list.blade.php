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
<div class="content-wrapper">
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    @foreach($restaurants as $restaurant)
    <div class="col">
        <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden">
            <img src="{{ asset('/' . $restaurant->image_url) }}" class="card-img-top restaurant-img rounded" alt="{{ $restaurant->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $restaurant->name }}</h5>
                <p class="card-text">
                        <span class="badge text-dark">#{{ $restaurant->area->name }}</span>
                        <span class="badge text-dark">#{{ $restaurant->genre->name }}</span>
                </p>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('detail', $restaurant->id) }}" class="btn btn-primary details-btn">詳しくみる</a>
                    <button class="btn btn-link heart-btn p-0">
                        <i class="bi bi-heart text-secondary"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection