<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegistrationController extends Controller {
    public function index(): View {
        return view( 'auth.registration' );
    }

    public function store( Request $request ) {
        $this->validate( $request, [
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => [
                'required', 'min:3', 'confirmed',
                Password::min( 6 )->numbers()->symbols()->mixedCase(),
            ],
            // confirmed will get (password_confirmation value. don't need another validation for this)
        ] );

        User::create( [
            'name'     => $request->input( 'name' ),
            'email'    => $request->input( 'email' ),
            'password' => Hash::make( $request->input( 'password' ) ),
        ] );

        auth()->attempt( $request->only( 'email', 'password' ) );

        return redirect( 'dashboard' )->with( 'success', 'Registration Successful' );
    }
}