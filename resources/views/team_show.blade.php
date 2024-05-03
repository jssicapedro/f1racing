@extends('layout.layout')

@section('title', 'F1Racing - Constructors')

@section('links')
<link rel="stylesheet" href="{{ asset('css/team_show.css') }}">
@endsection

@section('script')

@endsection

@section('main')
<div class="information">
    <img src="{{ url('storage/team/'.$team->imgFullName) }}" alt="{{$team->fullName}}">
    <div class="about">
        <div class="about_">
            <h2>Basic Information</h2>
            <p>Full Name <span class="about__">{{$team->fullName}}</span></p>
            <p>Base <span class="about__">{{$team->base}} <img src="{{ url('storage/country/'.$team->imgCountry) }}" alt="{{$team->country}}"></span></p>
            <p>First Year <span class="about__">{{$team->firstTeamEntry}}</span></p>
        </div>
        <div class="chiefs">
            <h2>Team</h2>
            <p>Team Chief <span>{{$team->teamChief}}</span></p>
            <p>Technical Chief <span>{{$team->technicalChief}}</span></p>
        </div>
        @foreach ($cars as $car)
        <div class="car">
            <h2>Car</h2>
            <p>Chassis <span>{{$car->chassis}}</span></p>
            <p>Power Unit <span>{{$car->powerUnit}}</span></p>
        </div>
        @endforeach
    </div>

</div>
<div class="drivers">
    @foreach ($drivers as $driver)
    <div class="driver">
        <img src="{{ url('storage/driver/'.$driver->imgDriver) }}" alt="{{$driver->name}}">
        <h1>{{$driver->name}} <span><img src="{{ url('storage/driver/'.$driver->imgNumber) }}" alt="{{$driver->number}}"></span></h1>
    </div>
    @endforeach
</div>
<!-- <div class="bio">

</div> -->
@endsection