<?php

namespace App\Http\Controllers;

use App\Models\SocialInteraction;
use Illuminate\Http\Request;

class SocialInteractionController extends Controller
{
    /**
     * Display a listing of social interactions.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $interactions = SocialInteraction::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('social-interactions.index', compact('interactions'));
    }

    /**
     * Show the form for creating a new social interaction.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('social-interactions.create');
    }

    /**
     * Store a newly created social interaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'person' => 'required|string|max:100',
            'interaction_type' => 'required|string|max:50',
            'date' => 'required|date',
            'duration' => 'nullable|integer',
            'comfort_level' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string',
        ]);

        SocialInteraction::create([
            'user_id' => auth()->id(),
            'person' => $request->person,
            'interaction_type' => $request->interaction_type,
            'date' => $request->date,
            'duration' => $request->duration,
            'comfort_level' => $request->comfort_level,
            'notes' => $request->notes,
        ]);

        return redirect()->route('social-interactions')->with('success', 'Interaksi sosial berhasil disimpan!');
    }

    /**
     * Display the specified social interaction.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $interaction = SocialInteraction::where('user_id', auth()->id())
            ->findOrFail($id);
            
        return view('social-interactions.show', compact('interaction'));
    }

    /**
     * Show the form for editing the specified social interaction.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $interaction = SocialInteraction::where('user_id', auth()->id())
            ->findOrFail($id);
            
        return view('social-interactions.edit', compact('interaction'));
    }

    /**
     * Update the specified social interaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $interaction = SocialInteraction::where('user_id', auth()->id())
            ->findOrFail($id);
            
        $request->validate([
            'person' => 'required|string|max:100',
            'interaction_type' => 'required|string|max:50',
            'date' => 'required|date',
            'duration' => 'nullable|integer',
            'comfort_level' => 'required|integer|min:1|max:10',
            'notes' => 'nullable|string',
        ]);

        $interaction->update([
            'person' => $request->person,
            'interaction_type' => $request->interaction_type,
            'date' => $request->date,
            'duration' => $request->duration,
            'comfort_level' => $request->comfort_level,
            'notes' => $request->notes,
        ]);

        return redirect()->route('social-interactions')->with('success', 'Interaksi sosial berhasil diperbarui!');
    }

    /**
     * Remove the specified social interaction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $interaction = SocialInteraction::where('user_id', auth()->id())
            ->findOrFail($id);
            
        $interaction->delete();

        return redirect()->route('social-interactions')->with('success', 'Interaksi sosial berhasil dihapus!');
    }
}