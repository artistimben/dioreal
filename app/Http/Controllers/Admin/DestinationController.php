<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class DestinationController extends Controller
{
    protected function handleFileUpload($file, $folder = 'uploads/destinations')
    {
        $destinationPath = public_path($folder);
        if (!File::exists($destinationPath)) {
            File::makeDirectory($destinationPath, 0755, true, true);
        }
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);
        return $folder . '/' . $filename;
    }

    public function index()
    {
        $destinations = Destination::orderBy('type')->orderBy('order')->get();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function create()
    {
        $types = [
            'turkiye' => "Türkiye'nin Ruhu",
            'yurtdisi_popular' => 'Yurtdışı - En Popüler',
            'yurtdisi_traveller' => 'Yurtdışı - Gezgine Göre',
            'yurtdisi_month' => 'Yurtdışı - Aya Göre',
            'yurtdisi_spotlight' => 'Yurtdışı - Vitrindekiler',
        ];
        return view('admin.destinations.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.tr' => 'required|string|max:255',
            'name.en' => 'required|string|max:255',
            'region.tr' => 'required|string|max:255',
            'region.en' => 'required|string|max:255',
            'type' => 'required|string|in:turkiye,yurtdisi_popular,yurtdisi_traveller,yurtdisi_month,yurtdisi_spotlight',
            'order' => 'nullable|integer',
            'img_file' => 'nullable|image|max:51200',
            'img_url' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'region', 'type', 'order']);
        $data['order'] = $data['order'] ?? 0;

        // Handle cover image
        if ($request->hasFile('img_file')) {
            $data['img'] = $this->handleFileUpload($request->file('img_file'));
        } else {
            $data['img'] = $request->input('img_url') ?? 'foto.img/istanbul.jpg';
        }

        Destination::create($data);

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasyon başarıyla eklendi.');
    }

    public function edit(Destination $destination)
    {
        $types = [
            'turkiye' => "Türkiye'nin Ruhu",
            'yurtdisi_popular' => 'Yurtdışı - En Popüler',
            'yurtdisi_traveller' => 'Yurtdışı - Gezgine Göre',
            'yurtdisi_month' => 'Yurtdışı - Aya Göre',
            'yurtdisi_spotlight' => 'Yurtdışı - Vitrindekiler',
        ];
        return view('admin.destinations.edit', compact('destination', 'types'));
    }

    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'name.tr' => 'required|string|max:255',
            'name.en' => 'required|string|max:255',
            'region.tr' => 'required|string|max:255',
            'region.en' => 'required|string|max:255',
            'type' => 'required|string|in:turkiye,yurtdisi_popular,yurtdisi_traveller,yurtdisi_month,yurtdisi_spotlight',
            'order' => 'nullable|integer',
            'img_file' => 'nullable|image|max:51200',
            'img_url' => 'nullable|string',
        ]);

        $data = $request->only(['name', 'region', 'type', 'order']);
        $data['order'] = $data['order'] ?? 0;

        // Handle cover image
        if ($request->hasFile('img_file')) {
            $data['img'] = $this->handleFileUpload($request->file('img_file'));
        } elseif ($request->filled('img_url')) {
            $data['img'] = $request->input('img_url');
        }

        $destination->update($data);

        return redirect()->route('admin.destinations.index')->with('success', 'Destinasyon başarıyla güncellendi.');
    }

    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('admin.destinations.index')->with('success', 'Destinasyon başarıyla silindi.');
    }
}
