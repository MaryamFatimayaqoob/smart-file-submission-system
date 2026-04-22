<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [SubmissionController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::post('/submit', [SubmissionController::class, 'store']);

});


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

    Route::post('/admin/approve/{id}', [AdminController::class, 'approve']);
    Route::post('/admin/reject/{id}', [AdminController::class, 'reject']);

});
Route::middleware('auth')->group(function () {

    Route::get('/notifications', function () {
        return view('notifications.index');
    });

    Route::get('/notifications-data', function () {
        $user = auth()->user();

        return response()->json([
            'count' => $user->unreadNotifications->count(),
            'notifications' => $user->notifications->take(5)->map(function ($n) {
                return [
                    'message' => $n->data['message'] ?? 'No message',
                    'read' => !is_null($n->read_at),
                ];
            })
        ]);
    });

    Route::post('/notifications/read', function () {
        auth()->user()->unreadNotifications->markAsRead();
        return response()->json(['status' => 'ok']);
    });

});

require __DIR__.'/auth.php';


