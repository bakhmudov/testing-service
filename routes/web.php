<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Teacher\MaterialController;
use App\Http\Controllers\Teacher\TestController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'checkIfVerified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin routes
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/unverified-users', [AdminController::class, 'unverifiedUsers'])->name('admin.unverified-users');
        Route::post('admin/verify-user/{user}', [AdminController::class, 'verifyUser'])->name('admin.verify-user');
    });

    // Teacher routes
    Route::middleware('role:teacher')->prefix('teacher')->group(function () {
        Route::get('/', [TeacherController::class, 'index'])->name('teacher.index');
        Route::resource('tests', TestController::class)->names([
            'index' => 'teacher.tests.index',
            'create' => 'teacher.tests.create',
            'store' => 'teacher.tests.store',
            'show' => 'teacher.tests.show',
            'edit' => 'teacher.tests.edit',
            'update' => 'teacher.tests.update',
            'destroy' => 'teacher.tests.destroy',
        ]);

        Route::resource('materials', MaterialController::class)->names([
            'index' => 'teacher.materials.index',
            'create' => 'teacher.materials.create',
            'store' => 'teacher.materials.store',
            'show' => 'teacher.materials.show',
            'edit' => 'teacher.materials.edit',
            'update' => 'teacher.materials.update',
            'destroy' => 'teacher.materials.destroy',
        ]);
    });

    // Student routes
    Route::middleware('role:student')->group(function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    });
});

Route::get('/verification-pending', function () {
    if (Auth::check() && Auth::user()->is_verified) {
        // Redirect based on the user's role
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.index');
        } elseif (Auth::user()->hasRole('teacher')) {
            return redirect()->route('teacher.index');
        } elseif (Auth::user()->hasRole('student')) {
            return redirect()->route('student.index');
        }
    }
    return view('auth.verification-pending');
})->name('verification.pending');

require __DIR__.'/auth.php';
