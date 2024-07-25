@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')
<script>
    var formToSubmit = null; // Variável global para armazenar o formulário a ser enviado

    function showConfirmDeleteModal(event) {
        event.preventDefault(); // Previne o comportamento padrão do link

        formToSubmit = event.target.closest('form'); // Armazena o formulário

        var confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
        confirmDeleteModal.show(); // Mostra o modal de confirmação
    }

    document.getElementById('confirmDeleteButton').addEventListener('click', function() {
        if (formToSubmit) {
            formToSubmit.submit(); // Submete o formulário
        }
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
                        <form id="deleteForm" action="{{ route('admin.results.destroy', ['id' => $result->idResults]) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <a href="#" onclick="showConfirmDeleteModal(event);" class="btn btn-link p-0" title="Delete">
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
<!-- modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection