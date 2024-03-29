@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 center-screen card shadow mt-5 p-3">
                <form action="{{ route('update') }}" method="POST">
                    @csrf
                    <h2 class="text-center">Update Profile</h2>

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">

                            <div class="mb-3">
                                <label for="user_name" class="form-label">Name</label>
                                <input type="text" name="name"
                                    class="form-control
                                    @error('name')
                                    border border-danger
                                    @enderror"
                                    id="user_name" value="{{ $user->name ?? old('name') }}">

                                @error('name')
                                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control
                                    @error('password')
                                    border border-danger
                                    @enderror"
                                    id="password">

                                @error('password')
                                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm
                                    Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control
                                @error('confirm_password')
                                border border-danger
                                @enderror"
                                    id="confirm_password">

                                @error('password_confirmation')
                                    <p class="text-danger text-center mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3 mt-4">
                                <button type="submit" class="btn w-100 btn-info">Update</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
