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
        <h1>Drivers</h1>
        <a class="btnBlack" href="">Add</a>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Driver</th>
                    <th>Name</th>
                    <th>Number</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drivers as $driver)
                <tr>
                    <td>{{ $driver->idDriver }}</td>
                    <td><img class="driver" src="{{ url('storage/driver/'.$driver->imgDriverProfile) }}" alt="{{ $driver->firstName }} {{ $driver->lastName }}"></td>
                    <td>{{ $driver->firstName }} {{ $driver->lastName }}</td>
                    <td>{{ $driver->number }}</td>
                    <td>{{ $driver->country }}</td>
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
        {{ $drivers->links() }}
    </div>
</div>
@endsection