<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Restaurant;
use App\Models\Yacht;
use App\Models\Event;
use App\Models\Guide;
use App\Models\Journal;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{
    private $modelMap = [
        "dioreal_hotels_data" => Hotel::class,
        "dioreal_restaurants_data" => Restaurant::class,
        "dioreal_yachts_data" => Yacht::class,
        "dioreal_events_data" => Event::class,
        "dioreal_guide_data" => Guide::class,
        "dioreal_journal_data" => Journal::class,
    ];

    public function load(Request $request)
    {
        $key = $request->query("key");
        if (!$key) return response()->json(["success" => false]);

        if (array_key_exists($key, $this->modelMap)) {
            $modelClass = $this->modelMap[$key];
            $data = $modelClass::all();
            return response()->json($data);
        }

        // Fallback for refs and contact (still json for now)
        $filepath = storage_path("app/data/{$key}.json");
        if (File::exists($filepath)) {
            return response()->json(json_decode(File::get($filepath), true));
        }

        return response()->json(null);
    }

    public function save(Request $request)
    {
        $key = $request->query("key");
        $payload = $request->json()->all();

        if (array_key_exists($key, $this->modelMap)) {
            $modelClass = $this->modelMap[$key];
            
            // Clear existing and re-insert (simple sync for SPA)
            $modelClass::truncate();
            foreach($payload as $item) {
                // Ensure base64 images are kept or extracted (simplification: keep as is for now)
                $modelClass::create($item);
            }
            return response()->json(["success" => true]);
        }

        // Fallback for refs and contact
        $filepath = storage_path("app/data/{$key}.json");
        File::put($filepath, json_encode($payload, JSON_PRETTY_PRINT));
        return response()->json(["success" => true]);
    }
}
