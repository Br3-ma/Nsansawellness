<?php

use App\Http\Controllers\AboutPage;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AssignCounselorController;
use App\Http\Controllers\CareerPage;
use App\Http\Controllers\ContactPage;
use App\Http\Controllers\CounsellorController;
use App\Http\Controllers\FaqPage;
use App\Http\Controllers\GetStartedPage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ChatController;
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
use App\Http\Controllers\SettingsController;
use App\Models\AssignCounselor;
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

Auth::routes(['verify' => true]);

// Route::get('/', [WelcomeController::class, 'index'])->name('index');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/pop-ups', [NotificationController::class, 'realTimePopUps'])->name('pop-notifications');

Route::group(['middleware' => ['auth']], function() {
    // ====================Dashboard
    Route::get('/therapy-center', [CounsellorController::class, 'index'])->name('counsellor');
    
    Route::get('/my-profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/video-session/{id}/{chat_id}/{receiver}/{role}', [VideoCallController::class, 'startVideoCall'])->name('video-call');
    Route::get('/therapy-session/{id}/{chat_id}/{receiver}/{role}/{peer_id}', [VideoCallController::class, 'startVideoCallPeer'])->name('video-call-peer');
    Route::post('/share-peer-id', [VideoCallController::class, 'sharePeerId'])->name('send.remote_id');
    Route::get('/get-video-link', [VideoCallController::class, 'getVideoLink'])->name('get.remote_id');
    Route::get('/live-video-call', [VideoCallController::class, 'activeVideoCall'])->name('video-call-runner');
    Route::get('/live-video-call', [VideoCallController::class, 'activeVideoCall'])->name('video-call-runner');
    Route::get('/api/fetch-session/{id}/{user}', [VideoCallController::class, 'getConversationDetails'])->name('conversation-details');

    Route::post("/createMeeting", [MeetingController::class, 'createMeeting'])->name("createMeeting");
    Route::post("/validateMeeting", [MeetingController::class, 'validateMeeting'])->name("validateMeeting");


    Route::get('/chat/{id}', [VideoCallController::class, 'chat'])->name('chat');
    Route::get('/group/chat/{id}', [VideoCallController::class, 'groupChat'])->name('group.chat');
    
    Route::post('/chat-create', [VideoCallController::class, 'store'])->name('meeting.store');
    Route::post('/chat/message/send', [VideoCallController::class, 'send'])->name('chat.send');
    Route::post('/chat/message/send/file', [VideoCallController::class, 'sendFilesInConversation'])->name('chat.send.file');
    Route::post('/group/chat/message/send', [VideoCallController::class, 'groupSend'])->name('group.send');
    Route::post('/group/chat/message/send/file', [VideoCallController::class, 'sendFilesInGroupConversation'])->name('group.send.file');
    
    // Route::get('/accept/message/request/{id}' , function ($id){
    //     Chat::acceptMessageRequest($id);
    //     return redirect()->back();
    // })->name('accept.message');
    
    // // Route::get('/trigger/{id}' , [VideoCallController::class, 'startVideo'])->name('video-chat');
    // Route::post('/trigger/{id}' , function (\Illuminate\Http\Request $request , $id) {
    //     Chat::startVideoCall($id , $request->all());
    // });
    // Route::post('/group/chat/leave/{id}' , function ($id) {
    //     Chat::leaveFromGroupConversation($id);
    // });
    // Route::resource('assigner', AssignCounselorController::class);
    Route::get('auto-assign/{id}', [AssignCounselorController::class, 'index']);

    // ==== settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/set-commission-setting', [SettingsController::class, 'store'])->name('set-commission');
    Route::get('/settings/commissions', [SettingsController::class, 'commissions'])->name('settings.commissions');
    Route::get('/settings/departments', [SettingsController::class, 'departments'])->name('settings.departments');
    Route::post('/add-department', [SettingsController::class, 'storeDept'])->name('settings.departments.store');
    Route::get('/add-department/{id}', [SettingsController::class, 'destroyDept'])->name('settings.departments.delete');
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
    Route::get('/create-patient-file/{id}', [PatientController::class, 'create'])->name('create-patient-file');
    Route::get('/show-patient-file/{id}', [PatientController::class, 'show'])->name('show-patient-file');
    Route::get('/edit-patient-file/{id}', [PatientController::class, 'edit'])->name('edit-patient-file');
    Route::delete('/delete-patient-file/{id}', [PatientController::class, 'destroy'])->name('delete-patient-file');
    Route::post('/add-patient-file', [PatientController::class, 'store'])->name('add-patient-file');
    Route::post('/update-patient-file/{id}', [PatientController::class, 'update'])->name('update-patient-file');
    Route::get('/patient-files/{id}', [PatientController::class, 'show_patient_files'])->name('all-patient-files');
});

// Action & Activities
Route::group(['middleware' => ['auth', 'permission:actions']], function() {
    Route::resource('activities', ActivityController::class, [
        'names' => [
            'activities.index' => 'activities',
            'activities.edit' => 'edit-activities',
            'activities.update' => 'update-activities',
            'activities.destroy' => 'delete-activities'
        ]
    ]);
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
    Route::resource('users', UserController::class, [
        'names' => [
            'users.index' => 'users.index',
            'users.edit' => 'users.edit',
            'users.update' => 'users.update',
            'users.destroy' => 'users.destroy'
        ]
    ]);
});

Route::group(['middleware' => ['auth', 'permission:users.edit']], function() {
    Route::resource('users', UserController::class, [
        'names' => [
            'users.update' => 'users.update',
            'users.edit' => 'users.edit'
        ]
    ]);
});

// Chat
Route::group(['middleware' => ['auth', 'permission:chat.index']], function() {
    Route::resource('chat', ChatController::class, [
        'names' => [
            'chat.index' => 'chat.index',
            'chat.update' => 'chat.update',
            'chat.edit' => 'chat.edit',
            'chat.store' => 'chat.store',
            'chat.update' => 'chat.update',
            'chat.destory' => 'chat.destory'
        ]
    ]);
});
Route::group(['middleware' => ['auth', 'permission:chat.index']], function() {
    Route::get('/streaming', [ChatController::class, 'stream'])->name('chat.stream');
});
// Route::group(['middleware' => ['auth', 'permission:getCounselorByDept']], function() {
    Route::get('/get-counselors-by-dept', [AssignCounselorController::class, 'getCounselorByDept'])->name('counselors-by-dept');
    Route::post('/manual-assign', [AssignCounselorController::class, 'store'])->name('manual.assign.counselor');
    Route::get('/remove-counselor/{id}', [AssignCounselorController::class, 'remove_counselor'])->name('manual.remove.counselor');
// });

// Route::group(['middleware' => ['auth', 'permission:users.update']], function() {
//     Route::resource('users', UserController::class)->name('users.update');
// });

// Route::group(['middleware' => ['auth', 'permission:users.destroy']], function() {
//     Route::resource('users', UserController::class)->name('users.destroy');
// });

// Route::group(['middleware' => ['auth', 'permission:users.store']], function() {
//     Route::resource('users', UserController::class)->name('users.store');
// });


// ================== Website
Route::get('/about', [AboutPage::class, 'index'])->name('about');
Route::get('/contact', [ContactPage::class, 'index'])->name('contact');
Route::get('/frequently-asked-question', [FaqPage::class, 'index'])->name('faq');
Route::get('/start-your-career', [CareerPage::class, 'index'])->name('careers');
Route::get('/quick-questionaire', [CareerPage::class, 'careerSurveyQuestionaire'])->name('career-survey');
Route::get('/reviews', [ReviewsPage::class, 'index'])->name('reviews');
Route::get('/get-started', [GetStartedPage::class, 'index'])->name('start');
Route::get('/get-couples-started', [GetStartedPage::class, 'couples'])->name('couples-start');
Route::get('/get-child-started', [GetStartedPage::class, 'child'])->name('child-start');
Route::resource('results', ResultsController::class);
Route::get('/make-payments', [PaymentController::class, 'index'])->name('pay');
