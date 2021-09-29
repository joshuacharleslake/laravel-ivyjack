<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::where([
            ['id', '!=', null],
            [function ($query) use ($request) {
                if ( ($search = $request->search) ) {
                    $query->orWhere('first_name', 'LIKE', '%' . $search . '%')->get();
                    $query->orWhere('last_name', 'LIKE', '%' . $search . '%')->get();
                    $query->orWhere('email', 'LIKE', '%' . $search . '%')->get();
                    $query->orWhere('telephone', 'LIKE', '%' . $search . '%')->get();
                }
            }]
        ])
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('employees.index')
            ->with([
                'employees' => $employees
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.edit')->with([
            'employee' => new Employee(),
            'companies' => Company::orderBy('name', 'asc')->get()->map->only('id', 'name')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = new Employee();

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->telephone = $request->input('telephone');
        $employee->company_id = $request->input('company_id');

        if ( $employee->save() ) {

            return redirect()->route('employees.edit', ['employee' => $employee])
                ->with('message', __('employee.added'));

        }

        return redirect()->route('employees.create')
            ->withErrors([__('employee.failed_to_add')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('employees.edit', ['employee' => Employee::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('id', $id)->first();
        $companies = Company::orderBy('name', 'asc')->get()->map->only('id', 'name');

        return view('employees.edit')->with([
            'employee' => $employee,
            'companies' => $companies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->telephone = $request->input('telephone');
        $employee->company_id = $request->input('company_id');

        if ( $employee->update() ) {

            return redirect()->route('employees.edit', ['employee' => $employee])
                ->with('message', __('employee.updated'));

        }

        return redirect()->route('employees.edit', ['employee' => $employee])
            ->withErrors([__('employee.failed_to_update')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Company::find($id);

        if ( $employee->delete() ) {
            return redirect()->route('employees.index')
                ->with('message', __('employee.deleted'));
        }

        return redirect()->route('employees.index')
            ->withErrors([__('employee.failed_to_delete')]);
    }
}
