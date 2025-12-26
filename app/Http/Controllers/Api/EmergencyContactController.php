<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmergencyContactResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmergencyContactController extends Controller
{
    public function index(Request $request, Employee $employee): JsonResponse
    {
        $emergencyContacts = $employee->emergencyContacts()->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => EmergencyContactResource::collection($emergencyContacts),
            'meta' => [
                'current_page' => $emergencyContacts->currentPage(),
                'last_page' => $emergencyContacts->lastPage(),
                'per_page' => $emergencyContacts->perPage(),
                'total' => $emergencyContacts->total(),
            ],
        ]);
    }

    public function store(Request $request, Employee $employee): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'relationship' => 'required|string|max:50',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        $emergencyContact = $employee->emergencyContacts()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Emergency contact added successfully',
            'data' => new EmergencyContactResource($emergencyContact),
        ], 201);
    }

    public function show(Employee $employee, $id): JsonResponse
    {
        $emergencyContact = $employee->emergencyContacts()->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new EmergencyContactResource($emergencyContact),
        ]);
    }

    public function update(Request $request, Employee $employee, $id): JsonResponse
    {
        $emergencyContact = $employee->emergencyContacts()->findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'relationship' => 'nullable|string|max:50',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
        ]);

        $emergencyContact->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Emergency contact updated successfully',
            'data' => new EmergencyContactResource($emergencyContact),
        ]);
    }

    public function destroy(Employee $employee, $id): JsonResponse
    {
        $emergencyContact = $employee->emergencyContacts()->findOrFail($id);
        $emergencyContact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Emergency contact deleted successfully',
        ]);
    }
}
