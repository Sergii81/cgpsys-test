<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientAddRequest;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $clients = Client::paginate(100);

        return view('admin.clients.index', [
            'clients' => $clients
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addForm(Request $request)
    {
        $companies = Company::paginate(100);

        return view('admin.clients.add-form', [
            'companies' => $companies
        ]);
    }

    /**
     * @param ClientAddRequest $clientAddRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(ClientAddRequest $clientAddRequest): \Illuminate\Http\RedirectResponse
    {
        Client::create([
            'client_name' => $clientAddRequest['client_name'],
            'company_id' => $clientAddRequest['company_id'],
        ]);
        return redirect()->route('admin.clients.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editForm($id)
    {
        $client = Client::where('id', $id)->first();
        $companies = Company::all();

        return view('admin.clients.edit-form', [
            'client' => $client,
            'companies' => $companies
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request): \Illuminate\Http\RedirectResponse
    {
        $client = Client::where('id', $request->client_id)->first();
        $client->client_name = $request->client_name;
        $client->company_id = $request->company_id;
        $client->save();

        return redirect()->route('admin.clients.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $client = Client::where('id', $id)->first();
        $client->delete();

        return redirect()->route('admin.clients.index');
    }
}
