<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // ... (метод index остается без изменений)
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', ['clients' => $clients]);
    }

    // ... (метод create остается без изменений)
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

    // ... (остальные методы пока пустые)
    public function show(Client $client){}
    public function edit(Client $client){}
    public function update(Request $request, Client $client){}
    public function destroy(Client $client){}
}
