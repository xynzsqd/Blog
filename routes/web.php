<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('posts')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/', [PostController::class, 'store'])->name('posts.store');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
        Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/{post}', [PostController::class, 'delete'])->name('posts.delete');

        Route::post('/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    });

    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/{post}', [PostController::class, 'show'])->name('posts.show');
});
