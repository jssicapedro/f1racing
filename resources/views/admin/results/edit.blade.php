@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')
<script>
    document.getElementById('generateFieldsButton').addEventListener('click', function() {
        generateFields();
    });

    function generateFields() {
        const prix = document.getElementById('Prix_idPrix');
        const laps = prix.options[prix.selectedIndex].getAttribute('data-laps');

        resultsFields.innerHTML = '';
        for (let i = 0; i < entries; i++) {

            let fastLapNumberOptions = '';
            for (let j = 1; j <= laps; j++) {
                fastLapNumberOptions += `<option value="${j}">${j}</option>`;
            }
        }
    }
</script>
@endpush


@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <div class="info">
        <a class="btnBlack" href="{{ route('admin.results') }}">Return list</a>
        <h1>{{ $result->driver->name.' - '.$result->prix->name.' - '.$result->grandprix->name }}</h1>
        <form action="{{ route('admin.results.update', $result->idResults) }}" method="POST">
            @csrf
            @method('PUT')
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div>
                <label class="form-label">Id Result</label>
                <input type="text" class="form-control" value="{{ $result->idResults }}" readonly>
            </div>

            <div class="item">
                <div class="item_content">
                    <label class="form-label">Track</label>
                    <select class="form-control" name="Prix_idPrix">
                        <option value="{{ $result->prix->idPrix }}" selected>{{ $result->prix->idPrix.' - '.$result->prix->name }}</option>
                        @foreach($prix as $gp)
                        <option value="{{ $gp->id }}" {{ $gp->id == $result->Prix_idPrix ? 'selected' : '' }}>{{ $gp->idPrix.' - '.$gp->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item_content">
                    <label class="form-label">Grand Prix</label>
                    <select class="form-control" name="GrandPrix_idGrandPrix">
                        <option value="{{ $result->grandprix->idGrandPrix }}" selected>{{ $result->grandprix->idGrandPrix.' - '.$result->grandprix->name }}</option>
                        @foreach($grandprix as $gp)
                        <option value="{{ $gp->id }}" {{ $gp->id == $result->GrandPrix_idGrandPrix ? 'selected' : '' }}>{{ $gp->idGrandPrix.' - '.$gp->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="item">
                <div class="item_content">
                    <label class="form-label">Driver</label>
                    <select class="form-control" name="Driver_idDriver">
                        <option value="{{ $result->prix->id }}" selected>{{ $result->driver->idDriver.' - '.$result->driver->name }}</option>
                        @foreach($drivers as $d)
                        <option value="{{ $d->idDriver }}" {{ $d->idDriver == $result->Driver_idDriver ? 'selected' : '' }}>{{ $d->idDriver.' - '.$d->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="item">
                <div class="item_content">
                    <label for="position">Position</label>
                    <select class="form-control" id="position" name="position" required>
                        @for ($n = 1; $n <= 20; $n++) <option value="{{ $n }}" {{ $n == $result->position ? 'selected' : '' }}>{{ $n }}</option>
                            @endfor
                            <option value="NC" {{ $result->position == 'NC' ? 'selected' : '' }}>NC</option>
                            <option value="DNF" {{ $result->position == 'DNF' ? 'selected' : '' }}>DNF</option>
                    </select>
                </div>
                <div class="item_content">
                    <label for="points">Points</label>
                    <input type="number" class="form-control" id="points" name="points" min="0" max="26" value="{{$result->points}}" required>
                </div>
            </div>


            <div class="item">
                <div class="item_content">
                    <label for="fastLapNumber${i}">Fast Lap Nº</label>
                    <select class="form-control" id="fastLapNumber" name="fastLapNumber">
                        <option value="">Select Fast Lap Number</option>
                        @foreach($fastLapNumbers as $num)
                        <option value="{{ $num }}" {{ $num == $result->fastLapNumber ? 'selected' : '' }}>{{ $num }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item_content">
                    <label for="fastLapTime${i}">Fast Lap Time</label>
                    <input type="text" class="form-control" id="fastLapTime" name="fastLapTime" pattern="\d{1}:\d{2}\.\d{3}" placeholder="1:36.156" value="{{ $result->fastLapTime }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
</div>
@endsection