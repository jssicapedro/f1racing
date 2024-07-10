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
        <h1>Prix</h1>
        <a class="btnRed" href="">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Comun Name</th>
                    <th>Country</th>
                    <th>First Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prixs as $prix)
                <tr>
                    <td>{{ $prix->idPrix }}</td>
                    <td>{{ $prix->name }}</td>
                    <td>{{ $prix->comunName }}</td>
                    <td>{{ $prix->country }}</td>
                    <td>{{ $prix->firstGrandPrix }}</td>
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
        {{ $prixs->links() }}
    </div>
</div>
@endsection