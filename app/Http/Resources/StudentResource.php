<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'email' => $this->email,
            'grade' => $this->grade,
            'gender' => $this->gender,
            'image' => $this->image ? url('public/uploads/' . $this->image) : null,
            'address' => $this->address,
            'track_id' => $this->track ? $this->track->id : 'No track assigned',
            'track' => $this->track ? $this->track->name : 'No track assigned',
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
