@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')

@endpush

@section('main')
    @include('admin.partials.admin-navbar')
    <div class="content">
    <div class="info">
        <h1>Results</h1>
        <a class="btnBlack" href="{{ route('admin.results.create') }}">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Position</th>
                    <th>Driver</th>
                    <th>Points</th>
                    <th>Fast Lap Time</th>
                    <th>Prix</th>
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
                    <td>
                        <!-- Add any actions here, such as edit, delete -->
                        <a href="#">
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