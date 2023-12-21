@extends('layouts.app')
@section('title', 'Poll Selesai')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 m-0">
            <div class="col-md-6 col-xl-4">
                <div
                    class="card rounded-5 border border-3 bg-warning-subtle bg-opacity-25 px-xxl-3 px-md-1 mx-0 font-handlee">
                    <div class="card-body mx-xxl-5 mx-md-3 mt-xxl-4 mt-md-2 mb-xxl-5 mb-md-1">
                        <h2 class="text-center ">{{ $poll->statement }}</h2>
                        <div class="row mb-4">
                            <div class="col">
                                @foreach ($poll->options as $option)
                                    <h3 class="mt-3">{{ $option->option }}</h3>
                                    <div class="progress" role="progressbar" aria-label="Animated 20px striped example"
                                        aria-valuenow="{{ $option->votes->count() / $poll->votes->count() }}"
                                        aria-valuemin="0" aria-valuemax="{{ $option->votes->count() }}">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success bg-opacity-50"
                                            style="width: {{ ($option->votes->count() / $poll->votes->count()) * 100 }}%">
                                            {{ round(($option->votes->count() / $poll->votes->count()) * 100) }}%
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-3">
                            <a href="{{ url('/poll/create') }}" class="btn btn-outline-success">Buat Poll Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
