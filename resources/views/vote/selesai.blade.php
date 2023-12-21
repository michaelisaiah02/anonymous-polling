@extends('layouts.app')
@section('title', 'Poll Selesai')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 m-0">
            <div class="col-md-6 col-xl-4">
                <div
                    class="card rounded-5 border border-3 bg-warning-subtle bg-opacity-25 px-xxl-3 px-md-1 mx-0 font-handlee">
                    <div class="card-body mx-xxl-5 mx-md-3 my-5 py-5">
                        <h2 class="text-center mb-5">{{ $poll->statement }}</h2>
                        <div class="row">
                            <div class="col">
                                @foreach ($poll->options as $option)
                                    <h3 class="mt-3">{{ $option->option }}</h3>
                                    @if ($poll->votes->count() === 0)
                                        <div class="progress bg-dark bg-opacity-25" role="progressbar"
                                            aria-label="Animated 20px striped example" aria-valuenow="0" aria-valuemin="0"
                                            aria-valuemax="{{ $option->votes->count() }}" style="height: 13%">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success bg-opacity-75 text-dark fw-bold fs-6"
                                                style="width: 0%">
                                                0%
                                            </div>
                                        </div>
                                    @else
                                        <div class="progress bg-dark bg-opacity-25" role="progressbar"
                                            aria-label="Animated 20px striped example"
                                            aria-valuenow="{{ $option->votes->count() / $poll->votes->count() }}"
                                            aria-valuemin="0" aria-valuemax="{{ $option->votes->count() }}"
                                            style="height: 13%">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success bg-opacity-75 text-dark fw-bold fs-6"
                                                style="width: {{ ($option->votes->count() / $poll->votes->count()) * 100 }}%">
                                                {{ round(($option->votes->count() / $poll->votes->count()) * 100) }}%
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @if ($poll->votes->count() === 0)
                                    <div class="row my-3">
                                        <div class="col">
                                            <h3 class="text-center mt-3">Tidak ada yang vote</h3>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3 mt-5">
                            <a href="{{ url('/poll/create') }}" class="btn btn-outline-success">Buat Poll Baru</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
