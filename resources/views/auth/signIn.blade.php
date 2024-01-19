@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 center-screen card shadow mt-5 p-3">

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p class="text-center m-0">{{ session('error') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <h2 class="text-center">Sign In</h2>

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">

                            <div class="mb-3">
                                <label for="email_address" class="form-label">Email</label>
                                <input type="email" name="email" id="email_address"
                                    class="form-control
                                    @error('email')
                                    border border-danger
                                    @enderror"
                                    value="{{ old('email') }}">

                                @error('email')
                                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control
                                    @error('email')
                                    border border-danger
                                    @enderror"
                                    id="password">

                                @error('password')
                                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" name="remember" type="checkbox" id="checkbox">
                                <label class="form-check-label" for="checkbox">
                                    Remember Me
                                </label>
                            </div>

                            <div class="mb-3 mt-3">
                                <button type="submit" class="btn w-100 btn-info">Sign In</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
