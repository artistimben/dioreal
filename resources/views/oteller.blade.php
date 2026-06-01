<!DOCTYPE html>
<html lang="tr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oteller — Dioreal Dijital</title>
    <meta name="description"
        content="Türkiye ve dünyada seçkin, lüks oteller. Dioreal Dijital tarafından özenle seçilmiş premium konaklama deneyimleri.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/base.css?v={{ time() }}">
    <link rel="stylesheet" href="css/nav-footer.css?v={{ time() }}">
    <link rel="stylesheet" href="css/components.css?v={{ time() }}">
    <link rel="stylesheet" href="css/about.css?v={{ time() }}">
</head>

<body>

    <!-- Desktop Nav -->
    <nav id="mainNav">
        <div class="nav-logo-wrapper">
            <a href="index.html" class="nav-logo">
                <img src="foto.img/logo_dioreal.png" alt="Logo">
                <span class="logo-text">DIOREAL.</span>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="hakkimizda.html" data-i18n="nav_about">Hakkımızda</a></li>
            <li><a href="oteller.html" class="active-page" data-i18n="nav_hotels">Oteller</a></li>
            <li><a href="yatlar.html" data-i18n="nav_yachts">Yatlar</a></li>
            <li><a href="restoranlar.html" data-i18n="nav_restaurants">Restoranlar</a></li>
            <li><a href="gezi-rehberi.html" data-i18n="nav_guide">Gezi Rehberi</a></li>
            <li><a href="etkinlikler.html" data-i18n="nav_events">Etkinlikler</a></li>
            <li><a href="journal.html" data-i18n="nav_journal">Journal</a></li>
        </ul>
        <div class="nav-right">
            <div class="lang-switch desk-lang">
                <span id="lang-tr" class="lang-btn active">TR</span>
                <span>|</span>
                <span id="lang-en" class="lang-btn">EN</span>
            </div>
            <div class="hamburger" id="hamb">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>

    <!-- Fullscreen Menu -->
    <div class="fs-menu" id="fsMenu">
        <ul class="fs-links">
            <li><a href="hakkimizda.html" data-i18n="nav_about">Hakkımızda</a></li>
            <li><a href="oteller.html" data-i18n="nav_hotels">Oteller</a></li>
            <li><a href="yatlar.html" data-i18n="nav_yachts">Yatlar</a></li>
            <li><a href="restoranlar.html" data-i18n="nav_restaurants">Restoranlar</a></li>
            <div class="fs-divider"></div>
            <li><a href="gezi-rehberi.html" data-i18n="nav_guide">Gezi Rehberi</a></li>
            <li><a href="etkinlikler.html" data-i18n="nav_events">Etkinlikler</a></li>
            <li><a href="journal.html" data-i18n="nav_journal">Journal</a></li>
            <li style="font-size: 1.5rem; font-family: var(--font-display); margin-top: 2rem;">
                <span id="lang-tr-fs" class="lang-btn active">TR</span> | <span id="lang-en-fs"
                    class="lang-btn">EN</span>
            </li>
        </ul>
    </div>

    <!-- Page Hero -->
    <div class="page-hero" style="background-image: url('foto.img/otel_hero.jpg');">
        <div class="page-hero-content">
            <span class="page-eyebrow" data-i18n="otel_hero_eye">Premium Konaklama</span>
            <h1 class="page-title">Seçkin <em>Oteller</em></h1>
        </div>
    </div>

    <!-- Intro Section -->
    <section class="content-section">
        <div class="content-grid">
            <div class="reveal">
                <span class="content-eyebrow" data-i18n="otel_exp_eye">Deneyim Tasarımı</span>
                <h2 class="content-title" data-i18n="otel_exp_title">Her konaklamanın bir <em>hikayesi</em> vardır</h2>
                <p class="content-body" data-i18n="otel_exp_p1">Dünyaca ünlü butik oteller, tarihi yapılar ve ultra-lüks
                    resort'lardan oluşan koleksiyonumuz, seyahatinizin her anını unutulmaz kılmak için özenle
                    seçilmiştir. Sadece bir oda değil; bir atmosfer, bir his, bir deneyim sunuyoruz.</p>
                <a href="#oteller" class="btn btn-primary" data-i18n="btn_discover_col">Koleksiyonu Keşfet</a>
            </div>
            <div class="reveal" style="transition-delay: 0.2s;">
                <img src="foto.img/otel_oda.jpg" alt="Lüks Otel"
                    style="width:100%; aspect-ratio: 4/3; object-fit: cover;">
            </div>
        </div>
    </section>

    <!-- Hotels Grid -->
    <section class="content-section alt" id="oteller">
        <div style="text-align: center; margin-bottom: 4rem;">
            <span class="content-eyebrow" style="justify-content: center; display: block;"
                data-i18n="otel_col_eye">Seçkin Koleksiyon</span>
            <h2 class="content-title" style="font-size: clamp(2rem, 4vw, 3rem);" data-i18n="otel_col_title">Öne Çıkan
                <em>Oteller</em></h2>
        </div>
        <div class="card-grid" id="hotelCardsGrid">
            @foreach($oteller as $otel)
                <div class="card reveal visible">
                    <div class="card-img" style="background-image:url('{{ asset($otel->img) }}')"></div>
                    <div class="card-body">
                        <span class="card-tag lang-text-tr">{{ $otel->tag["tr"] ?? "" }}</span>
                        <span class="card-tag lang-text-en">{{ $otel->tag["en"] ?? "" }}</span>
                        
                        <h3 class="card-title lang-text-tr">{{ $otel->name["tr"] ?? "" }}</h3>
                        <h3 class="card-title lang-text-en">{{ $otel->name["en"] ?? "" }}</h3>
                        
                        <p class="card-desc lang-text-tr">{{ $otel->desc["tr"] ?? "" }}</p>
                        <p class="card-desc lang-text-en">{{ $otel->desc["en"] ?? "" }}</p>
                        
                        <a href="{{ url("/otel/" . $otel->id) }}" class="btn btn-primary" style="margin-top:1rem; padding: 0.5rem 1rem;">
                            <span class="lang-text-tr">Detayları İncele</span>
                            <span class="lang-text-en">View Details</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('partials.footer')

    <script src="js/i18n.js?v={{ time() }}"></script>
    <script src="js/common.js?v={{ time() }}"></script>
    <script src="js/nav.js?v={{ time() }}"></script>
</body>

</html>