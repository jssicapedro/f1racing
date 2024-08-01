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
        <h1>Teams</h1>
        <a class="btnBlack" href="{{ route('admin.teams.create') }}">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Base</th>
                    <th>First Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teams as $team)
                <tr>
                    <td>{{ $team->idTeam }}</td>
                    <td><img class="logo_team" src="{{ url('storage/team/'.$team->imgLogo) }}" alt=""></td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->base }}</td>
                    <td>{{ $team->firstTeamEntry }}</td>
                    <td class="actions">
                        <!-- Add any actions here, such as edit, delete -->
                        <a href="#">
                            <img src="{{ asset('img/logoAdminBar/edit.png') }}" alt="edit">
                        </a>
                        <form action="#" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <a href="#">
                                <img src="{{ asset('img/logoAdminBar/delete.png') }}" alt="delete">
                            </a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $teams->links() }}
    </div>
</div>
@endsection