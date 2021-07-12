<?php

namespace Tests\Feature;

use App\Models\Url;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class StatsTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanViewShortLinkStats()
    {
        $url = Url::create([
            'url' => 'https://kykki.xyz'
        ]);
        // Assert User can view
        $this->get(route('stats', $url->id))
            ->assertStatus(Response::HTTP_OK);

        // First Hit
        $this->get(route('decode', $url->id));
        $this->assertEquals(1, $url->refresh()->hits);
        // Second Hit
        $this->get(route('decode', $url->id));
        $this->assertEquals(2, $url->refresh()->hits);
        // Third Hit
        $this->get(route('decode', $url->id));
        $this->assertEquals(3, $url->refresh()->hits);
    }
}
