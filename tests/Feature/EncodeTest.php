<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class EncodeTest extends TestCase
{
    use RefreshDatabase;

    protected function shouldSeed(): bool
    {
        return true;
    }

    const ROUTE = '/api/encode';
    const VALID_URL = 'https://faceboook.com';
    const INVALID_URL = 'http:/faceboook';

    public function testUserCanEncodeUrl()
    {
        $this->postJson(self::ROUTE, [
            'url' => self::VALID_URL
        ])
            ->assertJsonStructure([
                'data' => ['short', 'long', 'hits', 'created_at']
            ])
            ->assertStatus(Response::HTTP_CREATED);
    }

    public function testUserCannotEncodeInvalidUrls()
    {
        $this->postJson(self::ROUTE, [
            'url' => self::INVALID_URL
        ])
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
