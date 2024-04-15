<?php

use App\Livewire\ImageIndex;
use App\Livewire\Tasks\TaskIndex;
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/tasks', TaskIndex::class)->name('tasks.index');
Route::get('/images', ImageIndex::class)->name('images.index');

require __DIR__ . '/auth.php';
