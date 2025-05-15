<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
        return [
            'name' => $this->name,
            'industry' => $this->industry,
            'status' => $this->status,
            'address' => $this->address,
            'city' => $this->city,
            'postal_code' => $this->postal_code,
            'country' => $this->country,
            'phone' => $this->phone,
            'email' => $this->email,
            'website' => $this->website,
            'founded_date' => $this->founded_date,
            'description' => $this->description,
            'logo' => $this->logo_path ? asset('storage/' . $this->logo_path) : null,
        ];
    }
}
