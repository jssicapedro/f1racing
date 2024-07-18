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
        <h1>Users</h1>
        <a class="btnRed" href="">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->isAdmin)
                        <input type="checkbox" name="" id="" checked onclick="return false;">
                        @else
                        <input type="checkbox" name="" id="" onclick="return false;">
                        @endif
                    </td>
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
        {{ $users->links() }}
    </div>
</div>
@endsection