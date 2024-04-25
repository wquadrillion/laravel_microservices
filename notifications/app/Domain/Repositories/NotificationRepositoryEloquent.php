<?php
namespace App\Domain\Repositories;

use App\Domain\Models\Notification;

class NotificationRepositoryEloquent implements NotificationRepository
{
    public function create(array $data): Notification
    {
        return Notification::create($data);
    }
}
