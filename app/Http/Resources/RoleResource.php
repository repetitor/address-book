<?php

namespace App\Http\Resources;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var Role|self $this */
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'users' => UserResource::collection($this->whenLoaded('users')),
        ];
    }
}
