<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Corp;
use App\Http\Requests\StoreCorpRequest;
use App\Http\Requests\UpdateCorpRequest;

class CorpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCorpRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Corp $corp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corp $corp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorpRequest $request, Corp $corp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corp $corp)
    {
        //
    }
}
