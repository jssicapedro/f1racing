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
        <h1>Grand Prix</h1>
        <a class="btnRed" href="">Add</a>
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
        {{ $grandPrix->links() }}
    </div>
</div>
@endsection