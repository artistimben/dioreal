@extends('admin.layouts.app')

@section('title', 'Yeni Journal Yazısı Ekle')

@section('page_title', 'Yeni Journal Yazısı Ekle')
@section('page_subtitle', 'Koleksiyona eklenecek yeni journal makalesinin detaylarını girin.')

@section('content')
    <div class="panel-card">
        <div class="panel-card-header">
            <h3 class="panel-card-title"><i class="fas fa-plus-circle"></i> Journal Formu</h3>
            <a href="{{ route('admin.journals.index') }}" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Geri Dön
            </a>
        </div>
        
        <form action="{{ route('admin.journals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Language Switcher Tabs -->
            <div class="lang-tabs-container">
                <button type="button" class="lang-tab active" data-lang="tr" onclick="switchLanguageTab('tr')">
                    Türkçe (TR)
                </button>
                <button type="button" class="lang-tab" data-lang="en" onclick="switchLanguageTab('en')">
                    English (EN)
                </button>
            </div>

            <!-- Turkish Translation Pane -->
            <div class="lang-pane active" data-lang="tr">
                <div class="form-group">
                    <label class="form-label" for="title_tr">Makale Başlığı (TR)</label>
                    <input type="text" name="title[tr]" id="title_tr" class="form-control" placeholder="Örn: Bodrum Havalimanı VIP Transfer Hizmetleri" value="{{ old('title.tr') }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="tag_tr">Kategori / Etiket (TR)</label>
                    <input type="text" name="tag[tr]" id="tag_tr" class="form-control" placeholder="Örn: Seyahat & Yaşam" value="{{ old('tag.tr') }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="desc_tr">Açıklama / Makale İçeriği (TR)</label>
                    <textarea name="desc[tr]" id="desc_tr" class="form-control" placeholder="Makale içeriğini detaylıca buraya girin..." required style="min-height: 200px;">{{ old('desc.tr') }}</textarea>
                </div>
            </div>

            <!-- English Translation Pane -->
            <div class="lang-pane" data-lang="en">
                <div class="form-group">
                    <label class="form-label" for="title_en">Article Title (EN)</label>
                    <input type="text" name="title[en]" id="title_en" class="form-control" placeholder="e.g. Bodrum Airport VIP Transfer Services" value="{{ old('title.en') }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="tag_en">Category / Tag (EN)</label>
                    <input type="text" name="tag[en]" id="tag_en" class="form-control" placeholder="e.g. Travel & Lifestyle" value="{{ old('tag.en') }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="desc_en">Description / Article Content (EN)</label>
                    <textarea name="desc[en]" id="desc_en" class="form-control" placeholder="Write detailed article content here..." required style="min-height: 200px;">{{ old('desc.en') }}</textarea>
                </div>
            </div>

            <!-- Shared General Content -->
            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <!-- Date Info -->
                <div class="form-group">
                    <label class="form-label" for="date">Yayın Tarihi Metni</label>
                    <input type="text" name="date" id="date" class="form-control" placeholder="Örn: MAYIS 2024 veya 24.05.2026" value="{{ old('date') }}" required>
                    <small style="color: var(--text-muted); display:block; margin-top:0.25rem;">Sitede görünecek tarih etiketini manuel girin.</small>
                </div>

                <!-- Cover Image -->
                <div>
                    <label class="form-label">Görsel (Kapak)</label>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <input type="file" name="img_file" id="img_file" accept="image/*" style="display:none;" onchange="previewImage(this, 'img_preview')">
                        <button type="button" class="btn btn-outline" onclick="document.getElementById('img_file').click()">
                            <i class="fas fa-image"></i> Görsel Dosyası Seç
                        </button>
                        
                        <div class="image-preview-box" id="img_preview" style="max-width: 300px; height: 180px;">
                            <span class="image-preview-text">Önizleme Yok</span>
                        </div>

                        <div style="margin-top: 1rem;">
                            <label class="form-label" for="img_url">Veya Görsel Yolu (Manuel)</label>
                            <input type="text" name="img_url" id="img_url" class="form-control" placeholder="Örn: foto.img/bodrum_vip.jpg" value="{{ old('img_url') }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                <a href="{{ route('admin.journals.index') }}" class="btn btn-outline">İptal Et</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Kaydet ve Yayınla
                </button>
            </div>
        </form>
    </div>

    <!-- Image Previews Handler -->
    <script>
        function previewImage(input, previewId) {
            const previewBox = document.getElementById(previewId);
            previewBox.innerHTML = '';
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.setAttribute('src', e.target.result);
                    previewBox.appendChild(img);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                previewBox.innerHTML = '<span class="image-preview-text">Önizleme Yok</span>';
            }
        }
    </script>
@endsection
