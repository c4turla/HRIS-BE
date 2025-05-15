<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyLocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'company_id'     => $this->company_id,
            'name'           => $this->name,
            'type'           => $this->type,
            'address'        => $this->address,
            'city'           => $this->city,
            'postal_code'    => $this->postal_code,
            'country'        => $this->country,
            'phone'          => $this->phone,
            'is_headquarters'=> $this->is_headquarters,
        ];
    }
}
