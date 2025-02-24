<?php

namespace App\Http\Controllers;

use App\Models\Macchina;
use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class MacchinaController extends Controller
{
    public function index()
    {
        $macchine = Macchina::all();
        return view('macchina.index', compact('macchine'));
    }

    public function create()
    {
        return view('macchina.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_modello' => 'required|string|max:255',
            'descrizione' => 'required|string',
            'immagine' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('immagine')) {
            $imagePath = $request->file('immagine')->store('images', 'public');
        }

        Macchina::create([
            'nome_modello' => $request->input('nome_modello'),
            'descrizione' => $request->input('descrizione'),
            'immagine' => $imagePath,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('macchina.index')->with('success', 'Macchina created successfully.');
    }

    public function show(Macchina $macchina)
    {
        return view('macchina.show', compact('macchina'));
    }

    public function edit(Macchina $macchina)
    {
        return view('macchina.edit', compact('macchina'));
    }

    public function update(Request $request, Macchina $macchina)
    {
        $request->validate([
            'nome_modello' => 'required|string|max:255',
            'descrizione' => 'required|string',
            'immagine' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $macchina->immagine;
        if ($request->hasFile('immagine')) {
            $imagePath = $request->file('immagine')->store('images', 'public');
        }

        $macchina->update([
            'nome_modello' => $request->input('nome_modello'),
            'descrizione' => $request->input('descrizione'),
            'immagine' => $imagePath,
        ]);

        return redirect()->route('macchina.index')->with('success', 'Macchina updated successfully.');
    }

    public function destroy(Macchina $macchina)
    {
        $macchina->delete();
        return redirect()->route('macchina.index')->with('success', 'Macchina deleted successfully.');
    }
}