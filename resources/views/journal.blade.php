<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal — Dioreal Dijital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/nav-footer.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/journal.css">
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
            <li><a href="etkinlikler.html" data-i18n="nav_events">Etkinlikler</a></li>
            <li><a href="journal.html" class="active-page" data-i18n="nav_journal">Journal</a></li>
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

    <div class="page-hero" style="background-image:url('foto.img/amalfi.jpg');">
        <div class="page-hero-content">
            <span class="page-eyebrow" data-i18n="journal_hero_eye">Hikayeler & İçgörüler</span>
            <h1 class="page-title" data-i18n="nav_journal">Dioreal <em>Journal</em></h1>
        </div>
    </div>

    <section class="content-section">
        <!-- Featured + Sidebar -->
        <div class="journal-grid reveal">
            <div class="journal-featured">
                <img src="foto.img/japonya.jpg" alt="Japonya">
                <div class="journal-featured-info">
                    <span class="card-tag" data-i18n="tag_abroad_asia">Yurtdışı · Asya</span>
                    <div class="journal-title" style="font-family: var(--font-display); font-size: 2rem; font-weight: 300; margin: 1rem 0;" data-i18n="journal_1_title">Japonya'da Çay Seremonisi: Bir Saatlik Sonsuzluk</div>
                    <p style="color:var(--dark-gray);font-size:.95rem;line-height:1.8;margin-bottom:1.5rem;" data-i18n="journal_1_desc">Kyoto'nun arka sokaklarında, turizmden uzak küçük bir çay evinde yaşadığımız deneyim... Wabi-sabi felsefesinin tam ortasında, bir fincan yeşil çay ile her şeyin durduğu o anı anlatıyoruz.</p>
                    <a href="#" class="btn btn-outline" data-i18n="btn_continue_reading">Okumaya Devam Et</a>
                </div>
            </div>
            <div class="journal-side">
                <div class="journal-side-item">
                    <img src="foto.img/maldivler.jpg" alt="Maldivler">
                    <div>
                        <span class="journal-date" data-i18n="date_apr22">22 Nisan 2026</span>
                        <div class="journal-title" data-i18n="journal_2_title">Su Üstü Villada Bir Hafta: Gerçekten Değer mi?</div>
                    </div>
                </div>
                <div class="journal-side-item">
                    <img src="foto.img/bodrum.jpg" alt="Bodrum">
                    <div>
                        <span class="journal-date" data-i18n="date_apr15">15 Nisan 2026</span>
                        <div class="journal-title" data-i18n="journal_3_title">Bodrum'da Bir Yaz: Sezon Öncesi Sessizlik</div>
                    </div>
                </div>
                <div class="journal-side-item">
                    <img src="foto.img/kapadokya.jpg" alt="Kapadokya">
                    <div>
                        <span class="journal-date" data-i18n="date_apr8">8 Nisan 2026</span>
                        <div class="journal-title" data-i18n="journal_4_title">Kapadokya'da Balon: Pişman Olmayacaksınız</div>
                    </div>
                </div>
                <div class="journal-side-item">
                    <img src="foto.img/patagonya.jpg" alt="Patagonya">
                    <div>
                        <span class="journal-date" data-i18n="date_apr1">1 Nisan 2026</span>
                        <div class="journal-title" data-i18n="journal_5_title">Patagonya'nın Uçsuz Bucaksız Sessizliğinde</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- More Articles -->
        <h2 class="content-title reveal" style="margin-bottom:2.5rem;" data-i18n="journal_latest_title">Son <em>Yazılar</em></h2>
        <div class="card-grid">
            <div class="card reveal">
                <div class="card-img" style="background-image:url('foto.img/cesme.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag" data-i18n="tag_turkey_aegean">Türkiye · Ege</span>
                    <h3 class="card-title" data-i18n="journal_6_title">Alaçatı'nın Gizli Kalmış Köşeleri</h3>
                    <p class="card-desc" data-i18n="journal_6_desc">Turistlerin bilmediği sokaklar, gerçek yerel tatlar ve en iyi gün batımı noktaları.</p>
                </div>
            </div>
            <div class="card reveal" style="transition-delay:0.1s">
                <div class="card-img" style="background-image:url('foto.img/norvec.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag" data-i18n="tag_abroad_neurope">Yurtdışı · Kuzey Avrupa</span>
                    <h3 class="card-title" data-i18n="journal_7_title">Norveç Fiyortlarında Gün Batımı</h3>
                    <p class="card-desc" data-i18n="journal_7_desc">Gece yarısı güneşinin altında küçük bir kayıkla Hardangerfjord'u kat etmenin hikayesi.</p>
                </div>
            </div>
            <div class="card reveal" style="transition-delay:0.2s">
                <div class="card-img" style="background-image:url('foto.img/sahra.jpg');"></div>
                <div class="card-body">
                    <span class="card-tag" data-i18n="tag_abroad_africa">Yurtdışı · Afrika</span>
                    <h3 class="card-title" data-i18n="journal_8_title">Sahra'da Yıldızların Altında Uyumak</h3>
                    <p class="card-desc" data-i18n="journal_8_desc">Lüks çadır, yüksek kum tepeleri ve şehrin gürültüsünden sonunda kaçmanın tarifi.</p>
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
        const DEFAULT_JOURNAL_PAGE = [
            { id:1, title:{tr:"Japonya'da Çay Seremonisi", en:"Tea Ceremony in Japan"}, tag:{tr:'Yurtdışı · Asya', en:'Abroad · Asia'}, date:'22 Nisan 2026', img:'foto.img/japonya.jpg', desc:{ tr:"Kyoto'nun arka sokaklarında yaşadığımız benzersiz çay deneyimi.", en:"Unique tea experience we had in the back streets of Kyoto." } },
            { id:2, title:{tr:'Su Üstü Villada Bir Hafta', en:'A Week in an Overwater Villa'}, tag:{tr:'Konaklama', en:'Accommodation'}, date:'15 Nisan 2026', img:'foto.img/maldivler.jpg', desc:{ tr:"Maldivler'de su üstü villa deneyimi gerçekten değer mi?", en:"Is the overwater villa experience in the Maldives really worth it?" } },
            { id:3, title:{tr:'Bodrum\'da Bir Yaz: Sessizlik', en:'A Summer in Bodrum: Silence'}, tag:{tr:'Türkiye · Ege', en:'Turkey · Aegean'}, date:'10 Nisan 2026', img:'foto.img/bodrum.jpg', desc:{ tr:"Sezon öncesi Bodrum'un sakinliği ve huzuru.", en:"The peace and quiet of Bodrum before the season." } },
            { id:4, title:{tr:'Kapadokya\'da Balon Keyfi', en:'Hot Air Balloon in Cappadocia'}, tag:{tr:'Kültür · Macera', en:'Culture · Adventure'}, date:'05 Nisan 2026', img:'foto.img/kapadokya.jpg', desc:{ tr:"Peri bacaları üzerinde unutulmaz bir uçuş.", en:"An unforgettable flight over fairy chimneys." } },
            { id:5, title:{tr:'Patagonya Sessizliği', en:'Patagonia Silence'}, tag:{tr:'Yurtdışı · Doğa', en:'Abroad · Nature'}, date:'01 Nisan 2026', img:'foto.img/patagonya.jpg', desc:{ tr:"Dünyanın ucunda doğayla baş başa.", en:"Alone with nature at the end of the world." } }
        ];

        function buildJournalContent(lang) {
            const data  = DioAPI.loadSync('dioreal_journal_data') || DEFAULT_JOURNAL_PAGE;
            const l     = lang || localStorage.getItem('dioreal_lang') || 'tr';
            
            // 1. Featured Section
            const featuredArea = document.querySelector('.journal-featured');
            if (featuredArea && data[0]) {
                const feat = data[0];
                featuredArea.innerHTML = `
                    <img src="${feat.img}" alt="${feat.title[l] || feat.title.tr}">
                    <div class="journal-featured-info">
                        <span class="card-tag">${feat.tag[l] || feat.tag.tr}</span>
                        <div class="journal-title" style="font-family: var(--font-display); font-size: 2rem; font-weight: 300; margin: 1rem 0;">${feat.title[l] || feat.title.tr}</div>
                        <p style="color:var(--dark-gray);font-size:.95rem;line-height:1.8;margin-bottom:1.5rem;">${feat.desc[l] || feat.desc.tr}</p>
                        <a href="#" class="btn btn-outline">${l === 'tr' ? 'Okumaya Devam Et' : 'Continue Reading'}</a>
                    </div>
                `;
            }

            // 2. Side List (Items 2-5)
            const sideArea = document.querySelector('.journal-side');
            if (sideArea) {
                const sideItems = data.slice(1, 5);
                sideArea.innerHTML = sideItems.map(j => `
                    <div class="journal-side-item">
                        <img src="${j.img}" alt="${j.title[l] || j.title.tr}">
                        <div>
                            <span class="journal-date">${j.date}</span>
                            <div class="journal-title">${j.title[l] || j.title.tr}</div>
                        </div>
                    </div>
                `).join('');
            }

            // 3. Bottom Grid (Rest of items)
            const grid = document.querySelector('.card-grid');
            if (grid) {
                const gridItems = data.slice(5);
                if (gridItems.length === 0) {
                    grid.parentElement.style.display = 'none'; // Hide "Latest Articles" header if no items
                } else {
                    grid.parentElement.style.display = 'block';
                    grid.innerHTML = gridItems.map(j => `
                        <div class="card reveal visible">
                            <div class="card-img" style="background-image:url('${j.img}')"></div>
                            <div class="card-body">
                                <span class="card-tag">${j.tag[l] || j.tag.tr} | ${j.date}</span>
                                <h3 class="card-title">${j.title[l] || j.title.tr}</h3>
                                <p class="card-desc">${j.desc[l] || j.desc.tr}</p>
                            </div>
                        </div>
                    `).join('');
                }
            }
        }
        buildJournalContent();
        DioAPI.loadAsync('dioreal_journal_data', function(data) {
            if (data && Array.isArray(data)) buildJournalContent();
        });
        document.addEventListener('langChanged', function(e) { buildJournalContent(e.detail); });
    </script>
</body>
</html>

