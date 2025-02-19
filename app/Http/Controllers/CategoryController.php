<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Controller: CategoryController - Action: index";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Controller: CategoryController - Action: create";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Controller: CategoryController - Action: store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Controller: CategoryController - Action: show";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Controller: CategoryController - Action: edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Controller: CategoryController - Action: update";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Controller: CategoryController - Action: destroy";
    }
}
