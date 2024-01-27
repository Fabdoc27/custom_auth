<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class UserController extends Controller {
    public function index(): View {
        $user = auth()->user();
        return view( 'user.updateProfile', compact( 'user' ) );
    }

    public function update( Request $request ) {
        $user = auth()->user();

        $this->validate( $request, [
            'name'     => 'required|string',
            'password' => [
                'required', 'confirmed',
                Password::min( 6 )->numbers()->symbols()->mixedCase(),
            ],
        ] );

        $user->update( [
            'name'     => $request->input( 'name' ),
            'password' => Hash::make( $request->input( 'password' ) ),
        ] );

        return redirect( 'dashboard' )->with( 'success', 'Profile Update Successful' );
    }
}