<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRegistryRequest;
use App\Models\Registry;
use Illuminate\Http\Request;

class RegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.registries.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.registries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistryRequest $request)
    {
        Registry::create($request->validated());
        return redirect()->route('registries.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Registry $registry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registry $registry)
    {
        return view('admin.registries.edit', compact('registry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRegistryRequest $request, Registry $registry)
    {
        $registry->update($request->validated());
        return redirect()->route('registries.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registry $registry)
    {
        $registry->delete();
        return redirect()->route('registries.index')->with('success', trans('message.delete'));
    }
}