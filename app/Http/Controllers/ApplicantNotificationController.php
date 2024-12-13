<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\User;
use Illuminate\Notifications\DatabaseNotification;

class ApplicantNotificationController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $applicant = Applicant::where('user_id', $user->id)->first();
        if (!$applicant) {
            return redirect()->route('profile.adjustment')->with('error', 'Anda harus melengkapi data profil terlebih dahulu!');
        }

        $notifications = DatabaseNotification::where('notifiable_id', auth()->user()->id)->get();

        $notificationsUnread = DatabaseNotification::where('notifiable_id', auth()->user()->id)
            ->where('read_at', null)->orderBy('created_at', 'desc')->get();

        $notificationsRead = DatabaseNotification::where('notifiable_id', auth()->user()->id)
            ->where('read_at', '!=', null)->orderBy('created_at', 'desc')->get();

        return view('users.notification.index', compact('notifications', 'notificationsUnread', 'notificationsRead'));
    }

    // all notification
    public function markAllAsRead()
    {
        DatabaseNotification::where('notifiable_id', auth()->user()->id)
            ->whereNull('read_at')
            ->update(['read_at' => now()]);
        return redirect()->back()->with('success', 'Semua notifikasi telah ditandai sebagai dibaca.');
    }

    public function deleteAllNotif()
    {
        DatabaseNotification::where('notifiable_id', auth()->user()->id)->delete();
        return redirect()->back()->with('success', 'Semua notifikasi telah dihapus.');
    }
}
