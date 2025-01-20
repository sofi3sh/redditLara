<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\PostController;
use \App\Http\Controllers\Api\SubredditController;
use \App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\VoteController;
use \App\Http\Controllers\Api\CommentController;
use \App\Http\Controllers\Api\AuthController;
use \App\Http\Middleware\ApiKeyMiddleware;

// ✅ Публічні маршрути (без авторизації)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// ✅ Захищені маршрути (потрібен Sanctum токен)
Route::middleware(ApiKeyMiddleware::class)->group(function () {
    //Post
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/post/{id}', [PostController::class, 'show']);
    Route::post('/post', [PostController::class, 'store']);
    Route::patch('/post/{id}', [PostController::class, 'update']);
    Route::delete('/post/{id}', [PostController::class, 'destroy']);

    //Subreddit
    Route::get('/subreddit', [SubredditController::class, 'index']);
    Route::post('/subreddit', [SubredditController::class, 'store']);
    Route::patch('/subreddit/{id}', [SubredditController::class, 'update']);
    Route::delete('/subreddit/{id}', [SubredditController::class, 'destroy']);

    //Vote
    Route::get('/vote', [VoteController::class, 'index']);
    Route::post('/vote', [VoteController::class, 'store']);
    Route::patch('/vote/{id}', [VoteController::class, 'update']);
    Route::delete('/vote/{id}', [VoteController::class, 'destroy']);

    //Comment
    Route::get('/comment', [CommentController::class, 'index']);
    Route::post('/comment', [CommentController::class, 'store']);
    Route::patch('/comment/{id}', [CommentController::class, 'update']);
    Route::delete('/comment/{id}', [CommentController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});

//User
Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);
Route::patch('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);


Route::get('/test', function (){
    return response()->json(['message' => 'Hello World']);
});
