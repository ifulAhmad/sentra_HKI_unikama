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

        $notifications = auth()->user()->applicant->notifications;

        $notificationsUnread = auth()->user()->applicant->unreadNotifications;

        $notificationsRead = auth()->user()->applicant->readNotifications;

        return view('users.notification.index', compact('notifications', 'notificationsUnread', 'notificationsRead'));
    }

    // all notification
    public function markAllAsRead()
    {
        auth()->user()->applicant->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function deleteAllNotif()
    {
        auth()->user()->applicant->notifications->each->delete();
        return redirect()->back();
    }
}
