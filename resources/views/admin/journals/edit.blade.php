@extends('admin.layouts.app')

@section('title', 'Journal Yazısını Düzenle')

@section('page_title', 'Journal Yazısını Düzenle')
@section('page_subtitle', 'Mevcut journal makalesi bilgilerini ve görsellerini güncelleyin.')

@section('content')
    <div class="panel-card">
        <div class="panel-card-header">
            <h3 class="panel-card-title"><i class="fas fa-edit"></i> Journal Düzenleme Formu</h3>
            <a href="{{ route('admin.journals.index') }}" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Geri Dön
            </a>
        </div>
        
        <form action="{{ route('admin.journals.update', $journal->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

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
                    <input type="text" name="title[tr]" id="title_tr" class="form-control" value="{{ old('title.tr', $journal->title['tr'] ?? '') }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="tag_tr">Kategori / Etiket (TR)</label>
                    <input type="text" name="tag[tr]" id="tag_tr" class="form-control" value="{{ old('tag.tr', $journal->tag['tr'] ?? '') }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="desc_tr">Açıklama / Makale İçeriği (TR)</label>
                    <textarea name="desc[tr]" id="desc_tr" class="form-control" required style="min-height: 200px;">{{ old('desc.tr', $journal->desc['tr'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- English Translation Pane -->
            <div class="lang-pane" data-lang="en">
                <div class="form-group">
                    <label class="form-label" for="title_en">Article Title (EN)</label>
                    <input type="text" name="title[en]" id="title_en" class="form-control" value="{{ old('title.en', $journal->title['en'] ?? '') }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="tag_en">Category / Tag (EN)</label>
                    <input type="text" name="tag[en]" id="tag_en" class="form-control" value="{{ old('tag.en', $journal->tag['en'] ?? '') }}">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="desc_en">Description / Article Content (EN)</label>
                    <textarea name="desc[en]" id="desc_en" class="form-control" required style="min-height: 200px;">{{ old('desc.en', $journal->desc['en'] ?? '') }}</textarea>
                </div>
            </div>

            <!-- Shared General Content -->
            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <!-- Date Info -->
                <div class="form-group">
                    <label class="form-label" for="date">Yayın Tarihi Metni</label>
                    <input type="text" name="date" id="date" class="form-control" value="{{ old('date', $journal->date) }}" required>
                </div>

                <!-- Cover Image -->
                <div>
                    <label class="form-label">Görsel (Kapak)</label>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <input type="file" name="img_file" id="img_file" accept="image/*" style="display:none;" onchange="previewImage(this, 'img_preview')">
                        <button type="button" class="btn btn-outline" onclick="document.getElementById('img_file').click()">
                            <i class="fas fa-sync-alt"></i> Farklı Bir Görsel Seç
                        </button>
                        
                        <div style="display: flex; gap: 1rem; align-items: center; margin-top: 0.5rem;">
                            <div>
                                <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Mevcut Görsel:</span>
                                <div class="image-preview-box" style="width: 150px; height: 100px;">
                                    <img src="{{ asset($journal->img) }}" alt="">
                                </div>
                            </div>
                            <i class="fas fa-arrow-right" style="color: var(--text-muted);"></i>
                            <div>
                                <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Yeni Görsel Önizleme:</span>
                                <div class="image-preview-box" id="img_preview" style="width: 150px; height: 100px;">
                                    <span class="image-preview-text">Değişiklik Yok</span>
                                </div>
                            </div>
                        </div>

                        <div style="margin-top: 1rem;">
                            <label class="form-label" for="img_url">Veya Görsel Yolu (Manuel)</label>
                            <input type="text" name="img_url" id="img_url" class="form-control" value="{{ old('img_url', $journal->img) }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                <a href="{{ route('admin.journals.index') }}" class="btn btn-outline">İptal Et</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Güncelle ve Yayınla
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
                previewBox.innerHTML = '<span class="image-preview-text">Değişiklik Yok</span>';
            }
        }
    </script>
@endsection
