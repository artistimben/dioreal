/* ── SHARED JS — boztravel ───────────────────────────────── */

// ── NAV SCROLL & HAMBURGER ──
const mainNav = document.getElementById('mainNav');
const hamb = document.getElementById('hamb');
const fsMenu = document.getElementById('fsMenu');

if (mainNav) {
    window.addEventListener('scroll', () => {
        mainNav.classList.toggle('scrolled', window.scrollY > 60);
    }, { passive: true });
}
if (hamb && fsMenu) {
    hamb.addEventListener('click', () => {
        hamb.classList.toggle('active');
        fsMenu.classList.toggle('active');
        document.body.style.overflow = fsMenu.classList.contains('active') ? 'hidden' : '';
    });
    fsMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
        hamb.classList.remove('active');
        fsMenu.classList.remove('active');
        document.body.style.overflow = '';
    }));
}

// ── REVEAL ──
const observer = new IntersectionObserver(entries => {
    entries.forEach(e => {
        if (e.isIntersecting) { e.target.classList.add('visible'); observer.unobserve(e.target); }
    });
}, { threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

// ── TRANSLATION ──
// Support for Live Preview from Admin Panel
const savedData = localStorage.getItem('dioreal_lang_data');
const langData = savedData ? JSON.parse(savedData) : {
    // Nav
    "nav_home": { "tr": "Ana Sayfa", "en": "Home" },
    "nav_about": { "tr": "Hakkımızda", "en": "About" },
    "nav_hotels": { "tr": "Oteller", "en": "Hotels" },
    "nav_yachts": { "tr": "Yatlar", "en": "Yachts" },
    "nav_restaurants": { "tr": "Restoranlar", "en": "Restaurants" },
    "nav_guide": { "tr": "Gezi Rehberi", "en": "Travel Guide" },
    "nav_events": { "tr": "Etkinlikler", "en": "Events" },
    "nav_journal": { "tr": "Journal", "en": "Journal" },
    
    // Common Buttons
    "btn_explore": { "tr": "Keşfet", "en": "Explore" },
    "btn_apply": { "tr": "Başvuru Yap", "en": "Apply Now" },
    "btn_contact": { "tr": "İletişime Geç", "en": "Contact Us" },
    "btn_cont": { "tr": "OKUMAYA DEVAM ET", "en": "CONTINUE READING" },
    "btn_contact_wa": { "tr": "WhatsApp İletişim", "en": "WhatsApp Contact" },

    // Footer
    "footer_pages": { "tr": "Sayfalar", "en": "Pages" },
    "footer_serv": { "tr": "Hizmetler", "en": "Services" },
    "footer_contact": { "tr": "İletişim", "en": "Contact" },
    "footer_p": { "tr": "Seçkin destinasyonları ve premium markaları doğru kitleyle buluşturan medya platformu.", "en": "Media platform connecting exclusive destinations and premium brands with the right audience." },

    // Hakkımızda Page
    "about_eyebrow": { "tr": "Biz Kimiz", "en": "Who We Are" },
    "about_title": { "tr": "<em>Dioreal</em> Dijital", "en": "<em>Dioreal</em> Digital Media" },
    "story_eyebrow": { "tr": "Hikayemiz", "en": "Our Story" },
    "story_title": { "tr": "15 yıldır lüks <em>seyahatin</em> sesi", "en": "Voice of luxury <em>travel</em> for 15 years" },
    "about_p1": { "tr": "2010 yılında İstanbul'da kurulan Dioreal Dijital, Türkiye'nin öncü lüks seyahat ve yaşam tarzı medya platformuna dönüşmüştür. Seçkin destinasyonlar, premium markalar ve doğru kitleyi bir araya getiren köprü olmak misyonuyla kurulduk.", "en": "Founded in Istanbul in 2010, Dioreal Digital has evolved into Turkey's leading luxury travel and lifestyle media platform. We were established with the mission to be the bridge connecting exclusive destinations, premium brands, and the right audience." },
    "about_p2": { "tr": "Her destinasyonda bizzat bulunarak, her oteli bizatihi deneyimleyerek ve her markayı özenle seçerek güvenilir bir referans noktası haline geldik.", "en": "By personally visiting every destination, experiencing every hotel firsthand, and carefully selecting every brand, we have become a trusted reference point." },
    "stats_eyebrow": { "tr": "Rakamlarla", "en": "By Numbers" },
    "stats_title": { "tr": "15 Yılın <em>Mirası</em>", "en": "Legacy of <em>15 Years</em>" },
    "stat_dest": { "tr": "Destinasyon", "en": "Destinations" },
    "stat_readers": { "tr": "Aylık Okuyucu", "en": "Monthly Readers" },
    "stat_brands": { "tr": "Marka Ortağı", "en": "Brand Partners" },
    "stat_exp": { "tr": "Yıllık Deneyim", "en": "Years of Experience" },
    "mission_eyebrow": { "tr": "Misyonumuz", "en": "Our Mission" },
    "mission_title": { "tr": "Anlamlı <em>deneyimler</em> için", "en": "For meaningful <em>experiences</em>" },
    "mission_p1": { "tr": "Sadece güzel yerler göstermiyoruz. Seyahatin ruhunu, bir destinasyonun gerçek özünü, yerel kültürün derinliğini aktarıyoruz. Her içeriğimiz bizzat yaşadığımız deneyimlerin dürüst bir yansımasıdır.", "en": "We don't just show beautiful places. We convey the soul of travel, the true essence of a destination, and the depth of local culture. Every piece of our content is an honest reflection of our firsthand experiences." },
    "mission_p2": { "tr": "Okuyucularımız bize güvenir, markalarımız bize inanır, destinasyonlar bizi ortaklık arar çünkü söylediğimiz her şey gerçek.", "en": "Our readers trust us, our brands believe in us, and destinations seek our partnership because everything we say is real." },

    // Sections
    "dest_title": { "tr": "Seçkin <em>Destinasyonlar</em>", "en": "Exclusive <em>Destinations</em>" },
    "hotel_title": { "tr": "Lüks <em>Konaklama</em>", "en": "Luxury <em>Stay</em>" },
    "yacht_title": { "tr": "Özel <em>Yatlar</em>", "en": "Private <em>Yachts</em>" },
    "rest_title": { "tr": "Seçkin <em>Restoranlar</em>", "en": "Selected <em>Restaurants</em>" },

    // Oteller Ekstra
    "otel_hero_eye": { "tr": "Premium Konaklama", "en": "Premium Accommodation" },
    "otel_exp_eye": { "tr": "Deneyim Tasarımı", "en": "Experience Design" },
    "otel_exp_title": { "tr": "Her konaklamanın bir <em>hikayesi</em> vardır", "en": "Every stay has a <em>story</em>" },
    "otel_exp_p1": { "tr": "Dünyaca ünlü butik oteller, tarihi yapılar ve ultra-lüks resort'lardan oluşan koleksiyonumuz, seyahatinizin her anını unutulmaz kılmak için özenle seçilmiştir. Sadece bir oda değil; bir atmosfer, bir his, bir deneyim sunuyoruz.", "en": "Our collection of world-renowned boutique hotels, historic buildings, and ultra-luxury resorts is carefully selected to make every moment of your trip unforgettable. We offer not just a room, but an atmosphere, a feeling, an experience." },
    "btn_discover_col": { "tr": "Koleksiyonu Keşfet", "en": "Discover Collection" },
    "otel_col_eye": { "tr": "Seçkin Koleksiyon", "en": "Exclusive Collection" },
    "otel_col_title": { "tr": "Öne Çıkan <em>Oteller</em>", "en": "Featured <em>Hotels</em>" },
    "otel_maxx_desc": { "tr": "Eşsiz Ege manzarası ve ultra-lüks tesisleriyle benzersiz bir deneyim sunan 5 yıldızlı resort.", "en": "A 5-star resort offering a unique experience with stunning Aegean views and ultra-luxury facilities." },
    "otel_museum_desc": { "tr": "Antik kaya oymaları içinde, tarihin derinliklerinde unutulmaz bir konaklama deneyimi.", "en": "An unforgettable stay deep in history, inside ancient rock carvings." },
    "otel_hillside_desc": { "tr": "Özel plajı, eşsiz koyu ve lüks hizmetleriyle Türkiye'nin en prestijli tatil köyü.", "en": "Turkey's most prestigious holiday village with its private beach, unique bay, and luxury services." },
    "otel_soneva_desc": { "tr": "Su üstü villalar, kristal berraklığında lagün ve sonsuz gökyüzü altında rüya konaklama.", "en": "Overwater villas, crystal clear lagoon, and dream accommodation under the endless sky." },
    "otel_aman_desc": { "tr": "Japon wabi-sabi felsefesini modern lüksle harmanlayan, orman içinde saklı benzersiz bir sığınak.", "en": "A unique sanctuary hidden in the forest, blending Japanese wabi-sabi philosophy with modern luxury." },
    "otel_siren_desc": { "tr": "Positano'nun ikonik manzarası karşısında, denizi ve bougainvillea'ları izleyen efsanevi butik otel.", "en": "A legendary boutique hotel overlooking the sea and bougainvilleas, facing Positano's iconic view." },

    // Yatlar Ekstra
    "yacht_hero_eye": { "tr": "Akdeniz'de Özgürlük", "en": "Freedom in the Mediterranean" },
    "yacht_hol_eye": { "tr": "Yat Tatili", "en": "Yacht Holiday" },
    "yacht_hol_title": { "tr": "Koydan koya, <em>özgürce</em>", "en": "From bay to bay, <em>freely</em>" },
    "yacht_hol_p1": { "tr": "Kendi rotanızı belirleyin, kendi hızınızda ilerleyin. Türkiye'nin turquoise kıyılarından Yunan adalarına, İtalyan rivieralarından Hırvatistan koylarına uzanan yolculuklarda lüks ve özgürlüğü bir arada yaşayın.", "en": "Set your own course, proceed at your own pace. Experience luxury and freedom together on journeys stretching from Turkey's turquoise coasts to the Greek islands, Italian rivieras to Croatian bays." },
    "btn_explore_yachts": { "tr": "Yatları İncele", "en": "Explore Yachts" },
    "yacht_fleet_eye": { "tr": "Filo", "en": "Fleet" },
    "yacht_fleet_title": { "tr": "Premium <em>Yat Filomuz</em>", "en": "Premium <em>Yacht Fleet</em>" },
    "yacht_bodrum_desc": { "tr": "8 misafir kapasiteli, teak güverteli, Türk el sanatlarıyla donatılmış geleneksel Bodrum gulet'i.", "en": "Traditional Bodrum gulet equipped with Turkish handicrafts, teak deck, 8 guest capacity." },
    "yacht_azure_desc": { "tr": "12 misafir kapasiteli, helikopter pisti, jakuzi ve tam donanımlı modern süper yat deneyimi.", "en": "Modern superyacht experience with 12 guest capacity, helipad, jacuzzi, and full equipment." },
    "yacht_aegean_desc": { "tr": "6 misafir için özel, rüzgarın gücüyle Ege'yi keşfetmek isteyenler için premium yelkenli yat.", "en": "Premium sailing yacht for those who want to explore the Aegean with the power of the wind, private for 6 guests." },
    "yacht_route_eye": { "tr": "Güzergah Planlaması", "en": "Itinerary Planning" },
    "yacht_route_title": { "tr": "Her yolculuk <em>size özel</em>", "en": "Every journey is <em>unique to you</em>" },
    "yacht_route_p1": { "tr": "Bodrum'dan Marmaris'e mavi yolculuk, Ege adaları turu ya da Akdeniz'den Adriyatik'e uzanan epik rotalar — siz hayal edin, biz planlayalım. Deneyimli kaptanlarımız ve özel aşçılarımızla konfor ve lüks güvencesinde.", "en": "A blue cruise from Bodrum to Marmaris, an Aegean islands tour, or epic routes stretching from the Mediterranean to the Adriatic — you imagine, we plan. Guaranteed comfort and luxury with our experienced captains and private chefs." },
    "btn_plan_route": { "tr": "Rota Planlat", "en": "Plan Itinerary" },

    // Restoranlar Ekstra
    "rest_hero_eye": { "tr": "Gastronomi Deneyimi", "en": "Gastronomy Experience" },
    "rest_intro_eye": { "tr": "Lezzet & Atmosfer", "en": "Flavor & Atmosphere" },
    "rest_intro_title": { "tr": "Yemek bir <em>sanat</em>tır", "en": "Dining is an <em>art</em>" },
    "rest_intro_p1": { "tr": "Michelin yıldızlı şeflerden yerel lezzet ustalarına, deniz kenarı balık restoranlarından dağ başı gurme deneyimlerine uzanan koleksiyonumuzla her damak tadına hitap eden masaları keşfedin.", "en": "Discover tables that appeal to every palate with our collection ranging from Michelin-starred chefs to local flavor masters, from seaside fish restaurants to mountain top gourmet experiences." },
    "btn_discover_tables": { "tr": "Masaları Keşfet", "en": "Discover Tables" },
    "rest_col_eye": { "tr": "Koleksiyon", "en": "Collection" },
    "rest_col_title": { "tr": "Öne Çıkan <em>Masalar</em>", "en": "Featured <em>Tables</em>" },
    "rest_mikla_desc": { "tr": "Boğaz manzarasına hâkim terası ve Türk-İskandinav mutfağı füzyonuyla İstanbul'un efsanevi adresi.", "en": "Istanbul's legendary address with a terrace dominating the Bosphorus view and Turkish-Scandinavian cuisine fusion." },
    "rest_zuma_desc": { "tr": "Japon Izakaya geleneğini modern lüksle buluşturan, Bodrum Marina'nın en prestijli restoranı.", "en": "Bodrum Marina's most prestigious restaurant, bringing the Japanese Izakaya tradition together with modern luxury." },
    "rest_melengec_desc": { "tr": "Ege'nin en taze deniz ürünleri, nefis zeytinyağlılar ve muhteşem Alaçatı manzarasıyla unutulmaz bir sofra.", "en": "An unforgettable table with the freshest Aegean seafood, delicious olive oil dishes, and a magnificent Alaçatı view." },
    "rest_hide_desc": { "tr": "Denize 10 metre yukarıdan bakan terası ve yaratıcı Akdeniz menüsüyle Kaş'ın en romantik adresi.", "en": "Kaş's most romantic address with a terrace looking down on the sea from 10 meters high and a creative Mediterranean menu." },
    "rest_seki_desc": { "tr": "Çardak altında Kapadokya üzüm bağlarından derlenmiş yerel şaraplar ve Anadolu mutfağının en güzel yorumu.", "en": "Local wines gathered from Cappadocia vineyards under the arbor and the best interpretation of Anatolian cuisine." },
    "rest_olu_desc": { "tr": "Dünyaca ünlü Ölüdeniz lagünüyle iç içe geçmiş sahil restoranı, taze balık ve kokteyller.", "en": "A coastal restaurant intertwined with the world-famous Ölüdeniz lagoon, fresh fish, and cocktails." },

    // Gezi Rehberi Ekstra
    "guide_hero_eye": { "tr": "Keşfet & Öğren", "en": "Discover & Learn" },
    "guide_exp_eye": { "tr": "Uzman Tavsiyeleri", "en": "Expert Advice" },
    "guide_exp_title": { "tr": "Doğru kararları <em>kolayca</em> verin", "en": "Make the right decisions <em>easily</em>" },
    "guide_exp_p1": { "tr": "Deneyimli seyahat editörlerimizin hazırladığı destinasyon rehberleri, pratik ipuçları ve sezonluk önerilerle seyahat planlamanızı kolaylaştırıyoruz.", "en": "We make your travel planning easier with destination guides, practical tips, and seasonal recommendations prepared by our experienced travel editors." },
    "tag_dest_guide": { "tr": "Destinasyon Rehberi", "en": "Destination Guide" },
    "guide_bodrum_desc": { "tr": "Gidilecek plajlar, gece hayatı, en iyi restoranlar ve gizli koylar. Bodrum'da yapılacak her şey.", "en": "Beaches to visit, nightlife, best restaurants, and hidden bays. Everything to do in Bodrum." },
    "guide_kapadokya_desc": { "tr": "Turistik yerler dışında, peri bacalarının arasında saklı kalmış otantik köyler ve benzersiz deneyimler.", "en": "Aside from tourist spots, authentic villages hidden among fairy chimneys and unique experiences." },
    "tag_season_guide": { "tr": "Sezon Rehberi", "en": "Season Guide" },
    "guide_cesme_desc": { "tr": "Kalabalık öncesi Çeşme'nin en keyifli hali. Rüzgar festivali, lale bahçeleri ve sakin kafeler.", "en": "The most enjoyable state of Çeşme before the crowd. Wind festival, tulip gardens, and quiet cafes." },
    "tag_abroad_guide": { "tr": "Yurtdışı Rehberi", "en": "Abroad Guide" },
    "guide_japan_desc": { "tr": "Tokyo'dan Kyoto'ya, şehirden kırsala. 14 günlük ideal Japonya rotası ve bilinmesi gereken her şey.", "en": "From Tokyo to Kyoto, from city to countryside. 14-day ideal Japan route and everything you need to know." },
    "tag_honey_guide": { "tr": "Balayı Rehberi", "en": "Honeymoon Guide" },
    "guide_maldives_desc": { "tr": "Hangi ada, hangi resort? Bütçenize göre en iyi Maldivler seçeneği ve seyahat dönemi tavsiyeleri.", "en": "Which island, which resort? The best Maldives option according to your budget and travel period recommendations." },
    "tag_nature_guide": { "tr": "Doğa Rehberi", "en": "Nature Guide" },
    "guide_fethiye_desc": { "tr": "12 Adalar, Ölüdeniz, Kelebekler Vadisi. Fethiye'nin en güzel koylarına yat turuyla nasıl gidilir.", "en": "12 Islands, Ölüdeniz, Butterfly Valley. How to get to Fethiye's most beautiful bays by yacht tour." },

    // Etkinlikler Ekstra
    "event_hero_eye": { "tr": "Takvim 2026", "en": "Calendar 2026" },
    "event_intro_eye": { "tr": "Bu Sezon", "en": "This Season" },
    "event_intro_title": { "tr": "Kaçırılmayacak <em>Anlar</em>", "en": "Unmissable <em>Moments</em>" },
    "month_may": { "tr": "Mayıs", "en": "May" },
    "tag_gastro": { "tr": "Gastronomi", "en": "Gastronomy" },
    "event_1_title": { "tr": "İstanbul Yemek Festivali 2026", "en": "Istanbul Food Festival 2026" },
    "event_1_loc": { "tr": "📍 Beşiktaş Meydanı, İstanbul", "en": "📍 Beşiktaş Square, Istanbul" },
    "tag_culture": { "tr": "Kültür & Sanat", "en": "Culture & Art" },
    "event_2_title": { "tr": "Bodrum Uluslararası Bale Festivali", "en": "Bodrum International Ballet Festival" },
    "event_2_loc": { "tr": "📍 Bodrum Kalesi Açık Hava Sahnesi", "en": "📍 Bodrum Castle Open Air Stage" },
    "month_jun": { "tr": "Haziran", "en": "June" },
    "tag_sports": { "tr": "Spor & Macera", "en": "Sports & Adventure" },
    "event_3_title": { "tr": "Alaçatı Rüzgar Sörfü Festivali", "en": "Alaçatı Windsurfing Festival" },
    "event_3_loc": { "tr": "📍 Alaçatı Limanı, Çeşme", "en": "📍 Alaçatı Port, Çeşme" },
    "tag_music": { "tr": "Müzik", "en": "Music" },
    "event_4_title": { "tr": "Fethiye Jazz Under the Stars", "en": "Fethiye Jazz Under the Stars" },
    "event_4_loc": { "tr": "📍 Ölüdeniz Beach Club, Fethiye", "en": "📍 Ölüdeniz Beach Club, Fethiye" },
    "month_jul": { "tr": "Temmuz", "en": "July" },
    "tag_wellness": { "tr": "Wellness", "en": "Wellness" },
    "event_5_title": { "tr": "Kapadokya Yoga & Sağlıklı Yaşam Retreatı", "en": "Cappadocia Yoga & Wellness Retreat" },
    "event_5_loc": { "tr": "📍 Museum Hotel, Uçhisar, Kapadokya", "en": "📍 Museum Hotel, Uçhisar, Cappadocia" },
    "tag_maritime": { "tr": "Denizcilik", "en": "Maritime" },
    "event_6_title": { "tr": "Datça - Knidos Yat Rallisi", "en": "Datça - Knidos Yacht Rally" },
    "event_6_loc": { "tr": "📍 Datça Yat Limanı", "en": "📍 Datça Marina" },
    "btn_review": { "tr": "İncele", "en": "Review" },

    // Journal Ekstra
    "journal_hero_eye": { "tr": "Hikayeler & İçgörüler", "en": "Stories & Insights" },
    "tag_abroad_asia": { "tr": "Yurtdışı · Asya", "en": "Abroad · Asia" },
    "journal_1_title": { "tr": "Japonya'da Çay Seremonisi: Bir Saatlik Sonsuzluk", "en": "Tea Ceremony in Japan: A One-Hour Eternity" },
    "journal_1_desc": { "tr": "Kyoto'nun arka sokaklarında, turizmden uzak küçük bir çay evinde yaşadığımız deneyim... Wabi-sabi felsefesinin tam ortasında, bir fincan yeşil çay ile her şeyin durduğu o anı anlatıyoruz.", "en": "Our experience in a small tea house away from tourism in the back streets of Kyoto... We describe that moment when everything stopped with a cup of green tea right in the middle of the Wabi-sabi philosophy." },
    "btn_continue_reading": { "tr": "Okumaya Devam Et", "en": "Continue Reading" },
    "date_apr22": { "tr": "22 Nisan 2026", "en": "April 22, 2026" },
    "journal_2_title": { "tr": "Su Üstü Villada Bir Hafta: Gerçekten Değer mi?", "en": "A Week in an Overwater Villa: Is it Really Worth It?" },
    "date_apr15": { "tr": "15 Nisan 2026", "en": "April 15, 2026" },
    "journal_3_title": { "tr": "Bodrum'da Bir Yaz: Sezon Öncesi Sessizlik", "en": "A Summer in Bodrum: Pre-Season Silence" },
    "date_apr8": { "tr": "8 Nisan 2026", "en": "April 8, 2026" },
    "journal_4_title": { "tr": "Kapadokya'da Balon: Pişman Olmayacaksınız", "en": "Balloon in Cappadocia: You Won't Regret It" },
    "date_apr1": { "tr": "1 Nisan 2026", "en": "April 1, 2026" },
    "journal_5_title": { "tr": "Patagonya'nın Uçsuz Bucaksız Sessizliğinde", "en": "In the Endless Silence of Patagonia" },
    "journal_latest_title": { "tr": "Son <em>Yazılar</em>", "en": "Latest <em>Articles</em>" },
    "tag_turkey_aegean": { "tr": "Türkiye · Ege", "en": "Turkey · Aegean" },
    "journal_6_title": { "tr": "Alaçatı'nın Gizli Kalmış Köşeleri", "en": "The Hidden Corners of Alaçatı" },
    "journal_6_desc": { "tr": "Turistlerin bilmediği sokaklar, gerçek yerel tatlar and en iyi gün batımı noktaları.", "en": "Streets unknown to tourists, real local tastes, and the best sunset spots." },
    "tag_abroad_neurope": { "tr": "Yurtdışı · Kuzey Avrupa", "en": "Abroad · Northern Europe" },
    "journal_7_title": { "tr": "Norveç Fiyortlarında Gün Batımı", "en": "Sunset in the Norwegian Fjords" },
    "journal_7_desc": { "tr": "Gece yarısı güneşinin altında küçük bir kayıkla Hardangerfjord'u kat etmenin hikayesi.", "en": "The story of traversing the Hardangerfjord in a small boat under the midnight sun." },
    "tag_abroad_africa": { "tr": "Yurtdışı · Afrika", "en": "Abroad · Africa" },
    "journal_8_title": { "tr": "Sahra'da Yıldızların Altında Uyumak", "en": "Sleeping Under the Stars in the Sahara" },
    "journal_8_desc": { "tr": "Lüks çadır, yüksek kum tepeleri ve şehrin gürültüsünden sonunda kaçmanın tarifi.", "en": "Luxury tent, high sand dunes, and the recipe for finally escaping the noise of the city." }
};

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

// Event Listeners
if (document.querySelectorAll('#lang-en, #lang-en-fs').length > 0) {
    document.querySelectorAll('#lang-en, #lang-en-fs').forEach(btn => btn.addEventListener('click', () => updateLang('en')));
}
if (document.querySelectorAll('#lang-tr, #lang-tr-fs').length > 0) {
    document.querySelectorAll('#lang-tr, #lang-tr-fs').forEach(btn => btn.addEventListener('click', () => updateLang('tr')));
}

// Load state
window.addEventListener('DOMContentLoaded', () => {
    const savedLang = localStorage.getItem('dioreal_lang') || 'tr';
    updateLang(savedLang);
});
