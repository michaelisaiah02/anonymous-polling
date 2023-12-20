@extends('layouts.app')
@section('title', 'Buat Poll')
@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100 m-0">
            <div class="col-md-6 col-xl-4">
                <div
                    class="card rounded-5 border border-3 bg-warning-subtle bg-opacity-25 px-xxl-3 px-md-1 mx-0 font-handlee">
                    <div class="card-body mx-xxl-5 mx-md-3 mt-xxl-4 mt-md-2 mb-xxl-5 mb-md-1">
                        <form method="POST" action="{{ url('/poll') }}">
                            @csrf
                            <div class="mb-3 row">
                                <label for="id_poll" class="col col-form-label fs-2">Poll ID:</label>
                                <div class="col">
                                    <input type="text" class="form-control bg-transparent border-0 fs-2" id="id_poll"
                                        name="id_poll" value="{{ $id_poll }}" readonly>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="statement"
                                    class="form-control @error('statement') is-invalid @enderror bg-transparent border border-2 border-dark rounded-4"
                                    id="statement" name="statement" placeholder="Masukan ID Poll"
                                    value="{{ old('statement') }}" autofocus>
                                <label for="statement" class="text-dark-emphasis bg-transparent">Statement</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select
                                    class="form-select @error('waktu') is-invalid @enderror bg-transparent border border-2 border-dark rounded-4"
                                    id="waktu" name="waktu" autofocus>
                                    <option value="30">30 Detik</option>
                                    <option value="60">1 Menit</option>
                                    <option value="120">2 Menit</option>
                                    <option value="300">5 Menit</option>
                                </select>
                                <label for="waktu" class="text-dark-emphasis bg-transparent">Batas Waktu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="option"
                                    class="form-control @error('options[]') is-invalid @enderror bg-transparent border border-2 border-dark rounded-4"
                                    id="option" name="options[]" placeholder="Masukan ID Poll"
                                    value="{{ old('options[]') }}" required autofocus>
                                <label for="option" class="text-dark-emphasis bg-transparent">Opsi A</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="option"
                                    class="form-control @error('options[]') is-invalid @enderror bg-transparent border border-2 border-dark rounded-4"
                                    id="option" name="options[]" placeholder="Masukan ID Poll"
                                    value="{{ old('options[]') }}" required autofocus>
                                <label for="option" class="text-dark-emphasis bg-transparent">Opsi B</label>
                            </div>
                            <div class="form-floating mb-3" id="optionsContainer"></div>
                            <div class="row mb-3">
                                <button class="btn btn-outline-dark border border-2 border-dark rounded-3 px-5"
                                    type="button" onclick="addOption()">Tambah
                                    Opsi</button>
                            </div>
                            <div class="row mb-3">
                                <button class="btn btn-outline-success border-2 rounded-3 " type="submit">Start</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addOption() {
            var optionsContainer = $('#optionsContainer');
            var optionCount = optionsContainer.children().length + 1;
            var optionLabel = String.fromCharCode(66 + optionCount);
            var newOption = $(
                '<div class="form-floating mb-3">' +
                '<input type="option" class="form-control @error('options[]') is-invalid @enderror bg-transparent border border-2 border-dark rounded-4" id="option" name="options[]" placeholder="Masukan ID Poll" value="{{ old('options[]') }}" autofocus>' +
                '<label for="option" class="text-dark-emphasis bg-transparent">Opsi ' + optionLabel + '</label>' +
                '</div>'
            );
            optionsContainer.append(newOption);
        }
    </script>
@endsection
