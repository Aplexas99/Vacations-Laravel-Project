<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacationRequestApproversResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'approver_id' => $this->approver_id,
            'vacation_request_id' => $this->vacation_request_id,
            'status' => $this->status,
            'reason' => $this->reason,
        ];
    }
}
