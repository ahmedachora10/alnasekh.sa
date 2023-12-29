<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOurServiceRequest;
use App\Models\OurService;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class OurServiceController extends Controller
{
    public function __construct(protected UploadFileService $uploadFileService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.our-services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our-services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOurServiceRequest $request)
    {
        $request->validated();

        OurService::create($request->safe()->except('image') + ['image' => $this->uploadFileService->store($request->image, 'images/our-services')]);
        return redirect()->route('our-services.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(OurService $ourService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurService $ourService)
    {
        return view('admin.our-services.edit', compact('ourService'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOurServiceRequest $request, OurService $ourService)
    {
        $request->validated();

        $ourService->update($request->safe()->except('image') + ['image' => $this->uploadFileService->update($request->image, $ourService->image, 'images/our-services')]);

        return redirect()->route('our-services.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurService $ourService)
    {
        $this->uploadFileService->delete($ourService->image);
        $ourService->delete();

        return redirect()->route('our-services.index')->with('success', trans('message.delete'));
    }
}