<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domain\Entities\Notification;
use App\Domain\Repositories\NotificationRepository;

class NotificationCreationTest extends TestCase
{
    use RefreshDatabase;

    public function testNotificationCreation()
    {
        $notificationData = [
            'message' => 'User ola.ade@mail.com created!!',
        ];

        $response = $this->postJson('/api/notifications', $notificationData);

        $response->assertStatus(201);

        $this->assertDatabaseHas('notifications', $notificationData);
    }
}
