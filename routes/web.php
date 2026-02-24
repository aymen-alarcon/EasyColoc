<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

    Route::get('/profile', function () {
        return view('user.profile');
    })->name('profile');

    Route::prefix('colocation')->group(function () {

        Route::get('/', function () {
            return view('colocation.list');
        })->name('colocation.list');

        Route::get('/list', function () {
            return view('colocation.list');
        })->name('colocation.list');

        Route::get('/create', function () {
            return view('colocation.create');
        })->name('colocation.create');

        Route::get('/show', function () {
            return view('colocation.index');
        })->name('colocation.show');

        Route::get('/categories', function () {
            return view('colocation.categories');
        })->name('colocation.categories');

        Route::get('/expenses', function () {
            return view('colocation.expenses');
        })->name('colocation.expenses');

        Route::get('/expense/create', function () {
            return view('colocation.expense-create');
        })->name('colocation.expense-create');

        Route::get('/manage-members', function () {
            return view('colocation.manage-members');
        })->name('colocation.manage-members');

        Route::get('/settlements', function () {
            return view('colocation.settlements');
        })->name('colocation.settlements');

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