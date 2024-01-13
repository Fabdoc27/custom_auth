<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SignInController extends Controller {
    public function index(): View {
        return view( 'auth.signIn' );
    }

    public function store( Request $request ) {
        $this->validate( $request, [
            'email'    => 'required|email',
            'password' => 'required',
        ] );

        if ( !auth()->attempt( $request->only( 'email', 'password' ), $request->input( 'remember' ) ) ) {
            return back()->with( 'error', 'Invalid Login Details' );
        }

        return redirect()->route( 'dashboard' )->with( 'success', 'Login Successful' );
    }
}