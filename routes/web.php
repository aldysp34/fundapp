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
use App\Http\Controllers\LembarPembayaranController;
use App\Http\Controllers\SpjController;
use App\Http\Controllers\SpjExcelController;
use App\Http\Controllers\LembarVerifikasiSpjController;
use App\Http\Controllers\InvoiceController;



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
    Route::get('/ketua-bidang/detail/{id}', [KetuaBidangController::class, 'detail_proposal'])->name('ketua-bidang.detail_proposal');
    Route::get('/ketua-bidang/new_proposal', [KetuaBidangController::class, 'new_proposal'])->name('ketua-bidang.new_proposal');
    Route::post('/ketua-bidang/upload_proposal', [KetuaBidangController::class, 'upload_proposal'])->name('ketua-bidang.upload_proposal');
    Route::get('/ketua-bidang/download_proposal/{id}', [ProposalController::class, 'download'])->name('ketua-bidang.download_proposal');
    Route::get('/ketua-bidang/download_verifikasi/{id}', [LembarVerifikasiController::class, 'download'])->name('ketua-bidang.download_verifikasi');
    Route::get('/ketua-bidang/download_suratbayar/{id}', [SuratBayarController::class, 'download'])->name('ketua-bidang.download_suratbayar');
    Route::get('/ketua-bidang/download_pembayaran/{id}', [LembarPembayaranController::class, 'download'])->name('ketua-bidang.download_pembayaran');
    Route::get('/ketua-bidang/download_approval/{id}', [ApprovalKetuaController::class, 'download'])->name('ketua-bidang.download_approval');

    Route::get('/ketua-bidang/new_spj', [KetuaBidangController::class, 'new_spj'])->name('ketua-bidang.new_spj');
    Route::post('/ketua-bidang/upload_spj', [KetuaBidangController::class, 'upload_spj'])->name('ketua-bidang.upload_spj');
    Route::get('/ketua-bidang/detail_spj/{id}', [KetuaBidangController::class, 'detail_spj'])->name('ketua-bidang.detail_spj');
    Route::get('/ketua-bidang/download_spj/{id}', [SpjController::class, 'download'])->name('ketua-bidang.download_spj');
    Route::get('/ketua-bidang/download_excel/{id}', [SpjExcelController::class, 'download'])->name('ketua-bidang.download_excel');

    Route::get('/ketua-bidang/download_invoice/{id}', [InvoiceController::class, 'generateInvoice'])->name('ketua-bidang.invoice');
});

Route::middleware(['auth', 'user-access:1'])->group(function(){
    Route::get('/verifikator', [HomeController::class, 'verifikatorHome'])->name('verifikator.home');
    Route::get('/verifikator/detail_proposal/{id}', [VerifikatorController::class, 'detail_proposal'])->name('verifikator.detail_proposal');
    Route::get('/verifikator/download_proposal/{id}', [ProposalController::class, 'download'])->name('verifikator.download_proposal');
    Route::post('/verifikator/verifikasi_proposal/{id}', [VerifikatorController::class, 'approvedRejectedProposal'])->name('verifikator.verifikasi_proposal');

    Route::get('/verifikator/detail_spj/{id}', [VerifikatorController::class, 'detail_spj'])->name('verifikator.detail_spj');
    Route::post('/verifikator/verifikasi_spj/{id}', [VerifikatorController::class, 'approvedRejectedSpj'])->name('verifikator.verifikasi_spj');
    Route::get('/verifikator/download_spj/{id}', [SpjController::class, 'download'])->name('verifikator.download_spj');
    Route::get('/verifikator/download_excel/{id}', [SpjExcelController::class, 'download'])->name('verifikator.download_excel');
});

Route::middleware(['auth', 'user-access:2'])->group(function (){
    Route::get('/bendahara', [HomeController::class, 'bendaharaHome'])->name('bendahara.home');
    Route::post('/bendahara/surat_bayar/{id}', [BendaharaController::class, 'store'])->name('bendahara.surat_bayar');
    Route::get('/bendahara/detail_suratbayar/{id}', [BendaharaController::class, 'detail_suratbayar'])->name('bendahara.detail_suratbayar');
    Route::get('/bendahara/detail_pembayaran/{id}', [BendaharaController::class, 'detail_pembayaran'])->name('bendahara.detail_pembayaran');
    // Route::get('/bendahara/pembayaran', [BendaharaController::class, 'pembayaran_index'])->name('bendahara.pembayaran');
    Route::post('/bendahara/lembar_pembayaran/{id}', [BendaharaController::class, 'lembar_pembayaran'])->name('bendahara.lembar_pembayaran');
    Route::get('/bendahara/download_proposal/{id}', [ProposalController::class, 'download'])->name('bendahara.download_proposal');
    Route::get('/bendahara/download_verifikasi/{id}', [LembarVerifikasiController::class, 'download'])->name('bendahara.download_verifikasi');
    Route::get('/bendahara/download_suratbayar/{id}', [SuratBayarController::class, 'download'])->name('bendahara.download_suratbayar');
    Route::get('/bendahara/download_pembayaran/{id}', [LembarPembayaranController::class, 'download'])->name('bendahara.download_pembayaran');
    Route::get('/bendahara/download_approval/{id}', [ApprovalKetuaController::class, 'download'])->name('bendahara.download_approval');
});

Route::middleware(['auth', 'user-access:3'])->group(function(){
    Route::get('/ketua-harian', [HomeController::class, 'ketuaharianHome'])->name('ketua-harian.home');
    Route::get('/ketua-harian/detail_proposal/{id}', [KetuaHarianController::class, 'detail_proposal'])->name('ketua-harian.detail_proposal');
    Route::post('/ketua-harian/approval_proposal/{id}', [KetuaHarianController::class, 'approvedRejectedProposal'])->name('ketuaharian.approval_proposal');
    Route::get('/ketua-harian/download_proposal/{id}', [ProposalController::class, 'download'])->name('ketua-harian.download_proposal');
    Route::get('/ketua-harian/download_verifikasi/{id}', [LembarVerifikasiController::class, 'download'])->name('ketua-harian.download_verifikasi');
    Route::get('/ketua-harian/download_suratbayar/{id}', [SuratBayarController::class, 'download'])->name('ketua-harian.download_suratbayar');

    Route::get('/ketua-harian/detail_spj/{id}', [KetuaharianController::class, 'detail_spj'])->name('ketua-harian.detail_spj');
    Route::post('/ketua-harian/approval_spj/{id}', [KetuaHarianController::class, 'approvedRejectedSpj'])->name('ketua-harian.approval_spj');
    Route::get('/ketua-harian/download_spj/{id}', [SpjController::class, 'download'])->name('ketua-harian.download_spj');
    Route::get('/ketua-harian/download_excel/{id}', [SpjExcelController::class, 'download'])->name('ketua-harian.download_excel');
    Route::get('/download/download_verifikasi_spj/{id}', [LembarVerifikasiSpjController::class, 'download'])->name('ketua-harian.download_verifikasi_spj');
});

Route::middleware(['auth', 'user-access:4'])->group(function(){
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin.home');
});
