<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ReferenseRequest;
use App\Http\Resources\ReferenseResource;

use App\Models\Reference;
use App\Models\ReferenceClient;
use App\Models\ReferenceProject;

class TrafficControlCrotroller extends Controller
{

    const COMMERCIAL_FITOUTS = 1;
    const TRAFFIC_CONTROL = 2;
    const HYGIENE_MANAGEMENT = 3;
    const SECURITY = 4;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $query = Reference::with(['project', 'client']);
        
        if($request->filled('page_type')) {
            switch ($request->page_type) {

                case self::COMMERCIAL_FITOUTS:
                    $query->where('division_id', '!=', 5)
                        ->whereNotIn('templatedivision', ['Traffic Control', 'BAMS Traffic Control']);

                    break;

                case self::HYGIENE_MANAGEMENT:
                case self::TRAFFIC_CONTROL:
                    if ($request->filled('templatedivision')) {
                        /** 
                         * Hygiene Management Job Folders - templatedivision = 'BAMS Hygiene Management'
                         * Traffic Control Job Folders - templatedivision = 'Traffic Control'
                        */
                        $query->where('templatedivision', $request->templatedivision);
                    }

                    break;

                case self::SECURITY:
                    if ($request->filled('division_id')) {
                        /** 
                         * Hygiene Management Job Folders - templatedivision = 'BAMS Hygiene Management'
                         * Traffic Control Job Folders - templatedivision = 'Traffic Control'
                        */
                        $query->where('division_id', 5);
                    }

                    break;
            
                default:
                    // Optionally handle unknown page_type
                    break;
            }
        }

        $references = $query->paginate(5);

        return ReferenseResource::collection($references);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReferenseRequest $request) {
        $validated = $request->validated();

        $clientData = $validated['client'];
        $projectData = $validated['project'];
        
        unset($validated['client'], $validated['project']);

        $reference = Reference::create($validated);

        $clientData['ref_id'] = $reference->id;
        $projectData['ref_id'] = $reference->id;

        ReferenceClient::create($clientData);
        ReferenceProject::create($projectData);

        $reference->load('client', 'project');

        return new ReferenseResource($reference);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $reference = Reference::with(['project', 'client'])->findOrFail($id);

        return new ReferenseResource($reference);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReferenseRequest $request, $id) {
        $reference = Reference::findOrFail($id);

        $reference->update($request->validated());

        $reference->project()->delete();
        $reference->client()->delete();

        $reference->project()->create($request->project);
        $reference->client()->create($request->client);

        return new ReferenseResource($reference);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       // Find the main reference record or fail
        $reference = Reference::findOrFail($id);

        // Delete related project and client if they exist
        $reference->project()->delete();
        $reference->client()->delete();

        // Delete the main reference
        $reference->delete();

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Reference and its related data deleted successfully.'
        ]);
    }
}
