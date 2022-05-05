<?php

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



Auth::routes();

Route::get('/project/my', [App\Http\Controllers\ProjectsController::class, 'my']);
Route::get('/project/create', [App\Http\Controllers\ProjectsController::class, 'create']);
Route::post('/project', [App\Http\Controllers\ProjectsController::class, 'store']);
Route::get('/project/find', [App\Http\Controllers\ProjectsController::class, 'index']);
Route::get('/freelancer/find', [App\Http\Controllers\ProfilesController::class, 'find']);

Route::get('/project/detail/{project}', [App\Http\Controllers\ProjectsController::class, 'detail']);
Route::post('/project/bid/{project}', [App\Http\Controllers\BidsController::class, 'store']);
Route::get('/project/edit/{project}', [App\Http\Controllers\ProjectsController::class,'edit']);
Route::get('/project/delete/{project}', [App\Http\Controllers\ProjectsController::class,'delete']);
Route::get('/i/create', [App\Http\Controllers\IntroController::class, 'create']);
Route::patch('/project/save/{project}', [App\Http\Controllers\ProjectsController::class, 'update']);
Route::post('/i', [App\Http\Controllers\IntroController::class, 'store']);
Route::post('/project/find/keyword', [App\Http\Controllers\ProjectsController::class, 'search']);
Route::get('/bids/{user}', [App\Http\Controllers\BidsController::class, 'index']);

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');

Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

Route::get('/home', function()
{
    return view('home');
});
Route::get('/', function()
{
    return view('home');
});


