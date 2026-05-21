<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{
    /**
     * Load content by key.
     */
    public function load(Request $request)
    {
        $key = $request->query('key', '');
        if (!$key) {
            return response()->json(null);
        }

        // Sanitize key — only allow alphanumeric + underscore
        $key = preg_replace('/[^a-zA-Z0-9_]/', '', $key);
        $filepath = storage_path("app/data/{$key}.json");

        if (File::exists($filepath)) {
            $content = File::get($filepath);
            $decoded = json_decode($content, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                return response()->json($decoded);
            } else {
                // File corrupted, delete and return null
                File::delete($filepath);
                return response()->json(null);
            }
        }

        return response()->json(null);
    }

    /**
     * Save content by key, intercepting base64 image uploads.
     */
    public function save(Request $request)
    {
        $key = $request->query('key', '');
        if (!$key) {
            return response()->json(['error' => 'Key belirtilmedi'], 400);
        }

        // Sanitize key
        $key = preg_replace('/[^a-zA-Z0-9_]/', '', $key);
        $dataDir = storage_path('app/data');

        if (!File::exists($dataDir)) {
            File::makeDirectory($dataDir, 0755, true);
        }

        $filepath = "{$dataDir}/{$key}.json";
        $payload = $request->json()->all();

        // Recursively find base64 image strings and save them as actual files
        $this->processBase64Images($payload);

        $jsonString = json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        
        if (File::put($filepath, $jsonString) !== false) {
            return response()->json([
                'success' => true,
                'key' => $key,
                'size' => strlen($jsonString)
            ]);
        }

        return response()->json(['error' => 'Dosya yazma hatası. Klasör izinlerini kontrol edin.'], 500);
    }

    /**
     * Delete content by key.
     */
    public function delete(Request $request)
    {
        $key = $request->query('key', '');
        if (!$key) {
            return response()->json(['error' => 'Key belirtilmedi'], 400);
        }

        $key = preg_replace('/[^a-zA-Z0-9_]/', '', $key);
        $filepath = storage_path("app/data/{$key}.json");

        if (File::exists($filepath)) {
            File::delete($filepath);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => true, 'note' => 'Dosya zaten yoktu']);
    }

    /**
     * Recursively search array values for base64 image strings, save them to storage, and replace with URL path.
     */
    private function processBase64Images(&$data)
    {
        if (is_array($data)) {
            foreach ($data as $key => &$value) {
                if (is_array($value)) {
                    $this->processBase64Images($value);
                } elseif (is_string($value) && str_starts_with($value, 'data:image/')) {
                    // Extract base64 details
                    if (preg_match('/^data:image\/(\w+);base64,(.+)$/is', $value, $matches)) {
                        $extension = $matches[1];
                        $base64Data = $matches[2];
                        
                        // Sanitize extension
                        if (in_array(strtolower($extension), ['jpeg', 'jpg', 'png', 'gif', 'webp', 'svg+xml', 'svg'])) {
                            if (str_contains($extension, 'svg')) {
                                $extension = 'svg';
                            }
                            
                            $decoded = base64_decode($base64Data);
                            if ($decoded !== false) {
                                // Ensure upload directory exists in public folder
                                $uploadDir = public_path('storage/uploads');
                                if (!File::exists($uploadDir)) {
                                    File::makeDirectory($uploadDir, 0755, true);
                                }
                                
                                $filename = 'upload_' . time() . '_' . uniqid() . '.' . $extension;
                                $filepath = "{$uploadDir}/{$filename}";
                                
                                File::put($filepath, $decoded);
                                
                                // Replace base64 with URL path using url() helper to support subfolders
                                $value = url('/storage/uploads/' . $filename);
                            }
                        }
                    }
                }
            }
        }
    }
}
