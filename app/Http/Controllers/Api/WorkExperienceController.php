<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkExperienceResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index(Request $request, Employee $employee): JsonResponse
    {
        $workExperiences = $employee->workExperiences()->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => WorkExperienceResource::collection($workExperiences),
            'meta' => [
                'current_page' => $workExperiences->currentPage(),
                'last_page' => $workExperiences->lastPage(),
                'per_page' => $workExperiences->perPage(),
                'total' => $workExperiences->total(),
            ],
        ]);
    }

    public function store(Request $request, Employee $employee): JsonResponse
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $workExperience = $employee->workExperiences()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Work experience added successfully',
            'data' => new WorkExperienceResource($workExperience),
        ], 201);
    }

    public function show(Employee $employee, $id): JsonResponse
    {
        $workExperience = $employee->workExperiences()->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new WorkExperienceResource($workExperience),
        ]);
    }

    public function update(Request $request, Employee $employee, $id): JsonResponse
    {
        $workExperience = $employee->workExperiences()->findOrFail($id);

        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        $workExperience->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Work experience updated successfully',
            'data' => new WorkExperienceResource($workExperience),
        ]);
    }

    public function destroy(Employee $employee, $id): JsonResponse
    {
        $workExperience = $employee->workExperiences()->findOrFail($id);
        $workExperience->delete();

        return response()->json([
            'success' => true,
            'message' => 'Work experience deleted successfully',
        ]);
    }
}
