<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * Display a listing of consultations.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $consultations = Consultation::where('user_id', auth()->id())
            ->orderBy('date', 'desc')
            ->paginate(10);
            
        return view('consultations.index', compact('consultations'));
    }

    /**
     * Show the form for creating a new consultation.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('consultations.create');
    }

    /**
     * Store a newly created consultation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'therapist_name' => 'required|string|max:100',
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'nullable|integer',
            'topics' => 'nullable|string',
            'notes' => 'nullable|string',
            'follow_up_date' => 'nullable|date',
            'status' => 'required|string|in:scheduled,completed,cancelled',
        ]);

        Consultation::create([
            'user_id' => auth()->id(),
            'therapist_name' => $request->therapist_name,
            'date' => $request->date,
            'time' => $request->time,
            'duration' => $request->duration,
            'topics' => $request->topics,
            'notes' => $request->notes,
            'follow_up_date' => $request->follow_up_date,
            'status' => $request->status,
        ]);

        return redirect()->route('consultations')->with('success', 'Konsultasi berhasil dijadwalkan!');
    }

    /**
     * Display the specified consultation.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $consultation = Consultation::where('user_id', auth()->id())
            ->findOrFail($id);
            
        return view('consultations.show', compact('consultation'));
    }

    /**
     * Show the form for editing the specified consultation.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $consultation = Consultation::where('user_id', auth()->id())
            ->findOrFail($id);
            
        return view('consultations.edit', compact('consultation'));
    }

    /**
     * Update the specified consultation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $consultation = Consultation::where('user_id', auth()->id())
            ->findOrFail($id);
            
        $request->validate([
            'therapist_name' => 'required|string|max:100',
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'nullable|integer',
            'topics' => 'nullable|string',
            'notes' => 'nullable|string',
            'follow_up_date' => 'nullable|date',
            'status' => 'required|string|in:scheduled,completed,cancelled',
        ]);

        $consultation->update([
            'therapist_name' => $request->therapist_name,
            'date' => $request->date,
            'time' => $request->time,
            'duration' => $request->duration,
            'topics' => $request->topics,
            'notes' => $request->notes,
            'follow_up_date' => $request->follow_up_date,
            'status' => $request->status,
        ]);

        return redirect()->route('consultations')->with('success', 'Konsultasi berhasil diperbarui!');
    }

    /**
     * Remove the specified consultation from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $consultation = Consultation::where('user_id', auth()->id())
            ->findOrFail($id);
            
        $consultation->delete();

        return redirect()->route('consultations')->with('success', 'Konsultasi berhasil dihapus!');
    }
}