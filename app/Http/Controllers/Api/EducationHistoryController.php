<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EducationHistoryResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EducationHistoryController extends Controller
{
    public function index(Request $request, Employee $employee): JsonResponse
    {
        $educationHistory = $employee->educationHistory()->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => EducationHistoryResource::collection($educationHistory),
            'meta' => [
                'current_page' => $educationHistory->currentPage(),
                'last_page' => $educationHistory->lastPage(),
                'per_page' => $educationHistory->perPage(),
                'total' => $educationHistory->total(),
            ],
        ]);
    }

    public function store(Request $request, Employee $employee): JsonResponse
    {
        $validated = $request->validate([
            'institution_name' => 'required|string|max:255',
            'degree' => 'required|string|max:100',
            'field_of_study' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'grade' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        $education = $employee->educationHistory()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Education history added successfully',
            'data' => new EducationHistoryResource($education),
        ], 201);
    }

    public function show(Employee $employee, $id): JsonResponse
    {
        $education = $employee->educationHistory()->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new EducationHistoryResource($education),
        ]);
    }

    public function update(Request $request, Employee $employee, $id): JsonResponse
    {
        $education = $employee->educationHistory()->findOrFail($id);

        $validated = $request->validate([
            'institution_name' => 'nullable|string|max:255',
            'degree' => 'nullable|string|max:100',
            'field_of_study' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'grade' => 'nullable|string|max:50',
            'description' => 'nullable|string',
        ]);

        $education->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Education history updated successfully',
            'data' => new EducationHistoryResource($education),
        ]);
    }

    public function destroy(Employee $employee, $id): JsonResponse
    {
        $education = $employee->educationHistory()->findOrFail($id);
        $education->delete();

        return response()->json([
            'success' => true,
            'message' => 'Education history deleted successfully',
        ]);
    }
}
