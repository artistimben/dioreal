<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GuideController extends Controller
{
    protected function handleFileUpload($file, $folder = 'uploads/guides')
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
        $guides = Guide::latest()->get();
        return view('admin.guides.index', compact('guides'));
    }

    public function create()
    {
        return view('admin.guides.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.tr' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'tag.tr' => 'nullable|string|max:255',
            'tag.en' => 'nullable|string|max:255',
            'desc.tr' => 'required|string',
            'desc.en' => 'required|string',
            'img_file' => 'nullable|image|max:5120',
            'img_url' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'tag', 'desc']);

        // Handle image
        if ($request->hasFile('img_file')) {
            $data['img'] = $this->handleFileUpload($request->file('img_file'));
        } else {
            $data['img'] = $request->input('img_url') ?? 'foto.img/bodrum.jpg';
        }

        Guide::create($data);

        return redirect()->route('admin.guides.index')->with('success', 'Gezi rehberi başarıyla eklendi.');
    }

    public function edit(Guide $guide)
    {
        return view('admin.guides.edit', compact('guide'));
    }

    public function update(Request $request, Guide $guide)
    {
        $request->validate([
            'title.tr' => 'required|string|max:255',
            'title.en' => 'required|string|max:255',
            'tag.tr' => 'nullable|string|max:255',
            'tag.en' => 'nullable|string|max:255',
            'desc.tr' => 'required|string',
            'desc.en' => 'required|string',
            'img_file' => 'nullable|image|max:5120',
            'img_url' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'tag', 'desc']);

        // Handle image
        if ($request->hasFile('img_file')) {
            $data['img'] = $this->handleFileUpload($request->file('img_file'));
        } elseif ($request->filled('img_url')) {
            $data['img'] = $request->input('img_url');
        }

        $guide->update($data);

        return redirect()->route('admin.guides.index')->with('success', 'Gezi rehberi başarıyla güncellendi.');
    }

    public function destroy(Guide $guide)
    {
        $guide->delete();
        return redirect()->route('admin.guides.index')->with('success', 'Gezi rehberi başarıyla silindi.');
    }
}
