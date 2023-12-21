@extends('layouts.app')
@section('title', 'Poll Mulai - Belum Vote')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 m-0">
            <div class="col-md-6 col-xl-4">
                <div
                    class="card rounded-5 border border-3 bg-warning-subtle bg-opacity-25 px-xxl-3 px-md-1 mx-0 font-handlee">
                    <div class="card-body mx-xxl-5 mx-md-3 my-5 py-5">
                        <form method="POST" action="{{ url('/vote') }}">
                            @csrf
                            <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                            <input type="text" name="id_poll" value="{{ $poll->id_poll }}" hidden>
                            <div class="mb-3 mt-0 text-center fs-2 fw-bold" id="countdown"></div>
                            <div class="row my-5">
                                <div class="col">
                                    <h3 class="text-dark text-center">{{ $poll->statement }}</h3>
                                </div>
                            </div>
                            @foreach ($poll->options as $option)
                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-center">
                                        <button class="btn btn-outline-success border-2 rounded-3 w-100 fs-4" name="pilihan"
                                            value="{{ $option->id }}" type="submit">{{ $option->option }}</button>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var endTime = new Date("{{ $poll->waktu_selesai }}").getTime();

        var countdownInterval = setInterval(function() {
            var currentTime = new Date().getTime();
            var remainingTime = endTime - currentTime;

            if (remainingTime <= 0) {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "Poll {{ $poll->id_poll }} sudah berakhir";
            } else {
                var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML = minutes + ":" + seconds;
            }
        }, 1000);
    </script>
    </div>
@endsection
