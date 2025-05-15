<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Http\JsonResponse;

class DepartmentController extends Controller
{
    // Get all departments
    public function index(Request $request): JsonResponse
    {
        $query = Department::query();

        if ($request->has('company_id')) {
            $query->where('company_id', $request->input('company_id'));
        }

        $departments = $query->get()->map(function ($department) {
            return [
                'id' => $department->id,
                'company_id' => $department->company_id,
                'name' => $department->name,
                'head' => $department->head,
                'status' => $department->status,
                'created' => $department->created,
                'created_at' => $department->created_at,
                'updated_at' => $department->updated_at,
            ];
        });

        return response()->json($departments);
    }

    // Store a new department
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'company_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'head' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'created' => 'nullable|date',
        ]);

        $department = Department::create($validated);

        return response()->json([
            'id' => $department->id,
            'company_id' => $department->company_id,
            'name' => $department->name,
            'head' => $department->head,
            'status' => $department->status,
            'created' => $department->created,
            'created_at' => $department->created_at,
            'updated_at' => $department->updated_at,
        ], 201);
    }

    // Show a specific department
    public function show($id): JsonResponse
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        return response()->json([
            'id' => $department->id,
            'company_id' => $department->company_id,
            'name' => $department->name,
            'head' => $department->head,
            'status' => $department->status,
            'created' => $department->created,
            'created_at' => $department->created_at,
            'updated_at' => $department->updated_at,
        ]);
    }

    // Update a department
    public function update(Request $request, $id): JsonResponse
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        $validated = $request->validate([
            'company_id' => 'sometimes|integer',
            'name' => 'required|string|max:255',
            'head' => 'nullable|string|max:255',
            'status' => 'nullable|string|max:50',
            'created' => 'nullable|date',
        ]);

        $department->update($validated);

        return response()->json([
            'id' => $department->id,
            'company_id' => $department->company_id,
            'name' => $department->name,
            'head' => $department->head,
            'status' => $department->status,
            'created' => $department->created,
            'created_at' => $department->created_at,
            'updated_at' => $department->updated_at,
        ]);
    }

    // Delete a department
    public function destroy($id): JsonResponse
    {
        $department = Department::find($id);

        if (!$department) {
            return response()->json(['message' => 'Department not found'], 404);
        }

        $department->delete();

        return response()->json(['message' => 'Department deleted']);
    }
}
