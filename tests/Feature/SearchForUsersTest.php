<?php

namespace Tests\Feature;

use Tests\TestCase;

class SearchForUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSearchForUsers(): void
    {
        $response = $this->get(uri: '/');

        $response->assertStatus(status: 302);
    }
}
