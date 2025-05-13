<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmotionController;
use App\Http\Controllers\SocialInteractionController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\AIChatController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\EmergencyContactController;

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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/emotions', function () {
        return view('emotion-log');
    })->name('emotion-log');
    Route::get('/social-flow', function () {
        return view('social-flow');
    })->name('social-flow');
    Route::get('/consultation', function () {
        return view('consultation');
    })->name('consultation');
});

require __DIR__ . '/auth.php';
