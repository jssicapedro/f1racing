@extends('layout.layout')

@section('title', 'F1Racing - Constructors')

@section('links')
<link rel="stylesheet" href="{{ asset('css/team.css') }}">
@endsection

@section('script')

@endsection

@section('main')
<h1>{{$team->name}}</h1>
@endsection