<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyAddRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $companies = Company::paginate(100);

        return view('admin.companies.index', [
            'companies' => $companies
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addForm(Request $request)
    {
        return view('admin.companies.add-form');
    }

    /**
     * @param CompanyAddRequest $companyAddRequest
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(CompanyAddRequest $companyAddRequest): \Illuminate\Http\RedirectResponse
    {
        Company::create([
            'company_name' => $companyAddRequest['company_name']
        ]);
        return redirect()->route('admin.companies.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editForm($id)
    {
        $company = Company::where('id', $id)->first();

        return view('admin.companies.edit-form', [
            'company' => $company
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request): \Illuminate\Http\RedirectResponse
    {
        $company = Company::where('id', $request->company_id)->first();
        $company->company_name = $request->company_name;
        $company->save();

        return redirect()->route('admin.companies.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id): \Illuminate\Http\RedirectResponse
    {
        $company = Company::where('id', $id)->first();
        $company->delete();

        return redirect()->route('admin.companies.index');
    }
}
