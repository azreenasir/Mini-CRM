<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create',[
            'company' => new Company(),
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
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048|dimensions:min_width=100,min_height=100'
        ]);

        $company = $request->all();
        $company['slug'] = Str::slug($request->name);
        $company['logo'] = request()->file('logo') ? request()->file('logo')->store("/img/logo") : null;
        Company::create($company);
        
        session()->flash('success', 'The company was registered');
    


        /* return to posts page */
        return redirect()->to('company');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $companies = Company::latest()->limit(10)->get();
        return view('companies.show', compact('company', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', [

            'company' => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        
        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        if(request()->file('logo')){
            Storage::delete($company->logo);
            $logo = request()->file('logo')->store("img/logo");
        } else {
            $logo = $company->logo;
        }

        

        /*validate the field  *using CompanyRequest method* */ 
        $attr = $request->all();

        /* update new info for the company */
        $attr['logo'] = $logo;

        $company->update($attr);

        /* flash message to alert that the company was success update */
        session()->flash('success', 'The Company information was updated');

        /* return to company page */
        return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Storage::delete($company->logo);
        $company->delete();
        
        session()->flash('error', "The Company information was deleted");
        return redirect()->route('companies.index');
    }
}
