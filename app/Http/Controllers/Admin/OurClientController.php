<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreOurClientRequest;
use App\Models\OurClient;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class OurClientController extends Controller
{
    public function __construct(protected UploadFileService $uploadFileService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.our-clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.our-clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOurClientRequest $request)
    {
        $request->validated();

        $data = $request->safe()->except('image');

        OurClient::create($data + ['image' => $this->uploadFileService->store($request->image, 'images/clients')]);
        return redirect()->route('our-clients.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(OurClient $ourClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurClient $ourClient)
    {
        return view('admin.our-clients.edit', compact('ourClient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOurClientRequest $request, OurClient $ourClient)
    {
        $request->validated();

        $data = $request->safe()->except('image');

        $ourClient->update($data + ['image' => $this->uploadFileService->update($request->image, $ourClient->image, 'images/clients')]);

        return redirect()->route('our-clients.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurClient $ourClient)
    {
        $this->uploadFileService->delete($ourClient->image);
        $ourClient->delete();

        return redirect()->route('our-clients.index')->with('success', trans('message.delete'));
    }
}