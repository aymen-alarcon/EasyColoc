<?php

use App\Http\Controllers\AdhesionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\ProfileController;
use App\Models\adhesion;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ColocationController::class, "index"]
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

    Route::prefix('colocation')->middleware("auth")->group(function () {
        Route::post('/create', [ColocationController::class, "store"])->name('colocation.create');

        Route::get('/show/{colocation}',[AdhesionController::class, "index"])->name('colocation.show');

        Route::get('/categories', [CategoryController::class, "index"])->name('colocation.categories');
        Route::post('/categories/store', [CategoryController::class, "store"]);

        Route::get('/expenses/{colocation}', [DepenseController::class, "index"])->name('colocation.expenses');

        Route::get('/expense/create', [DepenseController::class, "create"])->name('colocation.expense-create');
        Route::post('/expense/create/store', [DepenseController::class, "store"]);

        Route::get("/credit/store/{depense}", [CreditController::class, "store"])->name("credit.store");

        Route::get('/manage-members/{colocation}', function ($colocation) {
            $query = adhesion::query();
            $members = $query->where('left_at', NULL)->where('colocation_id', $colocation)->get();
            return view('colocation.manage-members', compact("members"));
        })->name('colocation.manage-members');

        Route::get('/credit/{depense}', [CreditController::class, "index"])->name('colocation.credit');

        Route::get('/invite', function () {
            return view('colocation.invite');
        })->name('colocation.invite');

        Route::get('/invite/accept', function () {
            return view('colocation.invite-accept');
        })->name('colocation.invite.accept');

    });

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/users', function () {
            return view('admin.users');
        })->name('admin.users');

        Route::get('/colocations', function () {
            return view('admin.colocations');
        })->name('admin.colocations');

        Route::get('/expenses', function () {
            return view('admin.expenses');
        })->name('admin.expenses');
    });