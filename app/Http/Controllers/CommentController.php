<?php

namespace App\Http\Controllers;

use App\Events\NewComment;
use App\Http\Requests\Comment\StoreRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Opinion;

class CommentController extends Controller
{
    public function store(StoreRequest $request, Opinion $opinion): CommentResource
    {
        $comment = Comment::create([
            ...$request->validated(),
            'opinion_id' => $opinion->id,
            'user_id' => auth()->user()->id,
        ]);

        event(new NewComment($comment));

        return new CommentResource($comment);
    }
}
