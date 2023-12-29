<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSliderRequest;
use App\Models\Slider;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __construct(protected UploadFileService $uploadFileService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sliders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSliderRequest $request)
    {
        $request->validated();

        Slider::create($request->safe()->except('image') + ['image' => $this->uploadFileService->store($request->image, 'images/sliders')]);

        return redirect()->route('sliders.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSliderRequest $request, Slider $slider)
    {
        $request->validated();

        $slider->update($request->safe()->except('image') + ['image' => $this->uploadFileService->update($request->image, $slider->image, 'images/sliders')]);

        return redirect()->route('sliders.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $this->uploadFileService->delete($slider->image);
        $slider->delete();

        return redirect()->route('sliders.index')->with('success', trans('message.delete'));
    }
}