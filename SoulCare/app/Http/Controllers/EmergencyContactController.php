<?php

namespace App\Http\Controllers;

use App\Models\EmergencyContact;
use Illuminate\Http\Request;

class EmergencyContactController extends Controller
{
    /**
     * Display a listing of emergency contacts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contacts = EmergencyContact::where('user_id', auth()->id())
            ->orderBy('name')
            ->get();
            
        return view('emergency-contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new emergency contact.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('emergency-contacts.create');
    }

    /**
     * Store a newly created emergency contact in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'relationship' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'is_primary' => 'boolean',
        ]);

        // If this is marked as primary, unmark any existing primary contact
        if ($request->is_primary) {
            EmergencyContact::where('user_id', auth()->id())
                ->where('is_primary', true)
                ->update(['is_primary' => false]);
        }

        EmergencyContact::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'relationship' => $request->relationship,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'notes' => $request->notes,
            'is_primary' => $request->is_primary ? true : false,
        ]);

        return redirect()->route('emergency-contacts.index')->with('success', 'Kontak darurat berhasil ditambahkan!');
    }

    /**
     * Display the specified emergency contact.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $contact = EmergencyContact::where('user_id', auth()->id())
            ->findOrFail($id);
            
        return view('emergency-contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified emergency contact.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $contact = EmergencyContact::where('user_id', auth()->id())
            ->findOrFail($id);
            
        return view('emergency-contacts.edit', compact('contact'));
    }

    /**
     * Update the specified emergency contact in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $contact = EmergencyContact::where('user_id', auth()->id())
            ->findOrFail($id);
            
        $request->validate([
            'name' => 'required|string|max:100',
            'relationship' => 'required|string|max:50',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'is_primary' => 'boolean',
        ]);

        // If this is marked as primary, unmark any existing primary contact
        if ($request->is_primary && !$contact->is_primary) {
            EmergencyContact::where('user_id', auth()->id())
                ->where('is_primary', true)
                ->update(['is_primary' => false]);
        }

        $contact->update([
            'name' => $request->name,
            'relationship' => $request->relationship,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'notes' => $request->notes,
            'is_primary' => $request->is_primary ? true : false,
        ]);

        return redirect()->route('emergency-contacts.index')->with('success', 'Kontak darurat berhasil diperbarui!');
    }

    /**
     * Remove the specified emergency contact from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $contact = EmergencyContact::where('user_id', auth()->id())
            ->findOrFail($id);
            
        $contact->delete();

        return redirect()->route('emergency-contacts.index')->with('success', 'Kontak darurat berhasil dihapus!');
    }
}