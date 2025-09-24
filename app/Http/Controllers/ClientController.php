<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
    
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', ['clients' => $clients]);
    }

   
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Валидация данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|unique:clients,email',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        // 2. Создание нового клиента
        Client::create($validated);

        // 3. Редирект на страницу со списком клиентов
        return redirect()->route('clients.index');
    }

    
    public function show(Client $client){}

    public function edit(Client $client)
    {
        return view('clients.edit', ['client' => $client]);
    }

    public function update(Request $request, Client $client)
    {
                
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'nullable',
                'email',
                Rule::unique('clients')->ignore($client->id), 
            ],
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
        ]);

        
        $client->update($validated);

        
        return redirect()->route('clients.index');    
    }

    public function destroy(Client $client){}
}
