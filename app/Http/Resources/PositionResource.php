<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
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
            'name' => $this->name,
            'code' => $this->code,
            'description' => $this->description,
            'level' => $this->level,
            'base_salary' => $this->base_salary,
            'company' => $this->when($this->relationLoaded('company'), function () {
                return new CompanyResource($this->company);
            }),
            'department' => $this->when($this->relationLoaded('department'), function () {
                return new DepartmentResource($this->department);
            }),
            'employees_count' => $this->when($this->relationLoaded('employees'), function () {
                return $this->employees->count();
            }),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
