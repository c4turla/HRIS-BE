<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeAddressResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeAddressController extends Controller
{
    public function index(Request $request, Employee $employee): JsonResponse
    {
        $addresses = $employee->addresses()->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => EmployeeAddressResource::collection($addresses),
            'meta' => [
                'current_page' => $addresses->currentPage(),
                'last_page' => $addresses->lastPage(),
                'per_page' => $addresses->perPage(),
                'total' => $addresses->total(),
            ],
        ]);
    }

    public function store(Request $request, Employee $employee): JsonResponse
    {
        $validated = $request->validate([
            'address_type' => 'required|string|max:50',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'country' => 'nullable|string|max:100',
            'is_primary' => 'nullable|boolean',
        ]);

        if ($validated['is_primary'] ?? false) {
            $employee->addresses()->update(['is_primary' => false]);
        }

        $address = $employee->addresses()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Address added successfully',
            'data' => new EmployeeAddressResource($address),
        ], 201);
    }

    public function show(Employee $employee, $id): JsonResponse
    {
        $address = $employee->addresses()->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new EmployeeAddressResource($address),
        ]);
    }

    public function update(Request $request, Employee $employee, $id): JsonResponse
    {
        $address = $employee->addresses()->findOrFail($id);

        $validated = $request->validate([
            'address_type' => 'nullable|string|max:50',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:100',
            'state' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',
            'country' => 'nullable|string|max:100',
            'is_primary' => 'nullable|boolean',
        ]);

        if ($validated['is_primary'] ?? false) {
            $employee->addresses()->where('id', '!=', $id)->update(['is_primary' => false]);
        }

        $address->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Address updated successfully',
            'data' => new EmployeeAddressResource($address),
        ]);
    }

    public function destroy(Employee $employee, $id): JsonResponse
    {
        $address = $employee->addresses()->findOrFail($id);
        $address->delete();

        return response()->json([
            'success' => true,
            'message' => 'Address deleted successfully',
        ]);
    }
}
