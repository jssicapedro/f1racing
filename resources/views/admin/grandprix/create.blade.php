@extends('layout.layout')

@section('title', 'F1Racing')
@push('links')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
        <h1>New Grand Prix</h1>
        <form action="{{ route('admin.grandprix.store') }}" method="POST">
            @csrf
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
                <div class="item">
                    <div class="mb-3">
                        <label for="nameGrandPrix" class="form-label">Name</label>
                        <input type="text" class="form-control" id="nameGrandPrix" name="nameGrandPrix" required>
                    </div>
                </div>
                <div class="item">
                    <div class="mb-3">
                        <label for="year" class="form-label">Year</label>
                        <input type="text" class="form-control" id="year" name="year" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Add New</button>
        </form>
    </div>
</div>
@endsection