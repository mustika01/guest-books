<?php

use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\RoomController;
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

Route::get('/', [GuestBookController::class, 'index']);
Route::post('/guestbook/store', [GuestBookController::class, 'store']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/lists', [GuestBookController::class, 'admin'])->name('lists');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/room', [RoomController::class, 'index'])->name('room');
    Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');
    Route::post('/room', [RoomController::class, 'store'])->name('room.store');
    Route::get('/room/{id}/edit', [RoomController::class, 'edit'])->name('room.edit');
    Route::put('/room/{id}', [RoomController::class, 'update'])->name('room.update');
    Route::delete('/room/{id}', [RoomController::class, 'destroy'])->name('room.destroy');
});

require __DIR__ . '/auth.php';
