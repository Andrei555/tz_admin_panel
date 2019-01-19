<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.employees.index', [
            'employees' => Employee::with('company')->paginate(10),
            'companies' => Company::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create', [
            'companies' => Company::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->all());

        return redirect(route('admin.employees.index'))->with('flash_message', __('Data saved successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param Employee $employee
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.view', [
            'employee' => $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Employee $employee)
    {
        return view('admin.employees.edit', [
            'companies'  => Company::all(),
            'employee' => $employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreEmployeeRequest $request
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect(route('admin.employees.index'))->with('flash_message', __('Data changed successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect(route('admin.employees.index'))->with('flash_message', __('Data has been deleted'));
    }
}
