@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 m-0">
            <div class="col-md-6 col-xl-4">
                <div
                    class="card rounded-5 border border-3 bg-warning-subtle bg-opacity-25 px-xxl-3 px-md-1 mx-0 font-handlee">
                    <div class="card-body mx-xxl-5 mx-md-3 my-5 py-5">
                        <form method="GET" action="{{ url('vote/poll') }}">
                            @csrf
                            @error('id_poll')
                                <div class="alert alert-danger alert-dismissible fade show">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @enderror
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control @error('id_poll') is-invalid @enderror bg-transparent border border-2 border-dark rounded-4"
                                    id="id_poll" name="id_poll" placeholder="Masukan ID Poll" value="{{ old('id_poll') }}"
                                    autofocus>
                                <label for="id_poll" class="text-dark-emphasis bg-transparent">Masukan ID Poll</label>
                            </div>
                        </form>
                        <div class="row my-5 justify-content-between">
                            <div class="col d-flex align-content-center justify-content-center">
                                <h1 class="text-dark text-center text-uppercase p-0 m-0">Atau</h1>
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
