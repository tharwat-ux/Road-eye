<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;

Route::get('/', [HomeController::class, 'welcome'] )->name('home');


Route::group(['middleware' => ['role:guest']], function() {
    Route::get('/login', [AuthenticationController::class, 'login'] )->name('login');
    Route::POST('/login', [AuthenticationController::class, 'validate'] )->name('Authenticate');
    Route::get('/register', [AuthenticationController::class, 'register'] )->name('register');
    Route::POST('/register', [AuthenticationController::class, 'store'] )->name('store');

});


//********************************************************************************************************* */

Route::group(['middleware' => ['role:user']], function() {
    Route::get('/user/{id}/profile', [UserController::class, 'Userprofile'] )->name('UserProfile');
    Route::get('/user/{id}/profile/edit', [UserController::class, 'UserProfile_edit'] )->name('UserProfile.edit');
    Route::post('/user/{id}/profile/update', [UserController::class, 'UserProfile_Update'] )->name('profile_update');
    Route::get('/user/{id}/password/edit', [UserController::class, 'password_edit'] )->name('password.edit');
    Route::post('/user/{id}/password/update', [UserController::class, 'password_update'] )->name('password.update');
    Route::get('/report', [UserController::class, 'ReportUpload'] )->name('report.upload');
    Route::post('/report/store', [UserController::class, 'ReportStore'] )->name('report.store');
    Route::get('/user/{id}/violations', [UserController::class, 'UserViolation_show'] )->name('UserViolation.show');
    Route::get('/radar/{id}/analytics', [UserController::class, 'AnalyticsShow'] )->name('Analytics.show');
    Route::POST('/radar/{id}/ProcessAnalytics', [UserController::class, 'AnalyticsProcess'] )->name('Analytics.process');

});

//********************************************************************************************************* */

Route::group(['middleware' => ['role:admin']], function() {
    Route::get('/admin/{id}/profile', [AdminController::class, 'AdminProfile'] )->name('admin.profile');
    Route::post('/admin/{id}/profile/update', [AdminController::class, 'AdminProfile_Update'] )->name('AdminProfile.update');
    Route::get('/admin/violations', [AdminController::class, 'ViolationShow'] )->name('violation.show');
    Route::post('/admin/violation/{id}/handle', [AdminController::class, 'ViolationHandle'] )->name('violation.handle');
    Route::get('/admin/accidents', [AdminController::class, 'AccidentShow'] )->name('accident.show');
    Route::post('/admin/accident/{id}/handle', [AdminController::class, 'AccidentHandle'] )->name('accident.handle');
    Route::get('/admin/reports', [AdminController::class, 'ReportShow'] )->name('report.show');
    Route::delete('/admin/report/{id}/delete', [AdminController::class, 'ReportDestroy'] )->name('report.delete');
    Route::get('/admin/radar/list', [AdminController::class, 'RadarShow'] )->name('radar.show');
    Route::get('/admin/radar/{id}/setup', [AdminController::class, 'RadarSetup'] )->name('radar.setup');
    Route::post('/admin/radar/{id}/setup', [AdminController::class, 'RadarSetup_Save'] )->name('RadarSetup.save');

});
//********************************************************************************************************* */
Route::group(['middleware' => ['role:superadmin']], function() {
    Route::get('/superadmin/AdminControl', [SuperAdminController::class, 'ControlAdmins'] )->name('admins.control');
    Route::post('/superadmin/admin/add', [SuperAdminController::class, 'AdminAdd'] )->name('admin.add');
    Route::delete('/superadmin/admin/{id}/remove', [SuperAdminController::class, 'AdminRemove'] )->name('admin.remove');
    Route::get('/superadmin/FeatureControl', [SuperAdminController::class, 'FeatureControl'] )->name('feature.control');
    Route::post('/superadmin/radar/{id}/FeatureUpdate', [SuperAdminController::class, 'FeatureUpdate'] )->name('feature.update');
    Route::get('/superadmin/CrimeCars', [SuperAdminController::class, 'CrimecarsManage'] )->name('crimecars.manage');
    Route::post('/superadmin/CrimeCars/add', [SuperAdminController::class, 'CrimecarAdd'] )->name('crimecar.add');
    Route::delete('/superadmin/CrimeCars/{id}/delete', [SuperAdminController::class, 'CrimecarDelete'] )->name('crimecar.delete');  
});
//********************************************************************************************************* */
Route::group(['middleware' => ['role:notguest']], function() {
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});


