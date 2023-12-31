<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreHeadlineTranslationRequest;
use App\Models\HeadlineTranslation;
use Illuminate\Http\Request;

class HeadlineTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = HeadlineTranslation::all();
        return view('admin.translations.index', compact('sections'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HeadlineTranslation $headlineTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeadlineTranslation $headlineTranslation)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreHeadlineTranslationRequest $request, HeadlineTranslation $headlineTranslation)
    {
        $headlineTranslation->update($request->validated());

        return redirect()->route('translation.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeadlineTranslation $headlineTranslation)
    {
        //
    }
}