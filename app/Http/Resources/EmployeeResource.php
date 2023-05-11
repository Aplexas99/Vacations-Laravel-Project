<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TagResource;
use App\Http\Resources\IngredientResource;
use App\Http\Resources\CategoryResource;

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
            'role' => $this->role->name,
        ];

        return $data;
}
}