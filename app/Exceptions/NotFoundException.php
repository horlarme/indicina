<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class NotFoundException extends Exception
{
    public function report(): bool
    {
        return false;
    }

    public function render(): JsonResponse
    {
        return response()->json(['message' => 'Not Found'], Response::HTTP_NOT_FOUND);
    }
}
