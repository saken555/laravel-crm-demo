<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use App\Models\Client;
use App\Models\Contact;

class DealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deals = Deal::with('client', 'contact')->get();

        return view('deals.index', ['deals' => $deals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::orderBy('name')->get();
        $contacts = Contact::orderBy('first_name')->get();

        return view('deals.create', compact('clients', 'contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'required|numeric|min:0',
            'client_id' => 'required|exists:clients,id',
            'contact_id' => 'nullable|exists:contacts,id',
        ]);

        // По умолчанию статус 'new'
        $validated['status'] = 'new';

        Deal::create($validated);

        return redirect()->route('deals.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deal $deal)
    {
        $clients = Client::orderBy('name')->get();
        $contacts = Contact::orderBy('first_name')->get();
        return view('deals.edit', compact('deal', 'clients', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deal $deal)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'value' => 'required|numeric|min:0',
            'status' => 'required|string',
            'client_id' => 'required|exists:clients,id',
            'contact_id' => 'nullable|exists:contacts,id',
        ]);
        $deal->update($validated);
        return redirect()->route('deals.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deal $deal)
    {
        $deal->delete();
        return redirect()->route('deals.index');
    }
}
