<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReferenseResource extends JsonResource
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
            'ref_no' => $this->ref_no,
            'completed_by' => $this->completed_by,
            'completed_date' => $this->completed_date,
            'folder' => $this->folder,
            'is_archived' => $this->is_archived,
            'status' => $this->status,
            'custom_status' => $this->custom_status,
            'templatedivision' => $this->templatedivision,
            'division_id' => $this->division_id,
            'time' => $this->time,
            'project_manager_contact' => $this->project_manager_contact,
            'project_manager_email' => $this->project_manager_email,
            'project_manager_mobile' => $this->project_manager_mobile,

            'project' => $this->project,  // Includes all project data
            'client' => $this->client,    // Includes all client data
        ];
    }
}
