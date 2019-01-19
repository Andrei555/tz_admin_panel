<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.companies.index', [
            'companies' => Company::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCompanyRequest $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCompanyRequest $request, Company $company)
    {
        $this->saveCompany($request, $company);

        return redirect(route('admin.companies.index'))->with('flash_message', __('Data saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Company $company)
    {
        return view('admin.companies.view', [
            'company' => $company,
            'employees' => $company->employees()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Company $company)
    {
        return view('admin.companies.edit', [
            'company' => $company
        ]);
    }

    /**
     * @param StoreCompanyRequest $request
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreCompanyRequest $request, Company $company)
    {
        $this->saveCompany($request, $company);

        return redirect(route('admin.companies.index'))->with('flash_message', __('Data changed successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company)
    {
        $employeesIds = $company->employees()->get()->pluck('id')->toArray();
        Employee::destroy($employeesIds);
        $company->delete();

        return redirect(route('admin.companies.index'))->with('flash_message', __('Data has been deleted'));
    }

    /**
     * @param $request
     * @param $company
     */
    private function saveCompany($request, $company)
    {
        if ($request->hasFile('logo')) {
            $request->logo->storeAs('public', $request->logo->hashName());
            $company->logo = $request->logo->hashName();
        }
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->url;
        $company->save();
    }
}
