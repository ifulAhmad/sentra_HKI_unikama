<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class ApplicantNotificationController extends Controller
{
    public function index()
    {
        $notificationsUnread = DatabaseNotification::where('notifiable_id', auth()->user()->id)
            ->where('read_at', null)->orderBy('created_at', 'desc')->get();
        return view('users.notification.index', compact('notificationsUnread'));
    }

    // 1 notif
    public function markAsRead($notificationId)
    {
        $notification = DatabaseNotification::find($notificationId);

        if ($notification && $notification->notifiable_id == auth()->user()->id) {
            $notification->update(['read_at' => now()]);
        }

        return redirect()->back()->with('success', 'Notifikasi telah ditandai sebagai dibaca.');
    }
    // all notification
    public function markAllAsRead()
    {
        // Ambil semua notifikasi yang belum dibaca untuk user yang login
        DatabaseNotification::where('notifiable_id', auth()->user()->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);

        return redirect()->back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }
}
