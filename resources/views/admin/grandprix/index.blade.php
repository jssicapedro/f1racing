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
        <h1>Grand Prix</h1>
        <a class="btnBlack" href="{{ route('admin.grandprix.create') }}">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grandPrix as $gp)
                <tr>
                    <td>{{ $gp->idGrandPrix }}</td>
                    <td>{{ $gp->name }}</td>
                    <td>{{ $gp->year }}</td>
                    <td class="actions">
                        <!-- Add any actions here, such as edit, delete -->
                        <a href="{{ route('admin.grandprix.edit', $gp->idGrandPrix) }}">
                            <img src="{{ asset('img/logoAdminBar/edit.png') }}" alt="edit">
                        </a>
                        <form action="{{ route('admin.grandprix.destroy', ['id' => $gp->idGrandPrix]) }}" method="POST" style="display:inline-block;">
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
        {{ $grandPrix->links() }}
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