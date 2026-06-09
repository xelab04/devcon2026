<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RegistrationController as AdminRegistrationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SpeakerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = 'MSCC — Developers Conference 2026';

    return view('index', compact('title'));
})->name('index');

Route::view('/brand-system', 'brand-system')->name('brand-system');

Route::get('/speakers', [SpeakerController::class, 'index'])->name('speakers');
Route::get('/speakers/{id}', [SpeakerController::class, 'show'])->name('speaker');

Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/agenda/{id}', [AgendaController::class, 'show'])->name('session');

Route::get('/register', [RegistrationController::class, 'create'])->name('register');
Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

Route::view('/team', 'team', [
    'title' => 'Team — MSCC DevCon 2026',
    'board' => [
        ['name' => 'Jochen Kirstätter', 'photo' => 'jochen.png', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/JKirstaetter'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/jochen.kirstaetter'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/jochenkirstaetter/'],
        ]],
        ['name' => 'Mary Jane Kirstätter', 'photo' => 'mary-jane.jpg', 'links' => [
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/maryjane.kirstatter'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/maryjanekirstaetter/'],
        ]],
        ['name' => 'Shelly Hermia Bhujun-Sookun', 'photo' => 'shelly.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/Shelly_Bhujun'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/shelly.bhujun'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/shelly-hermia-bhujun-sookun-998a40a2/'],
        ]],
        ['name' => 'Ish Sookun', 'photo' => 'ish.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/IshSookun'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/ish.sookun'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/ishsookun/'],
        ]],
        ['name' => 'Vidush H. Namah', 'photo' => 'vidush.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/VHNamah'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/vnsnippets'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/vnamah/'],
        ]],
    ],
    'squad' => [
        ['name' => 'Aditya Bholah', 'photo' => 'aditya.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/aditya_bholah'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/aditya.bholah07'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/aditya-bholah-91b8b3137/'],
        ]],
        ['name' => 'Alex Bissessur', 'photo' => 'alex.png', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/Alex_with_a_B'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/alexandre-bissessur-b9986123a/'],
        ]],
        ['name' => 'Chittesh Sham', 'photo' => 'chittesh.jpg', 'links' => [
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/chittesh-sham-956ba5a0'],
        ]],
        ['name' => 'Delphine Bissessur', 'photo' => 'delphine.jpg', 'links' => [
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/delphinebissessur/'],
        ]],
        ['name' => 'Fawwaaz Koodruth', 'photo' => 'fawwaaz.jpg', 'links' => []],
        ['name' => 'Girish Mahabir', 'photo' => 'girish.png', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/girishmahabir'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/girish.mahabir'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/girish-mahabir'],
        ]],
        ['name' => 'Hayley Kirstätter', 'photo' => 'hayley.jpg', 'links' => []],
        ['name' => 'Mervyn Manilall', 'photo' => 'mervyn-manilall.jpg', 'links' => []],
        ['name' => 'Namita Sham', 'photo' => 'namita-sham.png', 'links' => []],
        ['name' => 'Neil Baichoo', 'photo' => 'neil.jpg', 'links' => [
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://linkedin.com/in/arwinneil'],
        ]],
        ['name' => 'Nirvan Pagooah', 'photo' => 'nirvan.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/nirvanpagooah'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/nirvanpagooah'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/tejaspagooah/'],
        ]],
        ['name' => 'Om Gokhool', 'photo' => 'om.jpg', 'links' => [
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/omgokhool'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/omdeep-gokhool-75b66b167/'],
        ]],
        ['name' => 'Tristan Kirstätter', 'photo' => 'tristan.jpg', 'links' => []],
        ['name' => 'Ubeid Jamal', 'photo' => 'ubeid.jpg', 'links' => [
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/ubeidullah-jamal-ahmad/'],
        ]],
    ],
])->name('team');

/*
|--------------------------------------------------------------------------
| Backoffice
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route(
            auth()->user()->isAdmin() ? 'admin.dashboard' : 'admin.registrations.index'
        );
    })->name('home');

    // Registrations — visible to admin and squad (squad sees a limited column set).
    Route::get('registrations', [AdminRegistrationController::class, 'index'])->name('registrations.index');
    Route::get('registrations/export', [AdminRegistrationController::class, 'export'])
        ->middleware('can:export-registrations')->name('registrations.export');
    Route::post('registrations/{registration}/check-in', [AdminRegistrationController::class, 'checkIn'])->name('registrations.check-in');
    Route::post('registrations/{registration}/cancel-check-in', [AdminRegistrationController::class, 'cancelCheckIn'])->name('registrations.cancel-check-in');

    // Profile — any authenticated user can change their own password.
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // Admin-only.
    Route::middleware('role:admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('users', UserController::class)->except(['show']);
    });
});
