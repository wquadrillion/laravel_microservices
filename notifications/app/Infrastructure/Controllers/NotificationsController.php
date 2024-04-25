<?php

namespace App\Infrastructure\Controllers;

use App\Application\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NotificationsController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required|string',
        ]);

        $notification = $this->notificationService->createNotification($validatedData);

        return response()->json(['notification' => $notification], 201);
    }
}

