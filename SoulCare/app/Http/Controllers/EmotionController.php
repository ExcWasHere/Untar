<?php

namespace App\Http\Controllers;

use App\Models\Emotion;
use Illuminate\Http\Request;

class EmotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emotions = Emotion::where('user_id', auth()->id())->latest()->paginate(10);
        return view('emotions.index', compact('emotions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('emotions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mood' => 'required|string',
            'intensity' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string',
        ]);

        Emotion::create([
            'user_id' => auth()->id(),
            'mood' => $request->mood,
            'intensity' => $request->intensity,
            'notes' => $request->notes,
        ]);

        return redirect()->route('emotions.index')
            ->with('success', 'Catatan emosi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emotion $emotion)
    {
        return view('emotions.show', compact('emotion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emotion $emotion)
    {
        return view('emotions.edit', compact('emotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emotion $emotion)
    {
        $request->validate([
            'mood' => 'required|string',
            'intensity' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string',
        ]);

        $emotion->update($request->all());

        return redirect()->route('emotions.index')
            ->with('success', 'Catatan emosi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emotion $emotion)
    {
        $emotion->delete();

        return redirect()->route('emotions.index')
            ->with('success', 'Catatan emosi berhasil dihapus.');
    }
}