@extends('admin.layouts.app')

@yield('title', 'Genel Ayarlar')

@section('page_title', 'Genel Ayarlar')
@section('page_subtitle', 'Sitenin iletişim bilgileri, sosyal ağ entegrasyonları, hero başlıkları ve marka referanslarının yönetimi.')

@section('content')
<div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem;">
    
    <!-- General settings form -->
    <div class="panel-card">
        <div class="panel-card-header">
            <h3 class="panel-card-title">
                <i class="fas fa-sliders-h" style="color: var(--primary); margin-right: 0.5rem;"></i> Genel Ayarları Güncelle
            </h3>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            <!-- Hero Section Titles -->
            <div style="margin-bottom: 2rem; border-bottom: 1px solid var(--border-color); padding-bottom: 1.5rem;">
                <h4 style="color: var(--primary); margin-bottom: 1rem; font-size: 1.05rem;">Hero Giriş Başlığı</h4>
                <div class="lang-tabs-container">
                    <button type="button" class="lang-tab active" data-lang="tr" onclick="switchLanguageTab('tr')">Türkçe</button>
                    <button type="button" class="lang-tab" data-lang="en" onclick="switchLanguageTab('en')">English</button>
                </div>

                <div class="lang-pane active" data-lang="tr">
                    <div class="form-group">
                        <label class="form-label" for="hero_title_tr">Ana Başlık (TR)</label>
                        <textarea class="form-control" name="hero_title_tr" id="hero_title_tr" rows="2" placeholder="Örn: Türkiye ve dünyada seçkin&#10;deneyimlerin kapısını aralıyoruz.">{{ $settings['hero_title_tr'] ?? '' }}</textarea>
                        <small style="color: var(--text-muted); display: block; margin-top: 0.25rem;">Satır atlamak istediğiniz yerlerde normal Enter tuşuna basabilirsiniz.</small>
                    </div>
                </div>

                <div class="lang-pane" data-lang="en">
                    <div class="form-group">
                        <label class="form-label" for="hero_title_en">Ana Başlık (EN)</label>
                        <textarea class="form-control" name="hero_title_en" id="hero_title_en" rows="2" placeholder="Örn: Opening doors to exclusive&#10;experiences globally.">{{ $settings['hero_title_en'] ?? '' }}</textarea>
                        <small style="color: var(--text-muted); display: block; margin-top: 0.25rem;">Satır atlamak istediğiniz yerlerde normal Enter tuşuna basabilirsiniz.</small>
                    </div>
                </div>
            </div>

            <!-- Contact & Social Media Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                
                <!-- Contact Info Section -->
                <div>
                    <h4 style="color: var(--primary); margin-bottom: 1rem; font-size: 1.05rem;">İletişim Bilgileri</h4>
                    
                    <div class="form-group">
                        <label class="form-label" for="contact_email">E-posta Adresi</label>
                        <input type="email" class="form-control" name="contact_email" id="contact_email" value="{{ $settings['contact_email'] ?? '' }}" placeholder="info@diorealdijital.com">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="contact_phone">Telefon Numarası</label>
                        <input type="text" class="form-control" name="contact_phone" id="contact_phone" value="{{ $settings['contact_phone'] ?? '' }}" placeholder="+90 212 555 0100">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="contact_address_tr">Adres (TR)</label>
                        <input type="text" class="form-control" name="contact_address_tr" id="contact_address_tr" value="{{ $settings['contact_address_tr'] ?? '' }}" placeholder="İstanbul, Türkiye">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="contact_address_en">Adres (EN)</label>
                        <input type="text" class="form-control" name="contact_address_en" id="contact_address_en" value="{{ $settings['contact_address_en'] ?? '' }}" placeholder="Istanbul, Turkey">
                    </div>
                </div>

                <!-- Social Media & Integrations -->
                <div>
                    <h4 style="color: var(--primary); margin-bottom: 1rem; font-size: 1.05rem;">Sosyal Ağlar & Entegrasyonlar</h4>

                    <div class="form-group">
                        <label class="form-label" for="instagram">Instagram Profili</label>
                        <input type="url" class="form-control" name="instagram" id="instagram" value="{{ $settings['instagram'] ?? '' }}" placeholder="https://instagram.com/kullanici">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="linkedin">LinkedIn Profili</label>
                        <input type="url" class="form-control" name="linkedin" id="linkedin" value="{{ $settings['linkedin'] ?? '' }}" placeholder="https://linkedin.com/company/sirket">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="whatsapp">WhatsApp Buton Numarası</label>
                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ $settings['whatsapp'] ?? '' }}" placeholder="905320000000">
                        <small style="color: var(--text-muted); display: block; margin-top: 0.25rem;">Numaranın başına + veya 0 koymadan, ülke koduyla bitişik yazın (Örn: 905321234567).</small>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="footer_copy">Footer Telif Yazısı (Copyright)</label>
                        <input type="text" class="form-control" name="footer_copy" id="footer_copy" value="{{ $settings['footer_copy'] ?? '' }}" placeholder="© 2026 Dioreal Dijital. All Rights Reserved.">
                    </div>
                </div>

            </div>

            <!-- Form Submit -->
            <div style="border-top: 1px solid var(--border-color); padding-top: 1.5rem; display: flex; justify-content: flex-end;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Değişiklikleri Kaydet
                </button>
            </div>
        </form>
    </div>

    <!-- Brands & Collaborations Management -->
    <div class="panel-card">
        <div class="panel-card-header">
            <h3 class="panel-card-title">
                <i class="fas fa-handshake" style="color: var(--primary); margin-right: 0.5rem;"></i> Marka Referansları
            </h3>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            
            <!-- Existing Brands Grid -->
            <div>
                <h4 style="color: var(--primary); margin-bottom: 1rem; font-size: 1.05rem;">Mevcut Referanslar</h4>
                
                @if(isset($settings['brands']) && is_array($settings['brands']) && count($settings['brands']) > 0)
                    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(130px, 1fr)); gap: 1rem; max-height: 400px; overflow-y: auto; padding-right: 0.5rem;">
                        @foreach($settings['brands'] as $index => $brand)
                            <div style="background: rgba(15, 23, 42, 0.4); border: 1px solid var(--border-color); border-radius: var(--radius-md); padding: 0.75rem; display: flex; flex-direction: column; align-items: center; justify-content: space-between; text-align: center; height: 120px; position: relative;">
                                <div style="width: 100%; height: 50px; display: flex; align-items: center; justify-content: center; background: rgba(0, 0, 0, 0.1); border-radius: 4px; overflow: hidden; margin-bottom: 0.5rem;">
                                    <img src="{{ asset($brand['img']) }}" alt="{{ $brand['name'] }}" style="max-width: 90%; max-height: 90%; object-fit: contain; filter: brightness(0) invert(1);">
                                </div>
                                <span style="font-size: 0.8rem; font-weight: 500; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; width: 100%;">{{ $brand['name'] }}</span>
                                
                                <form action="{{ route('admin.settings.delete_brand', $index) }}" method="POST" onsubmit="return confirm('Bu markayı referanslardan kaldırmak istediğinizden emin misiniz?');" style="position: absolute; top: 5px; right: 5px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: rgba(239, 68, 68, 0.2); border: 1px solid rgba(239, 68, 68, 0.3); color: #f87171; width: 22px; height: 22px; border-radius: 50%; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 0.7rem; transition: var(--transition);">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Henüz bir referans marka eklenmemiş.</p>
                @endif
            </div>

            <!-- Add Brand Form -->
            <div style="background: rgba(255, 255, 255, 0.02); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 1.5rem;">
                <h4 style="color: var(--primary); margin-bottom: 1.25rem; font-size: 1.05rem;">Yeni Referans Ekle</h4>
                
                <form action="{{ route('admin.settings.add_brand') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <label class="form-label" for="brand_name">Marka Adı</label>
                        <input type="text" class="form-control" name="brand_name" id="brand_name" required placeholder="Örn: Gucci">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="brand_logo">Marka Logosu</label>
                        <input type="file" class="form-control" name="brand_logo" id="brand_logo" required accept="image/*">
                        <small style="color: var(--text-muted); display: block; margin-top: 0.25rem;">Şeffaf arka planlı PNG, SVG veya WEBP formatı önerilir.</small>
                    </div>

                    <div style="margin-top: 1.5rem;">
                        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">
                            <i class="fas fa-plus"></i> Referans Markayı Ekle
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
@endsection
