<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\SocialLogInController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view( '/', 'home' )->name( 'home' );
Route::view( '/dashboard', 'dashboard' )->name( 'dashboard' )->middleware( 'auth' );

// Login Routes
Route::get( '/sineUp', [RegistrationController::class, 'index'] )->name( 'register' );
Route::post( '/sineUp', [RegistrationController::class, 'store'] );

// Registration Routes
Route::get( '/login', [SignInController::class, 'index'] )->name( 'login' );
Route::post( '/login', [SignInController::class, 'store'] );

// User Routes
Route::get( '/update', [UserController::class, 'index'] )->name( 'update' );
Route::post( '/update', [UserController::class, 'update'] );

// OAuth Routes : google
Route::get( '/login/google', [SocialLogInController::class, 'googleRedirect'] )->name( 'google.sineIn' );
Route::get( '/login/google/callback', [SocialLogInController::class, 'googleCallback'] );

// OAuth Routes : github
Route::get( '/login/github', [SocialLogInController::class, 'githubRedirect'] )->name( 'github.sineIn' );
Route::get( '/login/github/callback', [SocialLogInController::class, 'githubCallback'] );

Route::post( '/logout', LogoutController::class )->name( 'logout' );