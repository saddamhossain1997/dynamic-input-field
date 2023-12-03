<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_companies = Company::all();


        // $companiesWithEmployeeCount = Company::select('companies.id', 'companies.name')
        //     ->selectRaw('COUNT(employees.id) as total_employees')
        //     ->leftJoin('employees', 'companies.id', '=', 'employees.companies_id')
        //     ->groupBy('companies.id', 'companies.name')
        //     ->get();

        $companiesWithEmployeeCount = Company::select(
            'companies.id',
            'companies.name',
            'companies.cphone', // Add other columns you need from the companies table
            'companies.cemail', // Add other columns you need from the companies table
            DB::raw('COUNT(employees.id) as total_employees')
        )
            ->leftJoin('employees', 'companies.id', '=', 'employees.companies_id')
            ->groupBy('companies.id', 'companies.name', 'companies.cphone', 'companies.cemail') // Group by other columns
            ->paginate(5);

        return view('company.addCompany', compact('companiesWithEmployeeCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        // Create a new post
        Company::create([
            'name' => $request->input('name'),
            'cemail' => $request->input('cemail'),
            'cphone' => $request->input('cphone'),
        ]);

        // Redirect to the index page with a success message
        return redirect()->route('company.index')->with('success', 'company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Company::findOrFail($id);
        return view('company.editCompany', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        $post = Company::findOrFail($id);
        $post->update([
            'name' => $request->input('name'),
            'cemail' => $request->input('cemail'),
            'cphone' => $request->input('cphone'),
        ]);

        return redirect()->route('company.index')->with('success', 'Post updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Company::findOrFail($id);
        $post->delete();

        return redirect()->route('company.index')->with('success', 'Post deleted successfully');
    }
}
