<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var User|self $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'opinions' => OpinionResource::collection($this->whenLoaded('opinions')),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }
}
