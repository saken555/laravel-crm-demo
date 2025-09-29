<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public function store(array $validatedData): Client
    {
        return Client::create($validatedData);
    }

    public function update(Client $client, array $validatedData): Client
    {
        $client->update($validatedData);

        return $client;
    }
}