<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Services\ClientService; 

class ClientController extends Controller
{
    
    public function __construct(protected ClientService $clientService)
    {
    }

    public function index()
    {
        $clients = Client::all();
        return view('clients.index', ['clients' => $clients]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(StoreClientRequest $request)
    {
        // Теперь контроллер вызывает метод сервиса
        $this->clientService->store($request->validated());

        return redirect()->route('clients.index');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        
        $this->clientService->update($client, $request->validated());

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete(); 
        return redirect()->route('clients.index');
    }
}