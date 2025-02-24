<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;


class CommentoController extends Controller
{
    public function create(Request $request, $evento_id)
    {
        session_start();
        $request->validate([
            'contenuto' => 'required|string|max:255',
        ]);

        $dataLayer = new DataLayer();
        
        $dataLayer->addCommento(
            $request->input('contenuto'),
            $_SESSION['loggedID'], // Assuming the user ID is stored in the session
            $evento_id
        );

        return redirect()->route('evento.show', $evento_id)
                         ->with('success', 'Comment added successfully.');
    }

    public function delete($id, $evento_id)
    {
        $dataLayer = new DataLayer();
        
        $dataLayer->deleteCommento($id);

        return redirect()->route('evento.show', $evento_id)
                         ->with('success', 'Comment deleted successfully.');
    }
}
