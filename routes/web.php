<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController;





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
Route::get('/users', [UserController::class, 'index']);
Route::get('/', [homeController::class, 'home'])->middleware('checkauth');
Route::get('/sesi/home', [homeController::class,'home'])->middleware('checkauth');
Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::post('/sesi/create', [SessionController::class, 'create']);
Route::get('/sesi/login', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register']);
Route::resource('users', UserController::class);
Route::get('/ticket/create', [TicketController::class, 'create'])->name('ticket.create');
Route::post('/ticket/store', [TicketController::class, 'store'])->name('ticket.store');
Route::post('/sesi', [SessionController::class, 'logout'])->name('logout');
Route::get('/ticket/{id}', [TicketController::class, 'show'])->name('ticket.show');
Route::get('/ticket/pdf/{id}', [TicketController::class, 'generatePDF'])->name('ticket.pdf');
Route::get('/tickets/report', [SessionController::class, 'showReport'])->name('report');
Route::get('/ticket/{id}/download', [TicketController::class, 'downloadPDF'])->name('ticket.downloadPDF');
Route::get('/download-report', [TicketController::class, 'downloadReport'])->name('download.report');
Route::get('/tickets/pdf_report', [TicketController::class, 'downloadReport'])->name('tickets.pdf_report');
Route::get('/ticket/{id}/download', [TicketController::class, 'downloaPDF'])->name('ticket.downloaPDF'); 
Route::get('/sesi/verify_otp', [SessionController::class, 'showVerifyOtpForm'])->name('verify_otp');
Route::post('/sesi/verify_otp', [SessionController::class, 'verifyOtp']);
Route::get('/email/verify/{token}', [SessionController::class, 'verify'])->name('email.verify');
Route::get('/resend-otp', [SessionController::class, 'resendOtp'])->name('resend.otp');  
Route::get('/sesi/kapal',[TicketController::class,'showKapal'])->name('kapal');  
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');