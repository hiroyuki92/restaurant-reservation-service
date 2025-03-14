<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Coachtech</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
        @yield('css')
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
</head>
<body>
    <div class="menu-overlay" id="menuOverlay">
        <button class="close-button" onclick="toggleMenu()">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
        <nav class="menu-links">
            <a href="#" class="menu-link">Home</a>
            <a href="#" class="menu-link">Registration</a>
            <a href="#" class="menu-link">Login</a>
        </nav>
    </div>
    <header class="header">
        <div class="logo-icon" onclick="toggleMenu()">
            <div class="line line-medium"></div>
            <div class="line"></div>
            <div class="line line-small"></div>
        </div>
        <span class="logo-text">Rese</span>
    </header>
</body>
<script>
    function toggleMenu() {
        const menuOverlay = document.getElementById('menuOverlay');
        menuOverlay.classList.toggle('active');
        document.body.classList.toggle('menu-open');
    }
</script>
</html>