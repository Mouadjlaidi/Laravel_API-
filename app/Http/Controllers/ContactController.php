<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Contact::all();
        return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $contact = Contact::create($request->all());
        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Contact::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $contact = Contact::find($id);
    
        if (!$contact) {
            return response()->json(['message' => 'Contact non trouvé'], 404);
        }
    
        // Valider les données entrantes
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);
    
        // Mettre à jour les données
        $contact->update($validated);
    
        return response()->json(['message' => 'Contact mis à jour avec succès', 'contact' => $contact]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $contact = Contact::find($id);
    
        if (!$contact) {
            return response()->json(['message' => 'Contact non trouvé'], 404);
        }
    
        $contact->delete();
        return response()->json(['message' => 'Contact supprimé avec succès']);
    }


}
