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
                    <option value="" disabled selected>Select Year</option>
                    @foreach($years as $year)
                    <option value="{{ $year->year }}">{{ $year->year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="selection_track">
                <label for="track" class="form-label">Select Track</label>
                <select id="track" name="track" class="form-select" required>
                    <option value="all">All Tracks</option>
                    @foreach($tracks as $track)
                    <option value="{{ $track }}">{{ $track }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Filter Results</button>
            </div>
        </div>
    </form>

    @if(isset($results) && count($results) > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Year</th>
                <th>Track</th>
                <th>Position</th>
                <th>Driver</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
            @foreach($results as $result)
            <tr>
                <td>{{ $result->grandprix->year }}</td>
                <td>{{ $result->prix->name }}</td>
                <td>{{ $result->position }}</td>
                <td>{{ $result->driver->firstName }} {{ $result->driver->name }}</td>
                <td>{{ $result->points }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
