@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100 m-0">
            <div class="col-md-3">
                <div
                    class="card rounded-5 border border-3 bg-warning-subtle bg-opacity-25 px-xxl-3 px-md-1 mx-0 font-handlee">
                    <div class="card-body mx-xxl-5 mx-md-3 mt-xxl-4 mt-md-2 mb-xxl-5 mb-md-1">
                        <div class="row mb-xxl-4 mb-2 justify-content-between">
                            <div class="col align-self-center">
                                <h1 class="text-dark text-center">Anonymous Polling</h1>
                            </div>
                        </div>
                        <form method="POST" action="{{ url('/') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="username"
                                    class="form-control {{ $errors->any() ? 'is-invalid' : '' }} bg-transparent border border-2 border-dark rounded-4"
                                    id="username" name="username" placeholder="Username" value="{{ old('username') }}"
                                    autofocus>
                                <label for="username" class="text-dark-emphasis bg-transparent">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password"
                                    class="form-control {{ $errors->any() ? 'is-invalid' : '' }} bg-transparent border border-2 border-dark rounded-4"
                                    id="password" name="password" placeholder="Password">
                                <label for="password" class="text-dark-emphasis">Password</label>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                                    <p>Username atau Password salah!</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                                    <p class="my-auto">{{ session()->get('success') }}</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="row mb-3">
                                <div class="col d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-success">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <a href="{{ url('/register') }}"
                                    class="btn btn-outline-success text-decoration-none">Register
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
