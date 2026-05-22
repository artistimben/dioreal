<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Yönetim Paneli') — Dioreal Dijital</title>
    
    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Premium Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/admin-new.css') }}?v={{ time() }}">
</head>
<body>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="sidebar">
        <div class="sidebar-brand">
            DIOREAL<span>.</span>
        </div>
        
        <ul class="sidebar-menu">
            <li class="sidebar-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-chart-pie"></i> Kontrol Paneli
                </a>
            </li>
            @adminCan('hotels')
            <li class="sidebar-item {{ Request::routeIs('admin.hotels.*') ? 'active' : '' }}">
                <a href="{{ route('admin.hotels.index') }}">
                    <i class="fas fa-hotel"></i> Oteller
                </a>
            </li>
            @endadminCan
            @adminCan('restaurants')
            <li class="sidebar-item {{ Request::routeIs('admin.restaurants.*') ? 'active' : '' }}">
                <a href="{{ route('admin.restaurants.index') }}">
                    <i class="fas fa-utensils"></i> Restoranlar
                </a>
            </li>
            @endadminCan
            @adminCan('yachts')
            <li class="sidebar-item {{ Request::routeIs('admin.yachts.*') ? 'active' : '' }}">
                <a href="{{ route('admin.yachts.index') }}">
                    <i class="fas fa-ship"></i> Yatlar
                </a>
            </li>
            @endadminCan
            @adminCan('guides')
            <li class="sidebar-item {{ Request::routeIs('admin.guides.*') ? 'active' : '' }}">
                <a href="{{ route('admin.guides.index') }}">
                    <i class="fas fa-map-marked-alt"></i> Gezi Rehberi
                </a>
            </li>
            @endadminCan
            @adminCan('events')
            <li class="sidebar-item {{ Request::routeIs('admin.events.*') ? 'active' : '' }}">
                <a href="{{ route('admin.events.index') }}">
                    <i class="fas fa-calendar-alt"></i> Etkinlikler
                </a>
            </li>
            @endadminCan
            @adminCan('journals')
            <li class="sidebar-item {{ Request::routeIs('admin.journals.*') ? 'active' : '' }}">
                <a href="{{ route('admin.journals.index') }}">
                    <i class="fas fa-newspaper"></i> Journal
                </a>
            </li>
            @endadminCan
            @adminCan('destinations')
            <li class="sidebar-item {{ Request::routeIs('admin.destinations.*') ? 'active' : '' }}">
                <a href="{{ route('admin.destinations.index') }}">
                    <i class="fas fa-map-signs"></i> Destinasyonlar
                </a>
            </li>
            @endadminCan
            @adminCan('users')
            <li class="sidebar-item {{ Request::routeIs('admin.users.*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users-cog"></i> Kullanıcılar & Yetkiler
                </a>
            </li>
            @endadminCan
            @adminCan('settings')
            <li class="sidebar-item {{ Request::routeIs('admin.settings.*') ? 'active' : '' }}">
                <a href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-sliders-h"></i> Genel Ayarlar
                </a>
            </li>
            @endadminCan
        </ul>
        
        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Güvenli Çıkış
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Container -->
    <main class="admin-main">
        
        <!-- Header -->
        <header class="admin-header">
            <div>
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="admin-title">@yield('page_title')</h1>
                <p class="admin-subtitle">@yield('page_subtitle', 'Dioreal Dijital portal yönetimi')</p>
            </div>
            <div>
                <a href="{{ route('home') }}" class="btn btn-outline" target="_blank">
                    <i class="fas fa-external-link-alt"></i> Siteyi Görüntüle
                </a>
            </div>
        </header>

        <!-- Flash Notifications -->
        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Main Content -->
        @yield('content')
        
    </main>

    <!-- Global Admin Scripts -->
    <script>
        // Sidebar toggle logic for mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        
        if (sidebarToggle && sidebar) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024 && !sidebar.contains(e.target) && !sidebarToggle.contains(e.target)) {
                    sidebar.classList.remove('open');
                }
            });
        }

        // Language tab switching helper
        function switchLanguageTab(lang) {
            // Toggle active tabs
            document.querySelectorAll('.lang-tab').forEach(tab => {
                if (tab.dataset.lang === lang) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });
            // Toggle active panes
            document.querySelectorAll('.lang-pane').forEach(pane => {
                if (pane.dataset.lang === lang) {
                    pane.classList.add('active');
                } else {
                    pane.classList.remove('active');
                }
            });
        }
    </script>
</body>
</html>
