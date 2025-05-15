<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyLocation;

class CompanyLocationController extends Controller
{
    // Get all company locations
    public function index()
    {
        $query = CompanyLocation::query();

        if ($companyId = request()->query('company_id')) {
            $query->where('company_id', $companyId);
        }

        return response()->json($query->get());
    }

    // Store a new company location
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id'     => 'required|integer',
            'name'           => 'required|string|max:255',
            'type'           => 'required|string|max:100',
            'address'        => 'required|string|max:255',
            'city'           => 'required|string|max:100',
            'postal_code'    => 'required|string|max:20',
            'country'        => 'required|string|max:100',
            'phone'          => 'nullable|string|max:20',
            'is_headquarters'=> 'required|boolean',
        ]);

        $location = CompanyLocation::create($validated);

        return response()->json($location, 201);
    }

    // Show a specific company location
    public function show($id)
    {
        $location = CompanyLocation::findOrFail($id);
        return response()->json($location);
    }

    // Update a company location
    public function update(Request $request, $id)
    {
        $location = CompanyLocation::findOrFail($id);

        $validated = $request->validate([
            'company_id'     => 'sometimes|required|integer',
            'name'           => 'sometimes|required|string|max:255',
            'type'           => 'sometimes|required|string|max:100',
            'address'        => 'sometimes|required|string|max:255',
            'city'           => 'sometimes|required|string|max:100',
            'postal_code'    => 'sometimes|required|string|max:20',
            'country'        => 'sometimes|required|string|max:100',
            'phone'          => 'nullable|string|max:20',
            'is_headquarters'=> 'sometimes|required|boolean',
        ]);

        $location->update($validated);

        return response()->json($location);
    }

    // Delete a company location
    public function destroy($id)
    {
        $location = CompanyLocation::findOrFail($id);
        $location->delete();

        return response()->json(['message' => 'Deleted successfully']);
    }
}
