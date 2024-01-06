<?php

namespace Tests\Feature;

use Tests\TestCase;

class GetTop10UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetTop10Users(): void
    {
        $response = $this->get(uri: '/');

        $response->assertStatus(status: 302);
    }
}
