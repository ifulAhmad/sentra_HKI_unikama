<?php

use App\Http\Controllers\GuestHakCiptaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
Route::get('users/profil', function () {
    return view('users.profile.index');
})->name('profile.index');

// pengajuann
Route::get('users/pengajuan', function () {
    return view('users.submission.index');
})->name('submission.index');

Route::get('users/pengajuan-pencipta-satu', function () {
    return view('users.submission.profile_author');
})->name('submission.author1');

Route::get('users/pengajuan-pencipta-dua', function () {
    return view('users.submission.profile_author2');
})->name('submission.author2');

Route::get('users/pengajuan-jenis-ciptaan', function () {
    return view('users.submission.jenis_ciptaan');
})->name('submission.jenisCiptaan');

Route::get('users/pengajuan-sub-jenis-ciptaan', function () {
    return view('users.submission.sub_jenis_ciptaan');
})->name('submission.subJenisCiptaan');

Route::get('users/pengajuan-upload-file', function () {
    return view('users.submission.upload_file');
})->name('submission.uploadFile');

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
