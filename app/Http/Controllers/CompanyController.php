<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::where([
            ['name', '!=', null],
            [function ($query) use ($request) {
                if ( ($search = $request->search) ) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')->get();
                }
            }]
        ])
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('companies.index')
            ->with([
                'companies' => $companies
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.edit')->with([
            'company' => new Company()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = new Company();

        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');

        if ($request->hasFile('image')) {
            $file_name = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->image->storeAs('public/images/company-logos/', $file_name);
            $company->image = $file_name;
        }

        if ( $company->save() ) {

            return redirect()->route('companies.edit', ['company' => $company])
                ->with('message', __('company.added'));

        }

        return redirect()->route('company.create')
            ->withErrors([__('company.failed_to_add')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('companies.edit', ['company' => Company::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::where('id', $id)->first();

        return view('companies.edit')->with([
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');

        $delete_existing_image = false;

        if ($request->hasFile('image')) {
            $existing_image =  $company->image;
            $file_name = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->image->storeAs('public/images/company-logos/', $file_name);
            $company->image = $file_name;
            $delete_existing_image = true;
        }

        if ( $company->update() ) {

            if ( $delete_existing_image === true && isset($existing_image) ) {
                Storage::delete('public/images/company-logos/' . $existing_image);
            }

            return redirect()->route('companies.edit', ['company' => $company])
                ->with('message', __('company.updated'));

        }

        return redirect()->route('clients.edit', ['company' => $company])
            ->withErrors([__('company.failed_to_update')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        if ( $company->delete() ) {
            return redirect()->route('companies.index')
                ->with('message', __('company.deleted'));
        }

        return redirect()->route('companies.index')
            ->withErrors([__('company.failed_to_delete')]);
    }
}
