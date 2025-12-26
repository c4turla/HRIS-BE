<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Employee::with(['company', 'department', 'position']);

        if ($request->has('company_id')) {
            $query->where('current_company_id', $request->company_id);
        }

        if ($request->has('department_id')) {
            $query->where('current_department_id', $request->department_id);
        }

        if ($request->has('employment_status')) {
            $query->where('current_employment_status', $request->employment_status);
        }

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('employee_id', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $employees = $query->paginate($request->per_page ?? 15);

        return response()->json([
            'success' => true,
            'data' => EmployeeResource::collection($employees),
            'meta' => [
                'current_page' => $employees->currentPage(),
                'last_page' => $employees->lastPage(),
                'per_page' => $employees->perPage(),
                'total' => $employees->total(),
            ],
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nik' => 'required|string|unique:employees,nik',
            'full_name' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female',
            'place_of_birth' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'religion' => 'nullable|string|max:50',
            'marital_status' => 'nullable|in:single,married,divorced,widowed',
            'blood_type' => 'nullable|string|max:2',
            'email' => 'nullable|email|unique:employees,email',
            'phone_number' => 'nullable|string|max:20',
            'profile_photo_url' => 'nullable|url',
            'current_company_id' => 'nullable|exists:companies,id',
            'current_department_id' => 'nullable|exists:departments,id',
            'current_position_id' => 'nullable|exists:positions,id',
            'current_employment_status' => 'nullable|string|max:50',
            'join_date' => 'nullable|date',
        ]);

        $validated['employee_id'] = $this->generateEmployeeId(
            $validated['current_company_id'] ?? null,
            $validated['current_department_id'] ?? null
        );

        $employee = Employee::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Employee created successfully',
            'data' => new EmployeeResource($employee->load(['company', 'department', 'position'])),
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $employee = Employee::with([
            'company',
            'department',
            'position',
            'financialInfo',
            'familyMembers',
            'addresses',
            'educationHistory',
            'workExperiences',
            'emergencyContacts'
        ])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => new EmployeeResource($employee),
        ]);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $employee = Employee::findOrFail($id);

        $validated = $request->validate([
            'nik' => ['nullable', 'string', Rule::unique('employees')->ignore($employee->id)],
            'full_name' => 'nullable|string|max:255',
            'gender' => 'nullable|in:male,female',
            'place_of_birth' => 'nullable|string|max:100',
            'date_of_birth' => 'nullable|date',
            'religion' => 'nullable|string|max:50',
            'marital_status' => 'nullable|in:single,married,divorced,widowed',
            'blood_type' => 'nullable|string|max:2',
            'email' => ['nullable', 'email', Rule::unique('employees')->ignore($employee->id)],
            'phone_number' => 'nullable|string|max:20',
            'profile_photo_url' => 'nullable|url',
            'current_company_id' => 'nullable|exists:companies,id',
            'current_department_id' => 'nullable|exists:departments,id',
            'current_position_id' => 'nullable|exists:positions,id',
            'current_employment_status' => 'nullable|string|max:50',
            'join_date' => 'nullable|date',
        ]);

        $employee->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Employee updated successfully',
            'data' => new EmployeeResource($employee->load(['company', 'department', 'position'])),
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return response()->json([
            'success' => true,
            'message' => 'Employee deleted successfully',
        ]);
    }

    private function generateEmployeeId($companyId = null, $departmentId = null): string
    {
        $year = date('Y');
        $month = date('m');
        $sequence = Employee::whereYear('created_at', $year)->count() + 1;

        return sprintf('EMP%s%s%04d', $year, $month, $sequence);
    }
}
