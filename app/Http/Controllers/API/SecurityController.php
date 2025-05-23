<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Http\Requests\SecurityRequest;
use App\Http\Resources\SecurityResource;

use App\Models\Security;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $security = Security::paginate(5);

        return SecurityResource::collection($security);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SecurityRequest $request) {
        $company = Security::create($request->validated());

        return new SecurityResource($company);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
       $reference = Security::with(['project', 'client'])->findOrFail($id);

        return new SecurityResource($reference);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(SecurityRequest $request, string $id) {
        $company = Security::findOrFail($id);

        $company->update($request->validated());

        return new SecurityResource($company);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $company = Security::findOrFail($id);

        $company->delete();

        return response()->json([
            'message' => 'Security record deleted successfully.'
        ]);
    }
}
