<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\GuestHakCiptaController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;


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


// USERS 
// profile
Route::prefix('users')->group(function () {
    Route::get('profile', [ApplicantController::class, 'index'])->name('profile.index');
    Route::post('profile/create', [ApplicantController::class, 'addData'])->name('profile.addData');
    Route::put('profile/update/{applicant:id}', [ApplicantController::class, 'updateData'])->name('profile.updateData');
});

// pengajuann
Route::prefix('users')->group(function () {
    Route::get('pengajuan', [SubmissionController::class, 'index'])->name('submission.index');
    Route::post('pengajuan', [SubmissionController::class, 'submissionCreate'])->name('submission.create');
});
Route::get('users/pernyataan-pengajuan', function () {
    return view('users.submission.pernyataan');
})->name('submission.pernyataan');


// kemajuan usulan
Route::get('users/progress', function () {
    return view('users.progress.index');
})->name('progress.index');
Route::get('users/progress-detail', function () {
    return view('users.progress.detail_progress');
})->name('progress.detailProgress');


// feedback
Route::get('users/feedback', function () {
    return view('users.feedback.index');
})->name('feedback.index');
Route::get('users/detail-feedback', function () {
    return view('users.feedback.detail');
})->name('feedback.detail');


// sertificate
Route::get('users/sertificate', function () {
    return view('users.sertificate.index');
})->name('sertificate.index');



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
