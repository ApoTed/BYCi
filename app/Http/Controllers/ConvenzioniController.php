<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Convenzione;
use Illuminate\Support\Facades\Storage;

class ConvenzioniController extends Controller
{
    public function index()
    {
        session_start();
        $convenzioni = Convenzione::all();
        return view('convenzione.convenzioni')->with('convenzioni', $convenzioni);
    }

    public function create()
    {
        return view('convenzione.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'descrizione' => 'required|string',
            'pdf' => 'required|mimes:pdf|max:2048',
        ]);

        $pdfPath = $request->file('pdf')->store('pdf', 'public');

        Convenzione::create([
            'titolo' => $request->titolo,
            'descrizione' => $request->descrizione,
            'pdf_path' => $pdfPath,
        ]);

        return redirect()->route('convenzioni')->with('success', 'Convenzione creata con successo.');
    }

    public function edit($id)
    {
        $convenzione = Convenzione::findOrFail($id);
        return view('convenzione.edit', compact('convenzione'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titolo' => 'required|string|max:255',
            'descrizione' => 'required|string',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $convenzione = Convenzione::findOrFail($id);

        if ($request->hasFile('pdf')) {
            // Elimina il vecchio file PDF
            if ($convenzione->pdf_path) {
                Storage::disk('public')->delete($convenzione->pdf_path);
            }

            // Salva il nuovo file PDF
            $pdfPath = $request->file('pdf')->store('pdf', 'public');
            $convenzione->pdf_path = $pdfPath;
        }

        $convenzione->update([
            'titolo' => $request->titolo,
            'descrizione' => $request->descrizione,
        ]);

        return redirect()->route('convenzioni')->with('success', 'Convenzione aggiornata con successo.');
    }
}