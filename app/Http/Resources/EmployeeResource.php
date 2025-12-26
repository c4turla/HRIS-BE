<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'employee_id' => $this->employee_id,
            'nik' => $this->nik,
            'full_name' => $this->full_name,
            'gender' => $this->gender,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth?->format('Y-m-d'),
            'religion' => $this->religion,
            'marital_status' => $this->marital_status,
            'blood_type' => $this->blood_type,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'profile_photo_url' => $this->profile_photo_url,
            'current_employment_status' => $this->current_employment_status,
            'join_date' => $this->join_date?->format('Y-m-d'),
            'company' => $this->when($this->relationLoaded('company'), function () {
                return new CompanyResource($this->company);
            }),
            'department' => $this->when($this->relationLoaded('department'), function () {
                return new DepartmentResource($this->department);
            }),
            'position' => $this->when($this->relationLoaded('position'), function () {
                return new PositionResource($this->position);
            }),
            'financial_info' => $this->when($this->relationLoaded('financialInfo'), function () {
                return new FinancialInfoResource($this->financialInfo);
            }),
            'family_members' => FamilyMemberResource::collection($this->whenLoaded('familyMembers')),
            'addresses' => EmployeeAddressResource::collection($this->whenLoaded('addresses')),
            'education_history' => EducationHistoryResource::collection($this->whenLoaded('educationHistory')),
            'work_experiences' => WorkExperienceResource::collection($this->whenLoaded('workExperiences')),
            'emergency_contacts' => EmergencyContactResource::collection($this->whenLoaded('emergencyContacts')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
