<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmotionController;
use App\Http\Controllers\SocialInteractionController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\AIChatController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\EmergencyContactController;
use App\Http\Controllers\Auth\AuthController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('emotions', EmotionController::class);
    Route::resource('social-interactions', SocialInteractionController::class);
    Route::resource('consultations', ConsultationController::class);
    Route::resource('ai-chats', AIChatController::class);
    Route::post('/ai-chats/{id}/reply', [AIChatController::class, 'getAIReply'])->name('ai-chats.reply');
    Route::resource('assessments', AssessmentController::class);
    Route::get('/assessments/{type}/start', [AssessmentController::class, 'startAssessment'])->name('assessments.start');
    Route::post('/assessments/{type}/submit', [AssessmentController::class, 'submitAssessment'])->name('assessments.submit');
    Route::get('/emergency-contacts', [EmergencyContactController::class, 'index'])->name('emergency-contacts.index');
    Route::put('/emergency-contacts', [EmergencyContactController::class, 'update'])->name('emergency-contacts.update');
});

require __DIR__.'/auth.php';

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});