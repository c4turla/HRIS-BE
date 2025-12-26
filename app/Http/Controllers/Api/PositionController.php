<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Models\Position;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PositionController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Position::with(['company', 'department']);

        if ($request->has('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->has('department_id')) {
            $query->where('department_id', $request->department_id);
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
            });
        }

        $positions = $query->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => PositionResource::collection($positions),
            'meta' => [
                'current_page' => $positions->currentPage(),
                'last_page' => $positions->lastPage(),
                'per_page' => $positions->perPage(),
                'total' => $positions->total(),
            ],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:positions,code',
            'description' => 'nullable|string',
            'level' => 'nullable|integer|min:1',
            'base_salary' => 'nullable|numeric|min:0',
            'department_id' => 'nullable|exists:departments,id',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        $position = Position::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Position created successfully',
            'data' => new PositionResource($position->load(['company', 'department'])),
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $position = Position::with(['company', 'department', 'employees'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new PositionResource($position),
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $position = Position::findOrFail($id);

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'code' => ['nullable', 'string', 'max:50', Rule::unique('positions')->ignore($position->id)],
            'description' => 'nullable|string',
            'level' => 'nullable|integer|min:1',
            'base_salary' => 'nullable|numeric|min:0',
            'department_id' => 'nullable|exists:departments,id',
            'company_id' => 'nullable|exists:companies,id',
        ]);

        $position->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Position updated successfully',
            'data' => new PositionResource($position->load(['company', 'department'])),
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return response()->json([
            'success' => true,
            'message' => 'Position deleted successfully',
        ]);
    }
}
