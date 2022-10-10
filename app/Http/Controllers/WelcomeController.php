<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Character;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index() {
        $response = Build::with('character','weapon')->inRandomOrder()->take(1)->get();
        return response()->json([
            'data' => $response,
        ]);
        
    }

    public function uid($uid){
        $response = json_decode(file_get_contents("https://enka.network/u/$uid/__data.json"), true);
        return response()->json([
            'data' => $response,
        ]); 
    }
    public function explore(Request $request){
        $query = Build::with('character','weapon','likes')->inRandomOrder()->paginate(12)->withQueryString();
        return response()->json([
            'data' => $query,
        ]);
    }
}
