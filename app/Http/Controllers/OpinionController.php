<?php

namespace App\Http\Controllers;

use App\Events\NewOpinion;
use App\Http\Requests\Opinion\StoreRequest;
use App\Http\Resources\OpinionResource;
use App\Models\Opinion;

class OpinionController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $opinions = Opinion::with('comments')->paginate();

        return OpinionResource::collection($opinions);
    }

    public function store(StoreRequest $request): OpinionResource
    {
        $opinion = Opinion::create([
            ...$request->validated(),
            'user_id' => auth()->user()->id,
        ]);

        event(new NewOpinion($opinion));

        return new OpinionResource($opinion->load('user'));
    }
}
