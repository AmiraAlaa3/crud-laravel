<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrackResource extends JsonResource
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
            'student_numbers' => $this->student_numbers,
            'track_type' => $this->track_type,
            'branch_name' => $this->branch_name,
            'track_status' => $this->track_status,
            'description' => $this->description,
            'logo' => $this->logo ? $this->logo : null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'students' => $this->students->isNotEmpty() ? $this->students->map(function ($student) {
                return [
                    'name' => $student->name,
                    'email' => $student->email,
                ];
            }): 'No student assigned',
        ];
    }
}
