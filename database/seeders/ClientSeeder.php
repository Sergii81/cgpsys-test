<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companyIds = Company::pluck('id')->toArray();

        $clients = \App\Models\Client::factory()->count(15000)->make()->each(function($clients) use($companyIds) {
            $clients->company_id = Arr::random($companyIds);
        })->toArray();

        Client::insert($clients);
    }
}
