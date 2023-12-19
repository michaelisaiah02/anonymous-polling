@extends('layouts.app')
@section('title', 'Register')
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
                        <form method="POST" action="{{ url('/register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control @error('nama') is-invalid @enderror bg-transparent border border-2 border-dark rounded-4"
                                    id="nama" name="nama" placeholder="Nama" value="{{ old('nama') }}" autofocus>
                                <label for="nama" class="text-dark-emphasis bg-transparent">Nama Lengkap</label>
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="username"
                                    class="form-control @error('username') is-invalid @enderror bg-transparent border border-2 border-dark rounded-4"
                                    id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                                <label for="username" class="text-dark-emphasis bg-transparent">Username</label>
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password"
                                    class="form-control @error('password') is-invalid @enderror bg-transparent border border-2 border-dark rounded-4"
                                    id="password" name="password" placeholder="Password">
                                <label for="password" class="text-dark-emphasis">Password</label>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col d-flex justify-content-center column-gap-3">
                                    <a href="{{ url('/') }}" class="btn btn-outline-success">
                                        Kembali
                                    </a>
                                    <button type="submit" class="btn btn-outline-success">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
