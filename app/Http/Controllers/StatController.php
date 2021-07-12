<?php

namespace App\Http\Controllers;

use App\Http\Resources\UrlResource;
use App\Models\Url;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function __invoke(Url $url, Request $request): JsonResponse
    {
        return response()->json([
            'data' => new UrlResource($url)
        ]);
    }
}
