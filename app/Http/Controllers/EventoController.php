<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session_start();

        $dl = new DataLayer();
        $events = $dl->listEvents();
        return view('evento.events')->with('eventi',$events);
    }
    /*public function create()
    {
        $dl = new DataLayer();
        return view('evento.createEvento');
    }*/ 

    public function create()
    {
        return view('evento.createEvento');
    }

    // Store a newly created event in storage using the DataLayer's addBook method
    public function storeNew(Request $request)
    {
        $messages = [
            'immagine.mimes' => 'Il file deve essere jpg, jpeg o png',
        ];
        // Validate the incoming request data
        $request->validate([
            'titolo' => 'required|string|max:255',
            'contenuto' => 'required|string',
            'immagine' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        // Handle the image upload if an image is provided
        $imagePath = null;
        if ($request->hasFile('immagine')) {
            $imagePath = $request->file('immagine')->store('images', 'public');
        }
    
        // Create a new event using the DataLayer method
        $dataLayer = new DataLayer();
        $dataLayer->addEvento(
            $request->input('titolo'),
            $_SESSION['loggedID'],
            $request->input('contenuto'),
            $imagePath // Pass the image path instead of the file
        );
    
        // Redirect the user to the event index page with a success message
        return redirect()->route('evento.index')->with('success', 'Evento created successfully.');
    }
    /*public function store(Request $request){
        $d1=new DataLayer();
        $d1->addEvento($request->input('titolo'), $_SESSION['loggedID'],$request->input('contenuto'), $request->input('immagine'));
        return Redirect::to(route('evento.index'));
    }*/
    public function store(Request $request)
{
    //session_start();
    $request->validate([
        'titolo' => 'required|string|max:255',
        'contenuto' => 'required|string',
        'immagine' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $dl = new DataLayer();

    // If the ID is present, update the existing event
    if ($request->has('id') && $request->input('id') !== '') {
        $dl->editEvento(
            $request->input('id'),
            $request->input('titolo'),
            $_SESSION['loggedID'],
            $request->input('contenuto'),
            $request->file('immagine')
        );
    } else {
        // Otherwise, create a new event
        $dl->addEvento(
            $request->input('titolo'),
            $_SESSION['loggedID'],
            $request->input('contenuto'),
            $request->file('immagine')
        );
    }

    return Redirect::to(route('evento.index'));
}

    public function show(string $id){
        session_start();
        $d1= new DataLayer();
        $evento=$d1->findEvento($id);
        if ($evento != null){
            return view('evento.details')->with('evento',$evento);

        }else {
            return view('errors.404')->with('message','Wrong  ID has been used!');
        }
    }
    public function edit($id = null)
    {
    $dl = new DataLayer();
    
    // If ID is provided, try to find the event
    if ($id) {
        $evento = $dl->findEvento($id);
        if (!$evento) {
            return view('errors.404')->with('message', 'Invalid event ID');
        }
    } else {
        // Otherwise, create a new event instance
        $evento = new \App\Models\Evento();
    }

    return view('evento.editEvento')->with('evento', $evento);
}


    /*public function update(Request $request, string $id){

        $dl = new DataLayer();
        $dl->editEvento($id, $request->input('titol'));
        return Redirect::to(route('evento.index'));
    }
        */
        public function update(Request $request, string $id)
{

    session_start();
    $messages = [
        'immagine.mimes' => 'Il file deve essere jpg, jpeg o png',
    ];
    $request->validate([
        'titolo' => 'required|string|max:255',
        'contenuto' => 'required|string',
        'immagine' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $dl = new DataLayer();
    $dl->editEvento(
        $id,    
        $request->input('titolo'),
        $_SESSION['loggedID'],
        $request->input('contenuto'),
        $request->file('immagine')
    );

    return Redirect::to(route('evento.index'));
}
    public function destroy(string $id)
    {
        $dl = new DataLayer();
        $dl->deleteEvento($id);
        return Redirect::to(route('evento.index'));
    }
}
