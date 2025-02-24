<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataLayer;
use Illuminate\Support\Facades\Redirect;

class ConvenzioniController extends Controller
{
    public function index()
    {
        session_start();
        return view('convenzioni');
    }
}