<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use Illuminate\Support\Facades\Storage;

class ClubController extends Controller
{
    public function show()
    {
        $club = Club::first(); // Assuming there is only one club
        return view('club.details', compact('club'));
    }

    public function edit()
    {
        $club = Club::first(); // Assuming there is only one club
        return view('club.edit', compact('club'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'descrizione' => 'required|string',
            'immagine' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $club = Club::first(); // Assuming there is only one club

        if ($request->hasFile('immagine')) {
            // Delete the old image if it exists
            if ($club->immagine) {
                Storage::delete('public/' . $club->immagine);
            }
            // Store the new image
            $path = $request->file('immagine')->store('public/images');
            $club->immagine = str_replace('public/', '', $path);
        }

        $club->titolo = $request->titolo;
        $club->descrizione = $request->descrizione;
        $club->save();

        return redirect()->route('club.show')->with('success', 'Club updated successfully.');
    }
}