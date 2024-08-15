<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'description' => $this->description,
            'totalGrade' => $this->totalGrade,
            'tracks' => TrackResource::collection($this->tracks),
            // 'students' => StudentResource::collection($this->students),
            'students' => $this->students->isNotEmpty() ? $this->students->map(function ($student) {
                return [
                    'name' => $student->name,
                    'email' => $student->email,
                ];
            }): [],
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
