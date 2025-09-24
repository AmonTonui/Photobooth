<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\{PackageController, ExtraController, BookingController};

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $u = Auth::user();
        if ($u && ($u->role === 'admin')) {           
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/auth/google/redirect', fn () => Socialite::driver('google')->redirect())
    ->name('oauth.google.redirect');

Route::get('/auth/google/callback', function () {
    $g = Socialite::driver('google')->user();
    $user = User::firstOrCreate(
        ['email' => $g->getEmail()],
        ['name' => $g->getName() ?: 'User', 'password' => bcrypt(str()->random(32))]
    );

    Auth::login($user, remember: true);
    return redirect()->intended('/dashboard');
})->name('oauth.google.callback');


// Admin routes
// Route::middleware(['auth', 'verified', 'admin'])->group(function () {
//     Route::get('/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');
//     // other admin routes...
//     Route::resource('admin/packages', \App\Http\Controllers\Admin\PackageController::class);
//     Route::resource('admin/extras', \App\Http\Controllers\Admin\ExtraController::class);
//     Route::resource('admin/bookings', \App\Http\Controllers\Admin\BookingController::class)->only(['index','show']);
// });

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified', 'admin'])
    ->group(function () {
        Route::view('/', 'admin.dashboard')->name('dashboard');

        Route::resource('packages', PackageController::class);
        Route::resource('extras',   ExtraController::class);
        Route::resource('bookings', BookingController::class)->only(['index','show']);
    });
