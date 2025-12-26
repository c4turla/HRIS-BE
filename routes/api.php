<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API Version 1
Route::prefix('v1')->group(function () {
    // Authentication Routes (if needed for login/register)
    // Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/register', [AuthController::class, 'register']);

    // Company & Department Management
    Route::apiResource('companies', \App\Http\Controllers\Api\CompanyController::class);
    Route::apiResource('departments', \App\Http\Controllers\Api\DepartmentController::class);
    Route::apiResource('company_locations', \App\Http\Controllers\Api\CompanyLocationController::class);
    Route::apiResource('positions', \App\Http\Controllers\Api\PositionController::class);
    Route::apiResource('roles', \App\Http\Controllers\Api\RoleController::class);

    // Employee Management
    Route::apiResource('employees', \App\Http\Controllers\Api\EmployeeController::class);
    Route::prefix('employees/{employee}')->group(function () {
        Route::apiResource('financial_info', \App\Http\Controllers\Api\FinancialInfoController::class)->only(['store', 'update', 'show']);
        Route::apiResource('family_members', \App\Http\Controllers\Api\FamilyMemberController::class);
        Route::apiResource('addresses', \App\Http\Controllers\Api\EmployeeAddressController::class);
        Route::apiResource('education_history', \App\Http\Controllers\Api\EducationHistoryController::class);
        Route::apiResource('work_experiences', \App\Http\Controllers\Api\WorkExperienceController::class);
        Route::apiResource('emergency_contacts', \App\Http\Controllers\Api\EmergencyContactController::class);
    });
});
