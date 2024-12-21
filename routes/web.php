<?php

use App\Models\Submission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\GuestHakCiptaController;
use App\Http\Controllers\ApplicantNotificationController;
use App\Http\Controllers\SubmissionProgressController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminApplicantClaimController;
use App\Http\Controllers\AdminApplicantsAccessController;
use App\Http\Controllers\AdminSubmissionAccessController;
use App\Http\Controllers\AdminNotificationsController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\NewsForGuestController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ChangeAccountController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('hak-cipta')->group(function () {
    Route::get('pengenalan', [GuestHakCiptaController::class, 'pengenalan'])->name('pengenalan');
    Route::get('prosedur-pengajuan', [GuestHakCiptaController::class, 'prosedurPengajuan'])->name('prosedurPengajuan');
    Route::get('syarat-lampiran', [GuestHakCiptaController::class, 'syaratLampiran'])->name('syaratLampiran');
    Route::post('syarat-lampiran/{letter:id}/download', [GuestHakCiptaController::class, 'download'])->name('letter.download');
});

Route::get('paten/pengenalan', function () {
    return view('guest.paten.pengenalan');
})->name('paten.pengenalan');

Route::get('tarif-pelayanan', function () {
    return view('guest.tarif_pelayanan');
})->name('tarifPelayanan');

Route::prefix('berita')->group(function () {
    Route::get('', [NewsForGuestController::class, 'index'])->name('news');
    Route::get('{news:uuid}/detail', [NewsForGuestController::class, 'detail'])->name('news.detail');
});
Route::get('kontak', function () {
    return view('guest.kontak');
})->name('kontak');

// authenticate
Route::controller(AuthenticateController::class)->group(function () {
    Route::get('auth/login', 'loginPage')->name('login')->middleware('guest');
    ROute::post('auth/login', 'authenticate')->name('authenticate')->middleware('guest');

    // google authenticate
    Route::get('auth/google', 'googleLogin')->name('auth.google')->middleware('guest');
    Route::get('/auth/google/callback', 'googleCallback')->name('auth.google.callback')->middleware('guest');
    // end google authenticate
    Route::post('/auth/logout', 'logout')->name('auth.logout')->middleware(['auth', 'role:pemohon,admin']);
});


// USERS 
// profile
Route::prefix('users')->middleware(['auth', 'role:pemohon'])->group(function () {
    // logic profile
    Route::get('redirect', [ApplicantController::class, 'redirect'])->name('profile.redirect');
    Route::get('profile', [ApplicantController::class, 'index'])->name('profile.index');
    Route::get('adjustment', [ApplicantController::class, 'adjustment'])->name('profile.adjustment');
    Route::post('adjustment', [ApplicantController::class, 'adjustmentCheck'])->name('profile.adjustment.check');
    // claim
    Route::get('claim/{applicant:nik}', [ApplicantController::class, 'claim'])->name('claim.index');
    Route::post('claim/{applicant:nik}/store', [ApplicantController::class, 'claimStore'])->name('claim.store');
    Route::post('claim/{applicant:nik}/store', [ApplicantController::class, 'claimStore'])->name('claim.store');
    Route::get('claim/{claim:uuid}/wait', [ApplicantController::class, 'claimWait'])->name('claim.wait');
    // create n update profile 
    Route::get('profile/create', [ApplicantController::class, 'create'])->name('profile.create');
    Route::post('profile/create', [ApplicantController::class, 'store'])->name('profile.store');
    Route::put('profile/update/{applicant:nik}', [ApplicantController::class, 'update'])->name('profile.update');
});


// pengajuan
Route::prefix('users')->middleware(['auth', 'role:pemohon'])->group(function () {
    // logic pengajuan view n create
    Route::get('submission', [SubmissionController::class, 'index'])->name('submission.index');
    Route::post('submission', [SubmissionController::class, 'submissionCreate'])->name('submission.create');

    Route::post('check-nik', [SubmissionController::class, 'checkNik'])->name('check.nik');
});

// kemajuan usulan
Route::prefix('users')->middleware(['auth', 'role:pemohon'])->group(function () {
    Route::get('progress', [SubmissionProgressController::class, 'index'])->name('progress.index');
    Route::get('progress/{submission:uuid}/index.php', [SubmissionProgressController::class, 'detail'])->name('progress.detail');
    // submission revisi
    Route::get('progress/{submission:uuid}/revisi/submission', [SubmissionProgressController::class, 'submissionEdit'])->name('progress.submissionEdit');
    Route::put('progress/{submission:uuid}/revisi/submission/update', [SubmissionProgressController::class, 'submissionUpdate'])->name('progress.submissionUpdate');
    // applicant revisi
    Route::get('progress/{submission:uuid}/revisi/applicant', [SubmissionProgressController::class, 'applicantAdd'])->name('progress.applicantAdd');
    Route::get('progress/{submission:uuid}/check/nik', [SubmissionProgressController::class, 'checkNik'])->name('progress.check.nik');
    Route::post('progress/{submission:uuid}/revisi/applicant', [SubmissionProgressController::class, 'applicantStore'])->name('progress.applicantStore');

    // files update
    Route::get('progress/{submission:uuid}/revisi/files', [SubmissionProgressController::class, 'filesEdit'])->name('progress.filesEdit');
    Route::put('progress/{submission:uuid}/revisi/files/update', [SubmissionProgressController::class, 'filesUpdate'])->name('progress.filesUpdate');

    // revisi clear
    Route::put('progress/{submission:uuid}/revisi/clear', [SubmissionProgressController::class, 'revisiClear'])->name('progress.revisiClear');
});


// Notification
Route::prefix('users')->middleware(['auth', 'role:pemohon'])->group(function () {
    Route::get('notification', [ApplicantNotificationController::class, 'index'])->name('notification.index');
    Route::post('notification/readAll', [ApplicantNotificationController::class, 'markAllAsRead'])->name('notification.markAllAsRead');
    Route::delete('notification/deleteAll', [ApplicantNotificationController::class, 'deleteAllNotif'])->name('notification.deleteAllNotif');
});


// sertificate
Route::prefix('users')->middleware(['auth', 'role:pemohon'])->group(function () {
    Route::get('certificate', [CertificateController::class, 'index'])->name('certificate.index');
    Route::get('certificate/{submission:uuid}/download', [CertificateController::class, 'download'])->name('certificate.download');
});


// comment create applicant n admin
Route::prefix('/')->middleware(['role:pemohon,admin'])->group(function () {
    Route::post('comment/create/{submission:uuid}', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('comment/create/{comment:uuid}/delete', [CommentController::class, 'delete'])->name('comment.delete');
});


// ADMINS
Route::get('admin/index', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index')->middleware(['auth', 'role:admin']);

// applicant access
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('rekap-data-pemohon', [AdminApplicantsAccessController::class, 'index'])->name('admin.applicant.index');
    Route::get('admin/user_data/{applicant:nik}/detail', [AdminApplicantsAccessController::class, 'detail'])->name('admin.applicant.detail');
});

// submission access
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('submission/index', [AdminSubmissionAccessController::class, 'index'])->name('admin.submission.index');
    Route::get('submission/{submission:uuid}/show', [AdminSubmissionAccessController::class, 'detail'])->name('admin.submission.detail');
    // submission status
    Route::put('submission/{submission:uuid}/revisi', [AdminSubmissionAccessController::class, 'statusRevisi'])->name('admin.submission.revisi');
    Route::put('submission/{submission:uuid}/ditolak', [AdminSubmissionAccessController::class, 'statusDitolak'])->name('admin.submission.ditolak');
    Route::post('submission/{submission:uuid}/diterima', [AdminSubmissionAccessController::class, 'statusDiterima'])->name('admin.submission.diterima');
    // export excel
    Route::get('submission/{submission:uuid}/export', [AdminSubmissionAccessController::class, 'export'])->name('admin.submission.export');
});

// claim applicant
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('claim', [AdminApplicantClaimController::class, 'index'])->name('admin.claim.index');
    Route::get('claim/data/{claimData:uuid}', [AdminApplicantClaimController::class, 'detail'])->name('admin.claim.detail');
    Route::post('claim/data/{claimData:uuid}/accept', [AdminApplicantClaimController::class, 'accept'])->name('admin.claim.accept');
    Route::post('claim/data/{claimData:uuid}/reject', [AdminApplicantClaimController::class, 'reject'])->name('admin.claim.reject');
});

// letters template
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('letter', [LetterController::class, 'index'])->name('admin.letter.index');
    Route::get('letter/create', [LetterController::class, 'create'])->name('admin.letter.create');
    Route::post('letter/create', [LetterController::class, 'store'])->name('admin.letter.store');
    Route::get('letter/{letter:type}/edit', [LetterController::class, 'edit'])->name('admin.letter.edit');
    Route::put('letter/{letter:id}/update', [LetterController::class, 'update'])->name('admin.letter.update');
});

// news
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('news/{news:uuid}/detail.php', [NewsController::class, 'show'])->name('admin.news.show');
    Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('news/create', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/access/{news:uuid}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('news/access/{news:uuid}/update', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('news/access/{news:uuid}/delete', [NewsController::class, 'delete'])->name('admin.news.delete');
});

// notification
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('notification', [AdminNotificationsController::class, 'index'])->name('admin.notifications.index');
    Route::post('notification/mark-as-read-all', [AdminNotificationsController::class, 'readAllNotification'])->name('admin.notifications.markAsReadAll');
    Route::delete('notification/delete-notifications-all', [AdminNotificationsController::class, 'deleteAllNotification'])->name('admin.notifications.deleteAllNotif');
});


// search
Route::get('search', [SearchController::class, 'index'])->name('admin.search');

// change account
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('check-password', [ChangeAccountController::class, 'formCheck'])->name('admin.account.check');
    Route::post('check-password', [ChangeAccountController::class, 'checkPassword'])->name('admin.check.password');

    Route::get('account', [ChangeAccountController::class, 'index'])->name('admin.account.index');
    Route::put('change-account/{user:id}/update', [ChangeAccountController::class, 'update'])->name('admin.change.account.update');
});
