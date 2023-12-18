<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMonthlyQuarterlyUpdateRequest;
use App\Models\MonthlyQuarterlyUpdate;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class MonthlyQuarterlyUpdateController extends Controller
{
    public function __construct(protected UploadFileService $uploadFileService ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.monthly-quarterly-updates.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.monthly-quarterly-updates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMonthlyQuarterlyUpdateRequest $request)
    {
        $request->validated();

        MonthlyQuarterlyUpdate::create($request->safe()->except('image') + ['image' => $this->uploadFileService->store($request->file('image'), 'images/monthly-updates')]);
        return redirect()->route('monthly-quarterly-update.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(MonthlyQuarterlyUpdate $monthlyQuarterlyUpdate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MonthlyQuarterlyUpdate $monthlyQuarterlyUpdate)
    {
        return view('admin.monthly-quarterly-updates.edit', compact('monthlyQuarterlyUpdate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMonthlyQuarterlyUpdateRequest $request, MonthlyQuarterlyUpdate $monthlyQuarterlyUpdate)
    {
        $request->validated();
        $monthlyQuarterlyUpdate->update($request->safe()->except('image') + ['image' => $this->uploadFileService->store($request->file('image'), 'images/monthly-updates')]);

        return redirect()->route('monthly-quarterly-update.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonthlyQuarterlyUpdate $monthlyQuarterlyUpdate)
    {
        $monthlyQuarterlyUpdate->delete();
        return redirect()->route('monthly-quarterly-update.index')->with('success', trans('message.delete'));
    }
}