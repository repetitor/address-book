<?php

namespace App\Http\Resources;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var Comment|self $this */
        return [
            'id' => $this->id,
            'opinion_id' => $this->opinion_id,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'opinion' => new OpinionResource($this->whenLoaded('opinion')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
