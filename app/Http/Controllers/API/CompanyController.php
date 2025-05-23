<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;

use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $query = Company::query();

        // Optional dynamic filtering by templatedivision
        if ($request->filled('division_id')) {
            /** 
             * Company for New TC Reference Card - division_id = 'Traffic Control'
             * Company to Create Reference Card - condition nothing
            */
            $query->where('division_id', $request->division_id);
        }

        $companies = $query->paginate(5);

        return CompanyResource::collection($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request) {
        $company = Company::create($request->validated());

        return new CompanyResource($company);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $company = Company::findOrFail($id);

        return new CompanyResource($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $company = Company::findOrFail($id);

        $company->update($request->all());

        return new CompanyResource($company);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $company = Company::findOrFail($id);

        $company->delete();

        return response()->json([
            'success' => true,
            'message' => 'Company deleted successfully.'
        ]);
    }

}
