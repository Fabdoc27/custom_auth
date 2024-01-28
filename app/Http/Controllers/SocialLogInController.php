<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLogInController extends Controller {
    // Google
    public function googleRedirect() {
        return Socialite::driver( 'google' )->redirect();
    }

    public function googleCallback() {
        $user = Socialite::driver( 'google' )->user();

        // existing user
        $existUser = User::where( 'google_id', $user->id )->first();

        if ( $existUser ) {
            Auth::login( $existUser );
        } else {
            $newUser = User::create( [
                'name'      => $user->name,
                'email'     => $user->email,
                'google_id' => $user->id,
            ] );

            Auth::login( $newUser );
        }

        return redirect()->route( 'dashboard' )->with( 'success', 'Login Successful' );
    }

    // Github
    public function githubRedirect() {
        return Socialite::driver( 'github' )->redirect();
    }

    public function githubCallback() {
        $user = Socialite::driver( 'github' )->user();

        // existing user
        $existUser = User::where( 'github_id', $user->id )->first();

        if ( $existUser ) {
            Auth::login( $existUser );
        } else {
            $newUser = User::create( [
                'name'      => $user->name,
                'email'     => $user->email,
                'google_id' => $user->id,
            ] );

            Auth::login( $newUser );
        }

        return redirect()->route( 'dashboard' )->with( 'success', 'Login Successful' );
    }
}