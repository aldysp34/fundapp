<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KetuaBidangController;
use App\Http\Controllers\VerifikatorController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\KetuaHarianController;
use App\Http\Controllers\ApprovalKetuaController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\LembarVerifikasiController;
use App\Http\Controllers\SuratBayarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:0'])->group(function(){
    Route::get('/ketua-bidang', [HomeController::class, 'index'])->name('ketua-bidang.home');
    Route::get('/ketua-bidang/{id}', [KetuaBidangController::class, 'detail_proposal'])->name('ketua-bidang.detail_proposal');
    Route::get('/ketua-bidang/proposal_index', [KetuaBidangController::class, 'proposal_index'])->name('ketua-bidang.proposal');
    Route::get('/ketua-bidang/spj_index', [KetuaBidangController::class, 'spj_index'])->name('ketua-bidang.spj_index');


});

Route::middleware(['auth', 'user-access:1'])->group(function(){
    Route::get('/verifikator', [HomeController::class, 'verifikatorHome'])->name('verifikator.home');
    Route::post('/verifikator/verifikasi_proposal/{id}', [VerifikatorController::class, 'approvedRejectedProposal'])->name('verifikator.verifikasi_proposal');
});

Route::middleware(['auth', 'user-access:2'])->group(function (){
    Route::get('/bendahara', [HomeController::class, 'bendaharaHome'])->name('bendahara.home');
    Route::post('/bendahara/surat_bayar/{id}', [BendaharaController::class, 'store'])->name('bendahara.surat_bayar');
    Route::get('/bendahara/pembayaran', [BendaharaController::class, 'pembayaran_index'])->name('bendahara.pembayaran');
    Route::post('/bendahara/lembar_pembayaran/{id}', [BendaharaController::class, 'lembar_pembayaran'])->name('bendahara.lembar_pembayaran');
});

Route::middleware(['auth', 'user-access:3'])->group(function(){
    Route::get('/ketua-harian', [HomeController::class, 'ketuaharianHome'])->name('ketua-harian.home');
    Route::post('/ketua-harian/approval_proposal/{id}', [KetuaHarianController::class, 'approvedRejectedProposal'])->name('ketuaharian.approval_proposal');
});

Route::middleware(['auth', 'user-access:4'])->group(function(){
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
});
