<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePackageRequest;
use App\Models\Package;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct(protected UploadFileService $uploadFileService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.packages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        $request->validated();

        $data = $request->safe()->except('image');

        $data['properties'] = array_map(fn($string) => trim($string),explode('-', $data['properties']));

        Package::create($data + ['image' => $this->uploadFileService->store($request->image, 'images/packages')]);
        return redirect()->route('packages.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePackageRequest $request, Package $package)
    {
        $request->validated();

        $data = $request->safe()->except('image');

        $data['properties'] = array_map(fn($string) => trim($string),explode('-', $data['properties']));

        $package->update($data + ['image' => $this->uploadFileService->update($request->image, $package->image, 'images/packages')]);

        return redirect()->route('packages.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $this->uploadFileService->delete($package->image);
        $package->delete();

        return redirect()->route('packages.index')->with('success', trans('message.delete'));
    }
}