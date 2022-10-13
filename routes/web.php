<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboards\UserController;
use App\Http\Controllers\Dashboards\AccountController;
use App\Http\Controllers\Dashboards\DomaineController;
use App\Http\Controllers\Dashboards\ProjectController;

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
})->name('home');

Route::view('tous-nos-projets', 'projects')->name('projects');
Route::get('projet/{project}', fn(Project $project) => view('project-details', compact('project')))->name('project.show');
Route::view('a-propos', 'about')->name('about');
Route::view('faq', 'faq')->name('faq');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('users', UserController::class);
Route::resource('domaines', DomaineController::class);
Route::resource('projects', ProjectController::class);
Route::get('profile', AccountController::class)->name('profile');

require __DIR__.'/auth.php';
