<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    /**
     * File upload helper.
     */
    protected function handleFileUpload($file, $folder = 'uploads/brands')
    {
        $destinationPath = public_path($folder);
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);
        return $folder . '/' . $filename;
    }

    /**
     * Show general settings page.
     */
    public function index()
    {
        $settings = [];
        foreach (Setting::all() as $setting) {
            $settings[$setting->key] = $setting->value;
        }

        return view('admin.settings', compact('settings'));
    }

    /**
     * Update general text settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'contact_email' => 'nullable|email|max:255',
            'contact_phone' => 'nullable|string|max:100',
            'contact_address_tr' => 'nullable|string|max:500',
            'contact_address_en' => 'nullable|string|max:500',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:50',
            'footer_copy' => 'nullable|string|max:255',
            'hero_title_tr' => 'nullable|string|max:500',
            'hero_title_en' => 'nullable|string|max:500',
        ]);

        $fields = [
            'contact_email',
            'contact_phone',
            'contact_address_tr',
            'contact_address_en',
            'instagram',
            'linkedin',
            'whatsapp',
            'footer_copy',
            'hero_title_tr',
            'hero_title_en',
        ];

        foreach ($fields as $field) {
            Setting::set($field, $request->input($field));
        }

        return redirect()->route('admin.settings.index')->with('success', 'Genel ayarlar başarıyla güncellendi.');
    }

    /**
     * Add a brand reference with uploaded logo.
     */
    public function addBrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_logo' => 'required|image|max:2048',
        ]);

        $brands = Setting::get('brands', []);
        if (!is_array($brands)) {
            $brands = [];
        }

        $logoPath = $this->handleFileUpload($request->file('brand_logo'));

        $brands[] = [
            'name' => $request->input('brand_name'),
            'img' => $logoPath,
        ];

        Setting::set('brands', $brands);

        return redirect()->route('admin.settings.index')->with('success', 'Marka referansı başarıyla eklendi.');
    }

    /**
     * Delete a brand reference.
     */
    public function deleteBrand(int $index)
    {
        $brands = Setting::get('brands', []);
        if (is_array($brands) && isset($brands[$index])) {
            $brand = $brands[$index];
            
            // Delete file if it's physically stored and not a seeded data SVG URL
            if (isset($brand['img']) && !str_starts_with($brand['img'], 'data:')) {
                $filePath = public_path($brand['img']);
                if (File::exists($filePath)) {
                    File::delete($filePath);
                }
            }

            unset($brands[$index]);
            // Reset numerical array keys to avoid associative array serialization
            $brands = array_values($brands);
            Setting::set('brands', $brands);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Marka referansı başarıyla silindi.');
    }
}
