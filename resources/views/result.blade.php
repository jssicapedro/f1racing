@extends('layout.layout')

@section('title', 'F1Racing')

@push('links')
<link rel="stylesheet" href="{{ asset('css/result.css') }}">
@endpush

@section('main')
<h1>Results</h1>
<div class="container">
    <form method="POST" action="{{ route('results.filter') }}">
        @csrf
        <div class="selection">
            <div class="selection_year">
                <label for="year" class="form-label">Select Year</label>
                <select id="year" name="year" class="form-select" required>
                    <option value="" disabled {{ request('year') ? '' : 'selected' }}>Select Year</option>
                    @foreach($years as $year)
                    <option value="{{ $year->year }}" {{ request('year') == $year->year ? 'selected' : '' }}>{{ $year->year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="selection_track">
                <label for="track" class="form-label">Select Track</label>
                <select id="track" name="track" class="form-select" required>
                    <option value="all" {{ request('track') == 'all' ? 'selected' : '' }}>All Tracks</option>
                    @foreach($tracks as $track)
                    <option value="{{ $track }}" {{ request('track') == $track ? 'selected' : '' }}>{{ $track }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btnRed">Filter Results</button>
            </div>
        </div>
    </form>

    @if(isset($results))
    @if(count($results) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Track</th>
                <th>Position</th>
                <th>Driver</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $result->prix->name }}</td>
                <td>{{ $result->position }}</td>
                <td>{{ $result->driver->firstName }} {{ $result->driver->name }}</td>
                <td>{{ $result->points }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Não houve corrida nesta pista no ano selecionado</p>
    @endif
    @endif
</div>

<script>
    document.getElementById('year').addEventListener('change', function() {
        var year = this.value;
        var trackSelect = document.getElementById('track');

        fetch(`/results/get-tracks?year=${year}`)
            .then(response => response.json())
            .then(data => {
                trackSelect.innerHTML = '<option value="all">All Tracks</option>';
                data.forEach(track => {
                    var option = document.createElement('option');
                    option.value = track;
                    option.textContent = track;
                    trackSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching tracks:', error));
    });
</script>
@endsection