<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('posts')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [PostController::class, 'delete'])->name('posts.delete');

        Route::post('/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::delete('/{post}/comments/{comment}', [CommentController::class, 'delete'])->name('comments.delete');
    });

    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/search', [PostController::class, 'search'])->name('posts.search');
    Route::get('/{post:slug}', [PostController::class, 'show'])->name('posts.show');
});

Route::prefix('profile')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    });

    Route::get('/{user}', [ProfileController::class, 'show'])->name('profile.show');
});
