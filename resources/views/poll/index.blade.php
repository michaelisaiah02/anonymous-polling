@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 m-0">
            <div class="col-md-6 col-xl-4">
                <div
                    class="card rounded-5 border border-3 bg-warning-subtle bg-opacity-25 px-xxl-3 px-md-1 mx-0 font-handlee">
                    <div class="card-body mx-xxl-5 mx-md-3 mt-xxl-4 mt-md-2 mb-xxl-5 mb-md-1">
                        <form method="POST" action="{{ url('/') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="username"
                                    class="form-control {{ $errors->any() ? 'is-invalid' : '' }} bg-transparent border border-2 border-dark rounded-4"
                                    id="username" name="username" placeholder="Masukan ID Poll"
                                    value="{{ old('username') }}" autofocus>
                                <label for="username" class="text-dark-emphasis bg-transparent">Masukan ID Poll</label>
                            </div>
                        </form>
                        <div class="row mb-xxl-4 mb-2 justify-content-between">
                            <div class="col align-self-center">
                                <h1 class="text-dark text-center text-uppercase">Atau</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <a href="{{ url('poll/create') }}" class="btn btn-outline-success">Buat Polling Baru</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
