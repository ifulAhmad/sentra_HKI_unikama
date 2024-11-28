<?php

use App\Models\Submission;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\GuestHakCiptaController;
use App\Http\Controllers\ClaimApplicantDataController;
use App\Http\Controllers\SubmissionProgressController;


Route::get('/', function () {
    return view('guest.index');
})->name('home');

Route::prefix('hak-cipta')->group(function () {
    Route::get('pengenalan', [GuestHakCiptaController::class, 'pengenalan'])->name('pengenalan');
    Route::get('prosedur-pengajuan', [GuestHakCiptaController::class, 'prosedurPengajuan'])->name('prosedurPengajuan');
    Route::get('pengajuan', [GuestHakCiptaController::class, 'pengajuan'])->name('pengajuan');
    Route::get('jenis-ciptaan', [GuestHakCiptaController::class, 'jenisCiptaan'])->name('jenisCiptaan');
    Route::get('syarat-lampiran', [GuestHakCiptaController::class, 'syaratLampiran'])->name('syaratLampiran');
});

Route::get('paten/pengenalan', function () {
    return view('guest.paten.pengenalan');
})->name('paten.pengenalan');

Route::get('tarif-pelayanan', function () {
    return view('guest.tarif_pelayanan');
})->name('tarifPelayanan');

Route::get('pengumuman', function () {
    return view('guest.pengumuman');
})->name('pengumuman');

Route::get('kontak', function () {
    return view('guest.kontak');
})->name('kontak');

// authenticate
Route::controller(AuthenticateController::class)->group(function () {
    Route::get('auth/login', 'loginPage')->name('login');

    // google authenticate
    Route::get('auth/google', 'googleLogin')->name('auth.google');
    Route::get('/auth/google/callback', 'googleCallback')->name('auth.google.callback');
    // end google authenticate
    Route::post('/auth/logout', 'logout')->name('auth.logout')->middleware(['role:pemohon,admin']);
});


// USERS 
// profile
Route::prefix('users')->middleware(['role:pemohon'])->group(function () {
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
Route::prefix('users')->middleware(['role:pemohon'])->group(function () {
    // logic pengajuan view n create
    Route::get('pengajuan', [SubmissionController::class, 'index'])->name('submission.index');
    Route::post('pengajuan', [SubmissionController::class, 'submissionCreate'])->name('submission.create');

    Route::post('check-nik', [SubmissionController::class, 'checkNik'])->name('check.nik');
});

// kemajuan usulan
Route::prefix('users')->middleware(['role:pemohon'])->group(function () {
    Route::get('progress', [SubmissionProgressController::class, 'index'])->name('progress.index');
    Route::get('progress/{submission:uuid}/index.php', [SubmissionProgressController::class, 'detail'])->name('progress.detail');
});

Route::prefix('users')->middleware(['role:pemohon'])->group(function () {
    Route::post('comment/create/{submission:uuid}', [CommentController::class, 'store'])->name('comment.store');
});

// feedback
Route::get('users/notification', function () {
    return view('users.notification.index');
})->name('notification.index')->middleware(['role:pemohon']);
Route::get('users/detail-notification', function () {
    return view('users.notification.detail');
})->name('notification.detail')->middleware(['role:pemohon']);


// sertificate
Route::get('users/sertificate', function () {
    return view('users.sertificate.index');
})->name('sertificate.index')->middleware(['role:pemohon']);



// ADMINS
Route::get('admin/index', function () {
    return view('admins.dashboard.index');
})->name('admin.dashboard.index');

// applicant
Route::get('admin/rekap-data-pemohon', function () {
    return view('admins.applicant.index');
})->name('admin.applicant.index');
Route::get('admin/detail-rekap-data-pemohon', function () {
    return view('admins.applicant.detail');
})->name('admin.applicant.detail');

// notification
Route::get('admin/notification', function () {
    return view('admins.notifications.index');
})->name('admin.notifications.index');
