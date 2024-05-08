@extends('layout.layout')

@section('title', 'F1Racing')

@push('links')
<link rel="stylesheet" href="{{ asset('css/prix_show.css') }}">
@endpush

@section('main')
<div class="banner" style="background-image: linear-gradient(#00000073,#00000073), url('{{url('storage/prix/'.$prix->imgBanner) }}');">
    <h1>{{$prix->name}}</h1>
</div>

<div class="about">
    <div class="country_name">
        <img src="{{url('storage/country/'.$prix->imgCountry)}}" alt="{{$prix->country}}">
        <h2>{{$prix->grandPrixName}}</h2>
    </div>
    
    <div class="about_circuit">
        <img src="{{url('storage/prix/'.$prix->imgAbout)}}" alt="{{$prix->name}}">
        <div class="information">
            <div>
                <div class="firstGP">
                    <h3>First Grand Prix</h3>
                    <p>{{$prix->firstGrandPrix}}</p>
                </div>
                <div class="laps">
                    <h3>Laps</h3>
                    <p>{{$prix->laps}}</p>
                </div>
            </div>
            <div>
                <div class="length">
                    <h3>Length</h3>
                    <p>{{$prix->length}} <span>km</span></p>
                </div>
                <div class="distance">
                    <h3>Distance</h3>
                    <p>{{$prix->distance}} <span>km</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="info">
    <div class="title">
        <h1>{{$prix->comunName}}</h1>
        <hr>
    </div>
    {!!$prix->info!!}
</div>

@endsection

@push('scripts')
@endpush