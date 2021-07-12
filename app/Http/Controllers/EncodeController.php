<?php

namespace App\Http\Controllers;

use App\Http\Requests\EncodeRequest;
use App\Http\Resources\UrlResource;
use App\Models\Url;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class EncodeController extends Controller
{
    public function __invoke(EncodeRequest $request): JsonResponse
    {
        return response()->json([
            'data' => new UrlResource(
                (new Url())->create($request->only(['url']))
            ),
        ], Response::HTTP_CREATED);
    }
}
