<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'username' => $this->username,
            'vacation_days_used' => $this->vacation_days_used,
            'vacation_days_left' => $this->vacation_days_left,
            'role' => new RoleResource($this->role),
            'teams' => TeamResource::collection($this->teams),
            'projects' => ProjectResource::collection($this->teams->map->projects->flatten()),
            'vacation_requests' => VacationRequestResource::collection($this->vacationRequests),
        ];

        return $data;
}
}