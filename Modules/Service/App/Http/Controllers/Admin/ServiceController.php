<?php

namespace Modules\Service\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Service\App\Models\Service;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Modules\Service\App\DTOs\ServiceActionDTO;
use Modules\Service\App\Http\Requests\StoreServiceRequest;
use Modules\Service\App\Services\Service as ServicesService;

class ServiceController extends Controller
{
    public function __construct(protected ServicesService $servicesService) {}

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

        $this->servicesService->store(ServiceActionDTO::fromWebRequest($request));

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

        $this->servicesService->update($service, ServiceActionDTO::fromWebRequest($request));

        return redirect()->route('services.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $this->servicesService->delete($service->id);

        return redirect()->route('services.index')->with('success', trans('message.delete'));
    }
}