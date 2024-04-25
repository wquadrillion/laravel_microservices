<?php

namespace App\Application\Services;

use App\Domain\Repositories\NotificationRepository;

class NotificationService
{
    protected $notificationRepository;

    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function createNotification(array $data)
    {
        return $this->notificationRepository->create($data);
    }
}
