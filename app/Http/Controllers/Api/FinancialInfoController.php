<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FinancialInfoResource;
use App\Models\Employee;
use App\Models\FinancialInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FinancialInfoController extends Controller
{
    public function store(Request $request, Employee $employee): JsonResponse
    {
        $validated = $request->validate([
            'npwp_number' => 'nullable|string|max:20',
            'tax_status' => 'nullable|string|max:10',
            'bpjs_kesehatan_number' => 'nullable|string|max:20',
            'bpjs_ketenagakerjaan_number' => 'nullable|string|max:20',
            'bank_name' => 'nullable|string|max:100',
            'bank_account_number' => 'nullable|string|max:50',
            'bank_account_name' => 'nullable|string|max:255',
        ]);

        $financialInfo = $employee->financialInfo()->create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Financial info created successfully',
            'data' => new FinancialInfoResource($financialInfo),
        ], 201);
    }

    public function show(Employee $employee): JsonResponse
    {
        $financialInfo = $employee->financialInfo;

        if (!$financialInfo) {
            return response()->json([
                'success' => false,
                'message' => 'Financial info not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new FinancialInfoResource($financialInfo),
        ]);
    }

    public function update(Request $request, Employee $employee): JsonResponse
    {
        $financialInfo = $employee->financialInfo;

        if (!$financialInfo) {
            return response()->json([
                'success' => false,
                'message' => 'Financial info not found',
            ], 404);
        }

        $validated = $request->validate([
            'npwp_number' => 'nullable|string|max:20',
            'tax_status' => 'nullable|string|max:10',
            'bpjs_kesehatan_number' => 'nullable|string|max:20',
            'bpjs_ketenagakerjaan_number' => 'nullable|string|max:20',
            'bank_name' => 'nullable|string|max:100',
            'bank_account_number' => 'nullable|string|max:50',
            'bank_account_name' => 'nullable|string|max:255',
        ]);

        $financialInfo->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Financial info updated successfully',
            'data' => new FinancialInfoResource($financialInfo),
        ]);
    }
}
