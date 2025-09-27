<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Contact;
use App\Models\Deal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $clientCount = Client::count();
        $contactCount = Contact::count();
        $dealCount = Deal::count();
        $totalDealValue = Deal::sum('value');

        return view('dashboard', [
            'clientCount' => $clientCount,
            'contactCount' => $contactCount,
            'dealCount' => $dealCount,
            'totalDealValue' => number_format($totalDealValue, 2, '.', ' '),
        ]);
    }
}
