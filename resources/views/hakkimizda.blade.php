<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hakkımızda — Dioreal Dijital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/base.css?v={{ time() }}">
    <link rel="stylesheet" href="css/nav-footer.css?v={{ time() }}">
    <link rel="stylesheet" href="css/components.css?v={{ time() }}">
    <link rel="stylesheet" href="css/about.css?v={{ time() }}">
</head>
<body>
    <nav id="mainNav">
        <div class="nav-logo-wrapper">
            <a href="index.html" class="nav-logo">
                <span class="logo-text">DIOREAL</span>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="hakkimizda.html" class="active-page" data-i18n="nav_about">Hakkımızda</a></li>
            <li><a href="oteller.html" data-i18n="nav_hotels">Oteller</a></li>
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
            <li style="font-size:1.5rem;font-family:var(--font-display);margin-top:2rem;"><span id="lang-tr-fs" class="lang-btn active">TR</span> | <span id="lang-en-fs" class="lang-btn">EN</span></li>
        </ul>
    </div>

    <div class="page-hero" style="background-image:url('foto.img/hero_4k.jpg');">
        <div class="page-hero-content">
            <span class="page-eyebrow" data-i18n="about_eyebrow">Biz Kimiz</span>
            <h1 class="page-title" data-i18n="about_title"><em>Dioreal</em> Dijital</h1>
        </div>
    </div>

    <section class="content-section">
        <div class="content-grid">
            <div class="reveal">
                <span class="content-eyebrow" data-i18n="story_eyebrow">Hikayemiz</span>
                <h2 class="content-title" data-i18n="story_title">15 yıldır lüks <em>seyahatin</em> sesi</h2>
                <p class="content-body" data-i18n="about_p1">2010 yılında İstanbul'da kurulan Dioreal Dijital, Türkiye'nin öncü lüks seyahat ve yaşam tarzı medya platformuna dönüşmüştür. Seçkin destinasyonlar, premium markalar ve doğru kitleyi bir araya getiren köprü olmak misyonuyla kurulduk.</p>
                <p class="content-body" data-i18n="about_p2">Her destinasyonda bizzat bulunarak, her oteli bizatihi deneyimleyerek ve her markayı özenle seçerek güvenilir bir referans noktası haline geldik.</p>
            </div>
            <div class="reveal" style="transition-delay:0.2s">
                <img src="foto.img/about_yacht.jpg" alt="Hakkımızda" style="width:100%;aspect-ratio:4/3;object-fit:cover;">
            </div>
        </div>
    </section>

    <section class="content-section alt">
        <div style="text-align:center;max-width:800px;margin:0 auto 4rem;" class="reveal">
            <span class="content-eyebrow" style="display:block;" data-i18n="stats_eyebrow">Rakamlarla</span>
            <h2 class="content-title" data-i18n="stats_title">15 Yılın <em>Mirası</em></h2>
        </div>
        <div class="stat-row reveal" style="justify-content:center;">
            <div class="stat-item">
                <span class="stat-num">150+</span>
                <span class="stat-label" data-i18n="stat_dest">Destinasyon</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">2M+</span>
                <span class="stat-label" data-i18n="stat_readers">Aylık Okuyucu</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">300+</span>
                <span class="stat-label" data-i18n="stat_brands">Marka Ortağı</span>
            </div>
            <div class="stat-item">
                <span class="stat-num">15</span>
                <span class="stat-label" data-i18n="stat_exp">Yıllık Deneyim</span>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="content-grid reverse">
            <div class="reveal">
                <span class="content-eyebrow" data-i18n="mission_eyebrow">Misyonumuz</span>
                <h2 class="content-title" data-i18n="mission_title">Anlamlı <em>deneyimler</em> için</h2>
                <p class="content-body" data-i18n="mission_p1">Sadece güzel yerler göstermiyoruz. Seyahatin ruhunu, bir destinasyonun gerçek özünü, yerel kültürün derinliğini aktarıyoruz. Her içeriğimiz bizzat yaşadığımız deneyimlerin dürüst bir yansımasıdır.</p>
                <p class="content-body" data-i18n="mission_p2">Okuyucularımız bize güvenir, markalarımız bize inanır, destinasyonlar bizi ortaklık arar çünkü söylediğimiz her şey gerçek.</p>
            </div>
            <div class="reveal" style="transition-delay:0.2s">
                <img src="foto.img/about_safari.jpg" alt="Misyon" style="width:100%;aspect-ratio:4/3;object-fit:cover;">
            </div>
        </div>
    </section>

    @include('partials.footer')
    <script src="js/i18n.js?v={{ time() }}"></script>
    <script src="js/common.js?v={{ time() }}"></script>
    <script src="js/nav.js?v={{ time() }}"></script>
</body>
</html>

