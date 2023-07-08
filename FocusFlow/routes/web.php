<?php

use App\Http\Controllers\ActionsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\GoalStatusController;
use App\Http\Controllers\GratitudeController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TodoController;
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

Route::get('/', [AuthController::class,'login']);

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::get('/signup', [AuthController::class,'signup']);
Route::get('/forgot-password', [AuthController::class,'forgotPassword']);
Route::get('/password-reset', [AuthController::class,'passwordReset']);
Route::get('/business-plans', [PlansController::class,'businessPlans']);
Route::get('/write-business-plan', [PlansController::class,'writeBusinessPlans']);
Route::get('/view-business-plan', [PlansController::class,'viewBusinessPlan']);

Route::get('/goals', [GoalsController::class,'goals']);
Route::get('/set-goal', [GoalsController::class,'setGoal']);
Route::get('/vision-board', [GoalsController::class,'visionBoard']);
Route::get('/plans', [PlansController::class,'plans']);
Route::get('/weekly-plans', [PlansController::class,'weeklyPlans']);
Route::get('/weekly-plan', [PlansController::class,'weeklyPlan']);
Route::get('/goal-plans', [PlansController::class,'goalPlans']);
Route::get('/calendar/{action?}', [PlansController::class,'calendarAction']);

Route::get('/notes', [ActionsController::class,'notes']);
Route::get('/todos', [ActionsController::class,'todos']);
Route::get('/add-tolearn', [ActionsController::class,'addtoLearn']);
Route::get('/add-task', [ActionsController::class,'addTask']);
Route::get('/add-note', [ActionsController::class,'addNote']);
Route::get('/view-note', [ActionsController::class,'viewNote']);
Route::get('/view-todo', [ActionsController::class,'viewTodo']);
Route::get('/tolearn', [ActionsController::class,'tolearn']);
Route::get('/projects', [ProjectController::class,'projects']);
Route::get('/create-project', [ProjectController::class,'createProject']);
Route::get('/gratitude', [GratitudeController::class,'gratitude']);

Route::get('/paint', [GratitudeController::class,'paint']);
Route::get('/logout', [AuthController::class,'logout']);
Route::get('/add-five-min-journal', [GratitudeController::class,'fiveMinuteJournal']);
Route::get('/view-journal', [GratitudeController::class,'viewJournal']);
Route::get('/view-project', [ProjectController::class,'projectView']);
Route::get('/goal-edit/{id}', [GoalsController::class,'goalEdit']);
Route::get('/view-goal', [GoalsController::class,'goalView']);
Route::get('/user-edit/{id}', [ProfileController::class,'userEdit']);

Route::get('/download/{id}', [DownloadController::class,'download']);
Route::get('/dashboard', [DashboardController::class,'dashboard']);
Route::get('/new-user', [ProfileController::class,'newUser']);
Route::get('/documents', [DocumentController::class,'documents']);

Route::get('/profile', [ProfileController::class,'profile']);
Route::get('/staff', [ProfileController::class,'staff']);
Route::get('/settings', [SettingController::class,'settings']);
Route::get('/delete/{action}/{id}', [DeleteController::class,'delete']);

Route::post('/save-reset-password', [AuthController::class,'resetPasswordPost']);
Route::post('/post-new-password', [AuthController::class,'newPasswordPost']);
Route::post('/user-change-password', [ProfileController::class,'userChangePasswordPost']);
Route::post('/todos/{action}',[TodoController::class,'store']);
Route::post('/goals/{action}',[GoalStatusController::class,'store']);
Route::post('/login', [AuthController::class,'loginPost']);
Route::post('/save-goal', [GoalsController::class,'goalPost']);
Route::post('/save-goal-plan', [PlansController::class,'goalPlanPost']);
Route::post('/save-to-learn', [ActionsController::class,'toLearnPost']);
Route::post('/business-plan-post', [PlansController::class,'businessPlanPost']);
Route::post('/save-note', [ActionsController::class,'notePost']);
Route::post('/save-project', [ProjectController::class,'projectPost']);
Route::post('/save-weeklyplan', [PlansController::class,'weeklyPlanPost']);
Route::get('/view-plan', [PlansController::class,'planView']);
Route::post('/save-journal', [GratitudeController::class,'fiveJournalPost']);
Route::post('/save-todos', [ActionsController::class,'todoPost']);
Route::post('/document', [DocumentController::class,'documentPost']);
Route::post('/vision-board', [GoalsController::class,'imagePost']);
Route::post('/settings', [SettingController::class,'settingsPost']);
Route::post('/profile', [ProfileController::class,'profilePost']);
Route::post('/save-event', [PlansController::class,'eventPost']);
Route::post('/user-post', [ProfileController::class,'userPost']);


