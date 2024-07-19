@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')
<script>
    document.getElementById('year').addEventListener('change', function() {
        var year = this.value;
        fetch(`/admin/results/tracks?year=${year}`)
            .then(response => response.json())
            .then(data => {
                var trackSelect = document.getElementById('track');
                trackSelect.innerHTML = '<option value="">Select Prix</option>';
                data.forEach(track => {
                    var option = document.createElement('option');
                    option.value = track;
                    option.textContent = track;
                    trackSelect.appendChild(option);
                });
            });
    });
</script>
@endpush

@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <div class="info">
        <h1>Results</h1>
        <form method="GET" action="{{ route('admin.results') }}">
            <div>
                <label for="year">Year:</label>
                <select name="year" id="year">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                    <option value="{{ $year->year }}" {{ request('year') == $year->year ? 'selected' : '' }}>{{ $year->year }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="track">Prix:</label>
                <select name="track" id="track">
                    <option value="">Select Prix</option>
                    @foreach($tracks as $track)
                    <option value="{{ $track }}" {{ request('track') == $track ? 'selected' : '' }}>{{ $track }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button class="btnRed" type="submit">Filter</button>
            </div>
        </form>
        <a class="btnBlack" href="{{ route('admin.results.create') }}">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th>Driver</th>
                    <th>Points</th>
                    <th>Fast Lap Time</th>
                    <th>Race</th>
                    <th>Grand Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td>{{ $result->idResults }}</td>
                    <td>{{ $result->position }}</td>
                    <td>{{ $result->driver->firstName }} {{ $result->driver->lastName }}</td>
                    <td>{{ $result->points }}</td>
                    <td>{{ $result->fastLapTime }}</td>
                    <td>{{ $result->prix->name }}</td>
                    <td>{{ $result->grandprix->year }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.results.edit', $result->idResults) }}">
                            <img src="{{ asset('img/logoAdminBar/edit.png') }}" alt="edit">
                        </a>
                        <form action="#" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <a href="#">
                                <img src="{{ asset('img/logoAdminBar/delete.png') }}" alt="delete">
                            </a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $results->links() }}
    </div>
</div>
@endsection