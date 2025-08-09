<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

// ... other API routes

Route::post('/chat', [ChatController::class, 'chat'])->name('api.chat');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
