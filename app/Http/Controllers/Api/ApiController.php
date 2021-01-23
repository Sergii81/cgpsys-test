<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Http\Resources\CompanyResource;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * @return CompanyResource
     */
    public function getCompany(): CompanyResource
    {
        return new CompanyResource(Company::paginate(50));
    }


    /**
     * @param $company_id
     * @return ClientResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getClients($company_id)
    {
        $company = Company::where('id', $company_id)->first();
        if(!empty($company)) {
            if(Client::where('company_id', $company_id)->get()->isNotempty()) {
                return new ClientResource(Client::where('company_id', $company_id)->paginate(100));
            } else {
                return response(json_encode([
                    'message' => 'Company  '. $company->company_name.' don\'t have clients'
                ]));
            }
        } else {
            return response(json_encode([
                'message' => 'Company with id = '. $company_id.' not found'
            ]));
        }


    }

    /**
     * @param $client_id
     * @return CompanyResource|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function getClientCompany($client_id)
    {
        $client = Client::where('id', $client_id)->first();

        if(!empty($client)) {
            return new CompanyResource(Company::where('id', $client->company_id)->get());
        } else {
            return response(json_encode([
                'message' => 'Client with id = '. $client_id.' not found'
            ]));
        }
    }
}
