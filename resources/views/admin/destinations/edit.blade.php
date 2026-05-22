@extends('admin.layouts.app')

@section('title', 'Destinasyonu Düzenle')

@section('page_title', 'Destinasyonu Düzenle')
@section('page_subtitle', 'Mevcut destinasyon kartının detaylarını ve görselini güncelleyin.')

@section('content')
    <div class="panel-card">
        <div class="panel-card-header">
            <h3 class="panel-card-title"><i class="fas fa-edit"></i> Destinasyon Düzenle</h3>
            <a href="{{ route('admin.destinations.index') }}" class="btn btn-outline">
                <i class="fas fa-arrow-left"></i> Geri Dön
            </a>
        </div>
        
        <form action="{{ route('admin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
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
                    <label class="form-label" for="name_tr">Destinasyon Adı (TR)</label>
                    <input type="text" name="name[tr]" id="name_tr" class="form-control" placeholder="Örn: Kapadokya" value="{{ old('name.tr', $destination->name['tr'] ?? '') }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="region_tr">Bölge / Alt Başlık (TR)</label>
                    <input type="text" name="region[tr]" id="region_tr" class="form-control" placeholder="Örn: Nevşehir" value="{{ old('region.tr', $destination->region['tr'] ?? '') }}" required>
                </div>
            </div>

            <!-- English Translation Pane -->
            <div class="lang-pane" data-lang="en">
                <div class="form-group">
                    <label class="form-label" for="name_en">Destination Name (EN)</label>
                    <input type="text" name="name[en]" id="name_en" class="form-control" placeholder="e.g. Cappadocia" value="{{ old('name.en', $destination->name['en'] ?? '') }}" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="region_en">Region / Subtitle (EN)</label>
                    <input type="text" name="region[en]" id="region_en" class="form-control" placeholder="e.g. Nevsehir" value="{{ old('region.en', $destination->region['en'] ?? '') }}" required>
                </div>
            </div>

            <!-- Shared General Content -->
            <hr style="border: 0; border-top: 1px solid var(--border-color); margin: 2rem 0;">

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                <!-- General details -->
                <div>
                    <div class="form-group">
                        <label class="form-label" for="type">Kategori Grubu</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="">Seçiniz</option>
                            @foreach($types as $value => $label)
                                <option value="{{ $value }}" {{ old('type', $destination->type) == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="order">Sıra Numarası (Küçük olan önce görünür)</label>
                        <input type="number" name="order" id="order" class="form-control" placeholder="Örn: 0" value="{{ old('order', $destination->order) }}">
                    </div>
                </div>

                <!-- Cover Image -->
                <div>
                    <label class="form-label">Görsel</label>
                    <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <input type="file" name="img_file" id="img_file" accept="image/*" style="display:none;" onchange="previewImage(this, 'img_preview')">
                        <button type="button" class="btn btn-outline" onclick="document.getElementById('img_file').click()">
                            <i class="fas fa-image"></i> Görsel Dosyası Seç
                        </button>
                        
                        <div class="image-preview-box" id="img_preview" style="height: 150px; border: 1px dashed var(--border-color); display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: var(--radius-sm); background: rgba(15,23,42,0.3);">
                            @if($destination->img)
                                <img src="{{ asset($destination->img) }}" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                            @else
                                <span class="image-preview-text" style="color: var(--text-muted);">Önizleme Yok</span>
                            @endif
                        </div>

                        <div style="margin-top: 1rem;">
                            <label class="form-label" for="img_url">Veya Hazır Görsel Yolu (Manuel)</label>
                            <input type="text" name="img_url" id="img_url" class="form-control" placeholder="Örn: foto.img/istanbul.jpg" value="{{ old('img_url', $destination->img) }}">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                <a href="{{ route('admin.destinations.index') }}" class="btn btn-outline">İptal Et</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Değişiklikleri Kaydet
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
                    img.style.maxWidth = '100%';
                    img.style.maxHeight = '100%';
                    img.style.objectFit = 'contain';
                    previewBox.appendChild(img);
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                @if($destination->img)
                    previewBox.innerHTML = '<img src="{{ asset($destination->img) }}" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain;">';
                @else
                    previewBox.innerHTML = '<span class="image-preview-text" style="color: var(--text-muted);">Önizleme Yok</span>';
                @endif
            }
        }
    </script>
@endsection
