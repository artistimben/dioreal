<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gezi Rehberi — Dioreal Dijital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/nav-footer.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/about.css">
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
            <li><a href="gezi-rehberi.html" class="active-page" data-i18n="nav_guide">Gezi Rehberi</a></li>
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

    <div class="page-hero" style="background-image:url('foto.img/kapadokya.jpg');">
        <div class="page-hero-content">
            <span class="page-eyebrow" data-i18n="guide_hero_eye">Keşfet & Öğren</span>
            <h1 class="page-title" data-i18n="nav_guide">Gezi <em>Rehberi</em></h1>
        </div>
    </div>

    <section class="content-section">
        <div style="text-align:center;max-width:700px;margin:0 auto 5rem;" class="reveal">
            <span class="content-eyebrow" style="display:block;" data-i18n="guide_exp_eye">Uzman Tavsiyeleri</span>
            <h2 class="content-title" data-i18n="guide_exp_title">Doğru kararları <em>kolayca</em> verin</h2>
            <p class="content-body" data-i18n="guide_exp_p1">Deneyimli seyahat editörlerimizin hazırladığı destinasyon rehberleri, pratik ipuçları ve sezonluk önerilerle seyahat planlamanızı kolaylaştırıyoruz.</p>
        </div>
        <div class="card-grid">
            <div class="card reveal">
                <div class="card-img" style="background-image:url('foto.img/bodrum.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag" data-i18n="tag_dest_guide">Destinasyon Rehberi</span>
                    <h3 class="card-title">Bodrum Komple Rehber</h3>
                    <p class="card-desc" data-i18n="guide_bodrum_desc">Gidilecek plajlar, gece hayatı, en iyi restoranlar ve gizli koylar. Bodrum'da yapılacak her şey.</p>
                </div>
            </div>
            <div class="card reveal" style="transition-delay:0.1s">
                <div class="card-img" style="background-image:url('foto.img/kapadokya.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag" data-i18n="tag_dest_guide">Destinasyon Rehberi</span>
                    <h3 class="card-title">Kapadokya Gizli Köşeleri</h3>
                    <p class="card-desc" data-i18n="guide_kapadokya_desc">Turistik yerler dışında, peri bacalarının arasında saklı kalmış otantik köyler ve benzersiz deneyimler.</p>
                </div>
            </div>
            <div class="card reveal" style="transition-delay:0.2s">
                <div class="card-img" style="background-image:url('foto.img/cesme.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag" data-i18n="tag_season_guide">Sezon Rehberi</span>
                    <h3 class="card-title">Çeşme & Alaçatı Mayıs</h3>
                    <p class="card-desc" data-i18n="guide_cesme_desc">Kalabalık öncesi Çeşme'nin en keyifli hali. Rüzgar festivali, lale bahçeleri ve sakin kafeler.</p>
                </div>
            </div>
            <div class="card reveal" style="transition-delay:0.3s">
                <div class="card-img" style="background-image:url('foto.img/japonya.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag" data-i18n="tag_abroad_guide">Yurtdışı Rehberi</span>
                    <h3 class="card-title">Japonya İlk Ziyaret</h3>
                    <p class="card-desc" data-i18n="guide_japan_desc">Tokyo'dan Kyoto'ya, şehirden kırsala. 14 günlük ideal Japonya rotası ve bilinmesi gereken her şey.</p>
                </div>
            </div>
            <div class="card reveal" style="transition-delay:0.4s">
                <div class="card-img" style="background-image:url('foto.img/maldivler.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag" data-i18n="tag_honey_guide">Balayı Rehberi</span>
                    <h3 class="card-title">Maldivler'de Balayı</h3>
                    <p class="card-desc" data-i18n="guide_maldives_desc">Hangi ada, hangi resort? Bütçenize göre en iyi Maldivler seçeneği ve seyahat dönemi tavsiyeleri.</p>
                </div>
            </div>
            <div class="card reveal" style="transition-delay:0.5s">
                <div class="card-img" style="background-image:url('foto.img/fethiye.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag" data-i18n="tag_nature_guide">Doğa Rehberi</span>
                    <h3 class="card-title">Fethiye Tekne Turu</h3>
                    <p class="card-desc" data-i18n="guide_fethiye_desc">12 Adalar, Ölüdeniz, Kelebekler Vadisi. Fethiye'nin en güzel koylarına yat turuyla nasıl gidilir.</p>
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
    <script src="js/i18n.js"></script>
    <script src="js/common.js"></script>
    <script src="js/nav.js"></script>
    <script>
        const DEFAULT_GUIDE_PAGE = [
            { id:1, title:{tr:'Bodrum Komple Rehber', en:'Bodrum Complete Guide'}, tag:{tr:'Destinasyon Rehberi', en:'Destination Guide'}, img:'foto.img/bodrum.jpg', desc:{ tr:"Gidilecek plajlar, gece hayatı, en iyi restoranlar ve gizli koylar. Bodrum'da yapılacak her şey.", en:"Beaches to go, night life, best restaurants and hidden bays. Everything to do in Bodrum." } },
            { id:2, title:{tr:'Kapadokya Gizli Köşeleri', en:'Hidden Corners of Cappadocia'}, tag:{tr:'Destinasyon Rehberi', en:'Destination Guide'}, img:'foto.img/kapadokya.jpg', desc:{ tr:"Turistik yerler dışında, peri bacalarının arasında saklı kalmış otantik köyler.", en:"Authentic villages hidden among fairy chimneys, apart from tourist attractions." } },
            { id:3, title:{tr:'Çeşme & Alaçatı Mayıs', en:'Cesme & Alacati May'}, tag:{tr:'Sezon Rehberi', en:'Season Guide'}, img:'foto.img/cesme.jpg', desc:{ tr:"Kalabalık öncesi Çeşme'nin en keyifli hali. Rüzgar festivali ve sakin kafeler.", en:"The most pleasant state of Cesme before the crowd. Wind festival and quiet cafes." } }
        ];

        function buildGuideCards(lang) {
            const data = DioAPI.loadSync('dioreal_guide_data') || DEFAULT_GUIDE_PAGE;
            const l    = lang || localStorage.getItem('dioreal_lang') || 'tr';
            const grid = document.querySelector('.card-grid');
            if (!grid) return;
            grid.innerHTML = data.map(g => `
                <div class="card reveal visible">
                    <div class="card-img" style="background-image:url('${g.img}')"></div>
                    <div class="card-body">
                        <span class="card-tag">${g.tag[l] || g.tag.tr || g.tag}</span>
                        <h3 class="card-title">${g.title[l] || g.title.tr || g.title}</h3>
                        <p class="card-desc">${g.desc[l] || g.desc.tr}</p>
                    </div>
                </div>
            `).join('');
        }
        buildGuideCards();
        DioAPI.loadAsync('dioreal_guide_data', function(data) {
            if (data && Array.isArray(data)) buildGuideCards();
        });
        document.addEventListener('langChanged', function(e) { buildGuideCards(e.detail); });
    </script>
</body>
</html>

