@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<style>
    .result {
        display: flex;
        gap: 50px;
    }
</style>
@push('links')

@endpush

@push('scripts')
<script>
    document.getElementById('generateFieldsButton').addEventListener('click', function() {
        generateFields();
    });

    function generateFields() {
        const entries = document.getElementById('entries').value;
        const resultsFields = document.getElementById('resultsFields');
        const drivers = @json($drivers);
        const prix = document.getElementById('Prix_idPrix');
        const laps = prix.options[prix.selectedIndex].getAttribute('data-laps');

        resultsFields.innerHTML = '';

        for (let i = 0; i < entries; i++) {
            let driverOptions = '';
            drivers.forEach(driver => {
                driverOptions += `<option value="${driver.idDriver}">${driver.name}</option>`;
            });

            let fastLapNumberOptions = '';
            for (let j = 1; j <= laps; j++) {
                fastLapNumberOptions += `<option value="${j}">${j}</option>`;
            }

            let resultField = `
                <div class="result">
                    <div class="form-group">
                        <label for="driver${i}">Driver</label>
                        <select class="form-control" id="driver${i}" name="results[${i}][Driver_idDriver]" required>
                            <option value="">Select Driver</option>
                            ${driverOptions}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="position${i}">Position</label>
                        <select class="form-control" id="position${i}" name="results[${i}][position]" required>
                            ${Array.from({ length: entries }, (v, k) => k + 1).map(n => `<option value="${n}">${n}</option>`).join('')}
                            <option value="NC">NC</option>
                            <option value="DNF">DNF</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="points${i}">Points</label>
                        <input type="number" class="form-control" id="points${i}" name="results[${i}][points]" min="0" max="26" required>
                    </div>
                    <div class="form-group">
                        <label for="fastLapNumber${i}">Fast Lap Nº</label>
                        <select class="form-control" id="fastLapNumber${i}" name="results[${i}][fastLapNumber]">
                            <option value="">Select Fast Lap Number</option>
                            ${fastLapNumberOptions}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fastLapTime${i}">Fast Lap Time</label>
                        <input type="text" class="form-control" id="fastLapTime${i}" name="results[${i}][fastLapTime]" pattern="\\d{1}:\\d{2}\\.\\d{3}" placeholder="1:36.156">
                    </div>
                </div>
                <hr>
            `;
            resultsFields.insertAdjacentHTML('beforeend', resultField);
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endpush

@section('main')
    @include('admin.partials.admin-navbar')
    <div class="content">
        <div class="info">
            <a class="btnBlack" href="{{ route('admin.results') }}">Return list</a>
            <h1>New Result</h1>
            <form action="{{ route('admin.results.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="Prix_idPrix">Track</label>
                    <select class="form-control" id="Prix_idPrix" name="Prix_idPrix" required>
                        @foreach($prix as $p)
                            <option value="{{ $p->idPrix }}" data-laps="{{ $p->laps }}" {{ old('Prix_idPrix') == $p->idPrix ? 'selected' : '' }}>{{ $p->idPrix }} - {{ $p->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('Prix_idPrix'))
                        <div class="text-danger">{{ $errors->first('Prix_idPrix') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="GrandPrix_idGrandPrix">Grand Prix</label>
                    <select class="form-control" id="GrandPrix_idGrandPrix" name="GrandPrix_idGrandPrix" required>
                        @foreach($grandprix as $gp)
                        <option value="{{ $gp->idGrandPrix }}" {{ old('GrandPrix_idGrandPrix') == $gp->idGrandPrix ? 'selected' : '' }}>{{ $gp->idGrandPrix }} - {{ $gp->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('GrandPrix_idGrandPrix'))
                        <div class="text-danger">{{ $errors->first('GrandPrix_idGrandPrix') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="entries">Number of Results to Add</label>
                    <input type="number" class="form-control" id="entries" name="entries" min="1" value="{{ old('entries') }}" required>
                    @if ($errors->has('entries'))
                        <div class="text-danger">{{ $errors->first('entries') }}</div>
                    @endif
                </div>

                <button type="button" class="btn btn-primary" id="generateFieldsButton">Generate Fields</button>

                <div id="resultsFields" class="mt-3">
                    @if (old('results'))
                        @foreach (old('results') as $i => $result)
                            <div class="result">
                                <div class="form-group">
                                    <label for="driver{{ $i }}">Driver</label>
                                    <select class="form-control" id="driver{{ $i }}" name="results[{{ $i }}][Driver_idDriver]" required>
                                        <option value="">Select Driver</option>
                                        @foreach($drivers as $driver)
                                            <option value="{{ $driver->idDriver }}" {{ old('results.'.$i.'.Driver_idDriver') == $driver->idDriver ? 'selected' : '' }}>{{ $driver->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('results.'.$i.'.Driver_idDriver'))
                                        <div class="text-danger">{{ $errors->first('results.'.$i.'.Driver_idDriver') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="position{{ $i }}">Position</label>
                                    <select class="form-control" id="position{{ $i }}" name="results[{{ $i }}][position]" required>
                                        @foreach (array_merge(range(1, old('entries')), ['NC', 'DNF']) as $position)
                                            <option value="{{ $position }}" {{ old('results.'.$i.'.position') == $position ? 'selected' : '' }}>{{ $position }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('results.'.$i.'.position'))
                                        <div class="text-danger">{{ $errors->first('results.'.$i.'.position') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="points{{ $i }}">Points</label>
                                    <input type="number" class="form-control" id="points{{ $i }}" name="results[{{ $i }}][points]" value="{{ old('results.'.$i.'.points') }}" min="0" max="26" required>
                                    @if ($errors->has('results.'.$i.'.points'))
                                        <div class="text-danger">{{ $errors->first('results.'.$i.'.points') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="fastLapNumber{{ $i }}">Fast Lap Nº</label>
                                    <select class="form-control" id="fastLapNumber{{ $i }}" name="results[{{ $i }}][fastLapNumber]">
                                        <option value="">Select Fast Lap Number</option>
                                        @for ($lap = 1; $lap <= $prix->find(old('Prix_idPrix'))->laps; $lap++)
                                            <option value="{{ $lap }}" {{ old('results.'.$i.'.fastLapNumber') == $lap ? 'selected' : '' }}>{{ $lap }}</option>
                                        @endfor
                                    </select>
                                    @if ($errors->has('results.'.$i.'.fastLapNumber'))
                                        <div class="text-danger">{{ $errors->first('results.'.$i.'.fastLapNumber') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="fastLapTime{{ $i }}">Fast Lap Time</label>
                                    <input type="text" class="form-control" id="fastLapTime{{ $i }}" name="results[{{ $i }}][fastLapTime]" value="{{ old('results.'.$i.'.fastLapTime') }}" pattern="\\d{1}:\\d{2}\\.\\d{3}" placeholder="1:36.156">
                                    @if ($errors->has('results.'.$i.'.fastLapTime'))
                                        <div class="text-danger">{{ $errors->first('results.'.$i.'.fastLapTime') }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <button type="submit" class="btn btn-success mt-3">Add Results</button>
            </form>
        </div>
    </div>
@endsection