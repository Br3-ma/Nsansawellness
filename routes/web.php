<?php

use App\Http\Controllers\AboutPage;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CareerPage;
use App\Http\Controllers\ContactPage;
use App\Http\Controllers\CounsellorController;
use App\Http\Controllers\FaqPage;
use App\Http\Controllers\GetStartedPage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewsPage;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoCallController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
})->name('welcome');

Auth::routes();

// Route::get('/', [WelcomeController::class, 'index'])->name('index');

Route::get('/home', [HomeController::class, 'index'])->name('home');


// Dashboard
Route::get('/therapy-center', [CounsellorController::class, 'index'])->name('counsellor');
Route::get('/counselling-center', [PatientController::class, 'index'])->name('patient');
Route::get('/patient-files', [PatientController::class, 'patient_files'])->name('patient-files');
Route::get('/schedule-appointments', [AppointmentController::class, 'index'])->name('appointment');
Route::get('/activies', [HomeworkController::class, 'index'])->name('activities');
Route::get('/actions', [HomeworkController::class, 'actions'])->name('actions');
Route::get('/billing-history', [BillingController::class, 'index'])->name('billing');
Route::get('/notifications', [NotificationController::class, 'index'])->name('notification');
Route::get('/my-profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/live-video-call', [VideoCallController::class, 'index'])->name('video-call');



// Website
Route::get('/about', [AboutPage::class, 'index'])->name('about');
Route::get('/contact', [ContactPage::class, 'index'])->name('contact');
Route::get('/frequently-asked-question', [FaqPage::class, 'index'])->name('faq');
Route::get('/start-your-career', [CareerPage::class, 'index'])->name('careers');
Route::get('/reviews', [ReviewsPage::class, 'index'])->name('reviews');
Route::get('/get-started', [GetStartedPage::class, 'index'])->name('start');
Route::get('/make-payments', [PaymentController::class, 'index'])->name('pay');
