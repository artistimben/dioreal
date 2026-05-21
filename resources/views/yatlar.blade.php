<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yatlar — Dioreal Dijital</title>
    <meta name="description" content="Türkiye ve Akdeniz'de özel yat kiralama ve yat tatili deneyimleri. Dioreal Dijital premium yat koleksiyonu.">
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
            <li><a href="hakkimizda.html" data-i18n="nav_about">Hakkımızda</a></li>
            <li><a href="oteller.html" data-i18n="nav_hotels">Oteller</a></li>
            <li><a href="yatlar.html" class="active-page" data-i18n="nav_yachts">Yatlar</a></li>
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
            <li style="font-size: 1.5rem; font-family: var(--font-display); margin-top: 2rem;">
                <span id="lang-tr-fs" class="lang-btn active">TR</span> | <span id="lang-en-fs" class="lang-btn">EN</span>
            </li>
        </ul>
    </div>

    <div class="page-hero" style="background-image: url('foto.img/yat_manzara.jpg');">
        <div class="page-hero-content">
            <span class="page-eyebrow" data-i18n="yacht_hero_eye">Akdeniz'de Özgürlük</span>
            <h1 class="page-title" data-i18n="yacht_title">Özel <em>Yatlar</em></h1>
        </div>
    </div>

    <section class="content-section">
        <div class="content-grid">
            <div class="reveal">
                <span class="content-eyebrow" data-i18n="yacht_hol_eye">Yat Tatili</span>
                <h2 class="content-title" data-i18n="yacht_hol_title">Koydan koya, <em>özgürce</em></h2>
                <p class="content-body" data-i18n="yacht_hol_p1">Kendi rotanızı belirleyin, kendi hızınızda ilerleyin. Türkiye'nin turquoise kıyılarından Yunan adalarına, İtalyan rivieralarından Hırvatistan koylarına uzanan yolculuklarda lüks ve özgürlüğü bir arada yaşayın.</p>
                <a href="#yatlar" class="btn btn-primary" data-i18n="btn_explore_yachts">Yatları İncele</a>
            </div>
            <div class="reveal" style="transition-delay: 0.2s;">
                <img src="foto.img/yat_ozgur.jpg" alt="Özel Yat" style="width:100%; aspect-ratio: 4/3; object-fit: cover;">
            </div>
        </div>
    </section>

    <section class="content-section alt" id="yatlar">
        <div style="text-align: center; margin-bottom: 4rem;">
            <span class="content-eyebrow" style="display: block;" data-i18n="yacht_fleet_eye">Filo</span>
            <h2 class="content-title" style="font-size: clamp(2rem, 4vw, 3rem);" data-i18n="yacht_fleet_title">Premium <em>Yat Filomuz</em></h2>
        </div>
        <div class="card-grid">
            <div class="card reveal">
                <div class="card-img" style="background-image: url('foto.img/yat_bodrum_blue.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag">Gulet · 24m</span>
                    <h3 class="card-title">Bodrum Blue</h3>
                    <p class="card-desc" data-i18n="yacht_bodrum_desc">8 misafir kapasiteli, teak güverteli, Türk el sanatlarıyla donatılmış geleneksel Bodrum gulet'i.</p>
                </div>
            </div>
            <div class="card reveal" style="transition-delay:0.1s">
                <div class="card-img" style="background-image: url('foto.img/yat_azure_dream.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag">Motor Yat · 35m</span>
                    <h3 class="card-title">Azure Dream</h3>
                    <p class="card-desc" data-i18n="yacht_azure_desc">12 misafir kapasiteli, helikopter pisti, jakuzi ve tam donanımlı modern süper yat deneyimi.</p>
                </div>
            </div>
            <div class="card reveal" style="transition-delay:0.2s">
                <div class="card-img" style="background-image: url('foto.img/yat_aegean_wind.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag">Yelkenli · 18m</span>
                    <h3 class="card-title">Aegean Wind</h3>
                    <p class="card-desc" data-i18n="yacht_aegean_desc">6 misafir için özel, rüzgarın gücüyle Ege'yi keşfetmek isteyenler için premium yelkenli yat.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="content-grid reverse">
            <div class="reveal">
                <span class="content-eyebrow" data-i18n="yacht_route_eye">Güzergah Planlaması</span>
                <h2 class="content-title" data-i18n="yacht_route_title">Her yolculuk <em>size özel</em></h2>
                <p class="content-body" data-i18n="yacht_route_p1">Bodrum'dan Marmaris'e mavi yolculuk, Ege adaları turu ya da Akdeniz'den Adriyatik'e uzanan epik rotalar — siz hayal edin, biz planlayalım. Deneyimli kaptanlarımız ve özel aşçılarımızla konfor ve lüks güvencesinde.</p>
                <a href="#" class="btn btn-outline" data-i18n="btn_plan_route">Rota Planlat</a>
            </div>
            <div class="reveal" style="transition-delay: 0.2s;">
                <img src="foto.img/yat_rota.jpg" alt="Yat Rotası" style="width:100%; aspect-ratio: 4/3; object-fit: cover;">
            </div>
        </div>
    </section>

    <footer id="iletisim">
        <div class="footer-top">
            <div class="footer-brand">
                <div class="footer-logo">DIOREAL.</div>
                <p class="footer-p" data-i18n="footer_p">Seçkin destinasyonları ve premium markaları doğru kitleyle buluşturan medya platformu.</p>
                <a href="https://wa.me/905320000000" class="whatsapp-cta">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>
                    <span data-i18n="btn_contact_wa">WhatsApp İletişim</span>
                </a>
            </div>
            <div class="footer-col">
                <h4 data-i18n="footer_pages">Sayfalar</h4>
                <ul class="footer-links">
                    <li><a href="hakkimizda.html" data-i18n="nav_about">Hakkımızda</a></li>
                    <li><a href="oteller.html" data-i18n="nav_hotels">Oteller</a></li>
                    <li><a href="yatlar.html" data-i18n="nav_yachts">Yatlar</a></li>
                    <li><a href="restoranlar.html" data-i18n="nav_restaurants">Restoranlar</a></li>
                    <li><a href="journal.html" data-i18n="nav_journal">Journal</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 data-i18n="footer_serv">Hizmetler</h4>
                <ul class="footer-links">
                    <li><a href="#">Balayı Paketleri</a></li>
                    <li><a href="#">Aile Tatilleri</a></li>
                    <li><a href="#">Macera Turları</a></li>
                    <li><a href="#">Kültür Gezileri</a></li>
                    <li><a href="#">Özel Jet Hizmetleri</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 data-i18n="footer_contact">İletişim</h4>
                <ul class="footer-links">
                    <li><a href="mailto:info@diorealdijital.com">info@diorealdijital.com</a></li>
                    <li><a href="tel:+902125550100">+90 212 555 0100</a></li>
                    <li data-i18n="cont_ist">İstanbul, Türkiye</li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© 2026 Dioreal Dijital. All Rights Reserved.</span>
            <span>Est. 15 Years of Experience</span>
        </div>
    </footer>

    <script src="js/i18n.js?v=2"></script>
    <script src="js/common.js?v=2"></script>
    <script src="js/nav.js?v=2"></script>
    <script>
        const DEFAULT_YACHTS_PAGE = [
            { id:1, name:{tr:'Bodrum Blue', en:'Bodrum Blue'}, tag:{tr:'Gulet · 24m', en:'Gulet · 24m'}, img:'foto.img/yat_bodrum_blue.jpg', desc:{ tr:'8 misafir kapasiteli, teak güverteli, Türk el sanatlarıyla donatılmış geleneksel Bodrum gulet\'i.', en:'Traditional Bodrum gulet for 8 guests, with teak deck and Turkish handicrafts.' } },
            { id:2, name:{tr:'Azure Dream', en:'Azure Dream'}, tag:{tr:'Motor Yat · 35m', en:'Motor Yacht · 35m'}, img:'foto.img/yat_azure_dream.jpg', desc:{ tr:'12 misafir kapasiteli, helikopter pisti, jakuzi ve tam donanımlı modern süper yat deneyimi.', en:'Modern super yacht for 12 guests, featuring helipad, jacuzzi and full equipment.' } },
            { id:3, name:{tr:'Aegean Wind', en:'Aegean Wind'}, tag:{tr:'Yelkenli · 18m', en:'Sailing Yacht · 18m'}, img:'foto.img/yat_aegean_wind.jpg', desc:{ tr:'6 misafir için özel, rüzgarın gücüyle Ege\'yi keşfetmek isteyenler için premium yelkenli yat.', en:'Premium sailing yacht for 6 guests, for those who want to explore the Aegean with wind power.' } }
        ];

        function buildYachtCards(lang) {
            const data = DioAPI.loadSync('dioreal_yachts_data') || DEFAULT_YACHTS_PAGE;
            const l    = lang || localStorage.getItem('dioreal_lang') || 'tr';
            const grid = document.querySelector('.card-grid');
            if (!grid) return;
            grid.innerHTML = data.map(y => `
                <div class="card reveal visible">
                    <div class="card-img" style="background-image:url('${y.img}')"></div>
                    <div class="card-body">
                        <span class="card-tag">${y.tag[l] || y.tag.tr || y.tag}</span>
                        <h3 class="card-title">${y.name[l] || y.name.tr || y.name}</h3>
                        <p class="card-desc">${y.desc[l] || y.desc.tr}</p>
                    </div>
                </div>
            `).join('');
        }
        buildYachtCards();
        DioAPI.loadAsync('dioreal_yachts_data', function(data) {
            if (data && Array.isArray(data)) buildYachtCards();
        });
        document.addEventListener('langChanged', function(e) { buildYachtCards(e.detail); });
    </script>
</body>
</html>

