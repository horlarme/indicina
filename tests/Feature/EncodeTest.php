<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class EncodeTest extends TestCase
{
    const ROUTE = '/api/encode';
    const VALID_URL = 'https://faceboook.com';
    const INVALID_URL = 'http:/faceboook';

    public function testUserCanEncodeUrl()
    {
        $this->getJson(self::ROUTE, [
            'url' => self::VALID_URL
        ])
            ->assertJson([
                'data' => ['short', 'long', 'hits', 'created_at']
            ])
            ->assertStatus(Response::HTTP_CREATED);
    }

    public function testUserCannotEncodeInvalidUrls()
    {
        $this->getJson(self::ROUTE, [
            'url' => self::INVALID_URL
        ])
            ->assertStatus(Response::HTTP_NOT_ACCEPTABLE);
    }
}
