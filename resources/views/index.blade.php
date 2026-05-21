<!DOCTYPE html>
<html lang="tr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dioreal Dijital — Global Deneyim & Medya Platformu</title>
    <meta name="description"
        content="Türkiye ve dünyada seçkin deneyimlerin kapısını aralıyoruz. Lüks oteller, yatlar ve yaşam tarzı markaları için yeni nesil medya platformu.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/nav-footer.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/home.css">
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
            <li><a href="index.html" class="active-page" data-i18n="nav_home">Ana Sayfa</a></li>
            <li><a href="hakkimizda.html" data-i18n="nav_about">Hakkımızda</a></li>
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

    <!-- Fullscreen Nav -->
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
            <li class="lang-switch" style="font-size: 1.5rem; font-family: var(--font-display); justify-content: center; margin-top:3rem;">
                <span id="lang-tr-fs" class="lang-btn active">TR</span> | <span id="lang-en-fs" class="lang-btn">EN</span>
            </li>
        </ul>
    </div>

    <!-- NEW: Dynamic Hero Area -->
    <section class="hero">
        <div class="hero-slider">
            <div class="hero-slide active"
                style="background-image:url('foto.img/hero_4k.jpg')">
            </div>
            <div class="hero-slide"
                style="background-image:url('foto.img/hero_slide_2.jpg')">
            </div>
            <div class="hero-slide"
                style="background-image:url('foto.img/hero_slide_3.jpg')">
            </div>
        </div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title reveal">
            </h1>
            <div class="hero-cta-group reveal" style="transition-delay: 0.2s;">
                <a href="https://wa.me/905320000000" class="btn btn-outline" data-i18n="btn_contact">İletişime Geç</a>
            </div>
        </div>
    </section>

    <!-- OLD: Marquee -->
    <div class="marquee">
        <div class="marquee-track">
            <!-- SET A -->
            <div class="marquee-item"><span data-i18n="dest_istanbul">İstanbul</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_bodrum">Bodrum</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_fethiye">Fethiye</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_kapadokya">Kapadokya</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_cesme">Çeşme</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_kas">Kaş</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_datca">Datça</span> <span class="marquee-dot">◆</span></div>
            <!-- SET B -->
            <div class="marquee-item"><span data-i18n="dest_istanbul">İstanbul</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_bodrum">Bodrum</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_fethiye">Fethiye</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_kapadokya">Kapadokya</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_cesme">Çeşme</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_kas">Kaş</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_datca">Datça</span> <span class="marquee-dot">◆</span></div>
            <!-- SET C -->
            <div class="marquee-item"><span data-i18n="dest_istanbul">İstanbul</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_bodrum">Bodrum</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_fethiye">Fethiye</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_kapadokya">Kapadokya</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_cesme">Çeşme</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_kas">Kaş</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_datca">Datça</span> <span class="marquee-dot">◆</span></div>
            <!-- SET D -->
            <div class="marquee-item"><span data-i18n="dest_istanbul">İstanbul</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_bodrum">Bodrum</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_fethiye">Fethiye</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_kapadokya">Kapadokya</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_cesme">Çeşme</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_kas">Kaş</span> <span class="marquee-dot">◆</span></div>
            <div class="marquee-item"><span data-i18n="dest_datca">Datça</span> <span class="marquee-dot">◆</span></div>
        </div>
    </div>

    <!-- NEW ABOUT SECTION (BLACK TOMATO STYLE) -->
    <section class="bt-about-section" id="hakkimizda" style="padding: 7rem 5rem; text-align: center; background: var(--white);">
        <div style="max-width: 800px; margin: 0 auto 5rem;">
            <h2 data-i18n="man_eyebrow" style="font-family: var(--font-condensed); font-size: 2.5rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 2rem; color: var(--near-black);">BU AYIN SEÇKİNLERİ</h2>
            <p data-i18n="man_p1" style="font-size: 1.1rem; line-height: 1.8; color: var(--dark-gray);">Sizler için özenle seçtiğimiz bu ayın en trend otel, restoran, yat ve plaj lokasyonlarının ardındaki eşsiz hikayeleri keşfedin. Sıradanlığın ötesinde anılar biriktirmeniz için tasarlanmış özel deneyimler.</p>
        </div>
        <div class="bt-about-grid" style="display: grid; gap: 2rem; text-align: left;">
            <!-- Trend Otel -->
            <div class="bt-about-card" style="aspect-ratio: 3/4; position: relative; overflow: hidden; background: var(--near-black); cursor: pointer; transition: transform 0.4s;">
                <img src="foto.img/about_safari.jpg" alt="Trend Otel" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem; background: linear-gradient(transparent, rgba(0,0,0,0.85)); color: white; pointer-events: none;">
                    <div style="font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 0.5rem; color: rgba(255,255,255,0.8);" data-i18n="trend_otel">Trend Otel</div>
                    <h3 style="font-family: var(--font-display); font-size: 1.8rem; margin-bottom: 1rem; font-weight: 400;" data-i18n="trend_otel_title">Kassandra Villa</h3>
                    <p style="font-size: 0.85rem; line-height: 1.6; opacity: 0.9; margin: 0;" data-i18n="kassandra_p">Ege'nin gizli kalmış koylarında uyanmanın eşsiz hissi.</p>
                </div>
            </div>
            <!-- Trend Restoran -->
            <div class="bt-about-card" style="aspect-ratio: 3/4; position: relative; overflow: hidden; background: var(--near-black); cursor: pointer; transition: transform 0.4s;">
                <img src="foto.img/rest_mikla.jpg" alt="Trend Restoran" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem; background: linear-gradient(transparent, rgba(0,0,0,0.85)); color: white; pointer-events: none;">
                    <div style="font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 0.5rem; color: rgba(255,255,255,0.8);" data-i18n="trend_rest">Trend Restoran</div>
                    <h3 style="font-family: var(--font-display); font-size: 1.8rem; margin-bottom: 1rem; font-weight: 400;" data-i18n="trend_rest_title">Melengeç</h3>
                    <p style="font-size: 0.85rem; line-height: 1.6; opacity: 0.9; margin: 0;" data-i18n="melengec_p">Taze deniz ürünleri ile unutulmaz bir gastronomi yolculuğu.</p>
                </div>
            </div>
            <!-- Trend Yat -->
            <div class="bt-about-card" style="aspect-ratio: 3/4; position: relative; overflow: hidden; background: var(--near-black); cursor: pointer; transition: transform 0.4s;">
                <img src="foto.img/about_yacht.jpg" alt="Trend Yat" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem; background: linear-gradient(transparent, rgba(0,0,0,0.85)); color: white; pointer-events: none;">
                    <div style="font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 0.5rem; color: rgba(255,255,255,0.8);" data-i18n="trend_yat">Trend Yat</div>
                    <h3 style="font-family: var(--font-display); font-size: 1.8rem; margin-bottom: 1rem; font-weight: 400;" data-i18n="trend_yat_title">Blue Voyage</h3>
                    <p style="font-size: 0.85rem; line-height: 1.6; opacity: 0.9; margin: 0;" data-i18n="blue_p">Sonsuz mavilikte rotalar. Rüzgarın sesinden başka hiçbir şey yok.</p>
                </div>
            </div>
            <!-- Trend Beach -->
            <div class="bt-about-card" style="aspect-ratio: 3/4; position: relative; overflow: hidden; background: var(--near-black); cursor: pointer; transition: transform 0.4s;">
                <img src="foto.img/bodrum.jpg" alt="Trend Beach" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 2rem; background: linear-gradient(transparent, rgba(0,0,0,0.85)); color: white; pointer-events: none;">
                    <div style="font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; margin-bottom: 0.5rem; color: rgba(255,255,255,0.8);" data-i18n="trend_beach">Trend Beach</div>
                    <h3 style="font-family: var(--font-display); font-size: 1.8rem; margin-bottom: 1rem; font-weight: 400;" data-i18n="trend_beach_title">Rups Beach</h3>
                    <p style="font-size: 0.85rem; line-height: 1.6; opacity: 0.9; margin: 0;" data-i18n="rups_p">Altın kumlar ve kristal sular. Müziğin ritmine eşlik eden anlar.</p>
                </div>
            </div>
        </div>
    </section>
    

    
    <!-- NEW: Destinations (Türkiye) - BLACK TOMATO PHOTO 1 LAYOUT -->
    <section class="dest-section bt-horizontal-scroll" id="turkiye" style="background: var(--white); padding: 4rem 0 5rem 0; text-align: center; overflow: hidden; display: flex; flex-direction: column; align-items: center;">
        <div style="width: 100%; display: flex; justify-content: space-between; align-items: flex-end; padding: 0 5rem; margin-bottom: 3rem;">
            <div style="text-align: left;">
                <span style="font-size: 0.75rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--mid-gray);" data-i18n="dest_tr_eyebrow">SEYAHATLERİMİZİ KEŞFEDİN</span>
                <h2 style="font-family: var(--font-display); font-size: 3rem; color: var(--near-black); margin-top: 0.5rem; font-weight: 400;"><span data-i18n="dest_tr_title">Türkiye'nin</span> <em style="font-style: italic; font-weight: 300;" data-i18n="dest_tr_it">Ruhu</em></h2>
            </div>
            <p style="color: var(--dark-gray); max-width: 300px; text-align: right; font-size: 0.95rem; margin-bottom: 1rem;" data-i18n="dest_tr_desc">Benzersiz deneyimlerin ilham veren hikayesi</p>
        </div>

        <div class="dest-row" style="padding: 0 5rem; display: flex; gap: 2rem; text-align: left; width: 100vw; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; cursor: grab;">
            
            <!-- İstanbul -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/istanbul.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Metropol</div>
                    <div class="dest-name-grid" data-i18n="dest_istanbul">İstanbul</div>
                </div>
            </div>
            <!-- Bodrum -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/bodrum.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Luxury & Beach</div>
                    <div class="dest-name-grid" data-i18n="dest_bodrum">Bodrum</div>
                </div>
            </div>
            <!-- Fethiye -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/fethiye.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Nature & Yachting</div>
                    <div class="dest-name-grid" data-i18n="dest_fethiye">Fethiye</div>
                </div>
            </div>
            <!-- Kapadokya -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/kapadokya.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Culture & Magic</div>
                    <div class="dest-name-grid" data-i18n="dest_kapadokya">Kapadokya</div>
                </div>
            </div>
            <!-- Çeşme -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/cesme.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Aegean Spirit</div>
                    <div class="dest-name-grid" data-i18n="dest_cesme">Çeşme</div>
                </div>
            </div>
            <!-- Kaş -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/kas.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Boutique & Slow</div>
                    <div class="dest-name-grid" data-i18n="dest_kas">Kaş</div>
                </div>
            </div>
            <!-- Datça -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/datca.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Pure Nature</div>
                    <div class="dest-name-grid" data-i18n="dest_datca">Datça</div>
                </div>
            </div>
        </div>
    </section>

<!-- NEW: Destinations (Yurtdışı) - BLACK TOMATO PHOTO 1 LAYOUT (START YOUR JOURNEY) -->
    <section class="dest-section bt-horizontal-scroll" id="yurtdisi" style="background: var(--white); padding: 7rem 0 7rem 0; text-align: center; overflow: hidden; display: flex; flex-direction: column; align-items: center;">
        <h2 style="font-family: var(--font-condensed); font-size: 3.5rem; text-transform: uppercase; font-weight: 500; letter-spacing: 0.05em; margin-bottom: 2rem; color: var(--near-black);" data-i18n="dest_en_main">YOLCULUĞUNUZA BAŞLAYIN</h2>
        
        <ul class="bt-tabs-nav" style="display: flex; justify-content: center; gap: 3rem; list-style: none; margin-bottom: 4rem; font-size: 0.8rem; font-family: var(--font-body); letter-spacing: 0.15em; text-transform: uppercase; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 1rem; width: 90%; margin-left: auto; margin-right: auto;">
            <li style="color: rgba(0,0,0,0.5); cursor: pointer;" data-i18n="tab_popular">EN POPÜLER</li>
            <li style="border-bottom: 2px solid var(--black); padding-bottom: 1rem; margin-bottom: -1rem; color: var(--black); font-weight: bold; cursor: pointer;" data-i18n="tab_traveller">GEZGİNE GÖRE</li>
            <li style="color: rgba(0,0,0,0.5); cursor: pointer;" data-i18n="tab_month">AYA GÖRE</li>
            <li style="color: rgba(0,0,0,0.5); cursor: pointer;" data-i18n="tab_spotlight">VİTRİNDEKİLER</li>
        </ul>

        <div class="dest-row" style="padding: 0 5rem; display: flex; gap: 2rem; text-align: left; width: 100vw; overflow-x: auto; scrollbar-width: none; -ms-overflow-style: none; cursor: grab;">
            
            <!-- Maldivler -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/maldivler.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Tropik</div>
                    <div class="dest-name-grid" data-i18n="mq_mald">Maldivler</div>
                </div>
            </div>
            <!-- Japonya -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/japonya.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Asya & Kültür</div>
                    <div class="dest-name-grid" data-i18n="mq_jap">Japonya</div>
                </div>
            </div>
            <!-- Patagonya -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/patagonya.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Vahşi Doğa</div>
                    <div class="dest-name-grid" data-i18n="mq_pat">Patagonya</div>
                </div>
            </div>
            <!-- Amalfi -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/amalfi.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Akdeniz Rüyası</div>
                    <div class="dest-name-grid" data-i18n="mq_ama">Amalfi Kıyısı</div>
                </div>
            </div>
            <!-- Norveç -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/norvec.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Kuzey Işıkları</div>
                    <div class="dest-name-grid" data-i18n="mq_nor">Norveç Fiyortları</div>
                </div>
            </div>
            <!-- Sahra Çölü -->
            <div class="dest-card-h">
                <div class="dest-img-container">
                    <div class="dest-img" style="background-image:url('foto.img/sahra.jpg'); position: absolute; inset: 0; background-size: cover; background-position: center; transition: transform 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94);"></div>
                </div>
                <div class="dest-info-ext">
                    <div class="dest-region">Sonsuzluk</div>
                    <div class="dest-name-grid" data-i18n="mq_sah">Sahra Çölü</div>
                </div>
            </div>
            </div>
    </section>

    <!-- NEW: Collaborations Grid -->
    <!-- NEW: Collaborations Grid (Black Tomato Style) -->
    <style>
        .bt-logos-wrapper {
            margin-top: 4rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 5rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        .bt-logo-img {
            max-width: 140px;
            height: auto;
            opacity: 0.3;
            filter: grayscale(100%);
            transition: all 0.4s ease;
            cursor: pointer;
        }
        .bt-logo-img:hover {
            opacity: 1;
            filter: grayscale(0%);
            transform: scale(1.05);
        }
        /* Mobile adjustment */
        @media (max-width: 768px) {
            .bt-logos-wrapper { gap: 2.5rem; }
            .bt-logo-img { max-width: 100px; }
        }
    </style>
    <section class="collabs" id="referanslar" style="text-align: center; padding: 7rem 5rem; background: var(--white); border-top: 1px solid rgba(0,0,0,0.05);">
        <div class="section-header reveal" style="justify-content: center; margin-bottom: 2rem;">
            <div>
                <h2 class="section-title" data-i18n="collab_title" style="font-family: var(--font-condensed); font-size: 2.5rem; letter-spacing: 0.1em; text-transform: uppercase; margin-bottom: 1rem; color: var(--near-black); text-align: center;">MARKA & İŞ BİRLİKLERİ</h2>
                <p style="color: var(--mid-gray); font-size: 0.8rem; letter-spacing: 0.15em; text-transform: uppercase;">Güvenilir Partnerlerimiz</p>
            </div>
        </div>
        <div class="bt-logos-wrapper reveal" id="refsGrid" style="transition-delay: 0.2s;"></div>
    </section>

    <!-- OLD: Process (Süreç) -->
    <section class="process">
        <div class="section-header reveal">
            <div>
                <span class="section-label" data-i18n="proc_eyebrow">Metodoloji</span>
                <h2 class="section-title"><span data-i18n="proc_title">Nasıl</span> <em data-i18n="proc_it">Çalışıyoruz?</em></h2>
            </div>
        </div>
        <div class="process-steps">
            <div class="process-step reveal">
                <div class="step-dot"></div>
                <div class="step-n">01</div>
                <h3 class="step-h" data-i18n="proc_h1">Hayal Kurun</h3>
                <p class="step-p" data-i18n="proc_p1">Bize rüya seyahatinizi anlatın. Hayallerinizi özgürce paylaşın.</p>
            </div>
            <div class="process-step reveal" style="transition-delay: 0.1s;">
                <div class="step-dot"></div>
                <div class="step-n">02</div>
                <h3 class="step-h" data-i18n="proc_h2">Tasarlayalım</h3>
                <p class="step-p" data-i18n="proc_p2">Uzman ekibimiz size özel, detaylı bir program hazırlar.</p>
            </div>
            <div class="process-step reveal" style="transition-delay: 0.2s;">
                <div class="step-dot"></div>
                <div class="step-n">03</div>
                <h3 class="step-h" data-i18n="proc_h3">Mükemmelleştirin</h3>
                <p class="step-p" data-i18n="proc_p3">Her detayı birlikte gözden geçiririz. Tamamı ince ayrıntısına kadar planlanır.</p>
            </div>
            <div class="process-step reveal" style="transition-delay: 0.3s;">
                <div class="step-dot"></div>
                <div class="step-n">04</div>
                <h3 class="step-h" data-i18n="proc_h4">Yola Çıkın</h3>
                <p class="step-p" data-i18n="proc_p4">Tüm organizasyon hazır. Geri kalanı tamamen bizde.</p>
            </div>
        </div>
    </section>

    <!-- OLD: Testimonial -->
    <section class="testi">
        <div class="reveal">
            <blockquote class="testi-quote" data-i18n="testi_quote">
                "Dioreal Dijital ile yaptığımız iş birliği, markamızın global vizyonunu tam olarak yansıtan benzersiz
                bir deneyimdi. Detaylara gösterilen özen büyüleyiciydi."
            </blockquote>
            <p class="testi-author" data-i18n="testi_author">— Seçkin İş Ortakları</p>
        </div>
    </section>

    <!-- NEW: Footer (WhatsApp Integrated) -->
    <footer id="iletisim">
        <div class="footer-top">
            <div class="footer-brand">
                <div class="footer-logo">DIOREAL.</div>
                <p class="footer-p" data-i18n="footer_p">Seçkin destinasyonları ve premium markaları doğru kitleyle buluşturan medya
                    platformu.</p>
                <a href="https://wa.me/905320000000" class="whatsapp-cta">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                    </svg>
                    <span data-i18n="btn_contact_wa">WhatsApp İletişim</span>
                </a>
            </div>
            <div class="footer-col">
                <h4 data-i18n="footer_dest">Destinasyonlar</h4>
                <ul class="footer-links">
                    <li><a href="#" data-i18n="mq_mald">Maldivler</a></li>
                    <li><a href="#" data-i18n="mq_jap">Japonya</a></li>
                    <li><a href="#" data-i18n="mq_pat">Patagonya</a></li>
                    <li><a href="#" data-i18n="mq_ama">Amalfi Kıyısı</a></li>
                    <li><a href="#" data-i18n="mq_nor">Norveç Fiyortları</a></li>
                    <li><a href="#" data-i18n="mq_sah">Sahra Çölü</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 data-i18n="footer_serv">Hizmetler</h4>
                <ul class="footer-links">
                    <li><a href="#" data-i18n="serv_1">Balayı Paketleri</a></li>
                    <li><a href="#" data-i18n="serv_2">Aile Tatilleri</a></li>
                    <li><a href="#" data-i18n="serv_3">Macera Turları</a></li>
                    <li><a href="#" data-i18n="serv_4">Kültür Gezileri</a></li>
                    <li><a href="#" data-i18n="serv_5">Özel Jet Hizmetleri</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 data-i18n="nav_about">Sayfalar</h4>
                <ul class="footer-links">
                    <li><a href="hakkimizda.html">Hakkımızda</a></li>
                    <li><a href="oteller.html">Oteller</a></li>
                    <li><a href="yatlar.html">Yatlar</a></li>
                    <li><a href="restoranlar.html">Restoranlar</a></li>
                    <li><a href="gezi-rehberi.html">Gezi Rehberi</a></li>
                    <li><a href="etkinlikler.html">Etkinlikler</a></li>
                    <li><a href="journal.html">Journal</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 data-i18n="footer_contact">İletişim</h4>
                <ul class="footer-links" id="footerContactList">
                    <li><a href="mailto:info@diorealdijital.com">info@diorealdijital.com</a></li>
                    <li><a href="tel:+902125550100">+90 212 555 0100</a></li>
                    <li data-i18n="cont_ist">İstanbul, Türkiye</li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span id="footerCopy">© 2026 Dioreal Dijital. All Rights Reserved.</span>
            <span>Est. 15 Years of Experience</span>
        </div>
    </footer>
    <script src="js/i18n.js"></script>
    <script src="js/common.js"></script>
    <script src="js/nav.js"></script>
    <script src="js/home.js"></script>
    <script>
        /* ── Referanslar dinamik ── */
        const _svgLogo = (text, font, style, size) =>
            `data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 60'><text x='50%25' y='50%25' dominant-baseline='middle' text-anchor='middle' font-family='${font}' font-size='${size}' font-style='${style}' fill='%23000'>${text}</text></svg>`;

        const DEFAULT_REFS_IDX = [
            { id:1,  name:'Nautical',    img:_svgLogo('Nautical','serif','',24) },
            { id:2,  name:'PERDUE',      img:_svgLogo('PERDUE','sans-serif','',28) },
            { id:3,  name:'Kassandra',   img:_svgLogo('Kassandra','serif','italic',22) },
            { id:4,  name:'ZAKROS',      img:_svgLogo('ZAKROS','sans-serif','',26) },
            { id:5,  name:'HUAWEI',      img:_svgLogo('HUAWEI','sans-serif','',26) },
            { id:6,  name:'SONY',        img:_svgLogo('SONY','sans-serif','',26) },
            { id:7,  name:'oppo',        img:_svgLogo('oppo','sans-serif','',26) },
            { id:8,  name:'CapCut',      img:_svgLogo('CapCut','sans-serif','',22) },
            { id:9,  name:'Hus Wines',   img:_svgLogo('Hus Wines','serif','italic',24) },
            { id:10, name:'RUPS',        img:_svgLogo('RUPS','sans-serif','',22) },
            { id:11, name:'Despot Evi',  img:_svgLogo('Despot Evi','serif','',20) },
            { id:12, name:'BLUE VOYAGE', img:_svgLogo('BLUE VOYAGE','sans-serif','',20) }
        ];

        (function renderRefs() {
            const data  = DioAPI.loadSync('dioreal_refs_data') || DEFAULT_REFS_IDX;
            const grid  = document.getElementById('refsGrid');
            if (!grid) return;
            grid.innerHTML = data.map(r =>
                `<img class="bt-logo-img" src="${r.img}" alt="${r.name}" title="${r.name}">`
            ).join('');
        })();

        /* ── Footer iletişim dinamik ── */
        (function renderFooterContact() {
            const c = DioAPI.loadSync('dioreal_contact_data');
            if (!c || typeof c !== 'object') return;
            const lang = localStorage.getItem('dioreal_lang') || 'tr';
            const list = document.getElementById('footerContactList');
            const copy = document.getElementById('footerCopy');
            if (list) {
                list.innerHTML = `
                    ${c.email    ? `<li><a href="mailto:${c.email}">${c.email}</a></li>` : ''}
                    ${c.phone    ? `<li><a href="tel:${c.phone.replace(/\s/g,'')}">${c.phone}</a></li>` : ''}
                    <li>${lang === 'en' ? (c.address_en || c.address_tr) : c.address_tr}</li>
                    ${c.instagram && c.instagram !== '#' ? `<li><a href="${c.instagram}" target="_blank">Instagram</a></li>` : '<li><a href="#">Instagram</a></li>'}
                    ${c.linkedin  && c.linkedin  !== '#' ? `<li><a href="${c.linkedin}"  target="_blank">LinkedIn</a></li>`  : '<li><a href="#">LinkedIn</a></li>'}
                `;
            }
            if (copy && c.footer_copy) copy.innerText = c.footer_copy;
        })();

        /* ── WhatsApp butonu dinamik ── */
        (function updateWa() {
            const c = DioAPI.loadSync('dioreal_contact_data');
            if (!c || !c.whatsapp) return;
            document.querySelectorAll('a.whatsapp-cta').forEach(a => {
                a.href = `https://wa.me/${c.whatsapp}`;
            });
        })();
    </script>
</body>

</html>
