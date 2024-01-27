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

        $rules = [
            'name'     => 'nullable|string',
            'password' => [
                'nullable',
                'confirmed',
                Password::min( 6 )->numbers()->symbols()->mixedCase(),
            ],
        ];

        $this->validate( $request, $rules );

        // Update user data
        if ( $request->has( 'name' ) ) {
            $user->name = $request->input( 'name' );
        }

        if ( $request->has( 'password' ) ) {
            $user->password = Hash::make( $request->input( 'password' ) );
        }

        $user->save();

        return redirect( 'dashboard' )->with( 'success', 'Profile Update Successful' );
    }
}