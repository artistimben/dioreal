<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran Detayı — Dioreal Dijital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Jost:wght@200;300;400;500;600&family=Oswald:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/base.css?v={{ time() }}') }}">
    <link rel="stylesheet" href="{{ url('css/nav-footer.css?v={{ time() }}') }}">
    <link rel="stylesheet" href="{{ url('css/components.css?v={{ time() }}') }}">
    <link rel="stylesheet" href="{{ url('css/about.css?v={{ time() }}') }}">
    <style>
        .detail-hero { width: 100%; height: 60vh; background-size: cover; background-position: center; position: relative; display: flex; align-items: center; justify-content: center; text-align: center; color: #fff; }
        .detail-hero::before { content: ''; position: absolute; inset: 0; background: rgba(0,0,0,0.5); }
        .detail-hero-content { position: relative; z-index: 2; padding: 2rem; max-width: 800px; }
        .detail-title { font-family: var(--font-display); font-size: 4rem; margin-bottom: 1rem; color: #c4a47c; }
        .detail-tag { font-family: var(--font-accent); font-size: 1rem; letter-spacing: 0.1em; text-transform: uppercase; }
        .detail-body { max-width: 800px; margin: 4rem auto; padding: 0 2rem; font-size: 1.1rem; line-height: 1.8; text-align: center; }
        .gallery-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem; max-width: 1200px; margin: 0 auto 4rem; padding: 0 2rem; }
        .gallery-item { width: 100%; aspect-ratio: 4/3; object-fit: cover; border-radius: 4px; }
    </style>
</head>
<body>
    <nav id="mainNav">
        <div class="nav-logo-wrapper"><a href="{{ url("/") }}" class="nav-logo"><span class="logo-text">DIOREAL.</span></a></div>
        <ul class="nav-links">
            <li><a href="{{ url("/") }}">Ana Sayfa</a></li>
            <li><a href="{{ url("/restoranlar") }}" class="active-page">Restoranlar</a></li>
        </ul>
        <div class="nav-right"><a href="{{ url("/admin") }}" class="btn btn-outline" style="padding:0.4rem 1rem;font-size:0.8rem;">Admin Paneli</a></div>
    </nav>

    <div class="page-hero" style="background-image: url("{{ asset($restoran->img) }}");">
        <div class="page-hero-content">
            <span class="page-eyebrow">{{ $restoran->tag["tr"] ?? "" }}</span>
            <h1 class="page-title">{{ $restoran->name["tr"] ?? "" }}</h1>
        </div>
    </div>

    <section class="content-section">
        <div class="content-grid">
            <div class="reveal">
                <h2 class="content-title">Mekan <em>Hakkında</em></h2>
                <p class="content-body">{{ $restoran->long_desc["tr"] ?? ($restoran->desc["tr"] ?? "") }}</p>
                <a href="#" class="btn btn-primary" style="margin-top:2rem;">Masa Ayırt</a>
            </div>
            <div class="reveal" style="transition-delay:0.2s">
                <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    @if($restoran->gallery)
                        @foreach($restoran->gallery as $g)
                            <img src="{{ str_starts_with($g, "data:") ? $g : asset($g) }}" style="width:100%; aspect-ratio:1; object-fit:cover; border-radius:10px;">
                        @endforeach
                    @else
                        <p>Galeri bulunmamaktadır.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
</body>
</html>
