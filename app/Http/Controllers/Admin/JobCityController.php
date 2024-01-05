<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobCityRequest;
use App\Models\JobCity;
use Illuminate\Http\Request;

class JobCityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.job-cities.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.job-cities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobCityRequest $request)
    {
        JobCity::create($request->validated());
        return redirect()->route('job-cities.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(JobCity $jobCity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobCity $jobCity)
    {
        return view('admin.job-cities.edit', compact('jobCity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreJobCityRequest $request, JobCity $jobCity)
    {
        $jobCity->update($request->validated());
        return redirect()->route('job-cities.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobCity $jobCity)
    {
        $jobCity->delete();
        return redirect()->route('job-cities.index')->with('success', trans('message.delete'));
    }
}