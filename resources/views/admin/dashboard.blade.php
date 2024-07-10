@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@push('links')

@endpush

@push('scripts')

@endpush


@section('main')
<div class="admin-navbar">
    @include('admin.partials.admin-navbar')
</div>
<div class="content">
    <h1>DashBoard</h1>
</div>
@endsection