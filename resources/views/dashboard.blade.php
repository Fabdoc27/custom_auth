@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p class="text-center m-0">{{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <h3 class="my-3">Dashboard</h3>
                <p class="alert alert-info">
                    Welcome, {{ ucwords(auth()->user()->name) }}
                </p>
            </div>
        </div>
    </div>
@endsection
