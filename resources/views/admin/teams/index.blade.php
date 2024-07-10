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
    <h1>Teams</h1>
</div>
@endsection