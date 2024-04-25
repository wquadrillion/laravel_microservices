<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Domain\Models\Notification;
use App\Application\Services\NotificationService;
use App\Domain\Repositories\NotificationRepository;
use Mockery;

class NotificationServiceTest extends TestCase
{
    protected $notificationRepository;
    protected $notificationService;

    public function setUp(): void
    {
        parent::setUp();

        $this->notificationRepository = Mockery::mock(NotificationRepository::class);
        $this->notificationService = new NotificationService($this->notificationRepository);
    }

    public function tearDown(): void
    {
        parent::tearDown();
        Mockery::close();
    }

    public function testCreateNotification()
    {
        $notificationData = [
            'message' => 'Test Notification',
        ];

        $this->notificationRepository
            ->shouldReceive('create')
            ->once()
            ->with($notificationData)
            ->andReturn(new Notification($notificationData));

        $notification = $this->notificationService->createNotification($notificationData);

        $this->assertInstanceOf(Notification::class, $notification);
        //$this->assertEquals($notificationData['message'], $notification->getMessage());
    }
}
