<?php

use App\Http\Controllers\AdhesionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Adhesion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Models\Colocation;
use App\Models\Depense;
use App\Models\User;

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
})->name('home')->middleware("guest");

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/Logout', [AuthenticatedSessionController::class, "destroy"])->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

    Route::prefix('colocation')->middleware("auth")->group(function () {
        Route::get('/show/{adhesion}',[AdhesionController::class, "index"])->name('colocation.show');
        Route::get('/create', [ColocationController::class, "create"])->name('colocation.create');
        Route::post('/store', [ColocationController::class, "store"]);
        Route::delete("/destroy/{colocation}", [ColocationController::class, "destroy"]);

        Route::get('/categories', [CategoryController::class, "index"])->name('colocation.categories');
        Route::post('/categories/store', [CategoryController::class, "store"]);

        Route::get('/expenses/{colocation}', [DepenseController::class, "index"])->name('colocation.expenses');
        Route::get('/expense/create', [DepenseController::class, "create"])->name('colocation.expense-create');
        Route::post('/expense/create/store', [DepenseController::class, "store"]);
        Route::delete("/expense/destroy/{depense}", [DepenseController::class, "destroy"]);

        Route::get("/credit/store/{depense}", [CreditController::class, "store"])->name("credit.store");
        Route::get('/credit/{depense}', [CreditController::class, "index"])->name('colocation.credit');
        Route::get("/credit/paid/{credit}", [CreditController::class, "update"]);

        Route::get("/adhesion/store/{colocation}", [AdhesionController::class, "store"])->name("adhesion.store");
        Route::put("/adhesion/destroy/{adhesion}", [AdhesionController::class, "update"]);
        
        Route::get('/manage-members/{colocation}', function ($colocation) {
            $query = Adhesion::query();
            $members = $query->where('left_at', NULL)->where('colocation_id', $colocation)->get();
            return view('colocation.manage-members', compact("members"));
        })->name('colocation.manage-members');


        Route::get('/invite', function () {
            return view('colocation.invite');
        })->name('colocation.invite');

        Route::get('/invite/accept', function () {
            return view('colocation.invite-accept');
        })->name('colocation.invite');
        
    });
    Route::get('/invite/accept/{token}/{invitation}', [InvitationController::class, "accept"])->name('colocation.invite.accept');
    Route::put('/invite/join', [InvitationController::class, "join"])->name('colocation.invite.accept');

    Route::get('/admin/dashboard', function () {
        $users = User::all();
        $colocations = Colocation::all();
        return view('admin.dashboard', compact("users", "colocations"));
    })->name('admin.dashboard');