<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
    public function update(Request $request, HeadlineTranslation $headlineTranslation)
    {
        $request->validate([
            'title' => 'nullable|string',
            'title_en' => 'nullable|string',
            'subtitle' => 'nullable|string',
            'subtitle_en' => 'nullable|string',
            'description' => 'nullable|string',
            'description_en' => 'nullable|string',
        ], $request->all());

        $headlineTranslation->update([
            'title' => $request->title ?? $headlineTranslation->title,
            'title_en' => $request->title_en ?? $headlineTranslation->title_en,
            'subtitle' => $request->subtitle ?? $headlineTranslation->subtitle,
            'subtitle_en' => $request->subtitle_en ?? $headlineTranslation->subtitle_en,
            'description' => $request->description ?? $headlineTranslation->description,
            'description_en' => $request->description_en ?? $headlineTranslation->description_en,
        ]);

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