<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\MessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReplyController;

//Route::get('/', function () { return view('welcome');});
Route::get('/test-db', function () {return DB::connection()->getDatabaseName(); });

Route::get('/', [MessageController::class, 'index'])->name('frontdesk.index');
Route::post('/message', [MessageController::class, 'store'])->name('frontdesk.store');
Route::get('/dialog', function () { return view('dialog.dialog');});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.auth');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/message/{id}/reply', [AdminController::class, 'showMessage'])->name('admin.message.reply');
    Route::delete('/admin/message/{id}', [AdminController::class, 'delete'])->name('admin.message.delete');

    Route::post('/admin/message/{id}/reply', [ReplyController::class, 'storeReply'])->name('message.reply');
    Route::post('/admin/message/{id}/note', [ReplyController::class, 'storeNote'])->name('message.note');
    Route::put('/admin/message/{id}/update-state', [ReplyController::class, 'storeUpdateState'])->name('message.updateState');



});
