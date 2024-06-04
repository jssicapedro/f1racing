@extends('layout.layout')

@section('title', 'F1Racing')
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
@push('links')

@endpush

@push('scripts')

@endpush

@section('main')
<p>{{$prix}}</p>
@endsection