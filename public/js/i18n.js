// ── DioAPI — Sunucu Merkezli Veri Yönetimi ──────────────────────────────────
window.DioAPI = (function() {
    var isLocal = (window.location.protocol === 'file:');

    function _key(k)  { return k.replace(/[^a-zA-Z0-9_]/g,''); }
    function _ls(k)   { try { var s=localStorage.getItem(k); return s ? JSON.parse(s) : null; } catch(e){ return null; } }
    function _save(k,v){ try { localStorage.setItem(k, JSON.stringify(v)); } catch(e){} }

    function _normalize(key, data) {
        if (data && typeof data === 'object' && !Array.isArray(data)) {
            var listKeys = [
                'dioreal_hotels_data',
                'dioreal_yachts_data',
                'dioreal_restaurants_data',
                'dioreal_guide_data',
                'dioreal_events_data',
                'dioreal_journal_data',
                'dioreal_refs_data'
            ];
            if (listKeys.indexOf(key) !== -1) {
                var arr = [];
                for (var i = 0; ; i++) {
                    if (data.hasOwnProperty(i)) {
                        arr.push(data[i]);
                    } else if (data.hasOwnProperty(String(i))) {
                        arr.push(data[String(i)]);
                    } else {
                        break;
                    }
                }
                if (arr.length > 0) return arr;
                var values = [];
                for (var k in data) {
                    if (data.hasOwnProperty(k) && k !== 'key' && data[k] && typeof data[k] === 'object') {
                        values.push(data[k]);
                    }
                }
                return values;
            }
        }
        return data;
    }

    // LOAD: Sunucuda ise senkron XHR ile bekleyerek veri çek
    function loadSync(key) {
        var fallback = _ls(key);
        if (isLocal) return _normalize(key, fallback);
        try {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/api/load?key='+_key(key)+'&t='+Date.now(), false); // synchronous
            xhr.send(null);
            if (xhr.status === 200) {
                var t = (xhr.responseText || '').trim();
                if (t && t !== 'null' && t.charAt(0) !== '<') {
                    try {
                        var d = JSON.parse(t);
                        if (d !== null) {
                            _save(key, d); // yerel önbelleği güncelle
                            return _normalize(key, d);
                        }
                    } catch(e) { console.warn('[DioAPI] JSON parse error:', e); }
                }
            }
        } catch(e) { console.warn('[DioAPI] loadSync error:', e); }
        return _normalize(key, fallback);
    }

    // LOAD ASYNC: Sayfa render sonrası re-render için
    function loadAsync(key, callback) {
        if (isLocal) { callback(_normalize(key, _ls(key))); return; }
        fetch('/api/load?key='+_key(key)+'&t='+Date.now())
            .then(function(r){ return r.text(); })
            .then(function(t){
                if (t && t.trim() !== 'null' && t.charAt(0) !== '<') {
                    try { var d = JSON.parse(t); _save(key,d); callback(_normalize(key, d)); return; } catch(e){}
                }
                callback(_normalize(key, _ls(key)));
            })
            .catch(function(){ callback(_normalize(key, _ls(key))); });
    }

    // SAVE: HEMEN localStorage'a yaz, callback'i çağır, arka planda sunucuya gönder
    function save(key, data, onSuccess) {
        _save(key, data);
        if (onSuccess) onSuccess();

        if (!isLocal) {
            var headers = { 'Content-Type': 'application/json' };
            var csrfMeta = document.querySelector('meta[name="csrf-token"]');
            if (csrfMeta) {
                headers['X-CSRF-TOKEN'] = csrfMeta.getAttribute('content');
            }

            fetch('/api/save?key='+_key(key), {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(data)
            })
            .then(function(r){ return r.text(); })
            .then(function(t){
                try {
                    var resp = JSON.parse(t);
                    if (resp && resp.error) console.error('[DioAPI] Sunucu hata:', resp.error);
                } catch(e) { console.error('[DioAPI] Yanıt geçersiz:', t.substring(0,200)); }
            })
            .catch(function(e){ console.error('[DioAPI] Ağ hatası:', e); });
        }
    }

    return { loadSync: loadSync, loadAsync: loadAsync, save: save, isLocal: isLocal };
})();
// ─────────────────────────────────────────────────────────────────────────────


// ── CENTRAL TRANSLATION DATA ──
const DEFAULT_CONTENT = {
    // Nav
    "nav_home": { "tr": "Ana Sayfa", "en": "Home" },
    "nav_about": { "tr": "Hakkımızda", "en": "About" },
    "nav_hotels": { "tr": "Oteller", "en": "Hotels" },
    "nav_yachts": { "tr": "Yatlar", "en": "Yachts" },
    "nav_restaurants": { "tr": "Restoranlar", "en": "Restaurants" },
    "nav_guide": { "tr": "Gezi Rehberi", "en": "Travel Guide" },
    "nav_events": { "tr": "Etkinlikler", "en": "Events" },
    "nav_journal": { "tr": "Journal", "en": "Journal" },
    "nav_turkey": { "tr": "Türkiye", "en": "Turkey" },
    "nav_intl": { "tr": "Yurtdışı", "en": "International" },
    "nav_collabs": { "tr": "İş Birlikleri", "en": "Partners" },
    
    // Common Buttons
    "btn_explore": { "tr": "Keşfet", "en": "Explore" },
    "btn_explore_trip": { "tr": "Turu İncele", "en": "Explore Trip" },
    "btn_apply": { "tr": "Başvuru Yap", "en": "Join Us" },
    "btn_contact": { "tr": "İletişime Geç", "en": "Contact" },
    "btn_cont": { "tr": "OKUMAYA DEVAM ET", "en": "CONTINUE READING" },
    "btn_contact_wa": { "tr": "WhatsApp İletişim", "en": "WhatsApp Contact" },
    "btn_review": { "tr": "İncele", "en": "Review" },
    "btn_plan_route": { "tr": "Rota Planlat", "en": "Plan Itinerary" },
    "btn_discover_tables": { "tr": "Masaları Keşfet", "en": "Discover Tables" },
    "btn_discover_col": { "tr": "Koleksiyonu Keşfet", "en": "Discover Collection" },
    "btn_continue_reading": { "tr": "Okumaya Devam Et", "en": "Continue Reading" },

    // Footer
    "footer_pages": { "tr": "Sayfalar", "en": "Pages" },
    "footer_serv": { "tr": "Hizmetler", "en": "Services" },
    "footer_contact": { "tr": "İletişim", "en": "Contact" },
    "footer_p": { "tr": "Seçkin destinasyonları ve premium markaları doğru kitleyle buluşturan medya platformu.", "en": "Media platform connecting exclusive destinations and premium brands with the right audience." },
    "cont_ist": { "tr": "İstanbul, Türkiye", "en": "Istanbul, Turkey" },
    "cont_ig": { "tr": "Instagram", "en": "Instagram" },
    "cont_li": { "tr": "LinkedIn", "en": "LinkedIn" },

    // Home Page
    "hero_line1": { "tr": "Türkiye ve dünyada seçkin", "en": "Opening doors to exclusive" },
    "hero_line2": { "tr": "deneyimlerin kapısını aralıyoruz.", "en": "experiences globally." },
    "man_eyebrow": { "tr": "LÜKS SEYAHAT REHBERİMİZ", "en": "OUR GUIDE TO LUXURY TRAVEL" },
    "man_p1": { "tr": "Sadece güzel yerlerden daha fazlasını isteyen insanlar için ısmarlama lüks tatiller yaratıyoruz.", "en": "We create bespoke luxury holidays for people who want more than just beautiful places." },
    "man_p2": { "tr": "Bazıları için lüks, sessizliğin deneyim olduğu Namib Çölü'nün uzak bir köşesinde huzurlu bir yalnızlık içinde yürüyüş yapmaktır. Diğerleri içinse, kendi hızınızda gizli koylar arasında hareket eden özel bir yatla Akdeniz'de yelken açma özgürlüğüdür.", "en": "For some, luxury is hiking in peaceful solitude through a remote corner of the Namib Desert. For others, it’s the freedom of sailing the Mediterranean aboard a private yacht." },
    "man_p3": { "tr": "Yarattığımız her yolculuk sizin etrafınızda şekillenir. Lüks seyahat danışmanlarımız, olağanüstü yerleri bir araya getirerek zahmetsiz ve anlamlı hissettiren deneyimler yaratmak için kişiye özel tatilleri tasarlar.", "en": "Every journey we create is shaped around you. Our luxury travel advisors design tailor-made holidays to create experiences that feel effortless and meaningful." },
    "dest_tr_eyebrow": { "tr": "SEYAHATLERİMİZİ KEŞFEDİN", "en": "EXPLORE OUR TRIPS" },
    "dest_tr_title": { "tr": "Türkiye'nin", "en": "Soul of" },
    "dest_tr_it": { "tr": "Ruhu", "en": "Turkey" },
    "dest_tr_desc": { "tr": "Benzersiz deneyimlerin ilham veren hikayesi", "en": "The inspiring story of unique experiences" },
    "dest_en_main": { "tr": "YOLCULUĞUNUZA BAŞLAYIN", "en": "START YOUR JOURNEY" },
    "collab_eyebrow": { "tr": "Referanslar", "en": "References" },
    "collab_title": { "tr": "Marka & İş Birlikleri", "en": "Brands & Collaborations" },
    "proc_eyebrow": { "tr": "Metodoloji", "en": "Methodology" },
    "proc_title": { "tr": "Nasıl", "en": "How" },
    "proc_it": { "tr": "Çalışıyoruz?", "en": "We Work?" },
    "proc_h1": { "tr": "Hayal Kurun", "en": "Dream" },
    "proc_p1": { "tr": "Bize rüya seyahatinizi anlatın. Hayallerinizi özgürce paylaşın.", "en": "Tell us about your dream trip. Share your dreams freely." },
    "proc_h2": { "tr": "Tasarlayalım", "en": "Design" },
    "proc_p2": { "tr": "Uzman ekibimiz size özel, detaylı bir program hazırlar.", "en": "Our expert team prepares a detailed, personalized program for you." },
    "proc_h3": { "tr": "Mükemmelleştirin", "en": "Perfect" },
    "proc_p3": { "tr": "Her detayı birlikte gözden geçiririz. Tamamı ince ayrıntısına kadar planlanır.", "en": "We review every detail together. Everything is planned down to the fine points." },
    "proc_h4": { "tr": "Yola Çıkın", "en": "Set Off" },
    "proc_p4": { "tr": "Tüm organizasyon hazır. Geri kalanı tamamen bizde.", "en": "All organization is ready. The rest is entirely up to us." },
    "testi_quote": { "tr": "Dioreal Dijital ile yaptığımız iş birliği, markamızın global vizyonunu tam olarak yansıtan benzersiz bir deneyimdi.", "en": "Our collaboration with Dioreal Digital was a unique experience that fully reflected our global vision." },
    "testi_author": { "tr": "— Seçkin İş Ortakları", "en": "— Exclusive Business Partners" },
    "mq_mald": { "tr": "Maldivler", "en": "Maldives" },
    "mq_jap": { "tr": "Japonya", "en": "Japan" },
    "mq_pat": { "tr": "Patagonya", "en": "Patagonia" },
    "mq_ama": { "tr": "Amalfi Kıyısı", "en": "Amalfi Coast" },
    "mq_nor": { "tr": "Norveç Fiyortları", "en": "Norway Fjords" },
    "mq_sah": { "tr": "Sahra Çölü", "en": "Sahara Desert" },

    // Hakkımızda Page
    "about_eyebrow": { "tr": "Biz Kimiz", "en": "Who We Are" },
    "about_title": { "tr": "<em>Dioreal</em> Dijital", "en": "<em>Dioreal</em> Digital" },
    "story_eyebrow": { "tr": "Hikayemiz", "en": "Our Story" },
    "story_title": { "tr": "15 yıldır lüks <em>seyahatin</em> sesi", "en": "Voice of luxury <em>travel</em> for 15 years" },
    "about_p1": { "tr": "2010 yılında İstanbul'da kurulan Dioreal Dijital, Türkiye'nin öncü lüks seyahat ve yaşam tarzı medya platformuna dönüşmüştür.", "en": "Founded in Istanbul in 2010, Dioreal Digital has evolved into Turkey's leading luxury travel and lifestyle media platform." },
    "about_p2": { "tr": "Her destinasyonda bizzat bulunarak, her oteli bizatihi deneyimleyerek ve her markayı özenle seçerek güvenilir bir referans noktası haline geldik.", "en": "By personally visiting every destination and experiencing every hotel firsthand, we've become a trusted reference." },
    "stats_eyebrow": { "tr": "Rakamlarla", "en": "By Numbers" },
    "stats_title": { "tr": "15 Yılın <em>Mirası</em>", "en": "Legacy of <em>15 Years</em>" },
    "stat_dest": { "tr": "Destinasyon", "en": "Destinations" },
    "stat_readers": { "tr": "Aylık Okuyucu", "en": "Monthly Readers" },
    "stat_brands": { "tr": "Marka Ortağı", "en": "Brand Partners" },
    "stat_exp": { "tr": "Yıllık Deneyim", "en": "Years of Experience" },
    "mission_eyebrow": { "tr": "Misyonumuz", "en": "Our Mission" },
    "mission_title": { "tr": "Anlamlı <em>deneyimler</em> için", "en": "For meaningful <em>experiences</em>" },
    "mission_p1": { "tr": "Sadece güzel yerler göstermiyoruz. Seyahatin ruhunu, bir destinasyonun gerçek özünü aktarıyoruz.", "en": "We don't just show beautiful places. We convey the true essence of a destination." },

    // Oteller
    "otel_hero_eye": { "tr": "Premium Konaklama", "en": "Premium Accommodation" },
    "otel_exp_eye": { "tr": "Deneyim Tasarımı", "en": "Experience Design" },
    "otel_exp_title": { "tr": "Her konaklamanın bir <em>hikayesi</em> vardır", "en": "Every stay has a <em>story</em>" },
    "otel_maxx_desc": { "tr": "Eşsiz Ege manzarası ve ultra-lüks tesisleriyle benzersiz bir deneyim sunan 5 yıldızlı resort.", "en": "A 5-star resort offering a unique experience with stunning Aegean views." },
    "otel_museum_desc": { "tr": "Antik kaya oymaları içinde, tarihin derinliklerinde unutulmaz bir konaklama deneyimi.", "en": "An unforgettable stay deep in history, inside ancient rock carvings." },

    // Yatlar
    "yacht_hero_eye": { "tr": "Akdeniz'de Özgürlük", "en": "Freedom in the Mediterranean" },
    "yacht_hol_eye": { "tr": "Yat Tatili", "en": "Yacht Holiday" },
    "yacht_hol_title": { "tr": "Koydan koya, <em>özgürce</em>", "en": "From bay to bay, <em>freely</em>" },

    // Restoranlar
    "rest_hero_eye": { "tr": "Gastronomi Deneyimi", "en": "Gastronomy Experience" },
    "rest_intro_eye": { "tr": "Lezzet & Atmosfer", "en": "Flavor & Atmosphere" },
    "rest_intro_title": { "tr": "Yemek bir <em>sanat</em>tır", "en": "Dining is an <em>art</em>" },

    // Gezi Rehberi
    "guide_hero_eye": { "tr": "Keşfet & Öğren", "en": "Discover & Learn" },
    "guide_exp_eye": { "tr": "Uzman Tavsiyeleri", "en": "Expert Advice" },

    // Etkinlikler
    "event_hero_eye": { "tr": "Takvim 2026", "en": "Calendar 2026" },
    "event_intro_eye": { "tr": "Bu Sezon", "en": "This Season" },

    // Journal
    "journal_hero_eye": { "tr": "Hikayeler & İçgörüler", "en": "Stories & Insights" },
    "journal_latest_title": { "tr": "Son <em>Yazılar</em>", "en": "Latest <em>Articles</em>" },

    // Index Trends & Tabs
    "trend_otel": { "tr": "Trend Otel", "en": "Trending Hotel" },
    "kassandra_p": { "tr": "Ege'nin gizli kalmış koylarında uyanmanın eşsiz hissi.", "en": "The unique feeling of waking up in the hidden bays of the Aegean." },
    "trend_rest": { "tr": "Trend Restoran", "en": "Trending Restaurant" },
    "melengec_p": { "tr": "Taze deniz ürünleri ile unutulmaz bir gastronomi yolculuğu.", "en": "An unforgettable gastronomic journey with fresh seafood." },
    "trend_yat": { "tr": "Trend Yat", "en": "Trending Yacht" },
    "blue_p": { "tr": "Sonsuz mavilikte rotalar. Rüzgarın sesinden başka hiçbir şey yok.", "en": "Routes in infinite blue. Nothing but the sound of the wind." },
    "trend_beach": { "tr": "Trend Beach", "en": "Trending Beach" },
    "rups_p": { "tr": "Altın kumlar ve kristal sular. Müziğin ritmine eşlik eden anlar.", "en": "Golden sands and crystal waters. Moments accompanying the rhythm of the music." },
    "tab_popular": { "tr": "EN POPÜLER", "en": "MOST POPULAR" },
    "tab_traveller": { "tr": "GEZGİNE GÖRE", "en": "BY TRAVELER" },
    "tab_month": { "tr": "AYA GÖRE", "en": "BY MONTH" },
    "tab_spotlight": { "tr": "VİTRİNDEKİLER", "en": "SPOTLIGHT" },
    "trend_otel_title": { "tr": "Kassandra Villa", "en": "Kassandra Villa" },
    "trend_rest_title": { "tr": "Melengeç", "en": "Melengeç" },
    "trend_yat_title": { "tr": "Blue Voyage", "en": "Blue Voyage" },
    "trend_beach_title": { "tr": "Rups Beach", "en": "Rups Beach" }
};

const savedData = localStorage.getItem('dioreal_lang_data');
let langData = savedData ? { ...DEFAULT_CONTENT, ...JSON.parse(savedData) } : DEFAULT_CONTENT;

const updateLang = (lang) => {
    document.querySelectorAll('[data-i18n]').forEach(el => {
        const key = el.getAttribute('data-i18n');
        if (langData[key]) {
            el.innerHTML = langData[key][lang];
        }
    });
    // Active class for buttons
    document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('active'));
    const selector = lang === 'tr' ? '#lang-tr, #lang-tr-fs' : '#lang-en, #lang-en-fs';
    document.querySelectorAll(selector).forEach(btn => btn.classList.add('active'));
    
    localStorage.setItem('dioreal_lang', lang);
};

// ── MEDIA UPDATE LOGIC ──
const DEFAULT_MEDIA_MAPPING = [
    {t:'Ana Hero 4K', p:'foto.img/hero_4k.jpg'},
    {t:'Logo', p:'foto.img/logo.jpg'},
    {t:'Bodrum Manzara', p:'foto.img/bodrum.jpg'},
    {t:'Amalfi Sahili', p:'foto.img/amalfi.jpg'},
    {t:'Kapadokya Balonlar', p:'foto.img/kapadokya.jpg'},
    {t:'Otel Aman', p:'foto.img/otel_aman.jpg'},
    {t:'Otel Hero', p:'foto.img/otel_hero.jpg'},
    {t:'Otel Hillside', p:'foto.img/otel_hillside.jpg'},
    {t:'Otel Museum', p:'foto.img/otel_museum.jpg'},
    {t:'Otel Sirenuse', p:'foto.img/otel_sirenuse.jpg'},
    {t:'Otel Soneva', p:'foto.img/otel_soneva.jpg'},
    {t:'Restoran Hero', p:'foto.img/rest_hero.jpg'},
    {t:'Restoran Mikla', p:'foto.img/rest_mikla.jpg'},
    {t:'Restoran Zuma', p:'foto.img/rest_zuma.jpg'},
    {t:'Restoran Melengeç', p:'foto.img/rest_melengec.jpg'},
    {t:'Yat Hero', p:'foto.img/yat_hero.jpg'},
    {t:'Yat Azure Dream', p:'foto.img/yat_azure_dream.jpg'},
    {t:'Yat Bodrum Blue', p:'foto.img/yat_bodrum_blue.jpg'},
    {t:'Yat Aegean Wind', p:'foto.img/yat_aegean_wind.jpg'},
    {t:'Japonya Journal', p:'foto.img/japonya.jpg'},
    {t:'Norveç Journal', p:'foto.img/norvec.jpg'},
    {t:'Sahra Journal', p:'foto.img/sahra.jpg'}
];

document.addEventListener("DOMContentLoaded", () => {
    // Check initial language
    const initialLang = localStorage.getItem('dioreal_lang') || 'tr';
    updateLang(initialLang);

    // Update media from localStorage
    const savedMediaStr = localStorage.getItem('dioreal_media_data');
    if (savedMediaStr) {
        try {
            const savedMedia = JSON.parse(savedMediaStr);
            const mediaMap = {};
            
            DEFAULT_MEDIA_MAPPING.forEach((item, index) => {
                if (savedMedia[index] && savedMedia[index].p && savedMedia[index].p !== item.p) {
                    mediaMap[item.p] = savedMedia[index].p;
                }
            });

            // Replace standard images
            document.querySelectorAll('img').forEach(img => {
                const src = img.getAttribute('src');
                if (src && mediaMap[src]) {
                    img.setAttribute('src', mediaMap[src]);
                }
            });

            // Replace background-images
            document.querySelectorAll('[style*="background-image"]').forEach(el => {
                let style = el.getAttribute('style');
                let updated = false;
                for (const orig in mediaMap) {
                    if (style.includes(orig)) {
                        // regex escape helper for path
                        const safeOrig = orig.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                        style = style.replace(new RegExp(safeOrig, 'g'), mediaMap[orig]);
                        updated = true;
                    }
                }
                if (updated) {
                    el.setAttribute('style', style);
                }
            });
        } catch (e) {
            console.error("Media replace error:", e);
        }
    }
});
