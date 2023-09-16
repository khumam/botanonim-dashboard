<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminNoteController;
use App\Http\Controllers\BannedController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UserBotController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSettingController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\ServerBag;

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

Route::get('/', [HomeController::class, 'welcome']);

Auth::routes([
    'register' => false
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::prefix('setting')->group(function () {
        Route::get('/', [UserSettingController::class, 'index'])->name('user.setting.index');
        Route::post('/saveUser', [UserSettingController::class, 'saveUser'])->name('user.setting.save.user');
        Route::post('/savePassword', [UserSettingController::class, 'savePassword'])->name('user.setting.save.password');
        Route::post('/saveProfilePicture', [UserSettingController::class, 'saveProfilePicture'])->name('user.setting.save.profile.picture');
    });

    Route::prefix('admin')->as('admin.')->group(function () {
        Route::resource('user', UserController::class)->only(['index', 'show', 'destroy', 'edit']);
        Route::post('user/list', [UserController::class, 'list'])->name('user.list');

        Route::resource('request', RequestController::class)->only(['index', 'show', 'destroy']);
        Route::post('request/list', [RequestController::class, 'list'])->name('request.list');
        Route::post('request/approve/{userId}', [RequestController::class, 'approve'])->name('request.approve');

        Route::resource('userbot', UserBotController::class)->only(['index', 'show']);
        Route::post('userbot/list', [UserBotController::class, 'list'])->name('userbot.list');

        Route::resource('report', ReportController::class)->only(['index', 'show']);
        Route::post('report/list', [ReportController::class, 'list'])->name('report.list');
        Route::post('report/banned', [ReportController::class, 'banned'])->name('report.banned');

        Route::resource('banned', BannedController::class)->only(['index', 'show', 'destroy']);
        Route::post('banned/list', [BannedController::class, 'list'])->name('banned.list');

        Route::resource('adminnote', AdminNoteController::class)->only(['index', 'show', 'destroy']);
        Route::post('adminnote/list', [AdminNoteController::class, 'list'])->name('adminnote.list');

        Route::resource('ads', AdController::class);
        Route::post('ads/list', [AdController::class, 'list'])->name('ads.list');
    });
});
