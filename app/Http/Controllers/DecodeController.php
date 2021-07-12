<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DecodeController extends Controller
{
    public function __invoke(Url $url, Request $request)
    {
        $url->update([
            'hits' => $url->hits + 1
        ]);

        return redirect($url->url, Response::HTTP_MOVED_PERMANENTLY);
    }
}
