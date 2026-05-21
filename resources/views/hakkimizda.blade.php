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
    <link rel="stylesheet" href="css/base.css?v=2">
    <link rel="stylesheet" href="css/nav-footer.css?v=2">
    <link rel="stylesheet" href="css/components.css?v=2">
    <link rel="stylesheet" href="css/about.css?v=2">
</head>
<body>
    <nav id="mainNav">
        <div class="nav-logo-wrapper">
            <a href="index.html" class="nav-logo">
                <img src="foto.img/logo_dioreal.png" alt="Logo">
                <span class="logo-text">DIOREAL.</span>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="index.html" data-i18n="nav_home">Ana Sayfa</a></li>
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
            <li><a href="index.html" data-i18n="nav_home">Ana Sayfa</a></li>
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

    <footer id="iletisim">
        <div class="footer-top">
            <div class="footer-brand">
                <div class="footer-logo">DIOREAL.</div>
                <p class="footer-p">Seçkin destinasyonları ve premium markaları doğru kitleyle buluşturan medya platformu.</p>
                <a href="https://wa.me/905320000000" class="whatsapp-cta">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>
                    <span>WhatsApp İletişim</span>
                </a>
            </div>
            <div class="footer-col"><h4 data-i18n="footer_pages">Sayfalar</h4><ul class="footer-links"><li><a href="hakkimizda.html" data-i18n="nav_about">Hakkımızda</a></li><li><a href="oteller.html" data-i18n="nav_hotels">Oteller</a></li><li><a href="yatlar.html" data-i18n="nav_yachts">Yatlar</a></li><li><a href="restoranlar.html" data-i18n="nav_restaurants">Restoranlar</a></li><li><a href="journal.html" data-i18n="nav_journal">Journal</a></li></ul></div>
            <div class="footer-col"><h4 data-i18n="footer_serv">Hizmetler</h4><ul class="footer-links"><li><a href="#" data-i18n="serv_1">Balayı Paketleri</a></li><li><a href="#" data-i18n="serv_2">Aile Tatilleri</a></li><li><a href="#" data-i18n="serv_3">Macera Turları</a></li><li><a href="#" data-i18n="serv_4">Kültür Gezileri</a></li></ul></div>
            <div class="footer-col"><h4 data-i18n="footer_contact">İletişim</h4><ul class="footer-links"><li><a href="mailto:info@diorealdijital.com">info@diorealdijital.com</a></li><li><a href="tel:+902125550100">+90 212 555 0100</a></li><li data-i18n="cont_ist">İstanbul, Türkiye</li></ul></div>
        </div>
        <div class="footer-bottom"><span>© 2026 Dioreal Dijital. All Rights Reserved.</span><span>Est. 15 Years of Experience</span></div>
    </footer>
    <script src="js/i18n.js?v=2"></script>
    <script src="js/common.js?v=2"></script>
    <script src="js/nav.js?v=2"></script>
</body>
</html>

