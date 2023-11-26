<?php

namespace App\Http\Controllers\Admin;

use App\Enums\HasBranches;
use App\Http\Controllers\Controller;
use App\Models\Corp;
use App\Http\Requests\Admin\StoreCorpRequest;
use App\Http\Requests\Admin\UpdateCorpRequest;

class CorpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.corps.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hasBranches = HasBranches::cases();
        return view('admin.corps.create', compact('hasBranches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorpRequest $request)
    {
        $corp = Corp::create($request->validated());

        if($request->integer('has_branches') === HasBranches::Yes->value) {
            return redirect()->route('branches.index', ['corp' => $corp, 'target' => 'branches'])
            ->with('success', trans('message.create'));
        }

        $corp->branches()->create([
            'name' => $corp->name,
            'registration_number' => $corp->commercial_registration_number,
        ]);

        return redirect()->route('corps.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Corp $corp)
    {
        return view('admin.corps.show', compact('corp'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corp $corp)
    {
        $hasBranches = HasBranches::cases();
        return view('admin.corps.edit', compact('corp', 'hasBranches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorpRequest $request, Corp $corp)
    {
        $corp->update($request->validated());
        return redirect()->route('corps.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corp $corp)
    {
        $corp->delete();

        return redirect()->route('corps.index')->with('success', trans('message.delete'));
    }
}