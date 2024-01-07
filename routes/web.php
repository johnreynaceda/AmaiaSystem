<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    if (auth()->user()->is_admin == true) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('guest.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


//admin routes
Route::prefix('administrator')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/maintenance', function () {
        return view('admin.maintenance');
    })->name('admin.maintenance');
    Route::get('/pass', function () {
        return view('admin.pass');
    })->name('admin.pass');
    Route::get('/requests', function () {
        return view('admin.requests');
    })->name('admin.requests');
    Route::get('/amenities', function () {
        return view('admin.amenities');
    })->name('admin.amenities');
    Route::get('/complaints', function () {
        return view('admin.complaints');
    })->name('admin.complaints');
    Route::get('/messages', function () {
        return view('admin.messages');
    })->name('admin.messages');
    Route::get('/announcement', function () {
        return view('admin.announcement');
    })->name('admin.announcement');
    Route::get('/users', function () {
        return view('admin.users');
    })->name('admin.users');
    Route::get('/unit-owner', function () {
        return view('admin.unit-owner');
    })->name('admin.unit-owner');
    Route::get('/tenant', function () {
        return view('admin.tenant');
    })->name('admin.tenant');

    Route::get('/reports', function () {
        return view('admin.reports');
    })->name('admin.reports');


});

//guest routes
Route::prefix('guest')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('guest.index');
    })->name('guest.dashboard');
    Route::get('/my-profile', function () {
        return view('guest.profile');
    })->name('guest.profile');
    Route::get('/requests', function () {
        return view('guest.requests');
    })->name('guest.requests');
    Route::get('/inbox', function () {
        return view('guest.inbox');
    })->name('guest.inbox');
    Route::get('/contact', function () {
        return view('guest.contact');
    })->name('guest.contact');
    Route::get('/announcement', function () {
        return view('guest.announcement');
    })->name('guest.announcement');
    Route::get('/about', function () {
        return view('admin.about');
    })->name('guest.about');
    Route::get('/resident-satisfaction', function () {
        return view('guest.satisfaction');
    })->name('guest.satisfaction');


});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
