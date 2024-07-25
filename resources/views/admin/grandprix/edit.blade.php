@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('#year').datepicker({
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
        <a class="btnBlack" href="{{ route('admin.grandprix') }}">Return list</a>
        <h1>{{ $grandprix->name }}</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('admin.grandprix.update', $grandprix->idGrandPrix) }}" method="POST">
            @csrf
            @method('PUT')
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div>
                <label class="form-label">Id GrandPrix</label>
                <input type="text" class="form-control" value="{{ $grandprix->idGrandPrix }}" readonly>
            </div>

            <div class="item">
                <div class="item-content">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$grandprix->name}}" required>
                    </div>
                </div>
                <div class="item-content">
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control" id="year" name="year" value="{{$grandprix->year}}" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update GrandPrix</button>
        </form>
    </div>
</div>
@endsection