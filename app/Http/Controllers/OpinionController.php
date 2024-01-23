<?php

namespace App\Http\Controllers;

use App\Events\NewOpinion;
use App\Http\Requests\Opinion\StoreRequest;
use App\Http\Resources\OpinionResource;
use App\Models\Opinion;
use Illuminate\Contracts\Database\Eloquent\Builder;

class OpinionController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $opinions = Opinion::with([
            'comments' => function (Builder $query) {
                $query->orderByDesc('id')->limit(5);
            },
            'user',
        ])
            ->cursorPaginate(10);

        return OpinionResource::collection($opinions);
    }

    public function store(StoreRequest $request): OpinionResource
    {
        $opinion = $request->user()->opinions()->create($request->validated());
        event(new NewOpinion($opinion));

        return new OpinionResource($opinion->load('user'));
    }
}
