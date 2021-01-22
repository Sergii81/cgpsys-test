<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $clients = Client::all();

        return view('admin.index', [
            'companies' => $companies->count(),
            'clients' => $clients->count(),
        ]);
    }
}
