<?php

namespace Tests\Feature;

use Tests\TestCase;

class CreateTaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateTask(): void
    {
        $response = $this->post(uri: '/admin/task', data: [
            'assigned_by_id' => 1,
            'assigned_by_to' => 1,
            'title' => 'test',
            'description' => 'description',
        ]);

        $response->assertStatus(302);
    }
}
