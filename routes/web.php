<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\SignInController;
use Illuminate\Support\Facades\Route;

// Route::get( '/', function () {
//     return view( 'home' );
// } );

Route::view( '/', 'home' )->name( 'home' );
Route::view( '/dashboard', 'dashboard' )->name( 'dashboard' )->middleware( 'auth' );

Route::get( '/sineUp', [RegistrationController::class, 'index'] )->name( 'register' );
Route::post( '/sineUp', [RegistrationController::class, 'store'] );

Route::get( '/login', [SignInController::class, 'index'] )->name( 'login' );
Route::post( '/login', [SignInController::class, 'store'] );

Route::post( '/logout', LogoutController::class )->name( 'logout' );