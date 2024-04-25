<?php

namespace App\Domain\Repositories;

use App\Domain\Models\Notification;

interface NotificationRepository
{
    public function create(array $data): Notification;
}
