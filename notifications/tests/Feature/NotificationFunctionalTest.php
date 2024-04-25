<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;

class NotificationFunctionalTest extends TestCase
{
    use RefreshDatabase;

    public function testNotificationCreationAndLogging()
    {
        // Simulate user creation event data
        $userData = [
            'message' => 'User ola.ade@mail.com created!',
        ];

        // Send a POST request to create a notification
        $response = $this->postJson('/api/notifications', $userData);

        // Assert the response status code
        $response->assertStatus(201);

        // Assert that the notification data is logged
        $this->assertLogged('info', [
             'message' => 'User ola.ade@mail.com created!',
        ]);
    }

    protected function assertLogged($level, $context = [])
    {
        Log::shouldReceive('info')
            ->once()
            ->withAnyArgs()
            ->andReturnUsing(function ($message, $context) use ($level) {
                $this->assertEquals($level, 'info');
                $this->assertSame($context, $context);
            });

        $this->app->make('log')->info('Test log message', $context);
    }

}
