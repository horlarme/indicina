<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class DecodeTest extends TestCase
{
    use RefreshDatabase;

    const ROUTE = 'api/decode/';

    public function testUserGetRedirectedToOriginalUrl()
    {
        $url = (new Url())->create([
            'url' => 'https://facebook.com'
        ]);

        $this->get(self::ROUTE . $url->id)
            ->assertSeeText('Redirecting to ' . $url->url)
            ->assertStatus(Response::HTTP_MOVED_PERMANENTLY);
    }

    public function testUserGetErrorForInvalidShortLink()
    {
        $this->get(self::ROUTE . 'nothing')
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
