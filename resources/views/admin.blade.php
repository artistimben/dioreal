<!DOCTYPE html>
<html lang="tr">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dioreal Dijital — Premium Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #c4a47c;
            --primary-light: #e0ccaf;
            --accent: #10b981;
            --bg-dark: #0f172a;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --radius: 12px;
            --sidebar-w: 280px;
            --glass: rgba(255, 255, 255, 0.7);
            --glass-blur: blur(12px);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { 
            background: var(--bg-light); 
            color: var(--text-main); 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            height: 100vh; 
            overflow: hidden;
            display: flex;
        }



        /* Sidebar Styles */
        aside {
            width: var(--sidebar-w);
            background: var(--bg-dark);
            color: white;
            display: flex;
            flex-direction: column;
            padding: 2.5rem 1.5rem;
            transition: 0.3s;
            z-index: 100;
            height: 100vh;
        }
        .sidebar-content {
            flex: 1;
            overflow-y: auto;
            margin: 1.5rem -1rem;
            padding: 0 1rem;
        }
        /* Custom scrollbar for sidebar */
        .sidebar-content::-webkit-scrollbar { width: 4px; }
        .sidebar-content::-webkit-scrollbar-track { background: rgba(255,255,255,0.02); }
        .sidebar-content::-webkit-scrollbar-thumb { background: rgba(196, 164, 124, 0.2); border-radius: 10px; }
        .sidebar-content::-webkit-scrollbar-thumb:hover { background: var(--primary); }
        .side-logo {
            font-family: 'Playfair Display', serif; font-size: 1.5rem; font-weight: 700;
            margin-bottom: 3.5rem; padding-left: 0.5rem; display: flex; align-items: center; gap: 0.8rem;
        }
        .side-logo i { color: var(--primary); }
        
        .nav-group { margin-bottom: 2rem; }
        .nav-label { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 0.1em; color: #475569; margin-bottom: 1rem; padding-left: 0.5rem; }
        
        .nav-item {
            display: flex; align-items: center; gap: 0.8rem; padding: 0.9rem 1.2rem;
            border-radius: 10px; cursor: pointer; color: #94a3b8; transition: 0.3s;
            margin-bottom: 0.4rem; font-size: 0.95rem; font-weight: 500;
        }
        .nav-item:hover { background: rgba(255,255,255,0.05); color: white; }
        .nav-item.active { background: var(--primary); color: white; }
        .nav-item i { width: 20px; text-align: center; font-size: 1.1rem; }

        /* Main Area */
        main { flex: 1; display: flex; flex-direction: column; height: 100vh; overflow: hidden; position: relative; }
        
        header {
            height: 80px; background: var(--glass); backdrop-filter: var(--glass-blur);
            border-bottom: 1px solid var(--border);
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 2.5rem; position: sticky; top: 0; z-index: 50;
        }
        .header-title h1 { font-size: 1.25rem; font-weight: 700; }
        
        .search-container { position: relative; width: 350px; }
        .search-container input {
            width: 100%; padding: 0.7rem 1rem 0.7rem 2.8rem; border-radius: 12px;
            border: 1px solid var(--border); background: #f1f5f9; outline: none; font-size: 0.9rem;
            transition: 0.3s;
        }
        .search-container i { position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--text-muted); }
        .search-container input:focus { background: white; border-color: var(--primary); width: 400px; }

        .header-tools { display: flex; align-items: center; gap: 1.2rem; }
        .tool-btn {
            width: 40px; height: 40px; border-radius: 10px; border: 1px solid var(--border);
            display: flex; align-items: center; justify-content: center; color: var(--text-main);
            background: white; cursor: pointer; transition: 0.2s; position: relative;
        }
        .tool-btn:hover { background: #f1f5f9; transform: translateY(-2px); }
        .tool-btn.badge::after {
            content: ''; position: absolute; top: -2px; right: -2px; width: 10px; height: 10px;
            background: var(--accent); border: 2px solid white; border-radius: 50%;
        }

        .user-profile {
            display: flex; align-items: center; gap: 0.8rem; padding-left: 1.2rem; border-left: 1px solid var(--border);
        }
        .user-info { text-align: right; }
        .user-info span { display: block; font-size: 0.85rem; font-weight: 600; }
        .user-info small { color: var(--text-muted); font-size: 0.75rem; }
        .user-avatar { width: 40px; height: 40px; border-radius: 10px; background: var(--primary-light); overflow: hidden; }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }

        /* Content Area */
        .content-scroll { flex: 1; overflow-y: auto; padding: 2.5rem; scroll-behavior: smooth; }
        .page-section { display: none; }
        .page-section.active { display: block; animation: slideUp 0.5s cubic-bezier(0, 0, 0.2, 1); }
        
        @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* Dashboard View */
        .welcome-hero {
            background: linear-gradient(135deg, var(--bg-dark) 0%, #1e293b 100%);
            border-radius: 24px; padding: 3rem; color: white; margin-bottom: 2.5rem;
            position: relative; overflow: hidden;
        }
        .welcome-hero::after {
            content: ''; position: absolute; right: -50px; bottom: -50px; width: 300px; height: 300px;
            background: var(--primary); filter: blur(150px); opacity: 0.2;
        }
        .welcome-hero h2 { font-size: 2.5rem; margin-bottom: 0.5rem; font-family: 'Playfair Display', serif; }
        .welcome-hero p { color: #94a3b8; font-size: 1.1rem; }

        .stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 2.5rem; }
        .stat-card {
            background: white; padding: 1.8rem; border-radius: 20px; box-shadow: var(--shadow);
            border: 1px solid rgba(0,0,0,0.02); transition: 0.3s;
        }
        .stat-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-lg); }
        .stat-icon {
            width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; margin-bottom: 1.2rem;
        }
        .stat-icon.primary { background: rgba(196, 164, 124, 0.1); color: var(--primary); }
        .stat-icon.success { background: rgba(16, 185, 129, 0.1); color: var(--accent); }
        .stat-icon.blue { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .stat-icon.purple { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }
        
        .stat-card small { color: var(--text-muted); font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; }
        .stat-card h3 { font-size: 1.8rem; font-weight: 700; margin: 0.4rem 0; }
        .stat-trend { font-size: 0.8rem; display: flex; align-items: center; gap: 4px; }
        .stat-trend.up { color: var(--accent); }

        /* Editor Section */
        .editor-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .action-btns { display: flex; gap: 1rem; }
        .btn {
            padding: 0.8rem 1.5rem; border-radius: 12px; font-weight: 600; font-size: 0.9rem;
            cursor: pointer; border: none; transition: 0.3s; display: flex; align-items: center; gap: 0.6rem;
        }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: #b3936a; box-shadow: 0 4px 12px rgba(196, 164, 124, 0.3); }
        .btn-dark { background: var(--bg-dark); color: white; }
        .btn-dark:hover { background: #1e293b; }
        .btn-outline { background: white; border: 1px solid var(--border); color: var(--text-main); }
        .btn-outline:hover { background: #f8fafc; }

        /* Page-wise Editor Layout */
        .editor-container { display: grid; grid-template-columns: 240px 1fr; gap: 2rem; min-height: 600px; }
        .page-list { 
            background: white; border: 1px solid var(--border); border-radius: 20px; 
            padding: 1rem; display: flex; flex-direction: column; gap: 0.5rem;
            position: sticky; top: 100px; height: fit-content;
        }
        .page-link {
            padding: 0.8rem 1.2rem; border-radius: 12px; cursor: pointer; color: var(--text-muted);
            font-size: 0.9rem; font-weight: 600; transition: 0.3s; display: flex; align-items: center; gap: 0.8rem;
        }
        .page-link:hover { background: #f1f5f9; color: var(--text-main); }
        .page-link.active { background: var(--bg-dark); color: white; }
        .page-link i { width: 18px; text-align: center; }

        .editor-fields-area { display: flex; flex-direction: column; gap: 1.5rem; }
        
        .section-group { margin-bottom: 2.5rem; }
        .section-group-title { 
            font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--primary);
            margin-bottom: 1.5rem; border-bottom: 1px solid var(--border); padding-bottom: 0.5rem; font-weight: 800;
        }

        .field-group textarea:focus { border-color: var(--primary); background: white; box-shadow: 0 0 0 3px rgba(196, 164, 124, 0.05); }

        /* Media Section */
        .media-filters { display: flex; gap: 1rem; margin-bottom: 2rem; }
        .filter-pill {
            padding: 0.5rem 1.2rem; border-radius: 30px; background: white; border: 1px solid var(--border);
            font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: 0.3s;
        }
        .filter-pill.active { background: var(--bg-dark); color: white; border-color: var(--bg-dark); }

        .media-masonry {
            columns: 4 250px; column-gap: 1.5rem;
        }
        .media-item {
            break-inside: avoid; background: white; border-radius: 20px; margin-bottom: 1.5rem;
            overflow: hidden; border: 1px solid var(--border); position: relative;
            transition: 0.3s;
        }
        .media-item:hover { transform: scale(1.02); box-shadow: var(--shadow-lg); }
        .media-preview { width: 100%; display: block; }
        .media-overlay {
            position: absolute; inset: 0; background: rgba(15, 23, 42, 0.7); display: flex;
            align-items: center; justify-content: center; opacity: 0; transition: 0.3s; gap: 0.8rem;
        }
        .media-item:hover .media-overlay { opacity: 1; }
        .media-overlay .tool-btn.danger:hover { background: #fee2e2; color: #ef4444; }
        .media-overlay .tool-btn.success:hover { background: #dcfce7; color: #10b981; }
        .media-meta { padding: 1rem; border-top: 1px solid var(--border); }
        .media-meta span { display: block; font-size: 0.85rem; font-weight: 700; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
        .media-meta small { color: var(--text-muted); font-size: 0.75rem; }

        /* Toast & Animations */
        #toast {
            position: fixed; bottom: 30px; right: 30px;
            background: var(--bg-dark); color: white;
            padding: 1rem 2rem; border-radius: 16px;
            display: flex; align-items: center; gap: 12px;
            box-shadow: var(--shadow-lg); z-index: 999999;
            transform: translateY(120px); opacity: 0;
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            pointer-events: none;
        }
        #toast.show { transform: translateY(0); opacity: 1; pointer-events: auto; }
        #toast i { color: var(--accent); font-size: 1.2rem; }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* Manager Sections */
        .mgr-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .mgr-add-form {
            background: white; border: 1px solid var(--border); border-radius: 20px;
            padding: 2rem; margin-bottom: 2rem;
        }
        .mgr-add-form h4 { margin-bottom: 1.5rem; font-weight: 700; font-size: 1rem; color: var(--text-muted); }
        .mgr-form-grid {
            display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem; margin-bottom: 1.5rem;
        }
        .mgr-form-grid.full { grid-template-columns: 1fr; }
        .mgr-field label { display: block; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-muted); margin-bottom: 0.5rem; }
        .mgr-field input, .mgr-field textarea {
            width: 100%; padding: 0.8rem 1rem; border: 1px solid var(--border); border-radius: 10px;
            font-family: inherit; font-size: 0.9rem; outline: none; background: #f8fafc; transition: 0.2s;
        }
        .mgr-field input:focus, .mgr-field textarea:focus { border-color: var(--primary); background: white; }
        .mgr-field textarea { min-height: 80px; resize: vertical; }
        .mgr-img-preview {
            width: 60px; height: 60px; border-radius: 10px; object-fit: cover;
            border: 2px solid var(--border); display: block; margin-bottom: 0.5rem;
        }

        .mgr-list { display: flex; flex-direction: column; gap: 1rem; }
        .mgr-item {
            background: white; border: 1px solid var(--border); border-radius: 16px;
            overflow: hidden; transition: box-shadow 0.2s;
        }
        .mgr-item:hover { box-shadow: var(--shadow); }
        .mgr-item-row {
            display: flex; align-items: center; gap: 1.2rem; padding: 1.2rem 1.5rem;
        }
        .mgr-item-thumb {
            width: 120px; height: 90px; border-radius: 10px; object-fit: cover;
            border: 1px solid var(--border); flex-shrink: 0; background: #f1f5f9;
        }
        .mgr-item-info { flex: 1; min-width: 0; }
        .mgr-item-name { font-weight: 700; font-size: 1rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .mgr-item-tag { font-size: 0.8rem; color: var(--text-muted); margin-top: 2px; }
        .mgr-item-actions { display: flex; gap: 0.6rem; flex-shrink: 0; }
        .mgr-item-edit-area {
            border-top: 1px solid var(--border); padding: 1.5rem;
            display: none; background: #f8fafc;
        }
        .mgr-item-edit-area.open { display: block; }

        .refs-grid { display: flex; flex-wrap: wrap; gap: 1.5rem; margin-top: 1.5rem; }
        .ref-item {
            background: white; border: 1px solid var(--border); border-radius: 16px;
            padding: 1.2rem; display: flex; flex-direction: column; align-items: center; gap: 0.8rem;
            width: 180px; position: relative; transition: box-shadow 0.2s;
        }
        .ref-item:hover { box-shadow: var(--shadow); }
        .ref-item img { max-width: 130px; height: 50px; object-fit: contain; }
        .ref-item span { font-size: 0.8rem; font-weight: 600; color: var(--text-muted); text-align: center; }
        .ref-delete { position: absolute; top: 8px; right: 8px; width: 28px; height: 28px; border-radius: 8px; border: none; background: #fee2e2; color: #ef4444; cursor: pointer; font-size: 0.75rem; display: flex; align-items: center; justify-content: center; }
        .ref-delete:hover { background: #fecaca; }

        /* Responsive Breaks */
        @media (max-width: 1024px) {
            :root { --sidebar-w: 0px; }
            aside {
                position: fixed;
                left: -280px;
                top: 0;
                bottom: 0;
                width: 280px !important;
                z-index: 1000;
                transition: 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                box-shadow: 20px 0 50px rgba(0,0,0,0.3);
            }
            aside.mobile-open { left: 0; }
            main { margin-left: 0; }
            .header-tools .user-info { display: none; }
            .search-container { width: 200px; }
            .search-container input:focus { width: 250px; }
        }

        @media (max-width: 768px) {
            header { padding: 0 1rem; height: 70px; }
            .search-container { display: none; }
            .content-scroll { padding: 1.5rem; }
            .stats-row { grid-template-columns: 1fr 1fr; gap: 1rem; }
            .welcome-hero { padding: 2rem; }
            .welcome-hero h2 { font-size: 1.8rem; }
            
            .editor-container { grid-template-columns: 1fr; }
            .page-list { position: static; margin-bottom: 1.5rem; flex-direction: row; overflow-x: auto; padding: 0.5rem; }
            .page-link { white-space: nowrap; }

            .mgr-form-grid { grid-template-columns: 1fr; }
            .mgr-item-row { flex-direction: column; align-items: flex-start; gap: 1rem; }
            .mgr-item-thumb { width: 100%; height: 180px; }
            .mgr-item-actions { width: 100%; justify-content: flex-end; border-top: 1px solid var(--border); pt: 1rem; margin-top: 0.5rem; padding-top: 1rem; }
            
            .media-masonry { columns: 2 150px; }
            .contact-form-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .stats-row { grid-template-columns: 1fr; }
            .header-title h1 { font-size: 1rem; }
            .media-masonry { columns: 1; }
        }

        /* Mobile Toggle */
        .mobile-menu-toggle {
            display: none;
            width: 40px; height: 40px;
            align-items: center; justify-content: center;
            font-size: 1.2rem; cursor: pointer;
            color: var(--text-main);
            margin-right: 1rem;
        }
        @media (max-width: 1024px) {
            .mobile-menu-toggle { display: flex; }
        }
        .sidebar-overlay {
            position: fixed; inset: 0; background: rgba(0,0,0,0.5);
            z-index: 999; display: none;
        }
        .sidebar-overlay.active { display: block; }
    </style>
</head>
<body>



    <!-- Sidebar -->
    <aside>
        <div class="side-logo">
            <i class="fas fa-crown"></i>
            DIOREAL DİJİTAL
        </div>

        <div class="sidebar-content">
            <div class="nav-group">
                <p class="nav-label">Genel</p>
                <div id="nav-dashboard" class="nav-item active" onclick="navTo('dashboard', this)">
                    <i class="fas fa-th-large"></i> Dashboard
                </div>
                <div id="nav-content" class="nav-item" onclick="navTo('content', this)">
                    <i class="fas fa-edit"></i> İçerik Editörü
                </div>
                <div id="nav-preview" class="nav-item" onclick="navTo('preview', this)">
                    <i class="fas fa-desktop"></i> Canlı Önizleme
                </div>
                <div id="nav-media" class="nav-item" onclick="navTo('media', this)">
                    <i class="fas fa-images"></i> Medya Havuzu
                </div>
            </div>

            <div class="nav-group">
                <p class="nav-label">İçerik Yönetimi</p>
                <div id="nav-hotels-mgr" class="nav-item" onclick="navTo('hotels-mgr', this)">
                    <i class="fas fa-hotel"></i> Oteller
                </div>
                <div id="nav-yachts-mgr" class="nav-item" onclick="navTo('yachts-mgr', this)">
                    <i class="fas fa-ship"></i> Yatlar
                </div>
                <div id="nav-restaurants-mgr" class="nav-item" onclick="navTo('restaurants-mgr', this)">
                    <i class="fas fa-utensils"></i> Restoranlar
                </div>
                <div id="nav-refs-mgr" class="nav-item" onclick="navTo('refs-mgr', this)">
                    <i class="fas fa-handshake"></i> Referanslar
                </div>
                <div id="nav-contact-mgr" class="nav-item" onclick="navTo('contact-mgr', this)">
                    <i class="fas fa-phone-alt"></i> İletişim
                </div>
                <div id="nav-guide-mgr" class="nav-item" onclick="navTo('guide-mgr', this)">
                    <i class="fas fa-map-marked-alt"></i> Gezi Rehberi
                </div>
                <div id="nav-events-mgr" class="nav-item" onclick="navTo('events-mgr', this)">
                    <i class="fas fa-calendar-alt"></i> Etkinlikler
                </div>
                <div id="nav-journal-mgr" class="nav-item" onclick="navTo('journal-mgr', this)">
                    <i class="fas fa-book-open"></i> Journal
                </div>
            </div>
        </div>

        <div class="nav-group" style="margin-top: auto;">
            <p class="nav-label">Sistem</p>
            <div class="nav-item" onclick="navTo('settings', this)">
                <i class="fas fa-cog"></i> Ayarlar
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <div class="nav-item" style="color: #f87171;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Çıkış Yap
            </div>
        </div>
    </aside>

    <!-- Main -->
    <main>
        <header>
            <div style="display: flex; align-items: center;">
                <div class="mobile-menu-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="header-title">
                    <h1 id="pageTitle">Dashboard</h1>
                </div>
            </div>

            <div class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="İçerik, dosya veya sayfa ara..." id="globalSearch">
            </div>

            <div class="header-tools">
                <a href="index.html" target="_blank" class="tool-btn" title="Siteyi Görüntüle" style="text-decoration: none;">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <button class="tool-btn badge" title="Bildirimler">
                    <i class="far fa-bell"></i>
                </button>
                
                <div class="user-profile">
                    <div class="user-info">
                        <span>Admin User</span>
                        <small>Super Admin</small>
                    </div>
                    <div class="user-avatar">
                        <img src="https://ui-avatars.com/api/?name=Admin+User&background=c4a47c&color=fff" alt="Avatar">
                    </div>
                </div>
            </div>
        </header>

        <div class="content-scroll">
            
            <!-- Dashboard Section -->
            <section id="dashboard" class="page-section active">
                <div class="welcome-hero">
                    <h2>Merhaba, Admin!</h2>
                    <p>Web sitenizin tüm içeriklerini buradan yönetebilir, anlık olarak güncelleyebilirsiniz.</p>
                </div>

                <div class="stats-row">
                    <div class="stat-card">
                        <div class="stat-icon primary"><i class="fas fa-file-alt"></i></div>
                        <small>Toplam Metin</small>
                        <h3 id="statTotalTexts">0</h3>
                        <div class="stat-trend">TR &amp; EN Dil Desteği</div>
                    </div>
                    <div class="stat-card" style="cursor:pointer;" onclick="navTo('hotels-mgr', document.getElementById('nav-hotels-mgr'))">
                        <div class="stat-icon success"><i class="fas fa-hotel"></i></div>
                        <small>Oteller</small>
                        <h3 id="statHotels">0</h3>
                        <div class="stat-trend up"><i class="fas fa-arrow-right"></i> Yönet</div>
                    </div>
                    <div class="stat-card" style="cursor:pointer;" onclick="navTo('yachts-mgr', document.getElementById('nav-yachts-mgr'))">
                        <div class="stat-icon blue" style="background: rgba(14, 165, 233, 0.1); color: #0ea5e9;"><i class="fas fa-ship"></i></div>
                        <small>Yatlar</small>
                        <h3 id="statYachts">0</h3>
                        <div class="stat-trend up"><i class="fas fa-arrow-right"></i> Yönet</div>
                    </div>
                    <div class="stat-card" style="cursor:pointer;" onclick="navTo('restaurants-mgr', document.getElementById('nav-restaurants-mgr'))">
                        <div class="stat-icon blue"><i class="fas fa-utensils"></i></div>
                        <small>Restoranlar</small>
                        <h3 id="statRests">0</h3>
                        <div class="stat-trend up"><i class="fas fa-arrow-right"></i> Yönet</div>
                    </div>
                    <div class="stat-card" style="cursor:pointer;" onclick="navTo('refs-mgr', document.getElementById('nav-refs-mgr'))">
                        <div class="stat-icon purple"><i class="fas fa-handshake"></i></div>
                        <small>Referanslar</small>
                        <h3 id="statRefs">—</h3>
                        <div class="stat-trend up"><i class="fas fa-arrow-right"></i> Yönet</div>
                    </div>
                    <div class="stat-card" style="cursor:pointer;" onclick="navTo('guide-mgr', document.getElementById('nav-guide-mgr'))">
                        <div class="stat-icon primary" style="background: rgba(16, 185, 129, 0.1); color: var(--accent);"><i class="fas fa-map-marked-alt"></i></div>
                        <small>Gezi Rehberi</small>
                        <h3 id="statGuides">0</h3>
                        <div class="stat-trend up"><i class="fas fa-arrow-right"></i> Yönet</div>
                    </div>
                    <div class="stat-card" style="cursor:pointer;" onclick="navTo('events-mgr', document.getElementById('nav-events-mgr'))">
                        <div class="stat-icon success" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;"><i class="fas fa-calendar-alt"></i></div>
                        <small>Etkinlikler</small>
                        <h3 id="statEvents">0</h3>
                        <div class="stat-trend up"><i class="fas fa-arrow-right"></i> Yönet</div>
                    </div>
                    <div class="stat-card" style="cursor:pointer;" onclick="navTo('journal-mgr', document.getElementById('nav-journal-mgr'))">
                        <div class="stat-icon blue" style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6;"><i class="fas fa-book-open"></i></div>
                        <small>Journal</small>
                        <h3 id="statJournal">0</h3>
                        <div class="stat-trend up"><i class="fas fa-arrow-right"></i> Yönet</div>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">
                    <div class="stat-card">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                            <h4 style="font-weight: 700;">Hızlı İşlemler</h4>
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                            <button class="btn btn-outline" style="justify-content: center;" onclick="navTo('content', document.getElementById('nav-content'))">
                                <i class="fas fa-edit"></i> İçerikleri Düzenle
                            </button>
                            <button class="btn btn-outline" style="justify-content: center;" onclick="navTo('media', document.getElementById('nav-media'))">
                                <i class="fas fa-camera"></i> Medya Kütüphanesi
                            </button>
                        </div>
                    </div>
                    <div class="stat-card">
                        <h4 style="font-weight: 700; margin-bottom: 1rem;">Sistem Durumu</h4>
                        <div style="display: flex; flex-direction: column; gap: 1rem;">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <small>Live Preview</small>
                                <span style="color: var(--accent); font-weight: 700; font-size: 0.75rem;"><i class="fas fa-circle" style="font-size: 0.5rem;"></i> AKTİF</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <small>LocalStorage</small>
                                <span style="font-weight: 700; font-size: 0.75rem;">Yüklendi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Content Section -->
            <section id="content" class="page-section">
                <div class="editor-header">
                    <div>
                        <h2 style="font-size: 1.5rem; font-weight: 800;">Sayfa İçeriklerini Düzenle</h2>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">Düzenlemek istediğiniz sayfayı seçin ve metinleri güncelleyin.</p>
                    </div>
                    <div class="action-btns">
                        <button class="btn btn-outline" onclick="resetAll()"><i class="fas fa-undo"></i> Sıfırla</button>
                        <button class="btn btn-dark" onclick="copyCode()"><i class="fas fa-code"></i> Kodu Kopyala</button>
                        <button class="btn btn-primary" onclick="saveToLocal()"><i class="fas fa-save"></i> Değişiklikleri Yayınla</button>
                    </div>
                </div>

                <div class="editor-container">
                    <div class="page-list" id="pageList">
                        <!-- Pages will be listed here -->
                    </div>
                    <div class="editor-fields-area" id="editorGrid">
                        <!-- Fields will be listed here based on page selection -->
                    </div>
                </div>
            </section>

            <!-- Preview Section -->
            <section id="preview" class="page-section">
                <div class="editor-header">
                    <div>
                        <h2 style="font-size: 1.5rem; font-weight: 800;">Canlı Önizleme</h2>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">Yayınlanan değişikliklerin sitede nasıl göründüğünü inceleyin.</p>
                    </div>
                    <div class="action-btns">
                        <select id="previewPageSelect" class="btn btn-outline" style="padding: 0.5rem 1rem; border-radius: 10px; cursor: pointer;" onchange="updatePreviewFrame()">
                            <option value="index.html">Ana Sayfa</option>
                            <option value="hakkimizda.html">Hakkımızda</option>
                            <option value="oteller.html">Oteller</option>
                            <option value="yatlar.html">Yatlar</option>
                            <option value="restoranlar.html">Restoranlar</option>
                            <option value="gezi-rehberi.html">Gezi Rehberi</option>
                            <option value="etkinlikler.html">Etkinlikler</option>
                            <option value="journal.html">Journal</option>
                        </select>
                        <button class="btn btn-dark" onclick="updatePreviewFrame()"><i class="fas fa-sync-alt"></i> Yenile</button>
                    </div>
                </div>
                
                <div style="background: white; border: 1px solid var(--border); border-radius: 20px; overflow: hidden; height: calc(100vh - 250px); box-shadow: var(--shadow);">
                    <iframe id="sitePreviewFrame" src="index.html" style="width: 100%; height: 100%; border: none;"></iframe>
                </div>
            </section>

            <!-- Media Section -->
            <section id="media" class="page-section">
                <div class="editor-header">
                    <div>
                        <h2 style="font-size: 1.5rem; font-weight: 800;">Medya Havuzu</h2>
                        <p style="color: var(--text-muted); font-size: 0.9rem;">Görsel varlıkları yönetin ve yollarını kopyalayın.</p>
                    </div>
                    <button class="btn btn-primary" onclick="triggerAddNew()"><i class="fas fa-plus"></i> Görsel Ekle</button>
                </div>

                <div class="media-filters">
                    <div class="filter-pill active" onclick="filterMedia('all', this)">Tümü</div>
                    <div class="filter-pill" onclick="filterMedia('otel', this)">Oteller</div>
                    <div class="filter-pill" onclick="filterMedia('rest', this)">Restoranlar</div>
                    <div class="filter-pill" onclick="filterMedia('yat', this)">Yatlar</div>
                    <div class="filter-pill" onclick="filterMedia('hero', this)">Hero / UI</div>
                </div>

                <div class="media-masonry" id="mediaGrid">
                    <!-- Dynamic Media -->
                </div>
            </section>

            <!-- Settings Section -->
            <section id="settings" class="page-section">
                <h2 style="margin-bottom: 2rem;">Sistem Ayarları</h2>
                <div class="stat-card" style="max-width: 600px;">
                    <div class="field-group" style="margin-bottom: 1.5rem;">
                        <label>Panel Dili</label>
                        <select style="padding: 0.8rem; border-radius: 10px; border: 1px solid var(--border); outline: none;">
                            <option>Türkçe</option>
                            <option>English</option>
                        </select>
                    </div>
                    <div class="field-group" style="margin-bottom: 1.5rem;">
                        <label>Otomatik Kaydetme</label>
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <input type="checkbox" checked> <small>Değişiklikleri yerel depolamaya anında kaydet</small>
                        </div>
                    </div>
                    <button class="btn btn-primary" onclick="showToast('Ayarlar kaydedildi!')">Ayarları Kaydet</button>
                </div>
            </section>
            
            <!-- ===================== YATLAR YÖNETİMİ ===================== -->
            <section id="yachts-mgr" class="page-section">
                <div class="mgr-header">
                    <div>
                        <h2 style="font-size:1.5rem;font-weight:800;">Yatlar Yönetimi</h2>
                        <p style="color:var(--text-muted);font-size:0.9rem;">Yat kartlarını ekleyin, düzenleyin veya silin.</p>
                    </div>
                    <button class="btn btn-primary" onclick="toggleAddForm('yacht-add-form')"><i class="fas fa-plus"></i> Yeni Yat Ekle</button>
                </div>

                <div class="mgr-add-form" id="yacht-add-form" style="display:none;">
                    <h4><i class="fas fa-plus-circle" style="color:var(--primary);margin-right:0.5rem;"></i>Yeni Yat Ekle</h4>
                    <div class="mgr-form-grid">
                        <div class="mgr-field">
                            <label>Yat Adı (TR)</label>
                            <input type="text" id="new-yacht-name-tr" placeholder="Örn: Bodrum Blue">
                        </div>
                        <div class="mgr-field">
                            <label>Yat Adı (EN)</label>
                            <input type="text" id="new-yacht-name-en" placeholder="Ex: Bodrum Blue">
                        </div>
                        <div class="mgr-field">
                            <label>Tür & Uzunluk (TR)</label>
                            <input type="text" id="new-yacht-tag-tr" placeholder="Örn: Gulet · 24m">
                        </div>
                        <div class="mgr-field">
                            <label>Tür & Uzunluk (EN)</label>
                            <input type="text" id="new-yacht-tag-en" placeholder="Ex: Gulet · 24m">
                        </div>
                        <div class="mgr-field">
                            <label>Görsel Yolu</label>
                            <input type="text" id="new-yacht-img" placeholder="foto.img/yat_yeni.jpg">
                        </div>
                        <div class="mgr-field">
                            <label>Görsel Yükle</label>
                            <input type="file" accept="image/*" onchange="previewYachtImg(this)" style="padding:0.4rem;">
                        </div>
                        <div class="mgr-field">
                            <label>Açıklama (Türkçe)</label>
                            <textarea id="new-yacht-desc-tr" placeholder="Türkçe açıklama..."></textarea>
                        </div>
                        <div class="mgr-field">
                            <label>Açıklama (English)</label>
                            <textarea id="new-yacht-desc-en" placeholder="English description..."></textarea>
                        </div>
                    </div>
                    <div style="display:flex;gap:1rem;">
                        <button class="btn btn-primary" onclick="addYacht()"><i class="fas fa-save"></i> Ekle & Kaydet</button>
                        <button class="btn btn-outline" onclick="toggleAddForm('yacht-add-form')">İptal</button>
                    </div>
                </div>

                <div class="mgr-list" id="yachtMgrList"></div>
            </section>

            <!-- ===================== OTELLER YÖNETİMİ ===================== -->
            <section id="hotels-mgr" class="page-section">
                <div class="mgr-header">
                    <div>
                        <h2 style="font-size:1.5rem;font-weight:800;">Oteller Yönetimi</h2>
                        <p style="color:var(--text-muted);font-size:0.9rem;">Otel kartlarını ekleyin, düzenleyin veya silin.</p>
                    </div>
                    <button class="btn btn-primary" onclick="toggleAddForm('hotel-add-form')"><i class="fas fa-plus"></i> Yeni Otel Ekle</button>
                </div>

                <!-- Add Form -->
                <div class="mgr-add-form" id="hotel-add-form" style="display:none;">
                    <h4><i class="fas fa-plus-circle" style="color:var(--primary);margin-right:0.5rem;"></i>Yeni Otel Ekle</h4>
                    <div class="mgr-form-grid">
                        <div class="mgr-field">
                            <label>Otel Adı (TR)</label>
                            <input type="text" id="new-hotel-name-tr" placeholder="Örn: Maxx Royal Bodrum">
                        </div>
                        <div class="mgr-field">
                            <label>Otel Adı (EN)</label>
                            <input type="text" id="new-hotel-name-en" placeholder="Ex: Maxx Royal Bodrum">
                        </div>
                        <div class="mgr-field">
                            <label>Konum Etiketi (TR)</label>
                            <input type="text" id="new-hotel-tag-tr" placeholder="Örn: Bodrum, Türkiye">
                        </div>
                        <div class="mgr-field">
                            <label>Konum Etiketi (EN)</label>
                            <input type="text" id="new-hotel-tag-en" placeholder="Ex: Bodrum, Turkey">
                        </div>
                        <div class="mgr-field">
                            <label>Görsel Yolu (Önerilen: 800x600 px)</label>
                            <input type="text" id="new-hotel-img" placeholder="foto.img/otel_yeni.jpg">
                        </div>
                        <div class="mgr-field">
                            <label>veya Görsel Yükle (Önerilen: 800x600 px)</label>
                            <input type="file" accept="image/*" onchange="previewHotelImg(this)" style="padding:0.4rem;">
                        </div>
                        <div class="mgr-field">
                            <label>Açıklama (Türkçe)</label>
                            <textarea id="new-hotel-desc-tr" placeholder="Türkçe açıklama..."></textarea>
                        </div>
                        <div class="mgr-field">
                            <label>Açıklama (English)</label>
                            <textarea id="new-hotel-desc-en" placeholder="English description..."></textarea>
                        </div>
                    </div>
                    <div style="display:flex;gap:1rem;">
                        <button class="btn btn-primary" onclick="addHotel()"><i class="fas fa-save"></i> Ekle & Kaydet</button>
                        <button class="btn btn-outline" onclick="toggleAddForm('hotel-add-form')">İptal</button>
                    </div>
                </div>

                <div class="mgr-list" id="hotelMgrList"></div>
            </section>

            <!-- ===================== RESTORANLAR YÖNETİMİ ===================== -->
            <section id="restaurants-mgr" class="page-section">
                <div class="mgr-header">
                    <div>
                        <h2 style="font-size:1.5rem;font-weight:800;">Restoranlar Yönetimi</h2>
                        <p style="color:var(--text-muted);font-size:0.9rem;">Restoran kartlarını ekleyin, düzenleyin veya silin.</p>
                    </div>
                    <button class="btn btn-primary" onclick="toggleAddForm('rest-add-form')"><i class="fas fa-plus"></i> Yeni Restoran Ekle</button>
                </div>

                <div class="mgr-add-form" id="rest-add-form" style="display:none;">
                    <h4><i class="fas fa-plus-circle" style="color:var(--primary);margin-right:0.5rem;"></i>Yeni Restoran Ekle</h4>
                    <div class="mgr-form-grid">
                        <div class="mgr-field">
                            <label>Restoran Adı (TR)</label>
                            <input type="text" id="new-rest-name-tr" placeholder="Örn: Mikla">
                        </div>
                        <div class="mgr-field">
                            <label>Restoran Adı (EN)</label>
                            <input type="text" id="new-rest-name-en" placeholder="Ex: Mikla">
                        </div>
                        <div class="mgr-field">
                            <label>Konum / Kategori (TR)</label>
                            <input type="text" id="new-rest-tag-tr" placeholder="Örn: İstanbul · Fine Dining">
                        </div>
                        <div class="mgr-field">
                            <label>Konum / Kategori (EN)</label>
                            <input type="text" id="new-rest-tag-en" placeholder="Ex: Istanbul · Fine Dining">
                        </div>
                        <div class="mgr-field">
                            <label>Görsel Yolu (Önerilen: 800x600 px)</label>
                            <input type="text" id="new-rest-img" placeholder="foto.img/rest_yeni.jpg">
                        </div>
                        <div class="mgr-field">
                            <label>veya Görsel Yükle (Önerilen: 800x600 px)</label>
                            <input type="file" accept="image/*" onchange="previewRestImg(this)" style="padding:0.4rem;">
                        </div>
                        <div class="mgr-field">
                            <label>Açıklama (Türkçe)</label>
                            <textarea id="new-rest-desc-tr" placeholder="Türkçe açıklama..."></textarea>
                        </div>
                        <div class="mgr-field">
                            <label>Açıklama (English)</label>
                            <textarea id="new-rest-desc-en" placeholder="English description..."></textarea>
                        </div>
                    </div>
                    <div style="display:flex;gap:1rem;">
                        <button class="btn btn-primary" onclick="addRestaurant()"><i class="fas fa-save"></i> Ekle & Kaydet</button>
                        <button class="btn btn-outline" onclick="toggleAddForm('rest-add-form')">İptal</button>
                    </div>
                </div>

                <div class="mgr-list" id="restMgrList"></div>
            </section>

            <!-- ===================== REFERANSLAR YÖNETİMİ ===================== -->
            <section id="refs-mgr" class="page-section">
                <div class="mgr-header">
                    <div>
                        <h2 style="font-size:1.5rem;font-weight:800;">Referanslar &amp; İş Birlikleri</h2>
                        <p style="color:var(--text-muted);font-size:0.9rem;">Marka logolarını ve iş birliği isimlerini yönetin.</p>
                    </div>
                    <button class="btn btn-primary" onclick="toggleAddForm('ref-add-form')"><i class="fas fa-plus"></i> Yeni Referans Ekle</button>
                </div>

                <div class="mgr-add-form" id="ref-add-form" style="display:none;">
                    <h4><i class="fas fa-plus-circle" style="color:var(--primary);margin-right:0.5rem;"></i>Yeni Referans Ekle</h4>
                    <div class="mgr-form-grid">
                        <div class="mgr-field">
                            <label>Marka Adı</label>
                            <input type="text" id="new-ref-name" placeholder="Örn: HUAWEI">
                        </div>
                        <div class="mgr-field">
                            <label>Logo URL veya Görsel Yolu (Önerilen: 200x60 px)</label>
                            <input type="text" id="new-ref-img" placeholder="foto.img/logo_marka.png veya boş bırakın">
                        </div>
                        <div class="mgr-field">
                            <label>veya Logo Yükle (Önerilen: 200x60 px)</label>
                            <input type="file" accept="image/*" onchange="previewRefImg(this)" style="padding:0.4rem;">
                        </div>
                        <div></div>
                    </div>
                    <div style="display:flex;gap:1rem;">
                        <button class="btn btn-primary" onclick="addRef()"><i class="fas fa-save"></i> Ekle & Kaydet</button>
                        <button class="btn btn-outline" onclick="toggleAddForm('ref-add-form')">İptal</button>
                    </div>
                </div>

                <div class="refs-grid" id="refsMgrGrid"></div>
            </section>

            <!-- ===================== İLETİŞİM YÖNETİMİ ===================== -->
            <section id="contact-mgr" class="page-section">
                <div class="mgr-header">
                    <div>
                        <h2 style="font-size:1.5rem;font-weight:800;">İletişim Bilgileri</h2>
                        <p style="color:var(--text-muted);font-size:0.9rem;">Footer ve iletişim alanındaki bilgileri güncelleyin.</p>
                    </div>
                    <button class="btn btn-primary" onclick="saveContact()"><i class="fas fa-save"></i> Değişiklikleri Kaydet</button>
                </div>
                <div style="background:white;border:1px solid var(--border);border-radius:20px;padding:2rem;">
                    <div class="contact-form-grid">
                        <div class="mgr-field">
                            <label><i class="fas fa-envelope" style="color:var(--primary);margin-right:5px;"></i>E-posta Adresi</label>
                            <input type="email" id="cont-email" placeholder="info@example.com">
                        </div>
                        <div class="mgr-field">
                            <label><i class="fas fa-phone" style="color:var(--primary);margin-right:5px;"></i>Telefon Numarası</label>
                            <input type="text" id="cont-phone" placeholder="+90 212 555 0100">
                        </div>
                        <div class="mgr-field">
                            <label><i class="fab fa-whatsapp" style="color:#25d366;margin-right:5px;"></i>WhatsApp Numarası (başında + olmadan)</label>
                            <input type="text" id="cont-whatsapp" placeholder="905320000000">
                        </div>
                        <div class="mgr-field">
                            <label><i class="fas fa-map-marker-alt" style="color:var(--primary);margin-right:5px;"></i>Adres (Türkçe)</label>
                            <input type="text" id="cont-address-tr" placeholder="İstanbul, Türkiye">
                        </div>
                        <div class="mgr-field">
                            <label><i class="fas fa-map-marker-alt" style="color:var(--primary);margin-right:5px;"></i>Adres (English)</label>
                            <input type="text" id="cont-address-en" placeholder="Istanbul, Turkey">
                        </div>
                        <div class="mgr-field">
                            <label><i class="fab fa-instagram" style="color:#e1306c;margin-right:5px;"></i>Instagram Linki</label>
                            <input type="text" id="cont-instagram" placeholder="https://instagram.com/...">
                        </div>
                        <div class="mgr-field">
                            <label><i class="fab fa-linkedin" style="color:#0077b5;margin-right:5px;"></i>LinkedIn Linki</label>
                            <input type="text" id="cont-linkedin" placeholder="https://linkedin.com/...">
                        </div>
                        <div class="mgr-field">
                            <label><i class="fas fa-copyright" style="color:var(--primary);margin-right:5px;"></i>Footer Alt Yazısı</label>
                            <input type="text" id="cont-footer-copy" placeholder="© 2026 Dioreal Dijital. All Rights Reserved.">
                        </div>
                    </div>
                </div>
            </section>

            <!-- ===================== GEZİ REHBERİ YÖNETİMİ ===================== -->
            <section id="guide-mgr" class="page-section">
                <div class="mgr-header">
                    <div>
                        <h2 style="font-size:1.5rem;font-weight:800;">Gezi Rehberi Yönetimi</h2>
                        <p style="color:var(--text-muted);font-size:0.9rem;">Rehber kartlarını ekleyin, düzenleyin veya silin.</p>
                    </div>
                    <button class="btn btn-primary" onclick="toggleAddForm('guide-add-form')"><i class="fas fa-plus"></i> Yeni Rehber Ekle</button>
                </div>
                <div class="mgr-add-form" id="guide-add-form" style="display:none;">
                    <h4><i class="fas fa-plus-circle" style="color:var(--primary);margin-right:0.5rem;"></i>Yeni Rehber Ekle</h4>
                    <div class="mgr-form-grid">
                        <div class="mgr-field">
                            <label>Başlık (TR)</label>
                            <input type="text" id="new-guide-title-tr" placeholder="Örn: Bodrum Komple Rehber">
                        </div>
                        <div class="mgr-field">
                            <label>Başlık (EN)</label>
                            <input type="text" id="new-guide-title-en" placeholder="Ex: Bodrum Complete Guide">
                        </div>
                        <div class="mgr-field">
                            <label>Kategori / Etiket (TR)</label>
                            <input type="text" id="new-guide-tag-tr" placeholder="Örn: Destinasyon Rehberi">
                        </div>
                        <div class="mgr-field">
                            <label>Kategori / Etiket (EN)</label>
                            <input type="text" id="new-guide-tag-en" placeholder="Ex: Destination Guide">
                        </div>
                        <div class="mgr-field">
                            <label>Görsel Yolu</label>
                            <input type="text" id="new-guide-img" placeholder="foto.img/bodrum.jpg">
                        </div>
                        <div class="mgr-field">
                            <label>Görsel Yükle</label>
                            <input type="file" accept="image/*" onchange="previewGuideImg(this)" style="padding:0.4rem;">
                        </div>
                        <div class="mgr-field">
                            <label>Açıklama (Türkçe)</label>
                            <textarea id="new-guide-desc-tr" placeholder="Türkçe açıklama..."></textarea>
                        </div>
                        <div class="mgr-field">
                            <label>Açıklama (English)</label>
                            <textarea id="new-guide-desc-en" placeholder="English description..."></textarea>
                        </div>
                    </div>
                    <div style="display:flex;gap:1rem;">
                        <button class="btn btn-primary" onclick="addGuide()"><i class="fas fa-save"></i> Ekle & Kaydet</button>
                        <button class="btn btn-outline" onclick="toggleAddForm('guide-add-form')">İptal</button>
                    </div>
                </div>
                <div class="mgr-list" id="guideMgrList"></div>
            </section>

            <!-- ===================== ETKİNLİKLER YÖNETİMİ ===================== -->
            <section id="events-mgr" class="page-section">
                <div class="mgr-header">
                    <div>
                        <h2 style="font-size:1.5rem;font-weight:800;">Etkinlikler Yönetimi</h2>
                        <p style="color:var(--text-muted);font-size:0.9rem;">Etkinlik takvimini yönetin.</p>
                    </div>
                    <button class="btn btn-primary" onclick="toggleAddForm('event-add-form')"><i class="fas fa-plus"></i> Yeni Etkinlik Ekle</button>
                </div>
                <div class="mgr-add-form" id="event-add-form" style="display:none;">
                    <h4><i class="fas fa-plus-circle" style="color:var(--primary);margin-right:0.5rem;"></i>Yeni Etkinlik Ekle</h4>
                    <div class="mgr-form-grid">
                        <div class="mgr-field">
                            <label>Etkinlik Adı (TR)</label>
                            <input type="text" id="new-event-title-tr" placeholder="Örn: İstanbul Yemek Festivali">
                        </div>
                        <div class="mgr-field">
                            <label>Etkinlik Adı (EN)</label>
                            <input type="text" id="new-event-title-en" placeholder="Ex: Istanbul Food Festival">
                        </div>
                        <div class="mgr-field">
                            <label>Kategori (TR)</label>
                            <input type="text" id="new-event-tag-tr" placeholder="Örn: Gastronomi">
                        </div>
                        <div class="mgr-field">
                            <label>Kategori (EN)</label>
                            <input type="text" id="new-event-tag-en" placeholder="Ex: Gastronomy">
                        </div>
                        <div class="mgr-field">
                            <label>Gün (Sadece Sayı)</label>
                            <input type="number" id="new-event-day" placeholder="15">
                        </div>
                        <div class="mgr-field">
                            <label>Ay (TR)</label>
                            <input type="text" id="new-event-month-tr" placeholder="Mayıs">
                        </div>
                        <div class="mgr-field">
                            <label>Ay (EN)</label>
                            <input type="text" id="new-event-month-en" placeholder="May">
                        </div>
                        <div class="mgr-field">
                            <label>Konum (TR)</label>
                            <input type="text" id="new-event-loc-tr" placeholder="📍 Beşiktaş Meydanı, İstanbul">
                        </div>
                        <div class="mgr-field">
                            <label>Konum (EN)</label>
                            <input type="text" id="new-event-loc-en" placeholder="📍 Besiktas Square, Istanbul">
                        </div>
                    </div>
                    <div style="display:flex;gap:1rem;">
                        <button class="btn btn-primary" onclick="addEvent()"><i class="fas fa-save"></i> Ekle & Kaydet</button>
                        <button class="btn btn-outline" onclick="toggleAddForm('event-add-form')">İptal</button>
                    </div>
                </div>
                <div class="mgr-list" id="eventMgrList"></div>
            </section>

            <!-- ===================== JOURNAL YÖNETİMİ ===================== -->
            <section id="journal-mgr" class="page-section">
                <div class="mgr-header">
                    <div>
                        <h2 style="font-size:1.5rem;font-weight:800;">Journal Yönetimi</h2>
                        <p style="color:var(--text-muted);font-size:0.9rem;">Journal yazılarını yönetin.</p>
                    </div>
                    <button class="btn btn-primary" onclick="toggleAddForm('journal-add-form')"><i class="fas fa-plus"></i> Yeni Yazı Ekle</button>
                </div>
                <div class="mgr-add-form" id="journal-add-form" style="display:none;">
                    <h4><i class="fas fa-plus-circle" style="color:var(--primary);margin-right:0.5rem;"></i>Yeni Yazı Ekle</h4>
                    <div class="mgr-form-grid">
                        <div class="mgr-field">
                            <label>Yazı Başlığı (TR)</label>
                            <input type="text" id="new-journal-title-tr" placeholder="Örn: Japonya'da Çay Seremonisi">
                        </div>
                        <div class="mgr-field">
                            <label>Yazı Başlığı (EN)</label>
                            <input type="text" id="new-journal-title-en" placeholder="Ex: Tea Ceremony in Japan">
                        </div>
                        <div class="mgr-field">
                            <label>Kategori / Etiket (TR)</label>
                            <input type="text" id="new-journal-tag-tr" placeholder="Örn: Yurtdışı · Asya">
                        </div>
                        <div class="mgr-field">
                            <label>Kategori / Etiket (EN)</label>
                            <input type="text" id="new-journal-tag-en" placeholder="Ex: Abroad · Asia">
                        </div>
                        <div class="mgr-field">
                            <label>Tarih</label>
                            <input type="text" id="new-journal-date" placeholder="22 Nisan 2026">
                        </div>
                        <div class="mgr-field">
                            <label>Görsel Yolu</label>
                            <input type="text" id="new-journal-img" placeholder="foto.img/japonya.jpg">
                        </div>
                        <div class="mgr-field">
                            <label>Görsel Yükle</label>
                            <input type="file" accept="image/*" onchange="previewJournalImg(this)" style="padding:0.4rem;">
                        </div>
                        <div></div>
                        <div class="mgr-field">
                            <label>Kısa Açıklama (Türkçe)</label>
                            <textarea id="new-journal-desc-tr" placeholder="Türkçe açıklama..."></textarea>
                        </div>
                        <div class="mgr-field">
                            <label>Kısa Açıklama (English)</label>
                            <textarea id="new-journal-desc-en" placeholder="English description..."></textarea>
                        </div>
                    </div>
                    <div style="display:flex;gap:1rem;">
                        <button class="btn btn-primary" onclick="addJournal()"><i class="fas fa-save"></i> Ekle & Kaydet</button>
                        <button class="btn btn-outline" onclick="toggleAddForm('journal-add-form')">İptal</button>
                    </div>
                </div>
                <div class="mgr-list" id="journalMgrList"></div>
            </section>

        </div>
    </main>

    <input type="file" id="mediaUploader" style="display: none;" accept="image/*">

    <div id="toast">
        <i class="fas fa-circle-check"></i>
        <span id="toastMsg">İşlem başarıyla tamamlandı!</span>
    </div>

    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <script src="js/i18n.js"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('aside').classList.toggle('mobile-open');
            document.getElementById('sidebarOverlay').classList.toggle('active');
        }

        /* ============================================================
           DEFAULT DATA — mevcut hardcoded içerikten türetilmiş
        ============================================================ */
        const DEFAULT_HOTELS = [
            { id:1, name:{tr:'Maxx Royal Bodrum', en:'Maxx Royal Bodrum'}, tag:{tr:'Bodrum, Türkiye', en:'Bodrum, Turkey'}, img:'foto.img/otel_maxx_royal.jpg', desc:{ tr:'Eşsiz Ege manzarası ve ultra-lüks tesisleriyle benzersiz bir deneyim sunan 5 yıldızlı resort.', en:'A 5-star resort offering a unique experience with stunning Aegean views and ultra-luxury facilities.' } },
            { id:2, name:{tr:'Museum Hotel', en:'Museum Hotel'}, tag:{tr:'Kapadokya, Türkiye', en:'Cappadocia, Turkey'}, img:'foto.img/otel_museum.jpg', desc:{ tr:'Antik kaya oymaları içinde, tarihin derinliklerinde unutulmaz bir konaklama deneyimi.', en:'An unforgettable stay deep in history, inside ancient rock carvings.' } },
            { id:3, name:{tr:'Hillside Beach Club', en:'Hillside Beach Club'}, tag:{tr:'Fethiye, Türkiye', en:'Fethiye, Turkey'}, img:'foto.img/otel_hillside.jpg', desc:{ tr:"Özel plajı, eşsiz koyu ve lüks hizmetleriyle Türkiye'nin en prestijli tatil köyü.", en:"Turkey's most prestigious resort with its private beach, unique bay and luxury services." } },
            { id:4, name:{tr:'Soneva Jani', en:'Soneva Jani'}, tag:{tr:'Maldivler', en:'Maldives'}, img:'foto.img/otel_soneva.jpg', desc:{ tr:'Su üstü villalar, kristal berraklığında lagün ve sonsuz gökyüzü altında rüya konaklama.', en:'Overwater villas, crystal-clear lagoon and dream accommodation under endless skies.' } },
            { id:5, name:{tr:'Aman Kyoto', en:'Aman Kyoto'}, tag:{tr:'Japonya', en:'Japan'}, img:'foto.img/otel_aman.jpg', desc:{ tr:'Japon wabi-sabi felsefesini modern lüksle harmanlayan, orman içinde saklı benzersiz bir sığınak.', en:"A unique retreat hidden in the forest, blending Japan's wabi-sabi philosophy with modern luxury." } },
            { id:6, name:{tr:'Le Sirenuse', en:'Le Sirenuse'}, tag:{tr:'Amalfi Kıyısı, İtalya', en:'Amalfi Coast, Italy'}, img:'foto.img/otel_sirenuse.jpg', desc:{ tr:"Positano'nun ikonik manzarası karşısında, denizi ve bougainvillea'ları izleyen efsanevi butik otel.", en:"Legendary boutique hotel overlooking the sea and bougainvilleas, facing Positano's iconic view." } }
        ];

        const DEFAULT_RESTAURANTS = [
            { id:1, name:{tr:'Mikla', en:'Mikla'}, tag:{tr:'İstanbul · Fine Dining', en:'Istanbul · Fine Dining'}, img:'foto.img/rest_mikla.jpg', desc:{ tr:"Boğaz manzarasına hâkim terası ve Türk-İskandinav mutfağı füzyonuyla İstanbul'un efsanevi adresi.", en:"Istanbul's legendary address with its Bosphorus terrace and Turkish-Scandinavian fusion cuisine." } },
            { id:2, name:{tr:'Zuma Bodrum', en:'Zuma Bodrum'}, tag:{tr:'Bodrum · Deniz Kenarı', en:'Bodrum · Seaside'}, img:'foto.img/rest_zuma.jpg', desc:{ tr:"Japon Izakaya geleneğini modern lüksle buluşturan, Bodrum Marina'nın en prestijli restoranı.", en:"Bodrum Marina's most prestigious restaurant, blending Japanese Izakaya tradition with modern luxury." } },
            { id:3, name:{tr:'Melengeç Restaurant', en:'Melengeç Restaurant'}, tag:{tr:'Çeşme · Meyhane', en:'Cesme · Tavern'}, img:'foto.img/rest_melengec.jpg', desc:{ tr:"Ege'nin en taze deniz ürünleri, nefis zeytinyağlılar ve muhteşem Alaçatı manzarasıyla unutulmaz bir sofra.", en:"An unforgettable table with Aegean's freshest seafood, delicious olive oil dishes and Alaçatı views." } },
            { id:4, name:{tr:'Hideaway', en:'Hideaway'}, tag:{tr:'Kaş · Teras', en:'Kas · Terrace'}, img:'foto.img/rest_hideaway.jpg', desc:{ tr:"Denize 10 metre yukarıdan bakan terası ve yaratıcı Akdeniz menüsüyle Kaş'ın en romantik adresi.", en:"Kas's most romantic address with its terrace overlooking the sea and creative Mediterranean menu." } },
            { id:5, name:{tr:'Seki Restaurant', en:'Seki Restaurant'}, tag:{tr:'Kapadokya · Şarap & Yemek', en:'Cappadocia · Wine & Dine'}, img:'foto.img/rest_seki.jpg', desc:{ tr:'Çardak altında Kapadokya üzüm bağlarından derlenmiş yerel şaraplar ve Anadolu mutfağının en güzel yorumu.', en:'Local wines from Cappadocia vineyards and the finest interpretation of Anatolian cuisine under a pergola.' } },
            { id:6, name:{tr:'Ölüdeniz Terrace', en:'Ölüdeniz Terrace'}, tag:{tr:'Fethiye · Beach Club', en:'Fethiye · Beach Club'}, img:'foto.img/rest_oludeniz.jpg', desc:{ tr:'Dünyaca ünlü Ölüdeniz lagünüyle iç içe geçmiş sahil restoranı, taze balık ve kokteyller.', en:'Beachfront restaurant intertwined with the world-famous Ölüdeniz lagoon, fresh fish and cocktails.' } }
        ];

        const _svgLogo = (text, font='sans-serif', style='', size=24) =>
            `data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 60'><text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' font-family='${font}' font-size='${size}' font-style='${style}' fill='%23000'>${text}</text></svg>`;

        const DEFAULT_REFS = [
            { id:1,  name:'Nautical',      img:_svgLogo('Nautical','serif','',24) },
            { id:2,  name:'PERDUE',        img:_svgLogo('PERDUE','sans-serif','',28) },
            { id:3,  name:'Kassandra',     img:_svgLogo('Kassandra','serif','italic',22) },
            { id:4,  name:'ZAKROS',        img:_svgLogo('ZAKROS','sans-serif','',26) },
            { id:5,  name:'HUAWEI',        img:_svgLogo('HUAWEI','sans-serif','',26) },
            { id:6,  name:'SONY',          img:_svgLogo('SONY','sans-serif','',26) },
            { id:7,  name:'oppo',          img:_svgLogo('oppo','sans-serif','',26) },
            { id:8,  name:'CapCut',        img:_svgLogo('CapCut','sans-serif','',22) },
            { id:9,  name:'Hus Wines',     img:_svgLogo('Hus Wines','serif','italic',24) },
            { id:10, name:'RUPS',          img:_svgLogo('RUPS','sans-serif','',22) },
            { id:11, name:'Despot Evi',    img:_svgLogo('Despot Evi','serif','',20) },
            { id:12, name:'BLUE VOYAGE',   img:_svgLogo('BLUE VOYAGE','sans-serif','',20) }
        ];

        const DEFAULT_CONTACT = {
            email: 'info@diorealdijital.com',
            phone: '+90 212 555 0100',
            whatsapp: '905320000000',
            address_tr: 'İstanbul, Türkiye',
            address_en: 'Istanbul, Turkey',
            instagram: '#',
            linkedin: '#',
            footer_copy: '© 2026 Dioreal Dijital. All Rights Reserved.'
        };

        const DEFAULT_GUIDE = [
            { id:1, title:{tr:'Bodrum Komple Rehber', en:'Bodrum Complete Guide'}, tag:{tr:'Destinasyon Rehberi', en:'Destination Guide'}, img:'foto.img/bodrum.jpg', desc:{ tr:"Gidilecek plajlar, gece hayatı, en iyi restoranlar ve gizli koylar. Bodrum'da yapılacak her şey.", en:"Beaches to go, night life, best restaurants and hidden bays. Everything to do in Bodrum." } },
            { id:2, title:{tr:'Kapadokya Gizli Köşeleri', en:'Hidden Corners of Cappadocia'}, tag:{tr:'Destinasyon Rehberi', en:'Destination Guide'}, img:'foto.img/kapadokya.jpg', desc:{ tr:"Turistik yerler dışında, peri bacalarının arasında saklı kalmış otantik köyler.", en:"Authentic villages hidden among fairy chimneys, apart from tourist attractions." } },
            { id:3, title:{tr:'Çeşme & Alaçatı Mayıs', en:'Cesme & Alacati May'}, tag:{tr:'Sezon Rehberi', en:'Season Guide'}, img:'foto.img/cesme.jpg', desc:{ tr:"Kalabalık öncesi Çeşme'nin en keyifli hali. Rüzgar festivali ve sakin kafeler.", en:"The most pleasant state of Cesme before the crowd. Wind festival and quiet cafes." } }
        ];

        const DEFAULT_EVENTS = [
            { id:1, title:{tr:'İstanbul Yemek Festivali 2026', en:'Istanbul Food Festival 2026'}, tag:{tr:'Gastronomi', en:'Gastronomy'}, day:15, month:{tr:'Mayıs', en:'May'}, loc:{tr:'📍 Beşiktaş Meydanı, İstanbul', en:'📍 Besiktas Square, Istanbul'} },
            { id:2, title:{tr:'Bodrum Uluslararası Bale Festivali', en:'Bodrum International Ballet Festival'}, tag:{tr:'Kültür & Sanat', en:'Culture & Art'}, day:22, month:{tr:'Mayıs', en:'May'}, loc:{tr:'📍 Bodrum Kalesi Açık Hava Sahnesi', en:'📍 Bodrum Castle Open Air Stage'} },
            { id:3, title:{tr:'Alaçatı Rüzgar Sörfü Festivali', en:'Alacati Windsurfing Festival'}, tag:{tr:'Spor & Macera', en:'Sport & Adventure'}, day:08, month:{tr:'Haziran', en:'June'}, loc:{tr:'📍 Alaçatı Limanı, Çeşme', en:'📍 Alacati Port, Cesme'} }
        ];

        const DEFAULT_JOURNAL = [
            { id:1, title:{tr:"Japonya'da Çay Seremonisi", en:"Tea Ceremony in Japan"}, tag:{tr:'Yurtdışı · Asya', en:'Abroad · Asia'}, date:'22 Nisan 2026', img:'foto.img/japonya.jpg', desc:{ tr:"Kyoto'nun arka sokaklarında yaşadığımız benzersiz çay deneyimi.", en:"Unique tea experience we had in the back streets of Kyoto." } },
            { id:2, title:{tr:'Su Üstü Villada Bir Hafta', en:'A Week in an Overwater Villa'}, tag:{tr:'Konaklama', en:'Accommodation'}, date:'15 Nisan 2026', img:'foto.img/maldivler.jpg', desc:{ tr:"Maldivler'de su üstü villa deneyimi gerçekten değer mi?", en:"Is the overwater villa experience in the Maldives really worth it?" } },
            { id:3, title:{tr:'Bodrum\'da Bir Yaz: Sessizlik', en:'A Summer in Bodrum: Silence'}, tag:{tr:'Türkiye · Ege', en:'Turkey · Aegean'}, date:'10 Nisan 2026', img:'foto.img/bodrum.jpg', desc:{ tr:"Sezon öncesi Bodrum'un sakinliği ve huzuru.", en:"The peace and quiet of Bodrum before the season." } },
            { id:4, title:{tr:'Kapadokya\'da Balon Keyfi', en:'Hot Air Balloon in Cappadocia'}, tag:{tr:'Kültür · Macera', en:'Culture · Adventure'}, date:'05 Nisan 2026', img:'foto.img/kapadokya.jpg', desc:{ tr:"Peri bacaları üzerinde unutulmaz bir uçuş.", en:"An unforgettable flight over fairy chimneys." } },
            { id:5, title:{tr:'Patagonya Sessizliği', en:'Patagonia Silence'}, tag:{tr:'Yurtdışı · Doğa', en:'Abroad · Nature'}, date:'01 Nisan 2026', img:'foto.img/patagonya.jpg', desc:{ tr:"Dünyanın ucunda doğayla baş başa.", en:"Alone with nature at the end of the world." } }
        ];

        const DEFAULT_YACHTS = [
            { id:1, name:{tr:'Bodrum Blue', en:'Bodrum Blue'}, tag:{tr:'Gulet · 24m', en:'Gulet · 24m'}, img:'foto.img/yat_bodrum_blue.jpg', desc:{ tr:'8 misafir kapasiteli, teak güverteli, Türk el sanatlarıyla donatılmış geleneksel Bodrum gulet\'i.', en:'Traditional Bodrum gulet for 8 guests, with teak deck and Turkish handicrafts.' } },
            { id:2, name:{tr:'Azure Dream', en:'Azure Dream'}, tag:{tr:'Motor Yat · 35m', en:'Motor Yacht · 35m'}, img:'foto.img/yat_azure_dream.jpg', desc:{ tr:'12 misafir kapasiteli, helikopter pisti, jakuzi ve tam donanımlı modern süper yat deneyimi.', en:'Modern super yacht for 12 guests, featuring helipad, jacuzzi and full equipment.' } },
            { id:3, name:{tr:'Aegean Wind', en:'Aegean Wind'}, tag:{tr:'Yelkenli · 18m', en:'Sailing Yacht · 18m'}, img:'foto.img/yat_aegean_wind.jpg', desc:{ tr:'6 misafir için özel, rüzgarın gücüyle Ege\'yi keşfetmek isteyenler için premium yelkenli yat.', en:'Premium sailing yacht for 6 guests, for those who want to explore the Aegean with wind power.' } }
        ];

        /* ── DATA STATE ── */
        let hotelsData = [];
        let yachtsData = [];
        let restaurantsData = [];
        let refsData = [];
        let contactData = {};
        let guideData = [];
        let eventsData = [];
        let journalData = [];

        /* ── LOAD / SAVE ── */
        function loadGuides() {
            const s = DioAPI.loadSync('dioreal_guide_data');
            guideData = s ? JSON.parse(JSON.stringify(s)) : JSON.parse(JSON.stringify(DEFAULT_GUIDE));
        }
        function saveGuides() {
            DioAPI.save('dioreal_guide_data', guideData, function() {
                showToast('Rehberler kaydedildi!', 'check');
                updateDashboardStats();
            });
        }
        function loadEvents() {
            const s = DioAPI.loadSync('dioreal_events_data');
            eventsData = s ? JSON.parse(JSON.stringify(s)) : JSON.parse(JSON.stringify(DEFAULT_EVENTS));
        }
        function saveEvents() {
            DioAPI.save('dioreal_events_data', eventsData, function() {
                showToast('Etkinlikler kaydedildi!', 'check');
                updateDashboardStats();
            });
        }
        function loadJournal() {
            const s = DioAPI.loadSync('dioreal_journal_data');
            journalData = s ? JSON.parse(JSON.stringify(s)) : JSON.parse(JSON.stringify(DEFAULT_JOURNAL));
        }
        function saveJournal() {
            DioAPI.save('dioreal_journal_data', journalData, function() {
                showToast('Journal yazıları kaydedildi!', 'check');
                updateDashboardStats();
            });
        }
        function loadHotels() {
            const s = DioAPI.loadSync('dioreal_hotels_data');
            hotelsData = s ? JSON.parse(JSON.stringify(s)) : JSON.parse(JSON.stringify(DEFAULT_HOTELS));
        }
        function saveHotels() {
            DioAPI.save('dioreal_hotels_data', hotelsData, function() {
                showToast('Oteller kaydedildi!', 'check');
                updateDashboardStats();
            });
        }
        function loadYachts() {
            const s = DioAPI.loadSync('dioreal_yachts_data');
            yachtsData = s ? JSON.parse(JSON.stringify(s)) : JSON.parse(JSON.stringify(DEFAULT_YACHTS));
        }
        function saveYachts() {
            DioAPI.save('dioreal_yachts_data', yachtsData, function() {
                showToast('Yatlar kaydedildi!', 'check');
                updateDashboardStats();
            });
        }
        function loadRestaurants() {
            const s = DioAPI.loadSync('dioreal_restaurants_data');
            restaurantsData = s ? JSON.parse(JSON.stringify(s)) : JSON.parse(JSON.stringify(DEFAULT_RESTAURANTS));
        }
        function saveRestaurants() {
            DioAPI.save('dioreal_restaurants_data', restaurantsData, function() {
                showToast('Restoranlar kaydedildi!', 'check');
                updateDashboardStats();
            });
        }
        function loadRefs() {
            const s = DioAPI.loadSync('dioreal_refs_data');
            refsData = s ? JSON.parse(JSON.stringify(s)) : JSON.parse(JSON.stringify(DEFAULT_REFS));
        }
        function saveRefs() {
            DioAPI.save('dioreal_refs_data', refsData, function() {
                showToast('Referanslar kaydedildi!', 'check');
            });
        }
        function loadContact() {
            const s = DioAPI.loadSync('dioreal_contact_data');
            contactData = s ? JSON.parse(JSON.stringify(s)) : JSON.parse(JSON.stringify(DEFAULT_CONTACT));
        }
        function saveContact() {
            contactData.email       = document.getElementById('cont-email').value;
            contactData.phone       = document.getElementById('cont-phone').value;
            contactData.whatsapp    = document.getElementById('cont-whatsapp').value;
            contactData.address_tr  = document.getElementById('cont-address-tr').value;
            contactData.address_en  = document.getElementById('cont-address-en').value;
            contactData.instagram   = document.getElementById('cont-instagram').value;
            contactData.linkedin    = document.getElementById('cont-linkedin').value;
            contactData.footer_copy = document.getElementById('cont-footer-copy').value;
            DioAPI.save('dioreal_contact_data', contactData, function() {
                showToast('İletişim bilgileri kaydedildi!', 'check');
            });
        }

        /* ── HOTELS CRUD ── */
        function renderHotelsList() {
            const list = document.getElementById('hotelMgrList');
            if (!list) return;
            if (hotelsData.length === 0) {
                list.innerHTML = '<p style="padding:2rem;color:var(--text-muted);">Henüz otel eklenmemiş.</p>';
                return;
            }
            list.innerHTML = hotelsData.map(h => {
                const nameTr = (h.name && typeof h.name === 'object') ? h.name.tr : (h.name || '');
                const nameEn = (h.name && typeof h.name === 'object') ? h.name.en : '';
                const tagTr  = (h.tag && typeof h.tag === 'object') ? h.tag.tr : (h.tag || '');
                const tagEn  = (h.tag && typeof h.tag === 'object') ? h.tag.en : '';
                const descTr = (h.desc && typeof h.desc === 'object') ? h.desc.tr : (h.desc || '');
                const descEn = (h.desc && typeof h.desc === 'object') ? h.desc.en : '';

                return `
                <div class="mgr-item" id="hotel-item-${h.id}">
                    <div class="mgr-item-row">
                        <img class="mgr-item-thumb" src="${h.img}" alt="${nameTr}">
                        <div class="mgr-item-info">
                            <div class="mgr-item-name">${nameTr}</div>
                            <div class="mgr-item-tag"><i class="fas fa-map-marker-alt" style="font-size:0.7rem;margin-right:3px;color:var(--primary);"></i>${tagTr}</div>
                        </div>
                        <div class="mgr-item-actions">
                            <button class="btn btn-outline" style="padding:0.5rem 1rem;font-size:0.8rem;" onclick="toggleEditHotel(${h.id})"><i class="fas fa-edit"></i> Düzenle</button>
                            <button class="btn" style="padding:0.5rem 1rem;font-size:0.8rem;background:#fee2e2;color:#ef4444;border:none;" onclick="deleteHotel(${h.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="mgr-item-edit-area" id="hotel-edit-${h.id}">
                        <div class="mgr-form-grid">
                            <div class="mgr-field"><label>Otel Adı (TR)</label><input type="text" value="${nameTr}" oninput="updateHotelSubField(${h.id},'name','tr',this.value)"></div>
                            <div class="mgr-field"><label>Otel Adı (EN)</label><input type="text" value="${nameEn}" oninput="updateHotelSubField(${h.id},'name','en',this.value)"></div>
                            <div class="mgr-field"><label>Konum Etiketi (TR)</label><input type="text" value="${tagTr}" oninput="updateHotelSubField(${h.id},'tag','tr',this.value)"></div>
                            <div class="mgr-field"><label>Konum Etiketi (EN)</label><input type="text" value="${tagEn}" oninput="updateHotelSubField(${h.id},'tag','en',this.value)"></div>
                            <div class="mgr-field"><label>Görsel Yolu</label><input type="text" value="${h.img}" oninput="updateHotelField(${h.id},'img',this.value)"></div>
                            <div class="mgr-field"><label>Görsel Değiştir</label><input type="file" accept="image/*" onchange="replaceHotelImg(${h.id},this)"></div>
                            <div class="mgr-field"><label>Açıklama (TR)</label><textarea oninput="updateHotelDesc(${h.id},'tr',this.value)">${descTr}</textarea></div>
                            <div class="mgr-field"><label>Açıklama (EN)</label><textarea oninput="updateHotelDesc(${h.id},'en',this.value)">${descEn}</textarea></div>
                        </div>
                        <button class="btn btn-primary" style="margin-top:0.5rem;" onclick="saveHotels();toggleEditHotel(${h.id})"><i class="fas fa-save"></i> Kaydet</button>
                    </div>
                </div>
            `; }).join('');
        }
        function toggleEditHotel(id) { document.getElementById(`hotel-edit-${id}`).classList.toggle('open'); }
        function updateHotelField(id, field, val) {
            const h = hotelsData.find(x => x.id === id);
            if (h) h[field] = val;
        }
        function updateHotelSubField(id, parent, lang, val) {
            const h = hotelsData.find(x => x.id === id);
            if (h) {
                if (typeof h[parent] !== 'object') h[parent] = { tr: h[parent] || '', en: '' };
                h[parent][lang] = val;
            }
        }
        function updateHotelDesc(id, lang, val) {
            const h = hotelsData.find(x => x.id === id);
            if (h) {
                if (typeof h.desc !== 'object') h.desc = { tr: h.desc || '', en: '' };
                h.desc[lang] = val;
            }
        }
        function replaceHotelImg(id, input) {
            const file = input.files[0]; if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                const h = hotelsData.find(x => x.id === id);
                if (h) { h.img = e.target.result; renderHotelsList(); toggleEditHotel(id); showToast('Görsel güncellendi!'); }
            };
            reader.readAsDataURL(file);
        }
        function deleteHotel(id) { if (!confirm('Silinsin mi?')) return; hotelsData = hotelsData.filter(x => x.id !== id); saveHotels(); renderHotelsList(); }
        function addHotel() {
            const nameTr = document.getElementById('new-hotel-name-tr').value.trim();
            const nameEn = document.getElementById('new-hotel-name-en').value.trim();
            const tagTr  = document.getElementById('new-hotel-tag-tr').value.trim();
            const tagEn  = document.getElementById('new-hotel-tag-en').value.trim();
            const img    = _pendingHotelImg || document.getElementById('new-hotel-img').value.trim() || 'foto.img/otel_hero.jpg';
            const tr     = document.getElementById('new-hotel-desc-tr').value.trim();
            const en     = document.getElementById('new-hotel-desc-en').value.trim();
            if (!nameTr) { showToast('Otel adı zorunludur!', 'exclamation'); return; }
            hotelsData.push({ id: Date.now(), name: {tr:nameTr, en:nameEn}, tag: {tr:tagTr, en:tagEn}, img, desc: { tr, en } });
            saveHotels(); renderHotelsList(); toggleAddForm('hotel-add-form');
            ['name-tr','name-en','tag-tr','tag-en','img','desc-tr','desc-en'].forEach(s => document.getElementById('new-hotel-'+s).value = '');
            _pendingHotelImg = null;
        }
        let _pendingHotelImg = null;
        function previewHotelImg(input) {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                _pendingHotelImg = e.target.result;
                document.getElementById('new-hotel-img').value = e.target.result.substring(0, 40) + '...';
            };
            reader.readAsDataURL(file);
        }

        /* ── RESTAURANTS CRUD ── */
        function renderRestaurantsList() {
            const list = document.getElementById('restMgrList');
            if (!list) return;
            if (restaurantsData.length === 0) {
                list.innerHTML = '<p style="padding:2rem;color:var(--text-muted);">Henüz restoran eklenmemiş.</p>';
                return;
            }
            list.innerHTML = restaurantsData.map(r => {
                const nameTr = (r.name && typeof r.name === 'object') ? r.name.tr : (r.name || '');
                const nameEn = (r.name && typeof r.name === 'object') ? r.name.en : '';
                const tagTr  = (r.tag && typeof r.tag === 'object') ? r.tag.tr : (r.tag || '');
                const tagEn  = (r.tag && typeof r.tag === 'object') ? r.tag.en : '';
                const descTr = (r.desc && typeof r.desc === 'object') ? r.desc.tr : (r.desc || '');
                const descEn = (r.desc && typeof r.desc === 'object') ? r.desc.en : '';

                return `
                <div class="mgr-item" id="rest-item-${r.id}">
                    <div class="mgr-item-row">
                        <img class="mgr-item-thumb" src="${r.img}" alt="${nameTr}">
                        <div class="mgr-item-info">
                            <div class="mgr-item-name">${nameTr}</div>
                            <div class="mgr-item-tag"><i class="fas fa-map-marker-alt" style="font-size:0.7rem;margin-right:3px;color:var(--primary);"></i>${tagTr}</div>
                        </div>
                        <div class="mgr-item-actions">
                            <button class="btn btn-outline" style="padding:0.5rem 1rem;font-size:0.8rem;" onclick="toggleEditRest(${r.id})"><i class="fas fa-edit"></i> Düzenle</button>
                            <button class="btn" style="padding:0.5rem 1rem;font-size:0.8rem;background:#fee2e2;color:#ef4444;border:none;" onclick="deleteRestaurant(${r.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="mgr-item-edit-area" id="rest-edit-${r.id}">
                        <div class="mgr-form-grid">
                            <div class="mgr-field"><label>Restoran Adı (TR)</label><input type="text" value="${nameTr}" oninput="updateRestSubField(${r.id},'name','tr',this.value)"></div>
                            <div class="mgr-field"><label>Restoran Adı (EN)</label><input type="text" value="${nameEn}" oninput="updateRestSubField(${r.id},'name','en',this.value)"></div>
                            <div class="mgr-field"><label>Konum / Kategori (TR)</label><input type="text" value="${tagTr}" oninput="updateRestSubField(${r.id},'tag','tr',this.value)"></div>
                            <div class="mgr-field"><label>Konum / Kategori (EN)</label><input type="text" value="${tagEn}" oninput="updateRestSubField(${r.id},'tag','en',this.value)"></div>
                            <div class="mgr-field"><label>Görsel Yolu</label><input type="text" value="${r.img}" oninput="updateRestField(${r.id},'img',this.value)"></div>
                            <div class="mgr-field"><label>Görsel Değiştir</label><input type="file" accept="image/*" onchange="replaceRestImg(${r.id},this)"></div>
                            <div class="mgr-field"><label>Açıklama (TR)</label><textarea oninput="updateRestDesc(${r.id},'tr',this.value)">${descTr}</textarea></div>
                            <div class="mgr-field"><label>Açıklama (EN)</label><textarea oninput="updateRestDesc(${r.id},'en',this.value)">${descEn}</textarea></div>
                        </div>
                        <button class="btn btn-primary" style="margin-top:0.5rem;" onclick="saveRestaurants();toggleEditRest(${r.id})"><i class="fas fa-save"></i> Kaydet</button>
                    </div>
                </div>
            `; }).join('');
        }
        function toggleEditRest(id) { document.getElementById(`rest-edit-${id}`).classList.toggle('open'); }
        function updateRestField(id, field, val) {
            const r = restaurantsData.find(x => x.id === id);
            if (r) r[field] = val;
        }
        function updateRestSubField(id, parent, lang, val) {
            const r = restaurantsData.find(x => x.id === id);
            if (r) {
                if (typeof r[parent] !== 'object') r[parent] = { tr: r[parent] || '', en: '' };
                r[parent][lang] = val;
            }
        }
        function updateRestDesc(id, lang, val) {
            const r = restaurantsData.find(x => x.id === id);
            if (r) {
                if (typeof r.desc !== 'object') r.desc = { tr: r.desc || '', en: '' };
                r.desc[lang] = val;
            }
        }
        function replaceRestImg(id, input) {
            const file = input.files[0]; if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                const r = restaurantsData.find(x => x.id === id);
                if (r) { r.img = e.target.result; renderRestaurantsList(); toggleEditRest(id); showToast('Görsel güncellendi!'); }
            };
            reader.readAsDataURL(file);
        }
        function deleteRestaurant(id) { if (!confirm('Silinsin mi?')) return; restaurantsData = restaurantsData.filter(x => x.id !== id); saveRestaurants(); renderRestaurantsList(); }
        function addRestaurant() {
            const nameTr = document.getElementById('new-rest-name-tr').value.trim();
            const nameEn = document.getElementById('new-rest-name-en').value.trim();
            const tagTr  = document.getElementById('new-rest-tag-tr').value.trim();
            const tagEn  = document.getElementById('new-rest-tag-en').value.trim();
            const img    = _pendingRestImg || document.getElementById('new-rest-img').value.trim() || 'foto.img/rest_hero.jpg';
            const tr     = document.getElementById('new-rest-desc-tr').value.trim();
            const en     = document.getElementById('new-rest-desc-en').value.trim();
            if (!nameTr) { showToast('Restoran adı zorunludur!', 'exclamation'); return; }
            restaurantsData.push({ id: Date.now(), name: {tr:nameTr, en:nameEn}, tag: {tr:tagTr, en:tagEn}, img, desc: { tr, en } });
            saveRestaurants(); renderRestaurantsList(); toggleAddForm('rest-add-form');
            ['name-tr','name-en','tag-tr','tag-en','img','desc-tr','desc-en'].forEach(s => document.getElementById('new-rest-'+s).value = '');
            _pendingRestImg = null;
        }
        let _pendingRestImg = null;
        function previewRestImg(input) {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => { _pendingRestImg = e.target.result; document.getElementById('new-rest-img').value = e.target.result.substring(0, 40) + '...'; };
            reader.readAsDataURL(file);
        }

        /* ── REFS CRUD ── */
        function renderRefsList() {
            const grid = document.getElementById('refsMgrGrid');
            if (!grid) return;
            if (refsData.length === 0) {
                grid.innerHTML = '<p style="padding:2rem;color:var(--text-muted);">Henüz referans eklenmemiş.</p>';
                return;
            }
            grid.innerHTML = refsData.map(r => `
                <div class="ref-item" id="ref-item-${r.id}">
                    <button class="ref-delete" onclick="deleteRef(${r.id})" title="Sil"><i class="fas fa-times"></i></button>
                    <img src="${r.img}" alt="${r.name}" onerror="this.style.display='none'">
                    <span>${r.name}</span>
                </div>
            `).join('');
        }
        function deleteRef(id) {
            if (!confirm('Bu referansı silmek istediğinize emin misiniz?')) return;
            refsData = refsData.filter(x => x.id !== id);
            saveRefs();
            renderRefsList();
        }
        let _pendingRefImg = null;
        function previewRefImg(input) {
            const file = input.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => { _pendingRefImg = e.target.result; document.getElementById('new-ref-img').value = '(yüklendi)'; };
            reader.readAsDataURL(file);
        }
        function addRef() {
            const name = document.getElementById('new-ref-name').value.trim();
            if (!name) { showToast('Marka adı zorunludur!', 'exclamation'); return; }
            let img = _pendingRefImg || document.getElementById('new-ref-img').value.trim();
            if (!img || img === '(yüklendi)') {
                img = `data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 60'><text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' font-family='sans-serif' font-size='22' fill='%23000'>${name}</text></svg>`;
            }
            refsData.push({ id: Date.now(), name, img });
            _pendingRefImg = null;
            saveRefs();
            renderRefsList();
            document.getElementById('new-ref-name').value = '';
            document.getElementById('new-ref-img').value = '';
            toggleAddForm('ref-add-form');
        }

        /* ── CONTACT RENDER ── */
        function renderContactForm() {
            document.getElementById('cont-email').value       = contactData.email || '';
            document.getElementById('cont-phone').value       = contactData.phone || '';
            document.getElementById('cont-whatsapp').value    = contactData.whatsapp || '';
            document.getElementById('cont-address-tr').value  = contactData.address_tr || '';
            document.getElementById('cont-address-en').value  = contactData.address_en || '';
            document.getElementById('cont-instagram').value   = contactData.instagram || '';
            document.getElementById('cont-linkedin').value    = contactData.linkedin || '';
            document.getElementById('cont-footer-copy').value = contactData.footer_copy || '';
        }

        /* ── UTILITIES ── */
        function toggleAddForm(id) {
            const el = document.getElementById(id);
            el.style.display = el.style.display === 'none' ? 'block' : 'none';
        }
        function updateDashboardStats() {
            const el = document.getElementById('statHotels');
            if (el) el.innerText = hotelsData.length;
            const ey = document.getElementById('statYachts');
            if (ey) ey.innerText = yachtsData.length;
            const er = document.getElementById('statRests');
            if (er) er.innerText = restaurantsData.length;
            const ef = document.getElementById('statRefs');
            if (ef) ef.innerText = refsData.length;
            const eg = document.getElementById('statGuides');
            if (eg) eg.innerText = guideData.length;
            const ev = document.getElementById('statEvents');
            if (ev) ev.innerText = eventsData.length;
            const ej = document.getElementById('statJournal');
            if (ej) ej.innerText = journalData.length;
        }

        /* ── YACHTS CRUD ── */
        function renderYachtsList() {
            const list = document.getElementById('yachtMgrList');
            if (!list) return;
            list.innerHTML = yachtsData.map(y => {
                const nameTr = (y.name && typeof y.name === 'object') ? y.name.tr : (y.name || '');
                const nameEn = (y.name && typeof y.name === 'object') ? y.name.en : '';
                const tagTr  = (y.tag && typeof y.tag === 'object') ? y.tag.tr : (y.tag || '');
                const tagEn  = (y.tag && typeof y.tag === 'object') ? y.tag.en : '';
                const descTr = (y.desc && typeof y.desc === 'object') ? y.desc.tr : (y.desc || '');
                const descEn = (y.desc && typeof y.desc === 'object') ? y.desc.en : '';

                return `
                <div class="mgr-item">
                    <div class="mgr-item-row">
                        <img class="mgr-item-thumb" src="${y.img}">
                        <div class="mgr-item-info">
                            <div class="mgr-item-name">${nameTr}</div>
                            <div class="mgr-item-tag">${tagTr}</div>
                        </div>
                        <div class="mgr-item-actions">
                            <button class="btn btn-outline" onclick="toggleEditYacht(${y.id})"><i class="fas fa-edit"></i></button>
                            <button class="btn" style="background:#fee2e2;color:#ef4444;" onclick="deleteYacht(${y.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="mgr-item-edit-area" id="yacht-edit-${y.id}">
                        <div class="mgr-form-grid">
                            <div class="mgr-field"><label>Yat Adı (TR)</label><input type="text" value="${nameTr}" oninput="updateYachtSubField(${y.id},'name','tr',this.value)"></div>
                            <div class="mgr-field"><label>Yat Adı (EN)</label><input type="text" value="${nameEn}" oninput="updateYachtSubField(${y.id},'name','en',this.value)"></div>
                            <div class="mgr-field"><label>Tür & Uzunluk (TR)</label><input type="text" value="${tagTr}" oninput="updateYachtSubField(${y.id},'tag','tr',this.value)"></div>
                            <div class="mgr-field"><label>Tür & Uzunluk (EN)</label><input type="text" value="${tagEn}" oninput="updateYachtSubField(${y.id},'tag','en',this.value)"></div>
                            <div class="mgr-field"><label>Görsel</label><input type="text" value="${y.img}" oninput="updateYachtField(${y.id},'img',this.value)"></div>
                            <div class="mgr-field"><label>Açıklama (TR)</label><textarea oninput="updateYachtDesc(${y.id},'tr',this.value)">${descTr}</textarea></div>
                            <div class="mgr-field"><label>Açıklama (EN)</label><textarea oninput="updateYachtDesc(${y.id},'en',this.value)">${descEn}</textarea></div>
                        </div>
                        <button class="btn btn-primary" onclick="saveYachts();toggleEditYacht(${y.id})">Kaydet</button>
                    </div>
                </div>
            `; }).join('');
        }
        function toggleEditYacht(id) { document.getElementById(`yacht-edit-${id}`).classList.toggle('open'); }
        function updateYachtField(id,f,v) { const x=yachtsData.find(i=>i.id===id); if(x) x[f]=v; }
        function updateYachtSubField(id, parent, lang, val) {
            const y = yachtsData.find(x => x.id === id);
            if (y) {
                if (typeof y[parent] !== 'object') y[parent] = { tr: y[parent] || '', en: '' };
                y[parent][lang] = val;
            }
        }
        function updateYachtDesc(id, lang, val) {
            const y = yachtsData.find(x => x.id === id);
            if (y) {
                if (typeof y.desc !== 'object') y.desc = { tr: y.desc || '', en: '' };
                y.desc[lang] = val;
            }
        }
        function deleteYacht(id) { if(confirm('Silinsin mi?')){ yachtsData=yachtsData.filter(i=>i.id!==id); saveYachts(); renderYachtsList(); } }
        function addYacht() {
            const nameTr = document.getElementById('new-yacht-name-tr').value;
            const nameEn = document.getElementById('new-yacht-name-en').value;
            const tagTr = document.getElementById('new-yacht-tag-tr').value;
            const tagEn = document.getElementById('new-yacht-tag-en').value;
            const img = _pendingYachtImg || document.getElementById('new-yacht-img').value || 'foto.img/yat_yeni.jpg';
            const tr = document.getElementById('new-yacht-desc-tr').value;
            const en = document.getElementById('new-yacht-desc-en').value;
            yachtsData.push({ id:Date.now(), name:{tr:nameTr, en:nameEn}, tag:{tr:tagTr, en:tagEn}, img, desc:{tr,en} });
            saveYachts(); renderYachtsList(); toggleAddForm('yacht-add-form');
            ['name-tr','name-en','tag-tr','tag-en','img','desc-tr','desc-en'].forEach(s => document.getElementById('new-yacht-'+s).value = '');
            _pendingYachtImg = null;
        }
        let _pendingYachtImg = null;
        function previewYachtImg(input) {
            const file = input.files[0]; if(!file) return;
            const reader = new FileReader(); reader.onload = e => { _pendingYachtImg = e.target.result; document.getElementById('new-yacht-img').value = '(yüklendi)'; };
            reader.readAsDataURL(file);
        }

        /* ── GUIDE CRUD ── */
        function renderGuideList() {
            const list = document.getElementById('guideMgrList');
            if (!list) return;
            list.innerHTML = guideData.map(g => {
                const titleTr = (g.title && typeof g.title === 'object') ? g.title.tr : (g.title || '');
                const titleEn = (g.title && typeof g.title === 'object') ? g.title.en : '';
                const tagTr   = (g.tag && typeof g.tag === 'object') ? g.tag.tr : (g.tag || '');
                const tagEn   = (g.tag && typeof g.tag === 'object') ? g.tag.en : '';
                const descTr  = (g.desc && typeof g.desc === 'object') ? g.desc.tr : (g.desc || '');
                const descEn  = (g.desc && typeof g.desc === 'object') ? g.desc.en : '';

                return `
                <div class="mgr-item">
                    <div class="mgr-item-row">
                        <img class="mgr-item-thumb" src="${g.img}">
                        <div class="mgr-item-info">
                            <div class="mgr-item-name">${titleTr}</div>
                            <div class="mgr-item-tag">${tagTr}</div>
                        </div>
                        <div class="mgr-item-actions">
                            <button class="btn btn-outline" onclick="toggleEditGuide(${g.id})"><i class="fas fa-edit"></i></button>
                            <button class="btn" style="background:#fee2e2;color:#ef4444;" onclick="deleteGuide(${g.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="mgr-item-edit-area" id="guide-edit-${g.id}">
                        <div class="mgr-form-grid">
                            <div class="mgr-field"><label>Başlık (TR)</label><input type="text" value="${titleTr}" oninput="updateGuideSubField(${g.id},'title','tr',this.value)"></div>
                            <div class="mgr-field"><label>Başlık (EN)</label><input type="text" value="${titleEn}" oninput="updateGuideSubField(${g.id},'title','en',this.value)"></div>
                            <div class="mgr-field"><label>Etiket (TR)</label><input type="text" value="${tagTr}" oninput="updateGuideSubField(${g.id},'tag','tr',this.value)"></div>
                            <div class="mgr-field"><label>Etiket (EN)</label><input type="text" value="${tagEn}" oninput="updateGuideSubField(${g.id},'tag','en',this.value)"></div>
                            <div class="mgr-field"><label>Görsel</label><input type="text" value="${g.img}" oninput="updateGuideField(${g.id},'img',this.value)"></div>
                            <div class="mgr-field"><label>Açıklama (TR)</label><textarea oninput="updateGuideDesc(${g.id},'tr',this.value)">${descTr}</textarea></div>
                            <div class="mgr-field"><label>Açıklama (EN)</label><textarea oninput="updateGuideDesc(${g.id},'en',this.value)">${descEn}</textarea></div>
                        </div>
                        <button class="btn btn-primary" onclick="saveGuides();toggleEditGuide(${g.id})">Kaydet</button>
                    </div>
                </div>
            `; }).join('');
        }
        function toggleEditGuide(id) { document.getElementById(`guide-edit-${id}`).classList.toggle('open'); }
        function updateGuideField(id,f,v) { const x=guideData.find(i=>i.id===id); if(x) x[f]=v; }
        function updateGuideSubField(id, parent, lang, val) {
            const g = guideData.find(x => x.id === id);
            if (g) {
                if (typeof g[parent] !== 'object') g[parent] = { tr: g[parent] || '', en: '' };
                g[parent][lang] = val;
            }
        }
        function updateGuideDesc(id, lang, val) {
            const g = guideData.find(x => x.id === id);
            if (g) {
                if (typeof g.desc !== 'object') g.desc = { tr: g.desc || '', en: '' };
                g.desc[lang] = val;
            }
        }
        function deleteGuide(id) { if(confirm('Silinsin mi?')){ guideData=guideData.filter(i=>i.id!==id); saveGuides(); renderGuideList(); } }
        function addGuide() {
            const titleTr = document.getElementById('new-guide-title-tr').value;
            const titleEn = document.getElementById('new-guide-title-en').value;
            const tagTr = document.getElementById('new-guide-tag-tr').value;
            const tagEn = document.getElementById('new-guide-tag-en').value;
            const img = _pendingGuideImg || document.getElementById('new-guide-img').value || 'foto.img/bodrum.jpg';
            const tr = document.getElementById('new-guide-desc-tr').value;
            const en = document.getElementById('new-guide-desc-en').value;
            guideData.push({ id:Date.now(), title:{tr:titleTr, en:titleEn}, tag:{tr:tagTr, en:tagEn}, img, desc:{tr,en} });
            saveGuides(); renderGuideList(); toggleAddForm('guide-add-form');
            ['title-tr','title-en','tag-tr','tag-en','img','desc-tr','desc-en'].forEach(s => document.getElementById('new-guide-'+s).value = '');
            _pendingGuideImg = null;
        }
        let _pendingGuideImg = null;
        function previewGuideImg(input) {
            const file = input.files[0]; if(!file) return;
            const reader = new FileReader(); reader.onload = e => { _pendingGuideImg = e.target.result; document.getElementById('new-guide-img').value = '(yüklendi)'; };
            reader.readAsDataURL(file);
        }

        /* ── EVENTS CRUD ── */
        function renderEventsList() {
            const list = document.getElementById('eventMgrList');
            if (!list) return;
            list.innerHTML = eventsData.map(e => {
                const titleTr = (e.title && typeof e.title === 'object') ? e.title.tr : (e.title || '');
                const titleEn = (e.title && typeof e.title === 'object') ? e.title.en : '';
                const tagTr   = (e.tag && typeof e.tag === 'object') ? e.tag.tr : (e.tag || '');
                const tagEn   = (e.tag && typeof e.tag === 'object') ? e.tag.en : '';
                const monthTr = (e.month && typeof e.month === 'object') ? e.month.tr : (e.month || '');
                const monthEn = (e.month && typeof e.month === 'object') ? e.month.en : '';
                const locTr   = (e.loc && typeof e.loc === 'object') ? e.loc.tr : (e.loc || '');
                const locEn   = (e.loc && typeof e.loc === 'object') ? e.loc.en : '';

                return `
                <div class="mgr-item">
                    <div class="mgr-item-row">
                        <div class="event-date" style="background:var(--primary);color:white;padding:10px;border-radius:10px;text-align:center;min-width:60px;">
                            <div style="font-weight:800;">${e.day}</div>
                            <div style="font-size:0.7rem;">${monthTr}</div>
                        </div>
                        <div class="mgr-item-info">
                            <div class="mgr-item-name">${titleTr}</div>
                            <div class="mgr-item-tag">${tagTr} | ${locTr}</div>
                        </div>
                        <div class="mgr-item-actions">
                            <button class="btn btn-outline" onclick="toggleEditEvent(${e.id})"><i class="fas fa-edit"></i></button>
                            <button class="btn" style="background:#fee2e2;color:#ef4444;" onclick="deleteEvent(${e.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="mgr-item-edit-area" id="event-edit-${e.id}">
                        <div class="mgr-form-grid">
                            <div class="mgr-field"><label>Başlık (TR)</label><input type="text" value="${titleTr}" oninput="updateEventSubField(${e.id},'title','tr',this.value)"></div>
                            <div class="mgr-field"><label>Başlık (EN)</label><input type="text" value="${titleEn}" oninput="updateEventSubField(${e.id},'title','en',this.value)"></div>
                            <div class="mgr-field"><label>Kategori (TR)</label><input type="text" value="${tagTr}" oninput="updateEventSubField(${e.id},'tag','tr',this.value)"></div>
                            <div class="mgr-field"><label>Kategori (EN)</label><input type="text" value="${tagEn}" oninput="updateEventSubField(${e.id},'tag','en',this.value)"></div>
                            <div class="mgr-field"><label>Gün</label><input type="number" value="${e.day}" oninput="updateEventField(${e.id},'day',this.value)"></div>
                            <div class="mgr-field"><label>Ay (TR)</label><input type="text" value="${monthTr}" oninput="updateEventSubField(${e.id},'month','tr',this.value)"></div>
                            <div class="mgr-field"><label>Ay (EN)</label><input type="text" value="${monthEn}" oninput="updateEventSubField(${e.id},'month','en',this.value)"></div>
                            <div class="mgr-field"><label>Konum (TR)</label><input type="text" value="${locTr}" oninput="updateEventSubField(${e.id},'loc','tr',this.value)"></div>
                            <div class="mgr-field"><label>Konum (EN)</label><input type="text" value="${locEn}" oninput="updateEventSubField(${e.id},'loc','en',this.value)"></div>
                        </div>
                        <button class="btn btn-primary" onclick="saveEvents();toggleEditEvent(${e.id})">Kaydet</button>
                    </div>
                </div>
            `; }).join('');
        }
        function toggleEditEvent(id) { document.getElementById(`event-edit-${id}`).classList.toggle('open'); }
        function updateEventField(id,f,v) { const x=eventsData.find(i=>i.id===id); if(x) x[f]=v; }
        function updateEventSubField(id, parent, lang, val) {
            const e = eventsData.find(x => x.id === id);
            if (e) {
                if (typeof e[parent] !== 'object') e[parent] = { tr: e[parent] || '', en: '' };
                e[parent][lang] = val;
            }
        }
        function deleteEvent(id) { if(confirm('Silinsin mi?')){ eventsData=eventsData.filter(i=>i.id!==id); saveEvents(); renderEventsList(); } }
        function addEvent() {
            const titleTr = document.getElementById('new-event-title-tr').value;
            const titleEn = document.getElementById('new-event-title-en').value;
            const tagTr = document.getElementById('new-event-tag-tr').value;
            const tagEn = document.getElementById('new-event-tag-en').value;
            const day = document.getElementById('new-event-day').value;
            const monthTr = document.getElementById('new-event-month-tr').value;
            const monthEn = document.getElementById('new-event-month-en').value;
            const locTr = document.getElementById('new-event-loc-tr').value;
            const locEn = document.getElementById('new-event-loc-en').value;
            eventsData.push({ id:Date.now(), title:{tr:titleTr, en:titleEn}, tag:{tr:tagTr, en:tagEn}, day, month:{tr:monthTr, en:monthEn}, loc:{tr:locTr, en:locEn} });
            saveEvents(); renderEventsList(); toggleAddForm('event-add-form');
            ['title-tr','title-en','tag-tr','tag-en','day','month-tr','month-en','loc-tr','loc-en'].forEach(s => document.getElementById('new-event-'+s).value = '');
        }

        /* ── JOURNAL CRUD ── */
        function renderJournalList() {
            const list = document.getElementById('journalMgrList');
            if (!list) return;
            list.innerHTML = journalData.map(j => {
                const titleTr = (j.title && typeof j.title === 'object') ? j.title.tr : (j.title || '');
                const titleEn = (j.title && typeof j.title === 'object') ? j.title.en : '';
                const tagTr   = (j.tag && typeof j.tag === 'object') ? j.tag.tr : (j.tag || '');
                const tagEn   = (j.tag && typeof j.tag === 'object') ? j.tag.en : '';
                const descTr  = (j.desc && typeof j.desc === 'object') ? j.desc.tr : (j.desc || '');
                const descEn  = (j.desc && typeof j.desc === 'object') ? j.desc.en : '';

                return `
                <div class="mgr-item">
                    <div class="mgr-item-row">
                        <img class="mgr-item-thumb" src="${j.img}">
                        <div class="mgr-item-info">
                            <div class="mgr-item-name">${titleTr}</div>
                            <div class="mgr-item-tag">${tagTr} | ${j.date}</div>
                        </div>
                        <div class="mgr-item-actions">
                            <button class="btn btn-outline" onclick="toggleEditJournal(${j.id})"><i class="fas fa-edit"></i></button>
                            <button class="btn" style="background:#fee2e2;color:#ef4444;" onclick="deleteJournal(${j.id})"><i class="fas fa-trash"></i></button>
                        </div>
                    </div>
                    <div class="mgr-item-edit-area" id="journal-edit-${j.id}">
                        <div class="mgr-form-grid">
                            <div class="mgr-field"><label>Yazı Başlığı (TR)</label><input type="text" value="${titleTr}" oninput="updateJournalSubField(${j.id},'title','tr',this.value)"></div>
                            <div class="mgr-field"><label>Yazı Başlığı (EN)</label><input type="text" value="${titleEn}" oninput="updateJournalSubField(${j.id},'title','en',this.value)"></div>
                            <div class="mgr-field"><label>Kategori / Etiket (TR)</label><input type="text" value="${tagTr}" oninput="updateJournalSubField(${j.id},'tag','tr',this.value)"></div>
                            <div class="mgr-field"><label>Kategori / Etiket (EN)</label><input type="text" value="${tagEn}" oninput="updateJournalSubField(${j.id},'tag','en',this.value)"></div>
                            <div class="mgr-field"><label>Tarih</label><input type="text" value="${j.date}" oninput="updateJournalField(${j.id},'date',this.value)"></div>
                            <div class="mgr-field"><label>Görsel</label><input type="text" value="${j.img}" oninput="updateJournalField(${j.id},'img',this.value)"></div>
                            <div class="mgr-field"><label>Açıklama (TR)</label><textarea oninput="updateJournalDesc(${j.id},'tr',this.value)">${descTr}</textarea></div>
                            <div class="mgr-field"><label>Açıklama (EN)</label><textarea oninput="updateJournalDesc(${j.id},'en',this.value)">${descEn}</textarea></div>
                        </div>
                        <button class="btn btn-primary" onclick="saveJournal();toggleEditJournal(${j.id})">Kaydet</button>
                    </div>
                </div>
            `; }).join('');
        }
        function toggleEditJournal(id) { document.getElementById(`journal-edit-${id}`).classList.toggle('open'); }
        function updateJournalField(id,f,v) { const x=journalData.find(i=>i.id===id); if(x) x[f]=v; }
        function updateJournalSubField(id, parent, lang, val) {
            const j = journalData.find(x => x.id === id);
            if (j) {
                if (typeof j[parent] !== 'object') j[parent] = { tr: j[parent] || '', en: '' };
                j[parent][lang] = val;
            }
        }

        function updateJournalDesc(id, lang, val) {
            const j = journalData.find(x => x.id === id);
            if (j) {
                if (typeof j.desc !== 'object') j.desc = { tr: j.desc || '', en: '' };
                j.desc[lang] = val;
            }
        }

        function deleteJournal(id) { if(confirm('Silinsin mi?')){ journalData=journalData.filter(i=>i.id!==id); saveJournal(); renderJournalList(); } }
        function addJournal() {
            const titleTr = document.getElementById('new-journal-title-tr').value;
            const titleEn = document.getElementById('new-journal-title-en').value;
            const tagTr = document.getElementById('new-journal-tag-tr').value;
            const tagEn = document.getElementById('new-journal-tag-en').value;
            const date = document.getElementById('new-journal-date').value;
            const img = _pendingJournalImg || document.getElementById('new-journal-img').value || 'foto.img/japonya.jpg';
            const tr = document.getElementById('new-journal-desc-tr').value;
            const en = document.getElementById('new-journal-desc-en').value;
            journalData.push({ id:Date.now(), title:{tr:titleTr, en:titleEn}, tag:{tr:tagTr, en:tagEn}, date, img, desc:{tr,en} });
            saveJournal(); renderJournalList(); toggleAddForm('journal-add-form');
            ['title-tr','title-en','tag-tr','tag-en','date','img','desc-tr','desc-en'].forEach(s => document.getElementById('new-journal-'+s).value = '');
            _pendingJournalImg = null;
        }
        let _pendingJournalImg = null;
        function previewJournalImg(input) {
            const file = input.files[0]; if(!file) return;
            const reader = new FileReader(); reader.onload = e => { _pendingJournalImg = e.target.result; document.getElementById('new-journal-img').value = '(yüklendi)'; };
            reader.readAsDataURL(file);
        }

        // Media List from Directory Scan
        const DEFAULT_MEDIA = [
            {t:'Ana Hero 4K', p:'foto.img/hero_4k.jpg', cat:'hero'},
            {t:'Logo', p:'foto.img/logo.jpg', cat:'hero'},
            {t:'Bodrum Manzara', p:'foto.img/bodrum.jpg', cat:'hero'},
            {t:'Amalfi Sahili', p:'foto.img/amalfi.jpg', cat:'hero'},
            {t:'Kapadokya Balonlar', p:'foto.img/kapadokya.jpg', cat:'hero'},
            {t:'Otel Aman', p:'foto.img/otel_aman.jpg', cat:'otel'},
            {t:'Otel Hero', p:'foto.img/otel_hero.jpg', cat:'otel'},
            {t:'Otel Hillside', p:'foto.img/otel_hillside.jpg', cat:'otel'},
            {t:'Otel Museum', p:'foto.img/otel_museum.jpg', cat:'otel'},
            {t:'Otel Sirenuse', p:'foto.img/otel_sirenuse.jpg', cat:'otel'},
            {t:'Otel Soneva', p:'foto.img/otel_soneva.jpg', cat:'otel'},
            {t:'Restoran Hero', p:'foto.img/rest_hero.jpg', cat:'rest'},
            {t:'Restoran Mikla', p:'foto.img/rest_mikla.jpg', cat:'rest'},
            {t:'Restoran Zuma', p:'foto.img/rest_zuma.jpg', cat:'rest'},
            {t:'Restoran Melengeç', p:'foto.img/rest_melengec.jpg', cat:'rest'},
            {t:'Yat Hero', p:'foto.img/yat_hero.jpg', cat:'yat'},
            {t:'Yat Azure Dream', p:'foto.img/yat_azure_dream.jpg', cat:'yat'},
            {t:'Yat Bodrum Blue', p:'foto.img/yat_bodrum_blue.jpg', cat:'yat'},
            {t:'Yat Aegean Wind', p:'foto.img/yat_aegean_wind.jpg', cat:'yat'},
            {t:'Japonya Journal', p:'foto.img/japonya.jpg', cat:'hero'},
            {t:'Norveç Journal', p:'foto.img/norvec.jpg', cat:'hero'},
            {t:'Sahra Journal', p:'foto.img/sahra.jpg', cat:'hero'}
        ];
        
        let allMedia = [];
        
        function loadMedia() {
            const s = DioAPI.loadSync('dioreal_media_data');
            allMedia = s ? JSON.parse(JSON.stringify(s)) : JSON.parse(JSON.stringify(DEFAULT_MEDIA));
        }
        
        function saveMedia() {
            DioAPI.save('dioreal_media_data', allMedia, null);
        }

        // Core functionality
        document.addEventListener('DOMContentLoaded', () => {
            init();
        });

        function navTo(id, el) {
            document.querySelectorAll('.page-section').forEach(s => s.classList.remove('active'));
            document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
            
            document.getElementById(id).classList.add('active');
            el.classList.add('active');
            
            const title = el.innerText.trim();
            document.getElementById('pageTitle').innerText = title;
        }

        // Page Definitions
        const pages = [
            { id: 'general', name: 'Genel (Nav/Footer)', icon: 'fas fa-globe', prefixes: ['nav_', 'btn_', 'footer_', 'serv_', 'cont_'] },
            { id: 'home', name: 'Ana Sayfa', icon: 'fas fa-home', prefixes: ['hero_', 'dest_', 'man_', 'trend_', 'mq_', 'testi_', 'proc_', 'kassandra_', 'melengec_', 'blue_', 'rups_', 'collab_'] },
            { id: 'about', name: 'Hakkımızda', icon: 'fas fa-info-circle', prefixes: ['about_', 'story_', 'stats_', 'mission_'] },
            { id: 'hotels', name: 'Oteller', icon: 'fas fa-hotel', prefixes: ['otel_'] },
            { id: 'yachts', name: 'Yatlar', icon: 'fas fa-ship', prefixes: ['yacht_'] },
            { id: 'restaurants', name: 'Restoranlar', icon: 'fas fa-utensils', prefixes: ['rest_'] },
            { id: 'guide', name: 'Gezi Rehberi', icon: 'fas fa-map-marked-alt', prefixes: ['guide_', 'tag_'] },
            { id: 'events', name: 'Etkinlikler', icon: 'fas fa-calendar-alt', prefixes: ['event_', 'month_'] },
            { id: 'journal', name: 'Journal', icon: 'fas fa-book-open', prefixes: ['journal_', 'date_'] }
        ];

        function init() {
            renderPageList();
            const totalTexts = Object.keys(langData).length;
            document.getElementById('statTotalTexts').innerText = totalTexts;
            selectPage('general');
            loadMedia();
            renderMedia(allMedia);
            updatePreviewFrame();

            // Yeni yönetim modülleri
            loadHotels();
            loadYachts();
            loadRestaurants();
            loadRefs();
            loadContact();
            loadGuides();
            loadEvents();
            loadJournal();
            renderHotelsList();
            renderYachtsList();
            renderRestaurantsList();
            renderRefsList();
            renderContactForm();
            renderGuideList();
            renderEventsList();
            renderJournalList();
            updateDashboardStats();
        }

        function updatePreviewFrame() {
            const frame = document.getElementById('sitePreviewFrame');
            const select = document.getElementById('previewPageSelect');
            if(frame && select) {
                frame.src = select.value + '?t=' + new Date().getTime();
            }
        }

        function renderPageList() {
            const list = document.getElementById('pageList');
            list.innerHTML = '';
            pages.forEach(p => {
                const item = document.createElement('div');
                item.className = 'page-link';
                item.id = `plink-${p.id}`;
                item.innerHTML = `<i class="${p.icon}"></i> ${p.name}`;
                item.onclick = () => selectPage(p.id);
                list.appendChild(item);
            });
        }

        function selectPage(pageId) {
            document.querySelectorAll('.page-link').forEach(l => l.classList.remove('active'));
            document.getElementById(`plink-${pageId}`).classList.add('active');

            const grid = document.getElementById('editorGrid');
            grid.innerHTML = '';

            const page = pages.find(p => p.id === pageId);
            const keys = Object.keys(langData).filter(key => 
                page.prefixes.some(pre => key.startsWith(pre))
            );

            if (keys.length === 0) {
                grid.innerHTML = '<p style="padding: 2rem; color: var(--text-muted);">Bu sayfa için henüz metin tanımlanmamış.</p>';
                return;
            }

            // Group by prefix for better structure
            const groups = {};
            keys.forEach(key => {
                const prefix = key.split('_')[0];
                if (!groups[prefix]) groups[prefix] = [];
                groups[prefix].push(key);
            });

            for (const prefix in groups) {
                const section = document.createElement('div');
                section.className = 'section-group';
                section.innerHTML = `<div class="section-group-title">${prefix.toUpperCase()} BÖLÜMÜ</div>`;
                
                const fieldGrid = document.createElement('div');
                fieldGrid.style.display = 'grid';
                fieldGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(450px, 1fr))';
                fieldGrid.style.gap = '1.5rem';

                groups[prefix].forEach(key => {
                    const card = document.createElement('div');
                    card.className = 'editor-card';
                    card.style.background = 'white';
                    card.style.borderRadius = '20px';
                    card.style.border = '1px solid var(--border)';
                    card.style.padding = '1.5rem';
                    card.innerHTML = `
                        <span class="card-label" style="font-size: 0.8rem; font-weight: 700; color: var(--text-muted); display: block; margin-bottom: 1rem; border-bottom: 1px solid var(--border); padding-bottom: 0.5rem;">${key}</span>
                        <div class="lang-fields" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.2rem;">
                            <div class="field-group">
                                <label style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; display: flex; align-items: center; gap: 5px;"><img src="https://flagcdn.com/w20/tr.png" style="width:14px;"> Türkçe</label>
                                <textarea style="border: 1px solid var(--border); border-radius: 10px; padding: 0.8rem; min-height: 80px; font-family: inherit; font-size: 0.9rem; outline: none; background: #fcfcfc; transition: 0.3s; resize: vertical;" oninput="updateVal('${key}', 'tr', this.value)">${langData[key].tr}</textarea>
                            </div>
                            <div class="field-group">
                                <label style="font-size: 0.7rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase; display: flex; align-items: center; gap: 5px;"><img src="https://flagcdn.com/w20/gb.png" style="width:14px;"> English</label>
                                <textarea style="border: 1px solid var(--border); border-radius: 10px; padding: 0.8rem; min-height: 80px; font-family: inherit; font-size: 0.9rem; outline: none; background: #fcfcfc; transition: 0.3s; resize: vertical;" oninput="updateVal('${key}', 'en', this.value)">${langData[key].en}</textarea>
                            </div>
                        </div>
                    `;
                    fieldGrid.appendChild(card);
                });
                section.appendChild(fieldGrid);
                grid.appendChild(section);
            }
        }

        function updateVal(key, lang, val) {
            langData[key][lang] = val;
        }

        function renderMedia(list) {
            const grid = document.getElementById('mediaGrid');
            grid.innerHTML = '';
            list.forEach((img, idx) => {
                const index = allMedia.indexOf(img);
                const item = document.createElement('div');
                item.className = 'media-item';
                const imgId = 'media-img-' + index;
                const sizeId = 'media-size-' + index;
                item.innerHTML = `
                    <img src="${img.p}" class="media-preview" alt="${img.t}" id="${imgId}" onload="document.getElementById('${sizeId}').innerText = this.naturalWidth + ' x ' + this.naturalHeight + ' px'">
                    <div class="media-overlay">
                        <button class="tool-btn success" onclick="triggerReplace(${index})" title="Görseli Değiştir"><i class="fas fa-exchange-alt"></i></button>
                        <button class="tool-btn" onclick="copyPath('${img.p}')" title="Yolu Kopyala"><i class="fas fa-link"></i></button>
                        <button class="tool-btn danger" onclick="removeMedia(${index})" title="Kaldır"><i class="fas fa-trash-alt"></i></button>
                    </div>
                    <div class="media-meta">
                        <span>${img.t}</span>
                        <small>${img.p.startsWith('data:') ? 'Yeni Yüklenen' : img.p}</small>
                        <div id="${sizeId}" style="font-size: 0.75rem; color: var(--primary); font-weight: 700; margin-top: 5px;"></div>
                    </div>
                `;
                grid.appendChild(item);
            });
        }

        let currentlyReplacing = null;
        let isAddingNew = false;

        function triggerReplace(index) {
            isAddingNew = false;
            currentlyReplacing = index;
            document.getElementById('mediaUploader').value = '';
            document.getElementById('mediaUploader').click();
        }

        function triggerAddNew() {
            isAddingNew = true;
            document.getElementById('mediaUploader').value = '';
            document.getElementById('mediaUploader').click();
        }

        document.getElementById('mediaUploader').onchange = function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(event) {
                const newSrc = event.target.result;
                
                if (isAddingNew) {
                    allMedia.unshift({
                        t: file.name.split('.')[0],
                        p: newSrc,
                        cat: 'hero'
                    });
                    showToast('Yeni görsel eklendi!', 'check');
                } else {
                    if (currentlyReplacing !== null && allMedia[currentlyReplacing]) {
                        allMedia[currentlyReplacing].p = newSrc;
                        showToast('Görsel başarıyla güncellendi!', 'check');
                    }
                }
                saveMedia();
                renderMedia(allMedia);
            };
            reader.readAsDataURL(file);
        };

        function removeMedia(index) {
            if (confirm('Bu görseli havuzdan kaldırmak istediğinize emin misiniz?')) {
                if (index >= 0 && index < allMedia.length) {
                    allMedia.splice(index, 1);
                    saveMedia();
                    renderMedia(allMedia);
                    showToast('Görsel kaldırıldı.', 'info');
                }
            }
        }

        function filterMedia(cat, el) {
            document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
            el.classList.add('active');
            if(cat === 'all') renderMedia(allMedia);
            else renderMedia(allMedia.filter(m => m.cat === cat));
        }

        function copyPath(p) {
            navigator.clipboard.writeText(p).then(() => {
                showToast('Dosya yolu kopyalandı!');
            });
        }

        function saveToLocal() {
            DioAPI.save('dioreal_lang_data', langData, function() {
                showToast('Değişiklikler başarıyla yayınlandı!', 'check');
            });
        }

        function copyCode() {
            const code = "const langData = " + JSON.stringify(langData, null, 4) + ";";
            navigator.clipboard.writeText(code).then(() => {
                showToast('JSON kodu panoya kopyalandı!');
            });
        }

        function resetAll() {
            if(confirm('Tüm yayınlanmamış değişiklikleri geri almak istediğinize emin misiniz?')) {
                DioAPI.save('dioreal_lang_data', {}, function() { location.reload(); });
            }
        }

        function showToast(msg, icon = 'check') {
            const t = document.getElementById('toast');
            const m = document.getElementById('toastMsg');
            if (!t || !m) return;
            m.innerText = msg;
            const iconMap = {
                'check': 'fa-circle-check',
                'info':  'fa-circle-info',
                'exclamation': 'fa-circle-exclamation'
            };
            t.querySelector('i').className = `fas ${iconMap[icon] || 'fa-circle-check'}`;
            t.classList.add('show');
            clearTimeout(t._toastTimer);
            t._toastTimer = setTimeout(() => t.classList.remove('show'), 3000);
        }

        // Global Search
        document.getElementById('globalSearch').addEventListener('input', function(e) {
            const term = e.target.value.toLowerCase();
            document.querySelectorAll('.editor-card').forEach(card => {
                const text = card.innerText.toLowerCase();
                card.style.display = text.includes(term) ? 'block' : 'none';
            });
        });
    </script>
</body>
</html>
