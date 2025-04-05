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
                            <form action="{{ route('search') }}" method="GET" class="d-flex align-items-center">
                                <select class="btn text-dark border-0 px-3 dropdown-toggle" name="area_id" onchange="this.form.submit()">
                                    <option value="">All area</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}" {{ request('area_id') == $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                                    @endforeach
                                </select>
                                <select class="btn text-dark border-0 px-3 dropdown-toggle" name="genre_id" onchange="this.form.submit()">
                                    <option value="">All genre</option>
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group border-0">
                                    <span class="input-group-text bg-transparent border-0">
                                        <i class="bi bi-search text-secondary"></i>
                                    </span>
                                    <input type="text"  name="keyword" value="{{ old('keyword') }}"  class="form-control border-0 shadow-none" placeholder="Search ...">
                                </div>
                            </form>
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
                        <button class="btn btn-link heart-btn p-0" onclick="toggleFavorite({{ $restaurant->id }})">
                            <i id="heart-icon-{{ $restaurant->id }}" 
                            class="bi bi-heart-fill {{ auth()->check() && auth()->user()->hasFavorited($restaurant) ? '-fill text-danger' : ' text-muted' }} fs-3"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <script>
        function toggleFavorite(restaurantId) {
            fetch(`/favorites/${restaurantId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    restaurant_id: restaurantId,
                })
            })
            .then(response => response.json())
            .then(data => {
                const icon = document.getElementById(`heart-icon-${restaurantId}`);
                if (data.favorited) {
                    icon.classList.remove('text-muted');
                    icon.classList.add('text-danger');
                } else {
                    icon.classList.remove('text-danger');
                    icon.classList.add('text-muted');
                }
            })
            .catch(error => {
                console.error('Error toggling favorite:', error);
            });
        }
    </script>
</div>
@endsection