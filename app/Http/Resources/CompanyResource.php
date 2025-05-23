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
        return [
            'id' => $this->id,
            'company' => $this->company,
            'abn' => $this->abn,
            'phone' => $this->phone,
            'street' => $this->street,

            'suburb' => $this->suburb,
            'postcode' => $this->postcode,
            'state' => $this->state,
            'country' => $this->country,
            'division_id' => $this->division_id,
        ];
    }
}
