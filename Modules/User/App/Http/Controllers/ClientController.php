<?php

namespace Modules\User\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\User\App\DTO\ClientActionDTO;
use Modules\User\App\Http\Requests\ClientRequest;
use Modules\User\App\Models\Client;
use Modules\User\App\Services\ClientService;

class ClientController extends Controller
{

    public function __construct(private ClientService $clientService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user::clients.index');
    }

    public function create()
    {
        return view('user::clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $this->clientService->store(ClientActionDTO::fromWebRequest($request));

        return redirect()->route('clients.index')->with('success', trans('message.create'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('user::clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client)
    {
        $this->clientService->update($client, ClientActionDTO::fromWebRequest($request));

        return redirect()->route('clients.index')->with('success', trans('message.update'));
    }


    public function destroy(Client $client)
    {
        $this->clientService->delete($client->id);
        return redirect()->route('clients.index')->with('success', trans('message.delete'));

    }
}
