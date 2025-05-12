<?php

namespace App\Http\Controllers;

use App\Models\Emotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmotionController extends Controller
{
    public function index()
    {
        // Ambil emosi dari 7 hari terakhir
        $emotions = Auth::user()->emotions()
            ->where('created_at', '>=', now()->subDays(7))
            ->orderBy('created_at', 'desc')
            ->get();
            
        // Ambil emosi terbaru untuk menampilkan bunga
        $latestEmotion = Auth::user()->emotions()
            ->latest()
            ->first();
            
        $currentEmotion = $latestEmotion ? $latestEmotion->emotion : 'biasa';
        
        return view('emotion-log', compact('emotions', 'currentEmotion'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'emotion' => 'required|in:sangat-baik,baik,biasa,sedih,cemas,marah',
            'note' => 'nullable|string|max:1000'
        ]);
        
        $emotion = Auth::user()->emotions()->create([
            'emotion' => $request->emotion,
            'note' => $request->note
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Emosi berhasil disimpan!',
            'emotion' => $emotion->load('user')
        ]);
    }
    
    public function destroy(Emotion $emotion)
    {
        // Pastikan user hanya bisa menghapus emosi miliknya
        if($emotion->user_id !== Auth::id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }
        
        $emotion->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Emosi berhasil dihapus!'
        ]);
    }
    
    public function filter(Request $request)
    {
        $days = $request->days ?? 7;
        
        $emotions = Auth::user()->emotions()
            ->where('created_at', '>=', now()->subDays($days))
            ->orderBy('created_at', 'desc')
            ->get();
            
        return response()->json([
            'success' => true,
            'emotions' => $emotions
        ]);
    }
}