<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
    Route::get('/dashboard',[TaskController::class,'index'])->name('dashboard');
    Route::get('/add-task',[TaskController::class,'createTask'])->name('add-task');
    Route::post('/save-task',[TaskController::class,'saveTask'])->name('save.task');
    Route::get('/show-task',[TaskController::class,'showTask'])->name('show-task');
    Route::get('/edit-task/{task_id}',[TaskController::class,'editTask'])->name('edit-task');
    Route::post('/update-task',[TaskController::class,'updateTask'])->name('update.task');
    Route::get('/status{id}',[TaskController::class,'status'])->name('status');
    Route::post('/delete-task{id}',[TaskController::class,'delete'])->name('delete.task');
});
