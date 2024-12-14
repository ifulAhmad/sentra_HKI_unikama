<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminNotificationsController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications;
        $unreadNotifications = auth()->user()->unreadNotifications;
        $readNotifications = auth()->user()->readNotifications;

        return view('admins.notifications.index', compact('notifications', 'unreadNotifications', 'readNotifications'));
    }

    public function readAllNotification()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
    public function deleteAllNotification()
    {
        auth()->user()->notifications->each->delete();
        return redirect()->back();
    }
}
