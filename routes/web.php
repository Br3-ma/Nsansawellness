<?php

use App\Http\Controllers\AboutPage;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnswerController;
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
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoCallController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\QuestionaireController;
use App\Http\Controllers\ResultsController;
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
Route::get('/pop-ups', [NotificationController::class, 'realTimePopUps'])->name('pop-notifications');

Route::group(['middleware' => ['auth']], function() {
    // ====================Dashboard
    Route::get('/therapy-center', [CounsellorController::class, 'index'])->name('counsellor');

    Route::get('/my-profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/live-video-call', [VideoCallController::class, 'index'])->name('video-call');

    Route::post("/createMeeting", [MeetingController::class, 'createMeeting'])->name("createMeeting");
    Route::post("/validateMeeting", [MeetingController::class, 'validateMeeting'])->name("validateMeeting");
});

// Notifications
Route::group(['middleware' => ['auth', 'permission:notification']], function() {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notification');
    Route::post('/deleting-notification', [NotificationController::class, 'destroy'])->name('delete-notification');
});

// Appointments
Route::group(['middleware' => ['auth', 'permission:appointment']], function() {
    Route::get('/schedule-appointments', [AppointmentController::class, 'index'])->name('appointment');
});

// Appointment
Route::group(['middleware' => ['auth', 'permission:appointment.create']], function() {
    Route::get('/create-appointment', [AppointmentController::class, 'create'])->name('appointment.create');
});

// Appointment
Route::group(['middleware' => ['auth', 'permission:appointment.create']], function() {
    Route::post('/save-appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/deactivate-appointment/{id}', [AppointmentController::class, 'deactivate'])->name('appointment.deactivate');
    Route::get('/activate-appointment/{id}', [AppointmentController::class, 'activate'])->name('appointment.activate');
    Route::get('/view-appointment/{id}', [AppointmentController::class, 'show'])->name('appointment.show');
    Route::get('/delete-appointment/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
    Route::get('/edit-appointment/{id}', [AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::post('/update-appointment', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::get('/remove-appointment-guest/{id}/{appointment_id}', [AppointmentController::class, 'removeGuest'])->name('appointment.remove_guest');
});

// Questionnaires
Route::group(['middleware' => ['auth', 'permission:questionaires.index']], function() {
    Route::post('/mark-as-read',[NotificationController::class, 'markNotification'])->name('markNotification');
    Route::get('change-questionaire-status', [QuestionaireController::class, 'updateStatus'])->name('questionaire.status');
    Route::get('users-feedback', [QuestionaireController::class, 'feed'])->name('questionaire-user-feedback');
    Route::delete('question/delete/{id}/{qid}', [QuestionaireController::class, 'questionDestroy'])->name('question.remove');
    Route::get('user-survey-response/{id?}', [QuestionaireController::class, 'user_feed'])->name('user-survey-response');
    Route::resource('questionaires', QuestionaireController::class);
    Route::resource('answers', AnswerController::class);
    Route::delete('answers/delete/{id}/{qid}', [AnswerController::class, 'customDestroy'])->name('answers.remove');
});

// Billing
Route::group(['middleware' => ['auth', 'permission:billing']], function() {
    Route::get('/billing-history', [BillingController::class, 'index'])->name('billing');
});

// Patient Dashboard
Route::group(['middleware' => ['auth', 'permission:patient']], function() {
    Route::get('/counseling-center', [PatientController::class, 'index'])->name('patient');
});

// Patient Files
Route::group(['middleware' => ['auth', 'permission:patient-files']], function() {
    Route::get('/patient-files', [PatientController::class, 'patient_files'])->name('patient-files');
});

// Action & Activities
Route::group(['middleware' => ['auth', 'permission:actions']], function() {
    Route::resource('activities', ActivityController::class);
    Route::get('/actions', [HomeworkController::class, 'actions'])->name('actions');
});

// Roles
Route::group(['middleware' => ['auth', 'permission:roles.index']], function() {
    Route::resource('roles', RoleController::class);
});

// Permissions
Route::group(['middleware' => ['auth', 'permission:permissions.index']], function() {
    Route::resource('permissions', PermissionsController::class);
});

// Users
Route::group(['middleware' => ['auth', 'permission:users.index']], function() {
    Route::resource('users', UserController::class);
});




// ================== Website
Route::get('/about', [AboutPage::class, 'index'])->name('about');
Route::get('/contact', [ContactPage::class, 'index'])->name('contact');
Route::get('/frequently-asked-question', [FaqPage::class, 'index'])->name('faq');
Route::get('/start-your-career', [CareerPage::class, 'index'])->name('careers');
Route::get('/quick-questionaire', [CareerPage::class, 'careerSurveyQuestionaire'])->name('career-survey');
Route::get('/reviews', [ReviewsPage::class, 'index'])->name('reviews');
Route::get('/get-started', [GetStartedPage::class, 'index'])->name('start');
Route::resource('results', ResultsController::class);
Route::get('/make-payments', [PaymentController::class, 'index'])->name('pay');
