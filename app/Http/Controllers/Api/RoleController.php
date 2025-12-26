<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Role::with(['users']);

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $roles = $query->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => RoleResource::collection($roles),
            'meta' => [
                'current_page' => $roles->currentPage(),
                'last_page' => $roles->lastPage(),
                'per_page' => $roles->perPage(),
                'total' => $roles->total(),
            ],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Role created successfully',
            'data' => new RoleResource($role),
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $role = Role::with(['users'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new RoleResource($role),
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name' => ['nullable', 'string', 'max:255', Rule::unique('roles')->ignore($role->id)],
            'description' => 'nullable|string',
            'permissions' => 'nullable|array',
        ]);

        $role->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Role updated successfully',
            'data' => new RoleResource($role),
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json([
            'success' => true,
            'message' => 'Role deleted successfully',
        ]);
    }
}
