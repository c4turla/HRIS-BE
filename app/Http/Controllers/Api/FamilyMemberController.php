<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FamilyMemberResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FamilyMemberController extends Controller
{
    public function index(Request $request, Employee $employee): JsonResponse
    {
        $familyMembers = $employee->familyMembers()->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => FamilyMemberResource::collection($familyMembers),
            'meta' => [
                'current_page' => $familyMembers->currentPage(),
                'last_page' => $familyMembers->lastPage(),
                'per_page' => $familyMembers->perPage(),
                'total' => $familyMembers->total(),
            ],
        ]);
    }

    public function store(Request $request, Employee $employee): JsonResponse
    {
        $validated = $request->validate([
            'relationship' => 'required|string|max:50',
            'name' => 'required|string|max:255',
            'date_of_birth' => 'nullable|date',
            'occupation' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $familyMember = $employee->familyMembers()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Family member added successfully',
            'data' => new FamilyMemberResource($familyMember),
        ], 201);
    }

    public function show(Employee $employee, $id): JsonResponse
    {
        $familyMember = $employee->familyMembers()->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new FamilyMemberResource($familyMember),
        ]);
    }

    public function update(Request $request, Employee $employee, $id): JsonResponse
    {
        $familyMember = $employee->familyMembers()->findOrFail($id);

        $validated = $request->validate([
            'relationship' => 'nullable|string|max:50',
            'name' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'occupation' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $familyMember->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Family member updated successfully',
            'data' => new FamilyMemberResource($familyMember),
        ]);
    }

    public function destroy(Employee $employee, $id): JsonResponse
    {
        $familyMember = $employee->familyMembers()->findOrFail($id);
        $familyMember->delete();

        return response()->json([
            'success' => true,
            'message' => 'Family member deleted successfully',
        ]);
    }
}
