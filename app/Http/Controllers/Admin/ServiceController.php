<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Models\Service;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct(protected UploadFileService $uploadFileService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $request->validated();

        Service::create($request->safe()->except('image') + ['image' => $this->uploadFileService->store($request->image, 'images/services')]);

        return redirect()->route('services.index')->with('success', trans('message.update'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreServiceRequest $request, Service $service)
    {
        $request->validated();

        $service->update($request->safe()->except('image') + ['image' => $this->uploadFileService->update($request->image, $service->image, 'images/services')]);

        return redirect()->route('services.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->uploadFileService->delete($service->image);
        $service->delete();

        return redirect()->route('services.index')->with('success', trans('message.delete'));
    }
}