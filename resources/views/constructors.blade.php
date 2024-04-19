@extends('layout.layout')

@section('title', 'F1Racing - Constructors')

@section('links')
<link rel="stylesheet" href="{{ asset('css/constructors.css') }}">
@endsection

@section('script')
<script src="{{ asset('js/construcSplid.js') }}"></script>
@endsection

@section('main')
<h1 class="title">Constructors</h1>

<section class="splide splide_const" role="group" aria-label="Splide Basic HTML Example">
  <div class="splide__track">
    <ul class="splide__list">
      @foreach ($constructors as $constructor)
      <li class="splide__slide" style="background: {{$constructor->color}};">
        <img src="{{url('storage/team/'.$constructor->imgFullName)}}" alt="{{$constructor->name}}">
      </li>
      @endforeach
    </ul>
    
</section>

@endsection