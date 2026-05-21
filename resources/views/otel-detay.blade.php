<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otel Detayı — Dioreal Dijital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/base.css?v=2') }}">
    <link rel="stylesheet" href="{{ url('css/nav-footer.css?v=2') }}">
    <link rel="stylesheet" href="{{ url('css/components.css?v=2') }}">
    <link rel="stylesheet" href="{{ url('css/about.css?v=2') }}">
    <style>
        .detail-hero { width: 100%; height: 60vh; background-size: cover; background-position: center; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; color: #fff; }
        .detail-hero::before { content: ''; position: absolute; inset: 0; background: rgba(0,0,0,0.4); }
        .detail-hero-content { position: relative; z-index: 2; padding: 2rem; max-width: 800px; }
        .detail-title { font-family: var(--font-display); font-size: 4rem; margin-bottom: 1rem; }
        .detail-tag { font-family: var(--font-accent); font-size: 1rem; letter-spacing: 0.1em; text-transform: uppercase; }
        .detail-body { max-width: 800px; margin: 4rem auto; padding: 0 2rem; font-size: 1.1rem; line-height: 1.8; text-align: center; }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem; max-width: 1200px; margin: 0 auto 4rem; padding: 0 2rem; }
        .gallery-item { width: 100%; aspect-ratio: 4/3; object-fit: cover; border-radius: 4px; }
    </style>
</head>
<body>

    <!-- Desktop Nav (Basit) -->
    <nav id="mainNav" class="scrolled" style="background: rgba(0,0,0,0.9);">
        <div class="nav-logo-wrapper">
            <a href="{{ url('/') }}" class="nav-logo">
                <span class="logo-text" style="color:white;">DIOREAL.</span>
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}" data-i18n="nav_home">Ana Sayfa</a></li>
            <li><a href="{{ url('/oteller') }}" data-i18n="nav_hotels">Oteller</a></li>
        </ul>
    </nav>

    <div id="detail-container">
        <!-- Dinamik İçerik Buraya Gelecek -->
        <div style="height:100vh; display:flex; align-items:center; justify-content:center;">Yükleniyor...</div>
    </div>

    <!-- Footer Placeholder -->
    <footer style="background:#111; padding:3rem; text-align:center; color:white;">
        <p>© 2026 Dioreal Dijital</p>
    </footer>

    <script src="{{ url('js/i18n.js?v=2') }}"></script>
    <script>
        const currentItemId = {{ $id }};
        
        document.addEventListener('DOMContentLoaded', () => {
            const lang = localStorage.getItem('dioreal_lang') || 'tr';
            
            DioAPI.loadAsync('dioreal_hotels_data', function(data) {
                const item = data.find(x => x.id == currentItemId);
                const container = document.getElementById('detail-container');
                
                if (!item) {
                    container.innerHTML = '<div style="height:100vh;display:flex;align-items:center;justify-content:center;"><h2>Otel bulunamadı.</h2></div>';
                    return;
                }

                const name = (item.name && item.name[lang]) ? item.name[lang] : (item.name?.tr || '');
                const tag = (item.tag && item.tag[lang]) ? item.tag[lang] : (item.tag?.tr || '');
                const desc = (item.desc && item.desc[lang]) ? item.desc[lang] : (item.desc?.tr || '');
                const longDesc = (item.long_desc && item.long_desc[lang]) ? item.long_desc[lang] : (item.long_desc?.tr || desc);
                const img = item.img.startsWith('/') ? getBaseUrl() + item.img : item.img;
                
                let galleryHTML = '';
                if (item.gallery && item.gallery.length > 0) {
                    galleryHTML = '<div class="gallery-grid">' + item.gallery.map(g => `<img src="${g.startsWith('/') ? getBaseUrl() + g : g}" class="gallery-item">`).join('') + '</div>';
                }

                container.innerHTML = `
                    <div class="detail-hero" style="background-image: url('${img}');">
                        <div class="detail-hero-content">
                            <span class="detail-tag">${tag}</span>
                            <h1 class="detail-title">${name}</h1>
                        </div>
                    </div>
                    <div class="detail-body">
                        <p>${longDesc}</p>
                    </div>
                    ${galleryHTML}
                `;
            });
        });
    </script>
</body>
</html>
