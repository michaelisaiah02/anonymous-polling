@extends('layouts.app')
@section('title', 'Buat Poll')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 m-0">
            <div class="col-md-6 col-xl-4">
                <div
                    class="card rounded-5 border border-3 bg-warning-subtle bg-opacity-25 px-xxl-3 px-md-1 mx-0 font-handlee">
                    <div class="card-body mx-xxl-5 mx-md-3 mt-xxl-4 mt-md-2 mb-xxl-5 mb-md-1">
                        <form method="POST" action="{{ url('/vote') }}">
                            @csrf
                            <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                            <input type="text" name="poll_id" value="{{ $poll->id }}" hidden>
                            <div class="mb-3 mt-0 text-center fs-2 fw-bold" id="countdown"></div>
                            <div class="row mb-3">
                                <div class="col">
                                    <h4 class="text-dark text-center">{{ $poll->statement }}</h4>
                                </div>
                            </div>
                            @dd($poll->user)
                            @foreach ($poll->options as $item)
                                <div class="row mb-3">
                                    <div class="col">
                                        <h5 class="text-dark text-center">{{ $item->option }}</h5>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row mb-3">
                                <button class="btn btn-outline-success border-2 rounded-3" name="pilihan" value="benar"
                                    type="submit">Benar</button>
                            </div>

                            <div class="row mb-3">
                                <button class="btn btn-outline-success border-2 rounded-3" name="pilihan" value="salah"
                                    type="submit">Salah</button>
                            </div>
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

    <h2>Poll Statement</h2>
    <p>Option 1</p>
    <p>Option 2</p>
    <p>Option 3</p>
    </div>
@endsection
