@extends('layout.layout')

@section('title', 'F1Racing')

@push('links')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('#firstTeamEntry').datepicker({
            format: 'yyyy',
            viewMode: 'years',
            minViewMode: 'years'
        });
    });
</script>
@endpush

@section('main')
@include('admin.partials.admin-navbar')
<div class="content">
    <div class="info">
        <a class="btnBlack" href="{{ route('admin.teams') }}">Return list</a>
        <h1>New Team</h1>
        <form action="{{ route('admin.teams.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h1>Information</h1>
                <hr>
            </div>
            <div class="item">
                <div class="item-content">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-content">
                    <div class="mb-3">
                        <label for="base" class="form-label">Base</label>
                        <input type="text" class="form-control" id="base" name="base" required>
                    </div>
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-control" id="country" name="country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->name }}" data-flag="{{ strtolower($country->name) }}">
                                {{ $country->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-content">
                    <div class="mb-3">
                        <label for="teamChief" class="form-label">Team Chief</label>
                        <input type="text" class="form-control" id="teamChief" name="teamChief" required>
                    </div>
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="technicalChief" class="form-label">Technical Chief</label>
                        <input type="text" class="form-control" id="technicalChief" name="technicalChief" required>
                    </div>
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="firstTeamEntry" class="form-label">First Year</label>
                        <input type="text" class="form-control" id="firstTeamEntry" name="firstTeamEntry" required>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="item-content">
                    <div class="mb-3">
                        <label for="polePositions" class="form-label">Pole Positions</label>
                        <input type="number" class="form-control" id="polePositions" name="polePositions" required>
                    </div>
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="worldChampionShips" class="form-label">World Champions Ships</label>
                        <input type="number" class="form-control" id="worldChampionShips" name="worldChampionShips" required>
                    </div>
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="color" class="form-control" id="color" name="color" required>
                    </div>
                </div>
            </div>
            <div class="title">
                <h1>Image</h1>
                <hr>
            </div>
            <div class="item">
                <div class="mb-3">
                    <label class="form-label" for="imgFullName">Full name</label>
                    <input type="file" class="form-control" name="imgFullName">
                    @if ($errors->has('imgFullName'))
                    <div class="text-danger">{{ $errors->first('imgFullName') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" for="imgLogo">Logotipo</label>
                    <input type="file" class="form-control" name="imgLogo">
                    @if ($errors->has('imgLogo'))
                    <div class="text-danger">{{ $errors->first('imgLogo') }}</div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" for="imgTeam">Team</label>
                    <input type="file" class="form-control" name="imgTeam">
                    @if ($errors->has('imgTeam'))
                    <div class="text-danger">{{ $errors->first('imgTeam') }}</div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
    </div>
    @endsection