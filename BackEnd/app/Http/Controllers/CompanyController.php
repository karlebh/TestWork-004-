<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Company;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;

class CompanyController extends Controller
{

    public function index()
    {

        return Inertia::render('Company/Index', [
            'user_id' => auth()->id(),
            'companies' => Company::paginate()
        ]);
    }

    public function create()
    {
        return Inertia::render('Company/Create');
    }

    public function store(StoreCompanyRequest $request)
    {
        $slug = Str::limit(Str::lower(Str::slug($request->name)), 50, '');
        auth()->user()->company()->create(array_merge($request->validated(), ['slug' => $slug]));
        return redirect()->route('company.index');
    }

    public function show(Company $company)
    {

        return Inertia::render('Company/Show', [
            'company' => $company
        ]);
    }

    public function edit(Company $company)
    {
        $this->authorize('edit', $company);

        return Inertia::render('Company/Edit', [
            'company' => $company
        ]);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $this->authorize('update', $company);

        $slug = Str::limit(Str::lower(Str::slug($request->name)), 50, '');

        $company->update(
            array_merge($request->validated(), ['slug' => $slug])
        );

        return redirect()->route('company.show', $company);
    }

    public function destroy(Company $company)
    {
        $this->authorize('delete', $company);

        Company::whereSlug($company->slug)->delete();

        return redirect()->route('company.index');
    }
}
