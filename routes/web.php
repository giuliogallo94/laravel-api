<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TrashController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\TechnologyController;

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



Route::middleware('auth', 'verified')
->name('admin.')
->prefix('admin')
->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('projects/deleted', [TrashController::class, 'index'])->name('projects.deleted');
    Route::put('restore/{id}', [TrashController::class, 'restore'])->name('projects.restore');
    Route::delete('destroy/{id}', [TrashController::class, 'destroy'])->name('projects.destroy');
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
    Route::get('types', [TypeController::class, 'index'])->name('types.index');
    // Route::get('technologies', [TechnologyController::class, 'index'])->name('technologies.index');
    Route::resource('technologies', TechnologyController::class)->parameters(['technologies' => 'technology:id']);
   

});

require __DIR__.'/auth.php';
