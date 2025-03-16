<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coachtech</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
        @yield('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body class="bg-light">
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center position-relative">
        <!-- ロゴ部分 -->
        <div class="position-absolute top-0 start-0 m-3 d-flex align-items-center custom-position">
            <button class="btn logo-btn p-2 d-flex justify-content-center align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuOffcanvas">
                <div class="hamburger-icon">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
                </div>
            </button>
            <span class="logo-text ms-2">Rese</span>
        </div>
        <div class="content">
        @yield('content')
        </div>
    </div>

    <!-- オフキャンバスメニュー -->
    <div class="offcanvas offcanvas-start w-100" tabindex="-1" id="menuOffcanvas">
        <div class="position-absolute top-0 start-0 m-3 d-flex align-items-center custom-position">
            <button type="button" class="btn logo-btn p-2 d-flex justify-content-center align-items-center" data-bs-dismiss="offcanvas" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="offcanvas-body d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex flex-column gap-4 text-center">
                <a href="#" class="menu-link">Home</a>
                <a href="#" class="menu-link">Registration</a>
                <a href="#" class="menu-link">Login</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>