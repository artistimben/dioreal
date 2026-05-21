<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etkinlikler — Dioreal Dijital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/base.css?v=2">
    <link rel="stylesheet" href="css/nav-footer.css?v=2">
    <link rel="stylesheet" href="css/components.css?v=2">
    <link rel="stylesheet" href="css/about.css?v=2">
    <link rel="stylesheet" href="css/events.css?v=2">
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
            <li><a href="yatlar.html" data-i18n="nav_yachts">Yatlar</a></li>
            <li><a href="restoranlar.html" data-i18n="nav_restaurants">Restoranlar</a></li>
            <li><a href="gezi-rehberi.html" data-i18n="nav_guide">Gezi Rehberi</a></li>
            <li><a href="etkinlikler.html" class="active-page" data-i18n="nav_events">Etkinlikler</a></li>
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

    <div class="page-hero" style="background-image:url('foto.img/etkinlik_hero.jpg');">
        <div class="page-hero-content">
            <span class="page-eyebrow" data-i18n="event_hero_eye">Takvim 2026</span>
            <h1 class="page-title" data-i18n="nav_events">Seçkin <em>Etkinlikler</em></h1>
        </div>
    </div>

    <section class="content-section">
        <div style="max-width:900px;margin:0 auto;">
            <div style="text-align:center;margin-bottom:4rem;" class="reveal">
                <span class="content-eyebrow" style="display:block;" data-i18n="event_intro_eye">Bu Sezon</span>
                <h2 class="content-title" data-i18n="event_intro_title">Kaçırılmayacak <em>Anlar</em></h2>
            </div>
            <div class="event-list">
                <div class="event-item reveal">
                    <div class="event-date">
                        <span class="event-day">15</span>
                        <span class="event-month" data-i18n="month_may">Mayıs</span>
                    </div>
                    <div>
                        <span class="event-tag" data-i18n="tag_gastro">Gastronomi</span>
                        <div class="event-title" data-i18n="event_1_title">İstanbul Yemek Festivali 2026</div>
                        <div class="event-location" data-i18n="event_1_loc">📍 Beşiktaş Meydanı, İstanbul</div>
                    </div>
                    <a href="#" class="btn btn-outline" data-i18n="btn_review">İncele</a>
                </div>
                <div class="event-item reveal">
                    <div class="event-date">
                        <span class="event-day">22</span>
                        <span class="event-month" data-i18n="month_may">Mayıs</span>
                    </div>
                    <div>
                        <span class="event-tag" data-i18n="tag_culture">Kültür & Sanat</span>
                        <div class="event-title" data-i18n="event_2_title">Bodrum Uluslararası Bale Festivali</div>
                        <div class="event-location" data-i18n="event_2_loc">📍 Bodrum Kalesi Açık Hava Sahnesi</div>
                    </div>
                    <a href="#" class="btn btn-outline" data-i18n="btn_review">İncele</a>
                </div>
                <div class="event-item reveal">
                    <div class="event-date">
                        <span class="event-day">08</span>
                        <span class="event-month" data-i18n="month_jun">Haziran</span>
                    </div>
                    <div>
                        <span class="event-tag" data-i18n="tag_sports">Spor & Macera</span>
                        <div class="event-title" data-i18n="event_3_title">Alaçatı Rüzgar Sörfü Festivali</div>
                        <div class="event-location" data-i18n="event_3_loc">📍 Alaçatı Limanı, Çeşme</div>
                    </div>
                    <a href="#" class="btn btn-outline" data-i18n="btn_review">İncele</a>
                </div>
                <div class="event-item reveal">
                    <div class="event-date">
                        <span class="event-day">19</span>
                        <span class="event-month" data-i18n="month_jun">Haziran</span>
                    </div>
                    <div>
                        <span class="event-tag" data-i18n="tag_music">Müzik</span>
                        <div class="event-title" data-i18n="event_4_title">Fethiye Jazz Under the Stars</div>
                        <div class="event-location" data-i18n="event_4_loc">📍 Ölüdeniz Beach Club, Fethiye</div>
                    </div>
                    <a href="#" class="btn btn-outline" data-i18n="btn_review">İncele</a>
                </div>
                <div class="event-item reveal">
                    <div class="event-date">
                        <span class="event-day">04</span>
                        <span class="event-month" data-i18n="month_jul">Temmuz</span>
                    </div>
                    <div>
                        <span class="event-tag" data-i18n="tag_wellness">Wellness</span>
                        <div class="event-title" data-i18n="event_5_title">Kapadokya Yoga & Sağlıklı Yaşam Retreatı</div>
                        <div class="event-location" data-i18n="event_5_loc">📍 Museum Hotel, Uçhisar, Kapadokya</div>
                    </div>
                    <a href="#" class="btn btn-outline" data-i18n="btn_review">İncele</a>
                </div>
                <div class="event-item reveal">
                    <div class="event-date">
                        <span class="event-day">28</span>
                        <span class="event-month" data-i18n="month_jul">Temmuz</span>
                    </div>
                    <div>
                        <span class="event-tag" data-i18n="tag_maritime">Denizcilik</span>
                        <div class="event-title" data-i18n="event_6_title">Datça - Knidos Yat Rallisi</div>
                        <div class="event-location" data-i18n="event_6_loc">📍 Datça Yat Limanı</div>
                    </div>
                    <a href="#" class="btn btn-outline" data-i18n="btn_review">İncele</a>
                </div>
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
    <script>
        const DEFAULT_EVENTS_PAGE = [
            { id:1, title:{tr:'İstanbul Yemek Festivali 2026', en:'Istanbul Food Festival 2026'}, tag:{tr:'Gastronomi', en:'Gastronomy'}, day:15, month:{tr:'Mayıs', en:'May'}, loc:{tr:'📍 Beşiktaş Meydanı, İstanbul', en:'📍 Besiktas Square, Istanbul'} },
            { id:2, title:{tr:'Bodrum Uluslararası Bale Festivali', en:'Bodrum International Ballet Festival'}, tag:{tr:'Kültür & Sanat', en:'Culture & Art'}, day:22, month:{tr:'Mayıs', en:'May'}, loc:{tr:'📍 Bodrum Kalesi Açık Hava Sahnesi', en:'📍 Bodrum Castle Open Air Stage'} },
            { id:3, title:{tr:'Alaçatı Rüzgar Sörfü Festivali', en:'Alacati Windsurfing Festival'}, tag:{tr:'Spor & Macera', en:'Sport & Adventure'}, day:08, month:{tr:'Haziran', en:'June'}, loc:{tr:'📍 Alaçatı Limanı, Çeşme', en:'📍 Alacati Port, Cesme'} }
        ];

        function buildEventList(lang) {
            const data  = DioAPI.loadSync('dioreal_events_data') || DEFAULT_EVENTS_PAGE;
            const l     = lang || localStorage.getItem('dioreal_lang') || 'tr';
            const list  = document.querySelector('.event-list');
            const btnText = l === 'tr' ? 'İncele' : 'Review';
            if (!list) return;
            list.innerHTML = data.map(e => `
                <div class="event-item reveal visible">
                    <div class="event-date">
                        <span class="event-day">${e.day}</span>
                        <span class="event-month">${e.month[l] || e.month.tr || e.month}</span>
                    </div>
                    <div>
                        <span class="event-tag">${e.tag[l] || e.tag.tr || e.tag}</span>
                        <div class="event-title">${e.title[l] || e.title.tr || e.title}</div>
                        <div class="event-location">${e.loc[l] || e.loc.tr || e.loc}</div>
                    </div>
                    <a href="#" class="btn btn-outline">${btnText}</a>
                </div>
            `).join('');
        }
        buildEventList();
        DioAPI.loadAsync('dioreal_events_data', function(data) {
            if (data && Array.isArray(data)) buildEventList();
        });
        document.addEventListener('langChanged', function(e) { buildEventList(e.detail); });
    </script>
</body>
</html>

