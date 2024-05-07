@extends('layout.layout')

@section('title', 'F1Racing - Constructors')

@push('links')
<link rel="stylesheet" href="{{ asset('css/team.css') }}">
@endpush

@section('main')
<h1 class="title">Constructors</h1>
<section class="splide splide_const" role="group" aria-label="Splide Basic HTML Example">
  <div class="splide__track">
    <ul class="splide__list">
      @foreach ($teams as $team)
      <li class="splide__slide" style="background: {{$team->color}};">
        <a href="{{ route('team.show', ['id' => $team->idTeam]) }}">
          <img src="{{url('storage/team/'.$team->imgFullName)}}" alt="{{$team->name}}">
        </a>
      </li>
      @endforeach
    </ul>
</section>

<section class="splide splide_mobile" role="group" aria-label="Splide Basic HTML Example">
  <div class="splide__track">
    <ul class="splide__list">
      @foreach ($teams as $team)
      <li class="splide__slide" style="background: {{$team->color}};">
        <img src="{{url('storage/team/'.$team->imgFullName)}}" alt="{{$team->name}}">
      </li>
      @endforeach
    </ul>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/construcSplid.js') }}"></script>
@endpush